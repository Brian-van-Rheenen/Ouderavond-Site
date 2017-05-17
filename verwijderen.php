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
	<title>Verwijderen</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
  </head>
  
  <body>
    <div id="blok">
    </div>
    <a href="logout.php">
    	<img id="logout" src="media/logout.png">
    </a>
	<p id="uitloggen">Uitloggen:</p>
	<header>
        Verwijderen
    </header>
	<div id = "middle" >
		<?php
		//Database gegevens.
		require_once ('config.php');

		//Variabelen.
		$id = $_GET['id'];

		//De database verbinding
		$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

		//Delete de inschrijving van de tabel `Registraties_ouderAvond`
		$uitvoeren = "DELETE FROM Registraties_ouderAvond WHERE ID = $id";
		
		//Update gegevens uit de tabel `Tijden` waar de gegevens overeen komen met gegevens uit de tabel `Tijd`
		$update = "UPDATE `Tijden` SET `Bezet` = 'Nee'
				   WHERE Tijd in (SELECT Tijd
								  FROM Registraties_ouderAvond
								  WHERE ID = '$id' )";
		
		//Als het updaten gelukt is
		if (mysqli_query($mysqli, $update))
		{
			//Kijk dan of ook het verwijderen gelukt is
			if (mysqli_query($mysqli, $uitvoeren))
			{
				//Stuur de gebruiker door
				header("Location: home_ouder.php");
			}
			//Anders
			else
			{
				//Geef een foutmelding op het beeld
				echo "Fout: Er is iets fout gegaan bij het verwijderen van de gegevens.<br/><br/> Klik <a href='home_ouder.php'>hier</a> om terug te gaan.<br/>" . mysqli_error($mysqli);
			}
		} 
		//Anders
		else
		{
			//Geef een foutmelding op het beeld
			echo "Fout: Er is iets fout gegaan bij het verwijderen van de gegevens.<br/><br/> Klik <a href='home_ouder.php'>hier</a> om terug te gaan.<br/>" . mysqli_error($mysqli);
		}

		//Verbinding wordt gesloten.
		mysqli_close($mysqli);
		?>
	</div>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  </body>
</html>