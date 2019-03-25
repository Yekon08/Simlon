<?php

if(!empty($_FILES['chargerimage']))

{
$img=$_FILES["chargerimage"];
  $ext=strtolower(substr($img["name"],-3));
  $allow_ext = array("jpg","png","gif");
  $path = "imgbd/";
  $path = $path . basename( $_FILES['chargerimage']['name']);

  if(in_array($ext,$allow_ext))
     {
    move_uploaded_file($_FILES['chargerimage']['tmp_name'], $path);
    echo "L'image ".  basename( $_FILES['chargerimage']['name']).
    " a bien été uploadée";
  } else{
      echo "Ca bug chef ! C'est normal c'est de la pratique pas de la theorie gamin";
  }
}

$host = "localhost";
$user = "root";
$mdp = "";
$db = "phototheque";
$image = $_FILES['chargerimage'] ;
// Create connection
$conn = mysqli_connect($host, $user, $mdp, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
echo "Connexion réussi !";
}




$sql = "INSERT INTO images (tag) VALUES (' push')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);

?>
