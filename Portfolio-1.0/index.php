<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fullpage.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/hamburgers.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>


<body>
    <header>

    </header>

    <nav>
        <?php include 'include/nav.php' ?>
    </nav>

    <div id="fullpage">
        <main>
            <div class="section" data-anchor="page1"> <!-- data-tilt = parallax plug in jquery -->
                <h1 class="txt_left margin_left50">Hi, <br/> I'm Maxime, <br/>web developer.</h1>
            </div>

            <div class="section" data-anchor="page2">
                <div></div>
                <div></div>
            </div>

            <?php include 'include/tips.php'; ?>
            
            
        </main>
    </div>

    <!-- <footer>

        <a href="#" class="margin_left5"><p>©All Right Reserved</p></a>

        <ul>
            <div class="margin_right10">
                <a href="https://twitter.com/yekon08" target="_blank"><li><i class="fab fa-twitter color_white"></i></li></a>
            </div>

            <div class="margin_right10">
                <a href="https://github.com/Yekon08" target="_blank"><li><i class="fab fa-github-alt color_white"></i></li></a>
            </div>

            <div>
                <li class="discord"><i class="fab fa-discord"></i></li>
                <div class="text_discord">Add Me : Yekon#3958</div>
            </div>
        </ul>

        <a href="#" class="margin_right5"><p>Privacy Policy</p></a>
    </footer> -->



<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
</script>
<script src="js/fullpage.js"></script>
<script>
    $(document).ready(function()
    {
        $('#fullpage').fullpage();
    });
</script>
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
    </script>
    <script>
    $(document).ready(function() 
    { 
    var window_width= $(window).width();
    if(window_width < 770)
    {
        fullpage_api.setResponsive(true);
    }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js">
</script>
<script>
    $('.js-tilt').tilt({
    glare: true,
    maxGlare: .5
})
</script>
<script src="js/main.js"></script>
</body>
</html>