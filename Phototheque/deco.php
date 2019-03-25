<?php
require_once'lib/fonctions.php';
start();
// enleve l'user de la session (mieux que destroy, on vire que l'user pas tout)
unset($_SESSION['auth']);

$_SESSION['flash']['danger'] = "Vous êtes maintenant déconnecté";
header('Location: index.php');
?>
