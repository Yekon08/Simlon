<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One%7CRaleway:400,700">
    <link rel="stylesheet" href="css/gallery.css">

    <?php
    function __autoload($class)
    {
        require_once('php/' . $class . '.php');
    }

    ?>
</head>

<body>


<?php
$test = new ManagerImg('img/gallerie/');
$arr = $test->getList();
echo '<div id="corps">';

include('_navbar.php');

echo '<div class="titre"><h1>Galerie</h1></div>';
echo '<div id="gallery-container">';
foreach ($arr as $element) {
    echo '<div class="item-img">';
    echo $element->getVue();
    echo '</div>';
}
echo '</div>';
echo '</div>'
?>
<div id="overlayer-gallery">
    <div id="img-centre">
        <div id="cross">x</div>
        <div id="arrow-left"></div>
        <div id="arrow-right"></div>
    </div>
    <div id="img-list">
        <div id="arrow-left-bot"></div>
        <div id="arrow-right-bot"></div>
    </div>
</div>

<?php
include("footer.php");
?>
<script src="js/nav.js"></script>
<script src="js/gallery.js"></script>
</body>
</html>