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
	<title>Home Ouders</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
  </head>
  
  <body>
  	<?php
	//Koppeling database
	require_once ('config.php');
	//Variabelen
	$id = $_SESSION['ID'];	
	
	//Dit is de query.
	$opdracht = "SELECT * FROM Registraties_ouderAvond WHERE ID = $id";   
	$overzicht = mysqli_query($mysqli, $opdracht); 
	
	//Zolang er iets gevonden is in de database
	while ($check = mysqli_fetch_array($overzicht))
	{
		//Zet dan een boolean op true
		$ietsGevonden = true;
	}
	?>
    <div id="blok">
    </div>
    <a href="logout.php">
    	<img id="logout" src="media/logout.png">
    </a>
	<p id="uitloggen">Uitloggen:</p>
	<header>
        Home - Ouderavond
    </header>
   
   <?php
		//Koppeling database
		require_once ('config.php');
		//Maak van de sessie een variabel
		$id = $_SESSION['ID'];
        //Haal alles uit de tabel wat bij de gebruikersnaam hoort
		$query = "SELECT * FROM Registraties_ouderAvond WHERE ID = $id";
        //Voer de query uit
		$uitkomst = mysqli_query($mysqli, $query);	
        //Zolang er nog gegevens uit de database worden gehaald, wordt er nog een rij met gegevens aan de tabel toegevoegd.  
		$total = mysqli_num_rows($uitkomst);
		if ($total > 0)
		{
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
							<th>Aanpassen:</th>
							<th>Verwijderen:</th>
						  </tr>";
				echo "</thead>";
				
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
				echo "<td><a href='ouder_inschrijving_bewerken.php?id=".$overzicht['ID']."'><img id='edit' src='media/edit.png'></a></td>";
				echo "<td><a href='verwijderen_beveiliging.php?id=".$overzicht['ID']."'><img id='delete' src='media/delete.png'></a></td>";
				echo "</tr>";
			}
			echo "</tbody>";
			//Sluit de tabel af
			echo "</table>";
		}
		else
		{
	?>
    <div id = "middle" >
    	<p>Klik op de knop om u in te schrijven voor de ouderavond.</p>
        <img src="media/write.png">
        <a href='ouder_inschrijven.php'>
        	<button type="button" class="btn btn-primary btn-lg" id="knop" <?php if ($ietsGevonden == true){ echo 'disabled="disabled"'; } else {  } ?>>Inschrijven</button>
        </a>
        <div style="clear:both"></div>
    </div>
	<?php
		}
	?>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
  </body>
</html>