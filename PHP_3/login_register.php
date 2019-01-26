<!DOCTYPE html>
<?php 
	session_start();
	if(isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['logowanie']))
	{

		$polaczenie = @new mysqli("192.168.43.93", "root", "", "php3");
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
			die("Unable to connect to database.");
		}
		else
		{
			$login = $_POST['login'];
			$haslo = quotemeta($_POST['password']);
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
			if ($rezultat = @$polaczenie->query(
				sprintf("SELECT * FROM users WHERE Login='%s'",
				mysqli_real_escape_string($polaczenie,$login))))
			{
				
				echo mysqli_real_escape_string($polaczenie,$login);
				
				$ilu_userow = $rezultat->num_rows;
				if($ilu_userow>0)
				{
					$wiersz = $rezultat->fetch_assoc();
					if($haslo==$wiersz['Password']){
													
						$_SESSION['id'] = $wiersz['ID'];
						$_SESSION['zalogowany']=true;
						$_SESSION['login']=$_POST['login'];
						$_SESSION['password']=$_POST['password'];
						unset($_SESSION['blad']);
						
						$rezultat->free_result();
						header('Location: main.php');
					}
					else {
						$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
						header('Location: index.php');
					}
					
				} 
				else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
					
				}
			
			}
	
		$polaczenie->close();
		}
		
	}else if(isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['rejestracja'])){
		
		
		$polaczenie = @new mysqli("192.168.43.93", "root", "", "php3");
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
			die("Unable to connect to database.");
		}
		else
		{
			$login = quotemeta($_POST['login']);
			$haslo = quotemeta($_POST['password']);
			$imie = quotemeta($_POST['imie']);
			$nazwisko = quotemeta($_POST['nazwisko']);
			$opis = quotemeta($_POST['opis']);
			if ($rezultat = @$polaczenie->query(
				sprintf("INSERT INTO users VALUES('','".$login."','".$haslo."');")))
			{
				  //echo "dodalo usera";
				
				$rezultat = @$polaczenie->query(
				sprintf("SELECT * FROM users WHERE Login='".$login."'"));
				$wiersz = $rezultat->fetch_assoc();
				$id=$wiersz["ID"];
				if ($rezultat = @$polaczenie->query(
				sprintf("INSERT INTO dane VALUES('".$id."','".$imie."','".$nazwisko."','".$opis."');")))
				{
					//echo "dodalo dane";
					echo "Wszystko ok <a href='index.php'>Zaloguj sie</a>";
					
				}
				
				
			}else{
				$_SESSION['blad'] = '<span style="color:red">Uzytkownik o takim loginie juz istnieje!</span>';
				header('Location: index.php');
			}
			
		}
		$polaczenie->close();
	}else if(isset($_POST['edycja'])){
		if($_POST['password']!="")
		{
			$query="UPDATE users SET Password='".quotemeta($_POST['password'])."' WHERE ID = '".$_SESSION['id']."';";
			$polaczenie = @new mysqli("192.168.43.93", "root", "", "php3");
			$rezultat=@$polaczenie->query($query);
			$polaczenie->close();
		}
		
		
		$query="UPDATE dane SET ";
		$czyWykonac=False;
		if($_POST['imie']!=""){
			$query =$query. "Imie = '".quotemeta($_POST['imie'])."',";
			$czyWykonac=True;
		}
		if($_POST['nazwisko']!=""){
			$query =$query."Nazwisko = '".quotemeta($_POST['nazwisko'])."',";
			$czyWykonac=True;
		}
		if($_POST['opis']!=""){
			$query =$query."Opis = '".quotemeta($_POST['opis'])."'";
			$czyWykonac=True;
		}
		if($czyWykonac){
			$query =$query." WHERE dane.ID = '".$_SESSION['id']."';";
			$polaczenie = @new mysqli("192.168.43.93", "root", "", "php3");
			$rezultat=@$polaczenie->query($query);
			$polaczenie->close();
		}
		header('Location: main.php');
		
	}
	
?>