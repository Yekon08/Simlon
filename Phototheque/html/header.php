<header>

  <img src="img/simplonteque.png" alt="simplotheque" class="img-fluid mx-auto logo_header">

  <div class="bouton_head">
    <div class="box">
      <div class="container-4">

        <form class="" action="result.php" method="get">
          <input type="search" id="search" placeholder="Recherche..." />
          <button class="icon"><i class="fa fa-search"></i></button>
          <input type="text" name="q" >
          <input type="submit"  value="Chercher">
        </form>

      </div>
    </div>
    <button type="button" class="hover_button" name="connexion" data-target="#modal_connexion" data-toggle="modal"><i class="fas fa-user fa-2x"></i></button>
    <button type="button" class="hover_button" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-images fa-2x"></i></button>
  </div>



  <!-- MODAL -->
  <div class="modal fade mx-auto" id="modal_connexion">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img class="logo" src="img/logo.png" alt="simplotheque" class="img-fluid mx-auto d-block logo_header w-25">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</header>
