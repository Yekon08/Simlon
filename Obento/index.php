<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Obento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css"/>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">


</head>
<body>

<div id="corps">
    <?php
    include('_navbar.php');
    ?>
    <!-- Carousel W3school -->
    <div class="container">
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2500">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="img/gallerie/interieur.jpg" alt="restau">
                    <div class="carousel-caption">
                        <img src="img/logoscouuuurs.png" alt="proto-logo">
                        <p>Intérieur</p>
                    </div>
                </div>

                <div class="item">
                    <img src="img/gallerie/nem.jpeg" alt="restau">
                    <div class="carousel-caption">
                        <img src="img/logoscouuuurs.png" alt="proto-logo">
                        <p>Nem</p>
                    </div>
                </div>

                <div class="item">
                    <img src="img/gallerie/recette-nouvel-an.jpg" alt="restau">
                    <div class="carousel-caption">
                        <img src="img/logoscouuuurs.png" alt="proto-logo">
                        <p>Plat Nouvel an</p>
                    </div>
                </div>

                <div class="item">
                    <img src="img/gallerie/riz-poulet.jpg" alt="restau">
                    <div class="carousel-caption">
                        <img src="img/logoscouuuurs.png" alt="proto-logo">
                        <p>Riz poulet</p>
                    </div>
                </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div id="infos">
        <h1>Obento<br/></h1>
        <p>description : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur laoreet ullamcorper nibh,
            sed eleifend sapien hendrerit tincidunt. Suspendisse potenti. Morbi id pharetra orci. Maecenas in nibh at
            dolor sollicitudin tempor. Nullam rutrum ligula et libero tristique, non lobortis ex molestie. Quisque nisi
            urna, ultricies et eleifend tincidunt, auctor non mauris. </p>
    </div>
</div>


<?php
include("footer.php");
?>
<script src="js/nav.js"></script>
</body>
</html>