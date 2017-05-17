<?php
//Sessie beginnen
session_start();
//Controleer of er een username is opgeslagen
if (!isset($_SESSION['type']) || strlen($_SESSION['type']) == 'inlog')
{
	//Geen geldige login, stuur naar het inlogformulier
	header("Location:index.php");
	exit;
}

//Als de sessie type hetzelfde is als 'inlog'
if($docent && $_SESSION['rechten'] != "Ja")
//Laat de website zien
{
	//Als het niet overeen komt, stuur de gebruiker naar de index pagina
	header("Location: index.php");
	exit;
}
?>