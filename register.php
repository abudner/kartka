<?

require('class.php');

$uzytkownicy = new Uzytkownicy();


$uzytkownicy->DodajUzytkownika($_POST['login'], $_POST['haslo']);

echo 'true';











?>