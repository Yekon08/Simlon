<?php 

$dbh = null;

try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
    // echo "<p>Connexion au serveur MySQL établie avec succès via pdo.</p >";
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  } ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infos film</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/global.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/films.css" />
</head>
<body>
    <?php
        include 'include/navbar.php';

        $reponse = $dbh->query('SELECT * FROM films 
        INNER JOIN realise ON films.id_films = realise.id_films
        INNER JOIN realisateurs ON realise.id_real = realisateurs.id_real
        INNER JOIN type ON type.id_films = films.id_films
        INNER JOIN genre ON genre.id_genre = type.id_genre
        INNER JOIN participe ON participe.id_films = films.id_films
        INNER JOIN acteurs ON participe.id_acteurs = acteurs.id_acteurs
        WHERE films.id_films = "'. $_POST["id"]. '"');
        //$reponse = $dbh->query('SELECT * FROM films');

        $donnees = $reponse->fetch(PDO::FETCH_ASSOC);
        // print_r($donnees);
            ?>

            <img src="<?php echo $donnees['image_film'] ?>" class="img_film margin_bottom75" alt="image du film">
            <div class="flex_sa">
                <div>
                    <img src="<?php echo $donnees['affiche'] ?>" class="img_affiche" alt="affiche">
                </div>  

                <div class="infos">
                    <h3>Titre :</h3><?php echo $donnees['titre']; ?> <br/>
                    <h3>Résumé :</h3> <?php echo $donnees['synopsis']; ?> <br/>
                    <h3>Acteurs :</h3>
                    <div class="flex">
                        <?php echo $donnees['prenom'];?>
                        <?php echo $donnees['nom'];?> <br/>
                    </div>
                    <h3 class="margin_bottom10">Bande Annonce</h3>
                    <video controls class="border" style="width: 100%;">
                        <source src="<?php echo $donnees['bande_annonce'] ?>" type="video/mp4" />
                        bande-annonce
                    </video>
                </div>
            </div>


            <?php include 'include/footer.php' ?>

    <script src="js/main.js"></script>
</body>
</html>
