<?
session_start();
require('class.php');
$kartki = new Kartki();

$kartki->PobierzKartki($_GET['id']);





?>