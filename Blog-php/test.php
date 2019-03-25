<?php

// include 'connection.php';
// getconnection();

$host_name = 'db745061880.db.1and1.com';
$database = 'db745061880';
$user_name = 'dbo745061880';
$password = ',Maxime009';
$dbh = null;

try {
	$dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
	// echo "<p>Connexion au serveur MySQL établie avec succès via pdo.</p >";
  } catch (PDOException $e) {
	echo "Erreur!: " . $e->getMessage() . "<br/>";
	die();
  }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test BDD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
<?php
	$reponse = $dbh->query('SELECT * FROM article
	INNER JOIN participe ON article.id_article = participe.id_article
	INNER JOIN auteur ON participe.id_auteur = auteur.id_auteur

	');

	while ($donnees = $reponse->fetch())
	{
		echo $donnees['titre']; ?> <br/> <?php
		echo $donnees['texte']; ?> <br/>
		<img src="<?php echo $donnees['image'];?>" alt="test" width="200"/> <br/> <?php
		echo $donnees['prenom']; ?> <br/> <?php
		echo $donnees['nom'];  ?> <br/> <?php
	}
	?>

	<form method="POST" action="traitement.php" enctype="multipart/form-data">

	<label for="titre">Titre :</label> <br />
	<input type="text" name="titre" id="titre"> <br />

	<label for="texte">texte :</label> <br />
	<input type="text" name="texte" id="texte"> <br />

	<label for="prenom">prenom :</label> <br />
	<input type="text" name="prenom" id="prenom"> <br />

	<label for="nom">nom :</label> <br />
	<input type="text" name="nom" id="nom"> <br />

	<label for="picture">image :</label> <br />
	<input type="file" name="picture" id="picture"> <br />

	<input type="submit" name="submit">



	
	</form>
</body>
</html>