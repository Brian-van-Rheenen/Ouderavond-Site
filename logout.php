<?php
//Sessie beginnen
session_start();
//Verwijder de opgegeven sessie
session_unset();
//Stuur de gebruiker weer door
header("Location: index.php");
?>