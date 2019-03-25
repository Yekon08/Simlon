<?php
require_once'lib/fonctions.php';
start();

if(!isset($_SESSION['auth'])) {
    header('Location: index.php');
}

$user = $_SESSION['auth'];
$userid = $user['user_id'];
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="css/gestion_compte.css" />
  <link rel="stylesheet" href="css/accueil.css">
</head>
<body>
  <main>
<?php include 'navbar.php' ?>

cou
  <div class="container">
    <?php if(isset($_SESSION['flash'])): ?>
      <?php foreach($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
  </div>

    <?php
    require_once'lib/classConnecDB.php';
    $con = new Connection();
    $db = $con->openConnection();
    $db->exec("SET CHARACTER SET utf8");


    $req = $db->prepare("SELECT * FROM users WHERE user_id=$userid");
    $req->execute();
    $row = $req->fetch(); 
    ?>
    <img src="<?php echo $row['user_profil'] ?>" class="img_profile">

    <p><?php echo $row['user_name']; ?></p>

    <p><?php echo $row['description']; ?></p>
 
    <?php
    $req = $db->prepare("SELECT * FROM image WHERE user_id = $userid");
    $req->execute();

    while ($row = $req->fetch()) {
    ?>
    <a href="imgbd/<?php echo $row['image_url'] ?>" rel="prettyPhoto"><img src="imgbd/min/<?php echo $row['image_name'] ?>.jpg" alt="" class="lazy img_accueil boxshadow"></a>    <?php
    }
    ?>
 
    <?php
    
    $con->closeConnection();
    ?>

    </main>
<script src="js/scripts.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>

</body>
</html>