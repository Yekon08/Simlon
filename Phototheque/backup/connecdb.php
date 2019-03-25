<?php
/// Connexion et affichage des erreurs
  try {
    $con = new PDO ('mysql:host=localhost; dbname=phototeque','root','');
  }
  catch(exception $e) {
    die('Erreur'.$e->getMessage());
  }
/// Execution de la requete sql
  $con->exec("SET CHARACTER SET utf8");
  $result = $con->query('SELECT * FROM images ');
/// Boucle qui affiche les resultats
  while($data = $result->fetch()) {
    echo $data['tag'];
  }

?>
