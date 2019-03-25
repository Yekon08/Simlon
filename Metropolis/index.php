<?php 



$dbh = null;

try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
    echo "<p>Connexion au serveur MySQL établie avec succès via pdo.</p >";
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
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/global.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>

<body>
    <header>
        <!-- <img src="img/logo.gif" alt="logo metropolis" class="logo" /> -->
        <h1>METROPOLIS VOD</h1>

        <ul>
            <a href="#"><li class="margin_right10">Inscription</li></a>
            <li class="margin_right10">-</li>
            <a href="#"><li>Connexion</li></a>
        </ul>
    </header>

    <?php include 'include/navbar.php' ?>

    <main class="margin_top35">
        <h3 class="txt_center">Nouveautés</h3>
        <div class="img_flex">

    <?php
    $reponse = $dbh->query('SELECT affiche, id_films FROM films');
        while ($donnees = $reponse->fetch())
        {
        ?>             
            <div class="container">
                <img src="<?php echo $donnees['affiche']; ?>" alt="test" class="image" style="width:100%">
                <div class="middle">
                    <form action="films.php" method="POST">
                        <input type="hidden" class="text" name="id" readonly value="<?php echo $donnees['id_films']?>"/>
                        <input type="submit" value="INFOS" class="bouton_infos">
                    </form>
                    </div>
            </div>
        <?php
        }
        ?>
        </div>

        <div class="flex_sa">
            <div class="margin_top50 margin_left35 margin_bottom100">
                <h3 class="txt_center">Bande-annnonce</h3>
                    <video class="border" controls poster="img/test.jpg" width="700" height="400" src="videos/les-indestructibles-2-bande-annonce-officielle.mp4">
                        bande annonce
                    </video>
            </div>

            <div class="margin_top50 margin_left35 margin_bottom100">
                <h3 class="txt_center">INFOS</h3>
            <div class="zone2">
                <div class="mySlides">
                    <h3>TEXTE 1 :</h3>
                    <p>1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sodales enim lorem, in viverra tortor imperdiet eu. Nulla sit amet dolor mollis, semper dui vel, ullamcorper risus. Integer sollicitudin venenatis elit, dapibus tempus odio mattis ut. Nunc sit amet quam vitae sapien semper mollis. Nunc ultrices tellus nunc, sit amet.  </p>
                </div>

                <div class="mySlides">
                    <h3>TEXTE 2 :</h3>
                    <p>2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sodales enim lorem, in viverra tortor imperdiet eu. Nulla sit amet dolor mollis, semper dui vel, ullamcorper risus. Integer sollicitudin venenatis elit, dapibus tempus odio mattis ut. Nunc sit amet quam vitae sapien semper mollis. Nunc ultrices tellus nunc, sit amet.  </p>
                </div>

                <div class="mySlides">
                    <h3>TEXTE 3 :</h3>
                    <p>3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sodales enim lorem, in viverra tortor imperdiet eu. Nulla sit amet dolor mollis, semper dui vel, ullamcorper risus. Integer sollicitudin venenatis elit, dapibus tempus odio mattis ut. Nunc sit amet quam vitae sapien semper mollis. Nunc ultrices tellus nunc, sit amet.  </p>
                </div>
               
                
                <div class="flex_bottom margin_top75">
                    <div class="active_infos select_text" onclick="color_text(this)">
                        <p class="demo border padding5" onclick="currentDiv(1)">Texte 1</p>
                    </div>
                    <div class="select_text" onclick="color_text(this)">
                        <p class="demo border padding5" onclick="currentDiv(2)">Texte 2</p>
                    </div>
                    <div class="select_text" onclick="color_text(this)">
                        <p class="demo border padding5" onclick="currentDiv(3)">Texte 3</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php' ?>

    <script src="js/main.js"></script>

</body>
</html>
