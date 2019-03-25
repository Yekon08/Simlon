<?php
  if(!empty($_FILES)) {
    require("imgClass.php");
    $img = $_FILES['upload'];
    $ext = strtolower(substr($img['name'],-3));
    $allow_ext = array("jpg","png","gif");
    if(in_array($ext,$allow_ext)) {
      move_uploaded_file($img['tmp_name'],"imgbd/".$img['name']);
      Img::creerMin("imgbd/".$img['name'],"imgbd/min",$img['name'],340,220);
      Img::convertirJPG("imgbd/".$img['name']);
    } else {
      $erreur ="Votre fichier n'est pas une image.";
    }
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>

<body>
  <header>
    <?php include('html/header.html'); ?>
  </header>

  <main>
<?php
  $dos = "imgbd/min";
  $dir = opendir($dos);
  while($file = readdir($dir)){
    $allow_ext = array("jpg","png","gif");
    $ext = strtolower(substr($file,-3));
    if(in_array($ext,$allow_ext)) {
      ?>
      <div class="min" style="font-size: 30px;">
        <a href="imgbd/<?php echo $file; ?>">
      <img src="imgbd/min/<?php echo $file; ?>"></a>
      <h3> <?php echo $file; ?></h3>
      </div>
      <?php
    }
  }
?>


  <form method="POST" action="#" enctype="multipart/form-data">
		<label for="icone">Icône du fichier (JPG, PNG ou GIF ) :</label><br>
  	<input class="fas fa-user" type="file" name="upload">
    <input type="text" name="tag" value="" placeholder="description de l'image">
		<input type="submit" name="envoyer" value="Envoyer le fichier">
  </form>
<?php
  if(isset($erreur)) {
    echo $erreur;
  }
?>

  </main>
<footer>
    <?php include("html/footer.html"); ?>
</footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>

  <script src="js/lazy-load.js"></script>
</body>
</html>
