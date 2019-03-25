<?php

// Connexion bdd
require_once'../php/classConnecDB.php';
$database = new Connection();
$db = $database->openConnection();
$db->exec("SET CHARACTER SET utf8");

$count = 0;

//boucle verifie si le nom est dans la db ou pas
if(isset($_POST['pseudo'])) {
  $name = $_POST["pseudo"];
  $requete = $db->prepare("SELECT user_name FROM user WHERE user_name = '$name'");
  $requete->execute();
  //compare
  $pseudo = $requete->rowCount();

  if($pseudo <= 0) {
    echo "pseudo disponible".'<br>';
    ++$count;
  } else {
    echo "pseudo deja utilisé".'<br>';
  };
}

//verifie si les 2 mots de passe sont les memes
if(isset($_POST['psw2'])) {
  if($_POST['psw1'] == $_POST['psw2']) {
    echo "Les mots de passe correspondent"."<br>";
    ++$count;
  } else {
    echo "Les mots de passe ne correspondent pas".'<br>';

  };
}

//verif email
if(isset($_POST['email'])) {
  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo $_POST['email']."est valide".'<br>';
    ++$count;
  } else {
    echo $_POST['email']."est invalide".'<br>';
  }
}

$pseudo = $_POST['pseudo'];
$psw = $_POST['psw1'];
$email = $_POST['email'];

var_dump($pseudo."<br>".$psw."<br>".$email."<br>".$count);

if($count == 3) {
  $pseudo = $_POST['pseudo'];
  $psw = $_POST['psw1'];
  $email = $_POST['email'];

  $req = $db->prepare("INSERT INTO user(user_name,user_psw,user_email) VALUES (    :user_name, :user_psw, :user_email)");

  $req->execute(
  array(
    "user_name"=>$pseudo,
    "user_psw"=>$psw,
    "user_email"=>$email,
  ));
} else {
  echo "NOT OK";
}
?>
