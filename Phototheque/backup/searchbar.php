
<?php

?>

<html >
<head>
  <meta charset="utf-8">
  <title>research</title>
</head>
<body>
  <form class="" action="result.php" method="get">
    <input type="text" name="q" >
    <input type="submit"  value="Chercher">
  </form>

  <?php
  include_once 'lib/classConnecDB.php';
  $database = new Connection();


  if(isset($_POST["q"])){

  $db = $database->openConnection();
  $ani=explode(" ",$_GET["q"]);


  foreach ($ani as $value) {


    $req=$db->prepare("SELECT image_url FROM images WHERE tag LIKE '%$value%'");
    $req->execute();

    while($data = $req->fetch()) {
      echo implode(",",$data);
      ?>
      <img src="imgbd/min/<?php echo implode(",",$data) ?>" alt="">

      <?php
    }

}
?>
</body>
<?php
$req=$db->prepare("SELECT image_url FROM images WHERE tag LIKE '%$value%'");
$req->execute();
while($data = $req->fetch()) {
  echo implode(",",$data);
  ?>
  <img src="imgbd/min/<?php echo implode(",",$data) ?>" alt="">

  <?php
}

}

?>
</body>

</html>
