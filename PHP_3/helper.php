
	<?php
			$query="SELECT * from users WHERE ''='' AND ";
			$query2="SELECT * from users JOIN dane ON users.ID=dane.ID WHERE ''='' AND ";
			if(isset($_GET['id'])){
				$query = $query."ID = '".$_GET['id']."' AND ";
				$query2 = $query2."dane.ID = '".$_GET['id']."' AND ";
			}
			if(isset($_GET['login'])){
				$query=$query."Login = '".$_GET['login']."' AND ";
				$query2=$query2."Login = '".$_GET['login']."' AND ";
			}
			if(isset($_GET['password'])){
				$query=$query."Password = '".$_GET['password']."' AND ";
				$query2=$query2."Password = '".$_GET['password']."' AND ";
			}
			$query=$query."''=''";
			$query2=$query2."''=''";
			echo $query2;
			
			
		
			$polaczenie = @new mysqli("192.168.43.93", "root", "", "php3");
			$rezultat=@$polaczenie->query($query);
			echo "<style>table, th, td { border: 1px solid black;}</style>";
			
			
			echo "<h1>Uzytkownicy:</h1><br>";
			echo "<table><tr><th>ID:</th><th>Login:</th><th>Password:</th>";
			while($row = $rezultat->fetch_assoc()){
				 $json[] = $row;
				 echo "<tr><th>".$row['ID']."</th>"."<th>".$row['Login']."</th>"."<th>".$row['Password']."</th></tr>";
			}
			
			echo "</table><br><h1>Dane:</h1><br>";
			echo "<table><tr><th>ID:</th><th>Imie:</th><th>Nazwisko:</th><th>Opis:</th>";
				
			$rezultat=@$polaczenie->query($query2);
			while($row = $rezultat->fetch_assoc()){
				 $json[] = $row;
				  echo "<tr><th>".$row['ID']."</th>"."<th>".$row['Imie']."</th>"."<th>".$row['Nazwisko']."</th><th>".$row['Opis']."</th></tr>";
			}
			$polaczenie->close();
		
		
		
		
		?>

