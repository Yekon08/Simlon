<?php 


function getconnection()
{
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
}