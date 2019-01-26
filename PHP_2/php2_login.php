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
		if(isset($_POST['login'])&&isset($_POST['password']))
		{
			$tablicaLoginow=array("Krzychu","Kuba","Marcin");
			$tablicaHasel=array("Gimme10points","metoo","fullscore");
			for ($i = 0; $i < count($tablicaLoginow); $i++) {
				$_SESSION['blad']="error";
				if($tablicaLoginow[$i]==$_POST['login']&&$tablicaHasel[$i]==$_POST['password'])
				{
					$_SESSION['zalogowany']=true;
					$_SESSION['login']=$_POST['login'];
					$_SESSION['password']=$_POST['password'];
					unset($_SESSION['blad']);
					break;
				}
			}
			
		}
		if(isset($_SESSION['login'])&&isset($_SESSION['password'])&&isset($_SESSION['zalogowany']))
			header('Location: php2.php');	
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
		
		if(isset($_SESSION['blad']))
			echo "Zly login lub haslo";
	?>
	<form method="post" action="php2_login.php"> 
		Wprowadz login:</br>
		<input type="text" name="login"/></br>
		Wprowadz haslo:</br>
		<input type="text" name="password"/></br>
		</br>
		<input type="submit" value="Klik" name="submit"> 
	</form>
		
	</body>
</html>