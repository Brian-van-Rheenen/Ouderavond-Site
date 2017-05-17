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
    <title>Docent informatie updaten</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
</head>

<body>
<?php
//Koppeling database
require_once ('config.php');

//De query voor het lokaal
$query_lokaal = "SELECT Lokaal FROM Informatie_ouderAvond";
//De query voor het laten zien van de informatie
$query_informatie = "SELECT Informatie FROM Informatie_ouderAvond";
$uitvoeren_lokaal = mysqli_query($mysqli, $query_lokaal);
$lokaal_array = mysqli_fetch_assoc($uitvoeren_lokaal);
$lokaal = $lokaal_array['Lokaal'];
$uitvoeren_informatie = mysqli_query($mysqli, $query_informatie);
$informatie_array = mysqli_fetch_assoc($uitvoeren_informatie);
$informatie = $informatie_array['Informatie'];
?>
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
<div id = "middle">
<strong>Verander hier de informate en gegevens voor de ouderavond.</strong>
<br>
<br>
<br>
</div>
<div class="form-group row" id="form-group-row">
    <label class="col-xs-2 col-form-label"></label>
        <div class="col-xs-10">
            <label>Oud:</label>
        </div>
</div>
<div class="form-group row" id="form-group-row">
    <label class="col-xs-2 col-form-label">Informatie:</label>
        <div class="col-xs-10">
            <input class="form-control" type="text" value="<?php echo $informatie; ?>" name="lokaal" id="lokaal" readonly required>
        </div>
</div>
<div class="form-group row" id="form-group-row">
    <label class="col-xs-2 col-form-label">Lokaal:</label>
        <div class="col-xs-10">
            <input class="form-control" type="text" value="<?php echo $lokaal; ?>" name="lokaal" id="lokaal" readonly required>
        </div>
</div>
<br>
<div class="form-group row" id="form-group-row">
    <label for="example-text-input" class="col-xs-2 col-form-label"></label>
        <div class="col-xs-10">
            <label>Nieuw:</label>
        </div>
</div>
<div id="formulier">
    <form action="docent_informatie_updaten_verwerk.php" method="post">
        <div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Informatie:</label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="<?php echo $informatie; ?>" name="informatie" id="informatie" required>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-text-input" class="col-xs-2 col-form-label">Lokaal:</label>
            <div class="col-xs-10">
                <input class="form-control" type="text" value="<?php echo $lokaal; ?>" name="lokaal" id="lokaal" required>
            </div>
        </div>
		<!--
        <div class="form-group row" id="form-group-row">
            <label for="example-date-input" class="col-xs-2 col-form-label">Datum:</label>
            <div class="col-xs-10">
                <input class="form-control" type="date" value="" name="datum" id="datum" required>
            </div>
        </div>
        <div class="form-group row" id="form-group-row">
            <label for="example-time-input" class="col-xs-2 col-form-label">Tijd:</label>
            <div class="col-xs-10">
                <select class="form-control" name="tijd" id="tijd">
                    
                </select>
            </div>
        </div>
		-->
        <label for="example-text-input" id="labelbreedte" class="col-xs-2 col-form-label"></label>
        <button type="submit" name="submit" id="knopbreedte" class="btn btn-primary">Updaten</button>
    </form>
</div>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
</body>
</html>