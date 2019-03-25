<?php include('html/header.php'); ?>



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="=device-, initial-scale=1">
  <title>Phototeque</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/accueil.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

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
            <form method="POST" action="accueil2.php" enctype="multipart/form-data">
              <label for="icone"></label><br />
              <input type="file" name="upload" />
              <input type="text" name="tag" value=""/>
              <button><i class="fas fa-check fa-1x"></i></button>
            </form>
            <?php
            if (!empty($_FILES)) {
              require("php/imgClass.php");
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
            include_once 'php/classConnecDB.php';
            $database = new Connection();
            $db = $database->openConnection();
            ?>

            <?php
            include_once 'php/classConnecDB.php';
            if (isset($_FILES["upload"])) {
              $image_url=$_FILES["upload"]["name"];
              $dataimg = new Connection();
              $db = $dataimg->openConnection();
              $req=$db->prepare("INSERT INTO image(image_url) VALUES(:image_url)");
              $req->execute(array(
                "image_url"=>$image_url,
              ));
            };
            ?>
            <?php
            include_once 'php/classConnecDB.php';
            if (isset($_POST["tag"])) {
              $tag=$_POST["tag"];
              $database = new Connection();
              $db = $database->openConnection();
              $req=$db->prepare("INSERT INTO tag(tag) VALUES(:tag)");
              $req->execute(array(
                "tag"=>$tag,
              ));
            };
            ?>

            <?php
            // include_once 'php/classConnecDB.php';
            // $database = new Connection();
            // $db = $database->openConnection();
            // $ani=explode(" ", $_GET["q"]);
            ?>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">

      <?php
      $dos = "imgbd/min";
      $dir = opendir($dos);
      while ($file = readdir($dir)) {
        $allow_ext = array("jpg","png","gif","peg");
        $ext = strtolower(substr($file, -3));
        if (in_array($ext, $allow_ext)) {
          ?>
          <div class="margin_img">
            <a href="imgbd/<?php echo $file; ?>">
              <img class="boxshadow lazyload" src="img/black.png" alt="img lazy load"  data-src="imgbd/min/<?php echo $file; ?>">
            </a>

          </div>

          <?php
        }
      }
      ?>

      <?php if (isset($erreur)) {
        echo $erreur;
      }  ?>

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
