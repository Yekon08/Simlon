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

// PHOTO PROFIL
if(isset($_FILES['avatar'])) {

  $img = $_FILES['avatar'];
  $ext = strtolower(substr($img['name'], -4));
  $allow_ext = array('.jpg','.png','.gif','jpeg');
  $dirrenameimg = "imgprofil/".$user['user_id'].$img['name'];

  if(in_array($ext, $allow_ext)) {
    move_uploaded_file($img['tmp_name'], $dirrenameimg);

  $req = $db->prepare("UPDATE users SET user_profil='$dirrenameimg' WHERE user_id=$userid");
  $req->execute();

  $con->closeConnection();

  } else {
    $erreurs['image'] = "Votre fichier n'est pas au bon format.";
  }
}
// DESCRIPTION
if(isset($_POST['description'])) {
  require_once'lib/classConnecDB.php';
  $con = new Connection();
  $db = $con->openConnection();
  $db->exec("SET CHARACTER SET utf8");

  $description = $_POST['description'];

  $req = $db->prepare("UPDATE users SET description='$description' WHERE user_id=$userid");
  $req->execute();
  }

  $con->closeConnection();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>

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

  <main>
    <!-- boucle qui affiche toutes les erreurs -->
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

    <form method="post" enctype="multipart/form-data" style="display:flex;flex-direction:column;width:40%;margin:auto;margin-top:100px;">

      <?php
      require_once'lib/classConnecDB.php';
      $con = new Connection();
      $db = $con->openConnection();
      $db->exec("SET CHARACTER SET utf8");


      $req = $db->prepare("SELECT * FROM users WHERE user_id=$userid");
      $req->execute();


      while ($row = $req->fetch()) {
      ?>

      <img src="<?php echo $row['user_profil'] ?>" alt="profil" height="50" width="50">
      <label>Changer photo de profil</label>
      <input type="file" name="avatar">

      <button type="submit">Envoyer</button>

    </form>

    <form method="post" enctype="multipart/form-data" style="display:flex;flex-direction:column;width:40%;margin:auto;margin-top:100px;">

      <label>Pseudo</label>
      <p><?php echo $row['user_name']; ?></p>

      <label>Email</label>
      <p><?php echo $row['user_email']; ?></p>

      <label>Date de cration de compte</label>
      <p><?php echo date("d/m/Y/", strtotime($row['user_date'])); ?></p>

      <label>description</label>
      <textarea name="description" rows="8" cols="80"><?php echo $row['description']; ?></textarea>

      <button type="submit">Envoyer</button>
    </form>

      <?php
      }
      $con->closeConnection();
      ?>

  </main>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/accueil.js"></script>

</body>

</html>
