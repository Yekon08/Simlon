<nav class="nav_pc">
      <div>
        <img src="img/logo.png" alt="simplotheque" class="img-fluid logo_header">
      </div>
      <div class="container_search">
        <form action="result.php">
          <input type="text" placeholder="Recherche.." name="q">
          <button type="submit"><i class="fa fa-search color_i"></i></button>
        </form>
      </div>
    </div>
    <div class="nav_pc_div2">
      <i class="fas fa-home fa-2x" onclick="window.location.href='accueil.php'"></i>
      <i class="fas fa-user fa-2x" onclick="window.location.href='mon_compte.php'"></i>
      <i class="fas fa-cogs fa-2x" onclick="window.location.href='gestion_compte.php'" ></i>
      <i class="fas fa-sign-out-alt fa-2x" onclick="window.location.href='deco.php'"></i>
    </div>
    
  </nav>

  <!-- NAV MOBILE -->
  <nav class="display_none">
    <div class="fas fa-search fa-2x" id="iconSearch"></div>
    <a href="index.php>"><i class="fas fa-home fa-2x"></i></a>
    <form class="" action="index.html" method="post">
      <label name="input" class=" fas fa-images fa-2x">
        <input type="file" method='post' name="upload" id="inputFile" class="inputFile" >
      </label>
    </form>
    <a href="./formulaire.html"><i class="fas fa-user fa-2x"></i></a>
    <a href="./gestion_compte.html"><i class="far fa-sun fa-2x"></i></a>
    <div class="barrederecherche display-none" id="barrederecherche">
      <input class="recherchemobile" type="text" name="q" value="" placeholder="Recheche...">
    </div>
    <div class="upup display-none">
      <form class="uploadFormMobile" action="" method="post">
        <input type="text" class="input_form" placeholder="Tag" name="" value="">
        <button type="submit" id="uploadfilemobile" class="btn" name="button" >Envoyer</button>
      </form>
    </div>
  </nav>