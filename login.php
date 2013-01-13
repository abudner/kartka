<?
session_start();
require('class.php');

$uzytkownicy = new Uzytkownicy();


$_SESSION['id'] = $uzytkownicy->SprawdzUzytkownika($_POST['login'],$_POST['haslo']);

echo 'true';

$_SESSION['login']=$_POST['login'];










?>