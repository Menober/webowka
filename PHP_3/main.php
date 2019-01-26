<!DOCTYPE html>
<?php 
	session_start();
	if(isset($_POST['logout'])){
			unset($_SESSION['zalogowany']);
			unset($_SESSION['login']);
			unset($_SESSION['password']);
			unset($_SESSION['blad']);
			header('Location: index.php');
	}
	if(!isset($_SESSION['zalogowany'])){
		header('Location: index.php');
	}

?>
<html lang="pl">
	<head>
		<title>Memoland</title>
	</head>
	<body>
	<?php
		$polaczenie = @new mysqli("192.168.43.93", "root", "", "php3");
		$rezultat = @$polaczenie->query(
				sprintf("SELECT * FROM dane WHERE ID='%s'",mysqli_real_escape_string($polaczenie,$_SESSION['id'])));
		$echo = $rezultat->fetch_assoc();
		echo "Login: ".$_SESSION['login']."<br>Imie: ".$echo['Imie']."<br>Nazwisko: ".$echo['Nazwisko']."<br>Opis: ".$echo['Opis'];
	?>

	<form method="post" action="main.php"> 
		<input type="submit" value="Logout" name="logout"> 
	</form>
	
	<br><br>
	Edytuj dane:<br>
	<form method="post" action="login_register.php"> 
		Wprowadz haslo:</br>
		<input type="text" name="password"/></br>
		Wprowadz imie:</br>
		<input type="text" name="imie"/></br>
		Wprowadz nazwisko:</br>
		<input type="text" name="nazwisko"/></br>
		Wprowadz opis:</br>
		<input type="text" name="opis"/></br>
		</br>
		<input type="submit" value="Zapisz" name="edycja"> 
	</form>
		
	</body>
</html>