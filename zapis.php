<?
session_start();
require('class.php');

$kartki = new Kartki();
echo $kartki -> Zapis($_POST['nazwa'], $_POST['tresc'], $_SESSION['id']);






?>