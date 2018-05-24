<!DOCTYPE html>

<html>


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



	<div id="test">
		<form method="POST" action="mail.php" onsubmit=" return verifier();">
		 <p>

			<label for="sexe">Sexe :</label><input type="radio" name="sexe" id="homme" value="homme" />Homme <input type="radio" name="sexe" id="femme" value="femme" />Femme<br />

		    <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" />	<br />
		    <label for="nom">Nom</label><input type="text" name="nom" id="nom" />	<br />
		    <label for="mail">Mail</label><input type="text" name="mail" id="mail" /> <br /> 

		    <label for="souvenir">Se souvenir de moi : </label><input type="checkBox" name="checkBox" id="souvenir" value=" se souvenir de moi"> <br />

		    <div id="bouton"><input type="submit" name="submit"/> 
			</div>    

		 </p>
		</form>

	</div>





</body>


</html>