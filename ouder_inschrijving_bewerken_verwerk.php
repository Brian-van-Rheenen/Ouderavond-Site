<?php
//Start de sessie
session_start();
//Gebruik het sessie bestand
require_once 'session.inc.php';
//Check wat de rechten zijn
if($_SESSION['rechten'] == "Ja")
{
    //Als de gebruiker rechten heeft, stuur dan door naar de home page van docenten
    header("Location: home_docent.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="thema.css">
    <meta charset="utf-8">
	<title>Informatie</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
  </head>
  
  <body>
  	<?php
	//Koppeling database
	require_once('config.php');
	//Uitlezen formulier
	$id = $_POST['id'];
	$naam = $_POST['naamOuder'];
	$datum = $_POST['datum'];
	$tijd = $_POST['tijd'];
	$aantalPersonen = $_POST['aantalPersonen'];
	$opmerkingen = $_POST['opmerkingen'];
	?>
    <a href="home_ouder.php">
    	<img id="back" src="media/back.png">
    </a>
    <img id="logout"> 
	<header>
        Formulier - Ouderavond
    </header>   
    
	<?php
	//Query's maken
	$updaten = "UPDATE `Registraties_ouderAvond` SET `NaamOuder` = '$naam',`Datum` = '$datum',`Tijd` = '$tijd',`AantalPersonen` = '$aantalPersonen',`Opmerkingen` = '$opmerkingen' WHERE `ID` = $id";
	//Kijk of de query correct uitgevoerd zijn
	if(mysqli_query($mysqli, $updaten))
	{
		//Stuur de gebruiker door
		header("Location: home_ouder.php");
	}
	//Anders
	else
	{
		//Laat een foutmelding zien
		echo "Er is iets fout gegaan." . "</br>" . mysqli_error($mysqli);
		exit();
	}
	?>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  </body>
</html>