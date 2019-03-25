<?php
require_once'lib/fonctions.php';
start();

$erreurs = array();

if(!isset($_SESSION['auth'])) {
  header('Location: index.php');
}

$user = $_SESSION['auth'];
$userid = $user['user_id'];

require_once'lib/classConnecDB.php';
$con = new Connection();
$db = $con->openConnection();
$db->exec("SET CHARACTER SET utf8");

if(isset($_SESSION['formsend']) && (!isset($_POST))) {
  unset($_SESSION['formsend']);
  header('Location: gestion_compte.php', true , 303);
}

// PHOTO PROFIL
if(isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

  $img = $_FILES['avatar'];
  $ext = strtolower(substr($img['name'], -4));
  $allow_ext = array('.jpg','.png','.gif','jpeg');
  $dirrenameimg = "imgprofil/".$user['user_id'].$img['name'];

  if(in_array($ext, $allow_ext)) {
    move_uploaded_file($img['tmp_name'], $dirrenameimg);

  $req = $db->prepare("UPDATE users SET user_profil='$dirrenameimg' WHERE user_id=$userid");
  $req->execute();

  $_SESSION['flash']['success'] = "Photo de profil changée avec succès";
  $_SESSION['formsend'] = "";

  $con->closeConnection();


  } else {
    $erreurs['image'] = "Votre fichier n'est pas au bon format.";
  }
}

// Requete pour aller chercher la description dans la base de données
require_once'lib/classConnecDB.php';
$con = new Connection();
$db = $con->openConnection();
$db->exec("SET CHARACTER SET utf8");


$req = $db->prepare("SELECT * FROM users WHERE user_id=$userid");
$req->execute();

// si la description en BDD est differente de celle rentrée
while ($row = $req->fetch()) {
  $desDB = $row['description'];
}
// DESCRIPTION
if(isset($_POST['description']) && $_POST['description'] != $desDB) {
  require_once'lib/classConnecDB.php';
  $con = new Connection();
  $db = $con->openConnection();
  $db->exec("SET CHARACTER SET utf8");

  $description = $_POST['description'];

  $req = $db->prepare("UPDATE users SET description='$description' WHERE user_id=$userid");
  $req->execute();

  $_SESSION['flash']['success'] = "Description changée avec succès";
  $_SESSION['formsend'] = "";

  $con->closeConnection();
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion de compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/gestion_compte.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>
<body>
   <a href="mon_compte.php">
   <i class="fas fa-times fa-2x crossGestionCompte"></i>
   </a>
  <div class="container">
    <?php if(isset($_SESSION['flash'])): ?>
      <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
  </div>

  <div class="erreurs">
    <?php if(!empty($erreurs)): ?>
      <div class="alert alert-danger col-3 mx-auto">
        <?php foreach($erreurs as $erreur): ?>
          <ul>
            <li> <?= $erreur; ?> </li>
          </ul>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <form method="POST" enctype="multipart/form-data">

    <?php
    require_once'lib/classConnecDB.php';
    $con = new Connection();
    $db = $con->openConnection();
    $db->exec("SET CHARACTER SET utf8");


    $req = $db->prepare("SELECT * FROM users WHERE user_id=$userid");
    $req->execute();


    while ($row = $req->fetch()) {
    ?>

    <img src="<?php echo $row['user_profil'] ?>" class="img_profile">
    <input type="file" name="avatar" id="avatar" style="display:none;">
    <label for="avatar">changer de photo de profil</label>

    <label for="username">PSEUDO :</label>
    <input type="text" name="username" value="<?php echo $row['user_name']; ?>" disabled="disabled" >
    <label>ADRESSE-MAIL :</label>
    <input type="email" name="email" value="<?php echo $row['user_email']; ?>" disabled="disabled" >
    <label>Date de création de compte</label>
    <input type="text" name="date" value="<?php echo date("d/m/Y", strtotime($row['user_date'])); ?>" disabled="disabled" >
    <label>DESCRIPTION :</label>
    <div class="fas fa-times crossDescription" style="display:none;" id="crossclose2"></div>
    <textarea name="description" class="hide" id="textArea"><?php echo $row['description']; ?></textarea>
    <p class="pinfos" id="parea"><?php echo $row['description']; ?></p>
    <button type="button" class="btn1 " id="btnText">modifier la description</button>

    <button type="submit" class="btn">SAUVEGARDER</button>
    </form>

    <?php
    }
    $con->closeConnection();
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#btnText').click(function() {
    $('#parea').fadeOut(1);
    $('#textArea').fadeIn(500);
    $('#crossclose2').css("display","block");
    $('#btnText').css("display","none");
  });
  $('#crossclose2').click(function() {
    $('#parea').fadeIn(500);
    $('#textArea').fadeOut(1);
    $('#crossclose2').css("display","none");
    $('#btnText').css("display","block");
  });
});

</script>
</body>
</html>
