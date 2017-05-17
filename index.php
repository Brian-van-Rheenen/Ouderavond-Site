<?php
//Start de sessie
session_start();
//Check wat de rechten zijn
if($_SESSION['rechten'] == "Ja")
{
    //Als de gebruiker rechten heeft, stuur dan door naar de home page van docenten
    header("Location: home_docent.php");
    exit;
}
else if ($_SESSION['rechten'] == "Nee")
{
    //Als de gebruiker geen rechten heeft, stuur dan door naar de home page van docenten
    header("Location: home_ouder.php");
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
    <title>Inloggen</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
</head>

<body>
<p id="niks"></p>
<header>
    Formulier - Ouderavond
</header>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
<div class="container">
    <form action="login.php" method="post">
        <!-- Sectie Inlognaam -->
        <div class="form-group row">
            <label for="inputNaam" class="col-sm-2 col-form-label">Inlognaam</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="naam" name="naam" placeholder="Inlognaam" required>
            </div>
			<a class="tooltips" href="#">
				<img id="help" src="media/help.png">
					<span>Vul hier de inlognaam van uw kind in.</span>
			</a>
        </div>
        <!-- Sectie Wachtwoord -->
        <div class="form-group row">
            <label for="inputWachtwoord" class="col-sm-2 col-form-label">Wachtwoord</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="ww" name="ww" placeholder="Wachtwoord" required>
            </div>
			<a class="tooltips" href="#">
				<img id="help" src="media/help.png">
					<span>Vul hier het wachtwoord van uw kind in.</span>
			</a>
        </div>
        <!-- Sectie Knop -->
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" name="button">Log in</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>