<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Ma Poulperie, des bières, des cocktails, des jeux de société et de nombreux événements dans un lieu unique avec une ambiance cconviviale et fantastique." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <title>Ma Poulperie</title>
</head>
<body>

    <header id="bg-img">
        <img src="./img/welcome_logo.svg" alt="logo Ma Poulperie complet">
        <div class="mouse"></div>
    </header>

    <?php include 'include/nav.php'; ?>

    <main>
        <div class="poulpi"><img src="./img/poulpi.svg" alt="dessin poulpe"></div>
        <div class="container_main">
            <div class="desc">
                <h1>Des bières, des cocktails,<br/> des jeux de société,</h2>
                <p>et de nombreux événements dans un lieu unique avec une<br/> ambiance conviviale et fantastique.</p>
            </div>

            <div class="container_month_div">
                <div class="container_month">
                    <p class="game_month">Jeu du mois</p>
                    <div id="img_game_month"></div>
                    <div class="container_infos_text">
                        <p class="game_month_title">mars attacks</p>
                        <p class="game_month_resume">Bacon ipsum dolor amet spare ribs pork chop meatloaf swine corned beef.</p>
                        <a href="#" class="game_month_link">découvrir</a>
                    </div>
                </div>

                <div class="container_month">
                    <p class="game_month">Conso du mois</p>
                    <div id="img_conso_month"></div>
                    <div class="container_infos_text">
                        <p class="game_month_title">mars attacks</p>
                        <p class="game_month_resume">Bacon ipsum dolor amet spare ribs pork chop meatloaf swine corned beef.</p>
                        <a href="#" class="game_month_link">découvrir</a>
                    </div>
                </div>

                <div class="container_month">
                    <p class="game_month">Prochain quizz</p>
                    <div id="img_quizz_month"></div>
                    <div class="container_infos_text">
                        <p class="game_month_title">marvel universe</p>
                        <p class="game_month_resume">Bacon ipsum dolor amet spare ribs pork chop meatloaf swine corned beef.</p>
                        <a href="#" class="game_month_link">participer</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="photo"></div>

        <div class="container_main">
            <div class="infos_pratiques">
                <div>
                    <h3>ADRESSE:</h3>
                    <p>26 Rue Baron-Quinart, 08000<br>Charleville-Mézières</p>
                    <a href="https://goo.gl/maps/GRmEr5LDknS2" target="_blank">voir sur le plan</a>

                    <h3>HORAIRES:</h3>
                    <table>
                        <tr>
                            <td>Lundi:</td>
                            <td>fermé</td>
                        </tr>
                        <tr>
                            <td>Dimanche:</td>
                            <td>12:00 - 22:00</td>
                        </tr>
                        <tr>
                            <td>Mercredi:</td>
                            <td>12:00 - 22:00</td>
                        </tr>
                        <tr>
                            <td>Jeudi:</td>
                            <td>12:00 - 22:00</td>
                        </tr>
                        <tr>
                            <td>Vendredi:</td>
                            <td>12:00 - 01:00</td>
                        </tr>
                        <tr>
                            <td>Samedi:</td>
                            <td>11:00 - 01:00</td>
                        </tr>
                        <tr>
                            <td>Dimanche:</td>
                            <td>14:00 - 20:00</td>
                        </tr>
                    </table>
                </div>

                <div>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmapoulperie&tabs=events&width=400&height=444&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="444" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <img src="./img/logo-ma-poulperie-hd-blanc-750.png" alt="Logo Ma poulperie">
                
        <ul>
            <li><a href="#">plan du site</a></li>
            <li>/</li>
            <li><a href="#">mentions légales</a></li>
            <li>/</li>
             <li><a href="#">contact</a></li>
        </ul>

        <div class="icons">
            <p>Made with ♥ by Yekon & Cielsis</p>
            <div class="flex">
                <a href="https://www.facebook.com/mapoulperie/" target="_blank" class="icons_facebook"></a>
                <a href="https://www.instagram.com/mapoulperie/" target="_blank" class="icons_insta"></a>
                <a href="https://twitter.com/MaPoulperie" target="_blank" class="icons_twitter"></a>
            </div>
            <p>Ma poulperie, all rights reserved</p>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>