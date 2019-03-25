function valider ( )
{
    if ( document.formulaire.nom.value == "" )
    {
        alert ( "Veuillez entrer votre nom !" );
        valid = false;
return valid;
    }

    if ( document.formulaire.prenom.value == "" )
    {
        alert ( "Veuillez entrer votre prenom !" );
        valid = false;
return valid;
    }

    if ( document.formulaire.mail.value == "" )
    {
        alert ( "Veuillez entrer votre e-mail !" );
        valid = false;
return valid;
    }
    if ( document.formulaire.genre.value == "" )
    {
        alert ( "Veuillez renseigner votre genre!" );
        valid = false;
return valid;
    }
}
