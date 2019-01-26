<!DOCTYPE html>
<?php 

	session_start();
	if(!isset($_SESSION['zalogowany'])){
		header('Location: php2_login.php');
	}
	if(isset($_POST['kolor_tekstu'])){
		setcookie('kolor_tekstu',$_POST['kolor_tekstu'], time() + 60);
		
	}
	if(isset($_POST['kolor_tla'])){
		setcookie('kolor_tla',$_POST['kolor_tla'], time() + 60);
		header("Refresh:0");
	}
?>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Strona umożliwia pozytywne zaliczenie kursu programowania systemów webowych.">
		<meta name="keywords" content="systemy, webowe, html, css, hemoglobina, taka, sytuacja">
		<meta name="author" content="Krzysztof Miarczyński">
		<link rel="icon" type="image/x-icon" href="icon.ico">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
		<title>Memoland</title>
	</head>
	<body style="background:<?php echo $_COOKIE['kolor_tla']; ?>">
		<?php
		if(isset($_COOKIE['kolor_tekstu']))
			echo '<font color='.'"'.$_COOKIE['kolor_tekstu'].'"'.'>';
		echo "Siemaneczko ".$_SESSION['login'];
		
	?>
	<form method="post" action="php2.php"> 
		Proszę bardzo. Jaki chcesz mieć kolor tekstu? Onli inglisz plis.</br>
		<input type="text" name="kolor_tekstu" value="<?php 
		if(isset($_COOKIE['kolor_tekstu']))
			echo $_COOKIE['kolor_tekstu'];
		?>"/></br>
		Kolor tła? Proszę bardzo.</br>
		<input type="text" name="kolor_tla" value="<?php 
		if(isset($_COOKIE['kolor_tla']))
			echo $_COOKIE['kolor_tla'];
		?>"/></br>
		</br>
		<input type="submit" value="Klik" name="submit"> 
	</form>
		<form method="post" action="php2_login.php"> 
		<input type="submit" value="Logout" name="logout"> 
	</form>
	
	</body>
</html>