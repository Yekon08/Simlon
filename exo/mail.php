<head>
	<meta charset="utf-8">
	<title>EXO Simplon</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<header>
		<h1 class="titre_header">formulaire</h1>
		<img src="images/background_header.jpg" class="img_header alt="background_header">
		<script type="text/javascript" src="JS.js"></script>
</header>
</body>




<?php



$msg=$_POST["prenom"]."\n";
$msg.=$_POST["nom"]."\n";
$msg.=$_POST["sexe"]."\n";
$msg.=$_POST["mail"]."\n";
$msg.=$_POST["checkBox"]."\n";


if (mail('maxime.jeannette@outlook.fr','formulaire',$msg))
{
	?>
		<h1>Demande prise en compte <br /></h1>
		<p>prenom : <?php echo $_POST["prenom"];?></p>
		<p>nom : <?php echo $_POST["nom"];?></p>
		<p>sexe : <?php echo $_POST["sexe"];?></p>
		<p>mail : <?php echo $_POST["mail"];?></p>
		<p><?php echo $_POST["checkBox"];?></p>
	<?php
}

else
{
	?>
	<h1>Demande non prise en charge !</h1>
	<?php
}

?>
