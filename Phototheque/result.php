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
  <title>Phototeque</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/accueil.css">
  <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
  <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
</head>
<?php include('html/header.php'); ?>
<body>
  <main>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"         onloadedmetadata=""aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="accueil.php" enctype="multipart/form-data">
              <label for="icone"></label><br />
              <input type="file" name="upload" />
              <input type="text" name="tag" value=""/>
              <button><i class="fas fa-check fa-1x"></i></button>
            </form>
            <?php
            if (!empty($_FILES)) {
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
            }
            include_once 'lib/classConnecDB.php';
            $database = new Connection();
            $db = $database->openConnection();
            ?>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid">


      <?php
      if (isset($erreur)) {
          echo $erreur;
      }
      ?>

      <?php
      include_once 'lib/classConnecDB.php';
      if (isset($_POST["tag"])) {
          $tag=$_POST["tag"];
          $image_url=$_FILES["upload"]["name"];
          $database = new Connection();
          $db = $database->openConnection();
          $req=$db->prepare("INSERT INTO images(image_url, tag) VALUES(:image_url, :tag)");
          $req->execute(array(
          "image_url"=>$image_url,
          "tag"=>$tag,
        ));
      };
      ?>

      <?php
      include_once 'lib/classConnecDB.php';
      $database = new Connection();
      $db = $database->openConnection();
      $ani=explode(" ", $_GET["q"]);

      if (!empty($_GET["q"])) {
          foreach ($ani as $value) {
              $req=$db->prepare("SELECT image_url FROM image
            NATURAL JOIN classer NATURAL JOIN tag WHERE tag.tag LIKE '%$value%'
            ");
              $req->execute();
              while ($data = $req->fetch()) {
                  ?>
              <a href="imgbd/<?php echo implode(",", $data) ?>"><img src="imgbd/min/<?php echo implode(",", $data) ?>" alt=""></a>

              <?php
              }
          }
      } else {
          echo " Pas de résultat trouvé";
      }
        ?>

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
