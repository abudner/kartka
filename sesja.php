<?
session_start();

if(isset($_SESSION['login'])){

	echo json_encode(array( 'login' => $_SESSION['login'], 'id' => $_SESSION['id']));

}

else
echo 'false';


?>
