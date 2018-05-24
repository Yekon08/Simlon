
function verifier()
{
	var prenom = document.getElementById ('prenom').value;
	var nom = document.getElementById ('nom').value;
	var homme = document.getElementById ('homme').checked;
	var femme = document.getElementById ('femme').checked;

	if(prenom=="")
	{
		alert('Ecris ton prenom !');
		document.getElementById('prenom').focus;
		return false;
	}

	if(nom=="")
	{
		alert('Ecris ton nom !');
		document.getElementById('nom').focus;
		return false;
	}

	if (homme =="" && femme =="")
	{
		alert('coche une case !');
	    return false;
	}

	else
		return true;



}