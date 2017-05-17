<?php
//Gebruik de config.php
require_once ('config.php');
//Haal de ingevoerde username op
$naam = $_POST['naam'];
//Haal het ingevoerde wachtwoord op
$ww  = $_POST['ww'];

if(strlen($naam) > 0 && strlen($ww) > 0)
{
	//Versleutel het wachtwoord
	$ww = md5($ww);
	
	//Kijk of deze gegevens overeen komen met wat er in de database staat
	$query = "SELECT * FROM Accounts WHERE Inlognaam = '$naam' AND Wachtwoord = '$ww'";
	//Voer de query uit
	$uitkomst = mysqli_query($mysqli, $query);
	
	//Haal het id op die bij de naam hoort
	$id_query = "SELECT `ID` FROM `Accounts` WHERE `Inlognaam` = '$naam'";
	//Voer de query uit
	$id_result = mysqli_query($mysqli, $id_query);
	//Haal het resultaat uit de tabellen
	$id_row = mysqli_fetch_array($id_result);
	//Vul de variabel met het resultaat
	$id = $id_row['ID'];
	
	//Haal de rechten op uit de tabel
	$rechten_query = "SELECT `Rechten` FROM `Accounts` WHERE `Inlognaam` = '$naam'";
	//Voer de query uit
	$rechten_result = mysqli_query($mysqli, $rechten_query);
	//Haal het resultaat uit de tabellen
	$rechten_row = mysqli_fetch_array($rechten_result);
	//Vul de variabel met het resultaat
	$rechten = $rechten_row['Rechten'];
	
	//Controleer of de login correct was
	if (mysqli_num_rows($uitkomst) == 1)
	{
		//Login correct, start de sessie
		session_start();
		//Sla de rechten op in de sessie
		$_SESSION['rechten'] = $rechten;
		//Sla de gebruikersnaam op in de sessie
		$_SESSION['naam'] = $naam;
		//Sla het id op in de sessie
		$_SESSION['ID'] = $id;
		//Sla het type op in de sessie
		$_SESSION['type'] = 'inlog';
		
		//Als je rechten hebt
		if ($_SESSION['rechten'] == "Ja")
		{
			//Stuur de gebruiker door naar de docenten-pagina
			header("Location: home_docent.php");
			exit();
		}
		//Als je geen rechten hebt
		else
		{
			//Stuur de gebruiker door naar de ouders-pagina
			header("Location: home_ouder.php");
			exit();
		}
	}
	//Als het inloggen niet correct was
	else
	{
		//Stuur de gebruiker door
		header("Location: index_fout.php");
		exit();
	}
}
?>