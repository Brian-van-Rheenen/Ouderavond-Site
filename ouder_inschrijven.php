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
    <title>Ouders Inschrijven</title>

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
//De query voor het dropdown menu voor docenten
$query_docenten = "SELECT Mentor FROM Accounts WHERE ID = $id";
//De query voor het lokaal
$query_lokaal = "SELECT Lokaal FROM Informatie_ouderAvond";
//De query voor het dropdown menu voor tijden
$query_tijden = "SELECT DISTINCT(Tijd) FROM Tijden WHERE Bezet = 'Nee'";
//De query voor het laten zien van de informatie
$query_informatie = "SELECT Informatie FROM Informatie_ouderAvond";

//Voer de query's uit
$overzicht = mysqli_query($mysqli, $opdracht);
$uitvoeren_docenten = mysqli_query($mysqli, $query_docenten);
$docenten_array = mysqli_fetch_assoc($uitvoeren_docenten);
$docenten = $docenten_array['Mentor'];
$uitvoeren_lokaal = mysqli_query($mysqli, $query_lokaal);
$lokaal_array = mysqli_fetch_assoc($uitvoeren_lokaal);
$lokaal = $lokaal_array['Lokaal'];
$uitvoeren_tijden = mysqli_query($mysqli, $query_tijden);
$uitvoeren_informatie = mysqli_query($mysqli, $query_informatie);

//Zolang er iets gevonden is in de database
while ($check = mysqli_fetch_array($overzicht))
{
    //Zet dan een boolean op true
    $ietsGevonden = true;
}

//Als de boolean ietsGevonden op true staat
if ($ietsGevonden == true)
{
    //Stuur dan de gebruiker terug naar de home page
    header("Location: home_ouder.php");
}
//Anders
else
{
    //Doe niks
}

//Variabelen
$id = $_SESSION['ID'];
?>
<a href="home_ouder.php">
    <img id="back" src="media/back.png">
</a>
<a href="logout.php">
    <img id="logout" src="media/logout.png">
</a>
<p id="uitloggen">Uitloggen:</p>
<header>
    Formulier - Ouderavond
</header>
<div id = "middle">
<?php
while ($rij_informatie = mysqli_fetch_array($uitvoeren_informatie))
{
	echo "<strong>";
	echo $rij_informatie['Informatie'];
	echo "</strong>";
}
?>
<br>
<br>
</div>
<div class="form-group row" id="form-group-row">
	<p id="verplicht">* is verplicht om in te vullen</p>
</div>
<div id="formulier">
    <form action="ouder_inschrijven_verwerken.php" method="post">
        <div id="hiddenform">
            <div class="form-group row" id="form-group-row">
                <label for="example-number-input" class="col-xs-2 col-form-label"></label>
                <div class="col-xs-10">
                    <input class="form-control" type="hidden" value="<?php echo $id; ?>" name="id" id="id" readonly>
                </div>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Naam Ouder: <strong>*</strong></label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="" name="naamOuder" id="naamOuder" required>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Docent: <strong>*</strong></label>
            <div class="col-xs-10">
				<input class="form-control" type="text" value="<?php echo $docenten; ?>" name="docent" id="docent" readonly required>
                
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Lokaal: <strong>*</strong></label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="<?php echo $lokaal; ?>" name="lokaal" id="lokaal" readonly required>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-date-input" class="col-xs-2 col-form-label">Datum: <strong>*</strong></label>
            <div class="col-xs-10">
				<!-- cdn for modernizr, if you haven't included it already -->
				<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
				<!-- polyfiller file to detect and load polyfills -->
				<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
				<!-- Script voor input type="date" voor Firefox -->
				<script>
				  webshims.setOptions('waitReady', false);
				  webshims.setOptions('forms-ext', {types: 'date'});
				  webshims.polyfill('forms forms-ext');
				</script>
                <input class="form-control" type="date" value="" name="datum" id="datum" required>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-time-input" class="col-xs-2 col-form-label">Tijd: <strong>*</strong></label>
            <div class="col-xs-10">
                <select class="form-control" name="tijd" id="tijd">
                    <?php
                    //Zolang er nog informatie uit de tabellen te halen is, maak dan nog een rij in het dropdown menu aan
                    while($rij_tijden = mysqli_fetch_array($uitvoeren_tijden))
                    {
                        echo '<option value="'.$rij_tijden['Tijd'].'">'.$rij_tijden["Tijd"].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-number-input" class="col-xs-2 col-form-label">Aantal personen: <strong>*</strong></label>
            <div class="col-xs-10">
                <input class="form-control" type="number" value="" name="aantalPersonen" id="aantalPersonen" required>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleTextarea" id="labelOpmerkingen">Opmerkingen:</label>
            <textarea class="form-control" name="opmerkingen" id="opmerkingen" rows="3"></textarea>
        </div>
		
        <label for="example-text-input" id="labelbreedte" class="col-xs-2 col-form-label"></label>
        <button type="submit" name="submit" id="knopbreedte" class="btn btn-primary">Inschrijven</button>
    </form>
</div>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
</body>
</html>