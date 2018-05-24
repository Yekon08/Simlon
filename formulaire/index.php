<!DOCTYPE html>
<html>
<head>
	<title>test formulaire</title>
	<meta charset="utf-8">
</head>
<body>

	

	<form method="POST" action="mail.php">
		<p>
			Etes vous :<input type="radio" name="sexe" value="H" id="homme" checked="checked" /> <label for="homme">Homme</label>
					   <input type="radio" name="sexe" value="F" id="femme" /> <label for="femme">Femme</label><br/>


			Nom :<input type="text" name="nom" />
			Prenom :<input type="text" name="prenom" /><br/>

			Age :<select name="age">

    					<option value="12 ans">12 ans</option>

   						<option value="13 ans">13 ans</option>

   						<option value="14 ans">14 ans</option>

    					<option value="15 ans">15 ans</option>

    					<option value="16 ans">16 ans</option>

    					<option value="17 ans">17 ans</option>

    					<option value="18 ans">18 ans</option>

    					<option value="19 ans">19 ans</option>

    					<option value="20 ans">20 ans</option>

						</select><br />


			Adresse : <textarea name="adresse" rows="1" cols="50">test</textarea><br/>


			Autre : <textarea name="autre" rows="8" cols="70">test</textarea><br/>


			<input type="submit" name="submit"/>


		</p>

	</form>





</body>
</html>