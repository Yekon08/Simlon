<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/contact.css" type="text/css">
</head>
<body>
<div id="corps">
    <?php
    include('_navbar.php');
    ?>
    <h1>Informations</h1>
    <div class="bloc-centre">
        <div class="bloc-gauche">
            <div class="bloc-img">
                <img src="img/contact/exterieur-restaurant.jpg"/>
            </div>
            <div class="bloc-items">

                <div class="bloc-items-icons">
                    <i class="far fa-address-card fa-2x"></i>
                    <i class="fas fa-phone fa-2x"></i>
                    <i class="far fa-envelope fa-2x"></i>
                    <i class="far fa-clock fa-2x"></i>
                </div>
                <div class="bloc-items-text">
                    <p>18 Avenue Georges Cornuau 08000 Charlevilles-Mézières</p>
                    <p>09 00 00 00 00 </p>
                    <p>obento@ardennes.cci.fr</p>
                    <p>Lundi 11:30–14:00, 18:30–22:00 <br/>
                        Mardi 11:30–14:00, 18:30–22:00 <br/>
                        Mercredi 11:30–14:00, 18:30–22:00 <br/>
                        Jeudi 11:30–14:00, 18:30–22:00 <br/>
                        Vendredi 11:30–14:00, 18:30–22:00 <br/>
                        Samedi 11:30–14:00, 18:30–22:00 <br/>
                        Dimanche Fermé</p>
                </div>
            </div>

        </div>
        <div class="bloc-droit">
            <div class="bloc-map">
                <iframe src="https://www.google.com/maps/embed?pb" frameborder="0" style="border:0"
                        allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>

<?php
include("footer.php");
?>
</body>
</html>