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
    <title>Inschrijving bewerken</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
</head>

<body>
<?php
//Koppeling database
require_once ('config.php');
//Variabelen
$id = $_SESSION['ID'];

//De query
$query = "SELECT * FROM Registraties_ouderAvond WHERE ID = $id";
//Uitvoeren query's
$uitvoerenquery = mysqli_query($mysqli, $query);
$query_array = mysqli_fetch_assoc($uitvoerenquery);
$naam = $query_array['NaamOuder'];
$datum = $query_array['Datum'];
$tijd = $query_array['Tijd'];
$aantalPersonen = $query_array['AantalPersonen'];
$opmerkingen = $query_array['Opmerkingen'];
?>
<a href="home_ouder.php">
    <img id="back" src="media/back.png">
</a>
<a href="logout.php">
    <img id="logout" src="media/logout.png">
</a>
<p id="uitloggen">Uitloggen:</p>
<header>
    Inschrijving bewerken
</header>
<div id = "middle">
<strong>Verander hier de gegevens van de inschrijving.</strong>
<br>
<br>
<br>
</div>
<div id="formulier">
    <form action="ouder_inschrijving_bewerken_verwerk.php" method="post">
        <div id="hiddenform">
            <div class="form-group row" id="form-group-row">
                <label for="example-number-input" class="col-xs-2 col-form-label"></label>
                <div class="col-xs-10">
                    <input class="form-control" type="hidden" value="<?php echo $id; ?>" name="id" id="id" readonly>
                </div>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Naam Ouder:</label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="<?php echo $naam; ?>" name="naamOuder" id="naamOuder">
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-date-input" class="col-xs-2 col-form-label">Datum:</label>
            <div class="col-xs-10">
                <input class="form-control" type="date" value="<?php echo $datum; ?>" name="datum" id="datum">
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-time-input" class="col-xs-2 col-form-label">Tijd:</label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="<?php echo $tijd; ?>" name="tijd" id="tijd">
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-number-input" class="col-xs-2 col-form-label">Aantal personen:</label>
            <div class="col-xs-10">
                <input class="form-control" type="number" value="<?php echo $aantalPersonen; ?>" name="aantalPersonen" id="aantalPersonen">
            </div>
        </div>
		<div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Opmerkingen:</label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="<?php echo $opmerkingen; ?>" name="opmerkingen" id="naamOuder">
            </div>
        </div>
        <label for="example-text-input" id="labelbreedte" class="col-xs-2 col-form-label"></label>
        <button type="submit" name="submit" id="knopbreedte" class="btn btn-primary">Bewerken</button>
    </form>
</div>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
</body>
</html>