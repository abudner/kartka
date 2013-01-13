<?
try
{
	$db = new PDO('mysql:host=localhost;dbname=kartka', 'root', '');
}
catch (PDOException $e)
{
	die('nie można sie połaczyć z bazą');
}


class Uzytkownicy{
public function DodajUzytkownika($login,$haslo){

	global $db;

	$query = $db->prepare('SELECT COUNT(*) FROM uzytkownicy WHERE login=:login');
	$query -> bindValue(':login', $login,PDO::PARAM_STR);
	$query->execute();
	//wyciaganie jeden rekord
	$count = $query -> fetch();
	if($count[0] != 0) die("uzytkownik istnieje w bazie");

	$query =$db->prepare('INSERT INTO uzytkownicy(login, haslo) VALUES(
			:login,
			MD5(:haslo))');
			
			
	$query -> bindValue(':login', $login,PDO::PARAM_STR);
	$query -> bindValue(':haslo', $haslo,PDO::PARAM_STR);
	$query->execute();
}


public function SprawdzUzytkownika($login,$haslo){

	global $db;
	
	$query = $db->prepare('SELECT COUNT(*),id FROM uzytkownicy WHERE login=:login AND haslo=MD5(:haslo)');
	$query -> bindValue(':login', $login,PDO::PARAM_STR);
	$query -> bindValue(':haslo', $haslo,PDO::PARAM_STR);
	$query->execute();
	
	$count = $query -> fetch();
	if($count[0] == 0) die("Podales zly login lub haslo :D");

	return $count['id'];
}

}


class Kartki{


public function Zapis($nazwa,$tresc,$id){

global $db;


$query =$db->prepare('INSERT INTO kartki(nazwa, tresc,iduzytkownika) VALUES(
			:nazwa,
			:tresc,
			:iduzytkownika)');
			
			

			
$query -> bindValue(':nazwa', $nazwa,PDO::PARAM_STR);
$query -> bindValue(':tresc', $tresc,PDO::PARAM_STR);
$query -> bindValue(':iduzytkownika', $id,PDO::PARAM_INT);

$query->execute();


$query = $db->prepare('SELECT id FROM kartki WHERE nazwa=:nazwa AND tresc=:tresc AND iduzytkownika=:id ');
$query -> bindValue(':nazwa', $nazwa,PDO::PARAM_STR);
$query -> bindValue(':tresc', $tresc,PDO::PARAM_STR);
$query -> bindValue(':id', $id,PDO::PARAM_INT);


$query->execute();

$row = $query -> fetch();

return $row['id'];


}


public function Usun($id){

global $db;

$query = $db->prepare('DELETE FROM kartki WHERE id=:id ');
$query -> bindValue(':id', $id,PDO::PARAM_INT);
$query->execute();




}


public function Pobierz($id){

global $db;

$query = $db->prepare('SELECT * FROM kartki WHERE id=:id ');
$query -> bindValue(':id', $id,PDO::PARAM_INT);
$query->execute();

$row = $query -> fetch();

echo $row['tresc'];




}
public function PobierzKartki($id) {

 global $db;
 $query = $db -> prepare('SELECT * FROM kartki WHERE iduzytkownika=:id');
 $query -> bindValue(':id', $id, PDO::PARAM_INT);
 $query -> execute();
 echo '<div class="CSSTableGenerator"><table><tr><td>Nazwa</td><td>Pokaż kartkę</td><td>Usuń kartkę</td></tr>';
		foreach($query as $row) {
			echo '<tr><td>'.$row['nazwa'].'</td><td><a href="#" onclick="edytuj('.$row['id'].')">Pokaż</a></td><td><a href="#" onclick="usun('.$row['id'].')">Usuń</a></tr>';
		}
		echo '</table></div>';
}



}