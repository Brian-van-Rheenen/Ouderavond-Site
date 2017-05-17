<?php
//Zet een variabel op true
$docent = true;

//Sessie beginnen
require_once 'session.inc.php';
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
    <a href="home_docent.php">
    	<img id="back" src="media/back.png">
    </a>
    <a href="logout.php">
    	<img id="logout" src="media/logout.png">
    </a> 
	<p id="uitloggen">Uitloggen:</p>
	<header>
        Informatie - Ouderavond
    </header>   
    
    <?php
    //Tabel instellingen
    echo "<table border=1 cellspacing='0' cellpadding='3'>";
       
    //Header kopjes in de tabel
	echo "<table class='table table-striped'>";
	echo "<thead class='thead-inverse'>";
	echo "<tr>
	   	 <th>Naam Ouder:</th>
		 <th>Docent:</th>
		 <th>Lokaal:</th>
		 <th>Datum:</th>
		 <th>Tijd:</th>
		 <th>Aantal Personen:</th>
		 <th>Opmerkingen:</th>
		 </tr>";
	echo "</thead>";
	//Koppeling database
	require_once ('config.php');
    //Maak van de sessie een variabel
    $naam = $_SESSION['naam'];
	//Haal alles uit de tabel wat bij de gebruikersnaam hoort
	$query = "SELECT * FROM Registraties_ouderAvond WHERE Docent = '$naam'";
    //Voer de query uit
	$uitkomst = mysqli_query($mysqli, $query);	
    //Zolang er nog gegevens uit de database worden gehaald, wordt er nog een rij met gegevens aan de tabel toegevoegd.  
    while ($overzicht = mysqli_fetch_array($uitkomst))
    {
		echo "<tbody>";
		echo "<tr><td>" . $overzicht['NaamOuder'] . "</td>";
		echo "	  <td>" . $overzicht['Docent'] . "</td>";
		echo "	  <td>" . $overzicht['Lokaal'] . "</td>";
		echo "	  <td>" . $overzicht['Datum'] . "</td>";
		echo "	  <td>" . $overzicht['Tijd'] . "</td>";
		echo "	  <td>" . $overzicht['AantalPersonen'] . "</td>";
		echo "	  <td>" . $overzicht['Opmerkingen'] . "</td>";
		echo "</tr>";
    }
	echo "</tbody>";
    //Sluit de tabel af
    echo "</table>";
	?>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  </body>
</html>