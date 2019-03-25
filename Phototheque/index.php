<?php
require_once'lib/fonctions.php';
start();

//////////////////////// CONNEXION
// si c'est pas vide
if(!empty($_POST) && !empty($_POST['usernamec'] && !empty($_POST['pswc']))) {

  require_once'lib/classConnecDB.php';
  $con = new Connection();
  $db = $con->openConnection();
  $db->exec("SET CHARACTER SET utf8");

  $req = $db->prepare("SELECT * FROM users WHERE user_name = :username OR user_email = :username");
  $req->execute(['username' => htmlspecialchars($_POST['usernamec'])]);
  $user = $req->fetch();

  // verification du password (qui est hash)
  if(password_verify(htmlspecialchars($_POST['pswc']), $user['user_psw'])) {
    start();

    $_SESSION['auth'] = $user;
    // crée le message flash
    $_SESSION['flash']['success'] = "Vous êtes maintenant connecté.";

    header('Location: accueil.php');
    exit();
  } else {
    $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect";
  }
}

//////////////////////////////////// INSCRIPTION
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
    $req->execute([htmlspecialchars($_POST['username'])]);
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
    $req->execute([htmlspecialchars($_POST['email'])]);
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
    $password = password_hash(htmlspecialchars($_POST['psw']), PASSWORD_BCRYPT);
    // récupère la date d'aujourd'hui
    $date = date("Y-m-d H:i:s");

    $req->execute([htmlspecialchars($_POST['username']), $password, htmlspecialchars($_POST['email']), $date]);

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
  <title>Accueil</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
<div id="backgroundImage"></div>
<main>
  <div class="container">
    <?php if(isset($_SESSION['flash'])): ?>
      <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
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
  <div class="indexCo">
    <div class="accueilConteneur1">
      <a href="#" class="mentionsIndex">Mentions Légales</a>
    </div>
    <div class="accueilConteneur2">
      <a class="copyrightIndex">©LaFineEquipe 2018</a>

      <div class="logoIndexCo">
        <img  class="logoIndexCo2" src="img/logo.png"  alt="simplonteque">
      </div>
      <!-- CONNEXION -->
      <div class="formulaireIndexCo">
        <form class="formulaireIndexCo2" method="post">
          <input type="text" name="usernamec" placeholder="Identifiant" >
          <input type="password" name="pswc" placeholder="Mot de passe ..." >
          <div class="btnIndex">
            <button type="submit" class="BtnIndexCo">CONNEXION</button>
          </div>
          <div class="create_forgot">
            <button type="button" name="button_create" class="button_create" >Pas de compte ? <span class="inscriptionIndex">S'inscrire.</span></button>
          </div>
          <div class="container_nologin">
            <span class="nologin"><a href="accueil.php">Entrer sans se connecter</a></span>
          </div>
        </form>
      </div>
      <!-- INSCRIPTION -->
      <div class="formulaireIndexIsncription display_none">
        <form class="formulaireIndexIsncription2" method="post" >
          <input type="text" name="username" placeholder="Identifiant" id="name" required >
          <input type="password" name="psw" placeholder="Mot de passe ..." id="psw1" required>
          <input type="password" name="pswconfirm" placeholder="Retappez votre mot de passe ..."  id="psw2" required>
          <input type="email" name="email" placeholder="email ..." id="Email" required>
          <div class="btnInscription">
            <button type="submit" name="button_form" id="submit" class="BtnIndexInscription">Créer un compte</button>
          </div>
          <div class="create_forgot">
            <button type="button" name="button_create" id="annulerInscription" class="button_create">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/accueil.js"></script>

</body>

</html>
