<?php
require_once'lib/fonctions.php';

start();

debug($_SESSION);
// start la session
if(!empty($_POST)) {
  $errors = array();

  require_once'lib/classConnecDB.php';
  $con = new Connection();
  $db = $con->openConnection();
  $db->exec("SET CHARACTER SET utf8");
  // si le champs username est rempli et qu'il est alphanumérique
  if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_#]+$/', $_POST['username'])) {
    $errors['username'] = "Votre pseudo n'est pas valide";
  } else {
    $req = $db->prepare("SELECT user_id FROM users WHERE user_name=?");
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    // si l'user existe deja erreur
    if($user) {
      $errors['username'] = "Ce pseudo est déjà utilisé.";
    }
  }
  // validation d'email
  if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre email n'est pas valide";
  } else {
    $req = $db->prepare("SELECT user_id FROM users WHERE user_email=?");
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    //verification si l'email est deja utilisé
    if($user) {
      $errors['email'] = "Cet email est déjà utilisé pour un autre compte.";
    }
  }
  // verification si les password correspondent
  if(empty($_POST['psw']) || $_POST['psw'] != $_POST['pswconfirm']) {
    $errors['psw'] = "Vous devez rentrer un mot de passe valide";
  }

  if(empty($errors)) {
    $req = $db->prepare("INSERT INTO users SET user_name=?, user_psw=?, user_email=?, user_date=?");
    // cryptage du password (meilleur méthode)
    $password = password_hash($_POST['psw'], PASSWORD_BCRYPT);
    // récupère la date d'aujourd'hui
    $date = date("Y-m-d H:i:s");

    $req->execute([$_POST['username'], $password, $_POST['email'], $date]);

    $_SESSION['flash']['success'] = "Compte crée avec succès.";
    // redirection
    header('Location: index.php');
    exit();
    }

  }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <main>

    <?php if(!empty($errors)): ?>
      <div class="alert alert-danger col-3 mx-auto">
        <?php foreach($errors as $error): ?>
          <ul>
            <li> <?= $error; ?> </li>
          </ul>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form class="form_accueil" method="post" style="margin-top: 0;">

      <div class="logo_form">
        <img src="img/simplonteque.png" alt="simplonteque">
      </div>

      <div class="container_form">
        <label for="login" class="id_psw">Identifiant</label>
        <input type="text" name="username" placeholder="Entrez un identifiant ..." id="name" required >


        <label for="password" class="id_psw">Mot de passe</label>
        <input type="password" name="psw" placeholder="Entrez votre mot de passe ..." id="psw1" required>

        <label for="password" class="id_psw">Retapez votre mot de passe</label>
        <input type="password" name="pswconfirm" placeholder="Retappez votre mot de passe ..." id="psw2" required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="email ..." id="email" required>

        <button type="submit" name="button_form" id="submit">Créer un compte</button>

        <div class="create_forgot">
          <button type="button" name="button_create" class="button_create" onclick="window.location.href='index.php'" >Annuler</button>
        </div>

      </div>

    </form>
  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/form.js"></script>

  </body>

</html>
