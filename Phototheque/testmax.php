<?php
include_once 'lib/fonctions.php';
start();
include_once 'lib/classConnecDB.php';
$database = new Connection();
$db = $database->openConnection();
$db->exec("SET CHARACTER SET utf8");

if ((!empty($_FILES["upload"])) && (!empty($_POST["tag"]))) {
    require("lib/imgClass.php");
    $img = $_FILES['upload'];
    $ext = strtolower(substr($img['name'], -4));
    $allow_ext = array(".jpg",".png",".gif","jpeg");

    if (in_array($ext, $allow_ext)) {
        move_uploaded_file($img['tmp_name'], "imgbd/".$img['name']);
        Img::creerMin("imgbd/".$img['name'], "imgbd/min", $img['name'], 340, 220);
        Img::convertirJPG("imgbd/".$img['name']);
    } else {
        $erreur ="Votre fichier n'est pas une image.";
    }


    $image_url=$_FILES["upload"]["name"]; //adresse url avec ext .jpg//
  $image_name=substr($image_url, 0, -4);//nom de l'image sans extension//
  $tag=$_POST["tag"];
    $multitag=explode(" ", $tag);//Recupere chaque tag separément



    foreach ($multitag as $value) {//Pour chaque tag verifie s'il est déja present dans la db.

        $req=$db->prepare("SELECT COUNT(*) AS nbr FROM tag WHERE tag=:tag");
        $req->bindValue(':tag', $value, PDO::PARAM_STR);
        $req->execute();
        $tagpresent=($req->fetchColumn()==0)?1:0;
        $req->CloseCursor();


        if (!$tagpresent) {
            $reqidtag=$db->prepare("SELECT id_tag FROM tag WHERE tag='$value'");
            $reqidtag->execute();
            $result = $reqidtag->fetchAll(PDO::FETCH_COLUMN, 0);
            $everytag= $db->lastInsertId('image_id');
        } else {
            $reqtag=$db->prepare("INSERT INTO tag(tag) VALUES(:tag)");
            $reqtag->execute(array(

        "tag"=>$value,
      ));
            $everytag= $value;
        }
    }

    $iduser=$_SESSION["auth"]["user_id"];

    $reqimg=$db->prepare("INSERT INTO image(image_url, image_name, user_id) VALUES(:image_url, :image_name, :user_id)");
    $reqimg->execute(array(

    "image_url"=>$image_url,
    "image_name"=>$image_name,
    "user_id"=>$iduser,

  ));

    $resultimg = $db->lastInsertId('image_id');

$everytag=$resultag;
    var_dump($resultimg);
    var_dump($everytag);


    $reqclasser=$db->prepare("INSERT INTO classer(id_tag, image_id) VALUES(:id_tag, :image_id)");
    $reqclasser->execute(array(

    "id_tag"=>$resultag,
    "image_id"=>$resultimg,

  ));
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="=device-, initial-scale=1">
  <title>Phototeque</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/accueil.css">
</head>

<body>
  <main>
    <nav class="nav_pc">
      <div>
        <img src="img/logo.png" alt="simplotheque" class="img-fluid logo_header">
      </div>
      <div class="container_search">
        <form action="result.php">
          <input type="text" placeholder="Recherche.." name="q">
          <button type="submit"><i class="fa fa-search color_i"></i></button>
        </form>
      </div>
    </div>
    <div class="nav_pc_div2">
      <i class="fas fa-home fa-2x"></i>
      <i class="fas fa-user fa-2x"></i>
      <i class="fas fa-cogs fa-2x"></i>
    </div>
  </nav>

  <!-- NAV MOBILE -->
  <nav class="display_none">
    <div class="fas fa-search fa-2x" id="iconSearch"></div>
    <a href="index.php>"><i class="fas fa-home fa-2x"></i></a>
    <form class="" action="index.html" method="post">
      <label name="input" class=" fas fa-images fa-2x">
        <input type="file" method='post' name="upload" id="inputFile" class="inputFile" >
      </label>
    </form>
    <a href="./formulaire.html"><i class="fas fa-user fa-2x"></i></a>
    <a href="./gestion_compte.html"><i class="far fa-sun fa-2x"></i></a>
    <div class="barrederecherche display-none" id="barrederecherche">
      <input class="recherchemobile" type="text" name="q" value="" placeholder="Recheche...">
    </div>
    <div class="upup display-none">
      <form class="uploadFormMobile" action="" method="post">
        <input type="text" class="input_form" placeholder="Tag" name="" value="">
        <button type="submit" id="uploadfilemobile" class="btn" name="button" >Envoyer</button>
      </form>
    </div>
  </nav>


  <form method="POST" action="testmax.php" enctype="multipart/form-data">
    <label for="icone"></label><br>
    <input type="file" name="upload" /><br>
    <input type="text" name="tag" value=""/><br>
    <button>valider</button>
  </form>'


  <button type="button"  class="btn bnt-primary" onclick="window.location.href='gestion_compte.php'" >Compte</button>
  <button type="button"  class="btn btn-danger" onclick="window.location.href='deco.php'" >Deconnexion</button>

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
  </div>

  <div class="container-fluid">
    <div class="margin_img">

      <?php

      $req=$db->prepare("SELECT image_name, image_url FROM image NATURAL JOIN classer NATURAL JOIN tag
        ORDER BY id_tag DESC LIMIT 12 ");
        $req->execute();
        while ($result = $req->fetch()): ?>

        <a href="imgbd/<?php echo $result['image_url']; ?>"><img src="imgbd/min/<?php echo $result['image_name'] ?>.jpg" alt=""></a>
        <?php
      endwhile;
      ?>
    </div>
  </div>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="js/lazy-load.js"></script>

<?php include("html/footer.html"); ?>
</body>
</html>
