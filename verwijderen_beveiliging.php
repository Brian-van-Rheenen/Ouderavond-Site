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
    <?php
    //Variabelen.
	$id = $_GET['id'];
    ?>
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
    	<p>Weet u zeker dat u uw inschrijving wilt verwijderen?</p>
    </div>
	<div id = "middle_knoppen">
		<a href='verwijderen.php?id=<?php echo $id; ?>'>
			<button type='button' class='btn btn-primary btn-lg' id='middle_knop_1'>Ja</button>
		</a>
		<a href='home_ouder.php'>
			<button type='button' class='btn btn-primary btn-lg' id='middle_knop_2'>Nee</button>
		</a>
	</div>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  </body>
</html>