<?php


	

	$test ='prenom : '.$_POST['prenom'];
	$test .='nom : ' .$_POST['nom'];
	$test .='age : ' .$_POST['age'];



	mail('maxime.jeannette@outlook.fr','formulaire',$test);


		echo 'peut etre que c est bon';



?>
