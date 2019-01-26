<!DOCTYPE html>
<?php 
	session_start();
	if(isset($_POST['logout'])){
			unset($_SESSION['zalogowany']);
			unset($_SESSION['login']);
			unset($_SESSION['password']);
			unset($_SESSION['blad']);
	}
	else{
		if(isset($_SESSION['login'])&&isset($_SESSION['password'])&&isset($_SESSION['zalogowany']))
			header('Location: main.php');	
	}

?>
<html lang="pl">
	<head>
		<title>Memoland</title>
	</head>
	<body>
	<?php
		
		if(isset($_SESSION['blad']))
			echo $_SESSION['blad'];
	?>
	<h1>Logowanie:</h1>
	<form method="post" action="login_register.php"> 
		Wprowadz login:</br>
		<input type="text" name="login"/></br>
		Wprowadz haslo:</br>
		<input type="text" name="password"/></br>
		</br>
		<input type="submit" value="Zaloguj" name="logowanie"> 
	</form>
	<br>
	
	<h1>Rejestracja:</h1>
	<form method="post" action="login_register.php"> 
		Wprowadz login:</br>
		<input type="text" name="login"/></br>
		Wprowadz haslo:</br>
		<input type="text" name="password"/></br>
		Wprowadz imie:</br>
		<input type="text" name="imie"/></br>
		Wprowadz nazwisko:</br>
		<input type="text" name="nazwisko"/></br>
		Wprowadz opis:</br>
		<input type="text" name="opis"/></br>
		</br>
		<input type="submit" value="Zarejestruj" name="rejestracja"> 
	</form>
	</body>
</html>