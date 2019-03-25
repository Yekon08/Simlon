<?php
include_once 'lib/fonctions.php';
start();


include_once 'lib/classConnecDB.php';
$database = new Connection();
$db = $database->openConnection();
$db->exec("SET CHARACTER SET utf8");

$errors = array();

if ((!empty($_FILES["upload"])) && (!empty($_POST["tag"]))) {
    require("lib/imgClass.php");
    $img = $_FILES['upload'];
    $ext = strtolower(substr($img['name'], -4));
    $allow_ext = array(".jpg",".png",".gif","jpeg");

    if (in_array($ext, $allow_ext)) {
        move_uploaded_file($img['tmp_name'], "imgbd/".$img['name']);
        Img::creerMin("imgbd/".$img['name'], "imgbd/min", $img['name'], 340, 220);
        Img::convertirJPG("imgbd/".$img['name']);

      }else {
            $errors['image'] ="Votre fichier n'est pas une image.";
        }

    $image_url=$_FILES["upload"]["name"]; //adresse url avec ext .jpg//
    $image_name=substr($image_url, 0, -4);//nom de l'image sans extension//
    $tag=htmlentities($_POST["tag"]);
    $multitag=explode(" ", $tag);//Recupere chaque tag separément



    foreach ($multitag as $value) {//Pour chaque tag verifie s'il est déja present dans la db.


        $req=$db->prepare("SELECT COUNT(*) AS nbr FROM tag WHERE tag=:tag");
        $req->bindValue(':tag', $value, PDO::PARAM_STR);
        $req->execute();
        $tagpresent=($req->fetchColumn()==0)?1:0;
        $req->CloseCursor();

        //si tag present ont recupere son id

        if (!$tagpresent) {
            $iduser=$_SESSION["auth"]["user_id"];

            $reqidtag=$db->prepare("SELECT id_tag FROM tag WHERE tag='$value'");
            $reqidtag->execute();
            $result = $reqidtag->fetchAll(PDO::FETCH_COLUMN, 0);

            $reqimg=$db->prepare("INSERT INTO image(image_url, image_name, user_id) VALUES(:image_url, :image_name, :user_id)");
            $reqimg->execute(array(

        "image_url"=>$image_url,
        "image_name"=>$image_name,
        "user_id"=>$iduser,

      ));
            $resultag=($result[0]);
            $resultimg = $db->lastInsertId();


            $reqclasser=$db->prepare("INSERT INTO classer(id_tag, image_id) VALUES(:id_tag, :image_id)");
            $reqclasser->execute(array(

        "id_tag"=>$resultag,
        "image_id"=>$resultimg,

      ));
        // INSERT INTO tableA (champA, champB, champC)
      // SELECT NULL, client.id, 'nouvelle valeur'
      // FROM client
      // INNER JOIN tableB ON tableB.champD = client.champE
      // WHERE client.login = 'A.Nonymous'
        }
        // tag non  present ont insert l'image et le tag
        else {
            $iduser=$_SESSION["auth"]["user_id"];

            $reqimg=$db->prepare("INSERT INTO image(image_url, image_name, user_id) VALUES(:image_url, :image_name, :user_id)");
            $reqimg->execute(array(

        "image_url"=>$image_url,
        "image_name"=>$image_name,
        "user_id"=>$iduser,

      ));

            $resultimg = $db->lastInsertId();

            $reqtag=$db->prepare("INSERT INTO tag(tag) VALUES(:tag)");
            $reqtag->execute(array(

        "tag"=>$value,


      ));

            $resultag = $db->lastInsertId();

            $reqclasser=$db->prepare("INSERT INTO classer(id_tag, image_id) VALUES(:id_tag, :image_id)");
            $reqclasser->execute(array(

        "id_tag"=>$resultag,
        "image_id"=>$resultimg,

      ));
        }

    };


}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="=device-, initial-scale=1">
  <title>Phototheque</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/accueil.css">
  <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
  <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
  <main>
    <?php include 'navbar.php' ?>
  <!-- FILES BTN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
  <?php

  if (!empty($_SESSION['auth']['user_id'])) {
      echo('<form method="POST" action="accueil.php" enctype="multipart/form-data" class="formUploadFile">
    <label for="uploadPc" class="labelUploadPc br5x"><i class="far fa-images"></i></label><br>
    <input type="file" name="upload" id="uploadPc" class="inputFilePc" /><br>
    <input type="text" name="tag" value="" class="textInputFile display_none" placeholder="Ecris un tag ..."/><br>
    <button class="validerInputFile display_none"><i class="fas fa-check"></i></button>
    </form>');
  }
  ?>
  <!--FILES BTN FIN !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->


  <!-- message flash -->

  <div class="container">
    <?php if (isset($_SESSION['flash'])): ?>
      <?php foreach ($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>" role="alert">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>

    <div class="alert alert-danger col-3 mx-auto">
      <?php foreach($errors as $error): ?>
        <ul>
          <li> <?= $error; ?> </li>
        </ul>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    </div>



      <div class="container-fluid">
        <div class="margin_img">
          <?php

      $req=$db->prepare("SELECT image_name, image_url FROM image NATURAL JOIN classer NATURAL JOIN tag
        ORDER BY id_tag DESC LIMIT 12 ");
        $req->execute();
        while ($result = $req->fetch()): ?>

            <a href="imgbd/<?php echo $result['image_name'] ?>.jpg" rel="prettyPhoto">
              <img src="imgbd/min/<?php echo $result['image_name'] ?>.jpg" alt="" class="lazy img_accueil boxshadow">
            </a>
            <?php
      endwhile;
      ?>
        </div>
      </div>
      <div class="hauteur-bot">

      </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/lazy-load.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function () {
        $("a[rel^='prettyPhoto']").prettyPhoto();
      });
    </script>

    <script src="js/scripts.js"></script>
    <script src="js/lazy-load.js"></script>

    <?php include("html/footer.html"); ?>
  </body>

  </html>
