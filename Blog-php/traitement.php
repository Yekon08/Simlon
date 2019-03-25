<?php 
// include 'connection.php';
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

$titre = $_POST["titre"];
$texte = $_POST["texte"];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];

if(isset($_POST['picture']))
{
    $dossier = 'images/';
    $affiche = basename($_FILES['picture']['name']);
    if(move_uploaded_file($_FILES['picture']['tmp_name'], $dossier . $affiche)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        $sql = "INSERT INTO article (titre, texte, image) VALUES ('$titre' ,'$texte' ,'$affiche')";

    
       

        $sql2 = "INSERT INTO auteur (nom, prenom) VALUES ('$nom','$prenom')";

        $dbh->exec($sql);
        $dbh->exec($sql2);

    }
    else
    {
        echo 't naz';
    }
}




echo 'C est bon fin peut etre';
