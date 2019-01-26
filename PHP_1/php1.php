<!DOCTYPE html>
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
	<body>
		<h1>Strona dotyczy zadania 1 PHP</h1>
		<?php
		print ("Witaj, " . $_POST['name'] . " " . $_POST['lname'] . "<br>");
		?>
		<h4>Konwersja typów</h4>
		<?php
		$myNumber = $_POST['number'];
		print ("Twoja liczba jako String: " . $myNumber . "<br>");
		settype ($myNumber, "double");
		print ("Twoja liczba jako Double: " . $myNumber . "<br>");
		settype ($myNumber, "integer");
		print ("Twoja liczba jako Integer: " . $myNumber . "<br>");
		?>
		<h4>Typowanie dynamiczne i Rzutowanie</h4>
		<?php
		$myNumber = rand(0,2);
		if ($myNumber == 0) 
			$a = "Napis";
		else if ($myNumber == 1)
			$a = 4;
		else
			$a = 4.5;
		print ("Wylosowany typ to " . "<b>".gettype($a)."</b> o wartości ".$a."<br>");
		print ("Rzutujemy: <br>");
		print ("Na string: ".(string) $a."<br>");
		print ("Na integer: ".(integer) $a."<br>");
		print ("Na double: ".(double) $a."<br>");
		?>
		<h4>Stałe i operatory</h4>
		<?php
		define ("TO_COMPARE", rand(0,50));
		define ("TO_ADD", 2);
		define ("TO_MULTIPLY", 3);
		$userChampion = $_POST['champion'];
		settype ($userChampion, "double");
		$userChampion += TO_ADD;
		$userChampion++;
		$userChampion *= TO_MULTIPLY;
		if ($userChampion == TO_COMPARE)
			print ("Twoja liczba po przekształceniach (".$userChampion. ") jest równa z wylosowaną (" . TO_COMPARE .")<br>");
		else if ($userChampion < TO_COMPARE)
			print ("Twoja liczba po przekształceniach (".$userChampion. ")  jest mniejsza od wylosowanej (" . TO_COMPARE .")<br>");
		else
			print ("Twoja liczba po przekształceniach (".$userChampion. ")  jest większa od wylosowanej (" . TO_COMPARE .")<br>");
		?>
		<h4>Tablice i pętle</h4>
		<?php
			for ($i = 0; $i < (integer) $_POST['lens']; ++$i)
				$table1[$i] = "e" . (string) $i;
			if (!empty($_POST['ind']) && !empty($_POST['val']))
				$table1[(integer) $_POST['ind']] = $_POST['val'];	
			print ("Oto twoja tablica: <br>");
			for ($i = 0; $i < (integer) $_POST['lens']; ++$i)
				print ($table1[$i] . " | ");
			
			print ("<br><br>A oto moja tablica (asocjacyjna!): <br>");
			$table2["alfa"] = 20;
			$table2["beta"] = 30;
			$table2["gamma"] = 40;
			$table2["3"] = "pi";
			$table2[true] = "dfddd";
			$table2["1"]="xxx";
			
			foreach ($table2 as $elem => $val)
				print ($elem . " | " . $val . "<br>");
			print ("<br>Liczba jej elementów to: " . count($table2)."<br>");
			print ("Jej obecny index to: <b>" . key($table2) ."</b> ale mogę go przesunąć używając funkcji <b>next</b>"."<br>");
			next($table2);
			print ("<b><b>---NEXT---</b></b><br>");
			print ("Teraz obecny index mojej tablicy to: <b>".key($table2)."</b><br>");
			print ("Mogę też z powrotem ustawić obecny index na pierwszy element za pomocą funkcji <b>reset</b><br>");
			reset($table2);
			print ("<b><b>---RESET---</b></b><br>");
			print ("Index mojej tablicy: <b>".key($table2)."</b>");
		?>
		<h4>Wyrażenia regularne</h4>
		<?php
			$phrase = $_POST['reg'];
			print ("Twoje zdanie: ".$phrase."<br>");
			if (preg_match("/pwr/", $phrase)) {
				if (preg_match("/^pwr/", $phrase))
					print ("Słowo 'pwr' znajduje się <b>na początku</b> twojego zdania<br>");
				else if (preg_match("/pwr$/", $phrase))
					print ("Słowo 'pwr' znajduje się <b>na końcu</b> twojego zdania<br>");
				else
					print ("Słowo 'pwr' znajduje się <b>w środku</b> twojego zdania<br>");
			}
			else
				print ("Słowo 'pwr' <b>nie</b> znajduje się w twoim zdaniu<br>");
			print ("Teraz poszukamy słów zaczynających się na literę 't'...<br>");
			if (preg_match("/\b(t[[:alpha:]]+)\b/", $phrase)) {
				print("Oto one: <br>");
				while (preg_match("/\b(t[[:alpha:]]+)\b/", $phrase, $words)) {
					print($words[1] . ", ");
					$phrase = preg_replace("/" . $words[1] . "/", "", $phrase);
				}
			}
			else
				print("Ups, w twoim zdaniu nie ma takich słów");
			
		?>
		<h4>Porównywanie łańcuchów</h4>
		<?php
			$w1 = $_POST['w1'];
			$w2 = $_POST['w2'];
			print ("Podane wyrazy to: ".$w1." i ".$w2."<br>");
			print ($w1. " == ". $w2. " ---> "); $w1==$w2 ? print("True") : print("False"); print("<br>");
			print ($w1. " >= ". $w2. " ---> "); $w1>=$w2 ? print("True") : print("False"); print("<br>");
			print ($w1. " <= ". $w2. " ---> "); $w1<=$w2 ? print("True") : print("False"); print("<br>");
			print ($w1. " < ". $w2. " ---> "); $w1<$w2 ? print("True") : print("False"); print("<br>");
			print ($w1. " > ". $w2. " ---> "); $w1>$w2 ? print("True") : print("False"); print("<br>");
			print ($w1. " != ". $w2. " ---> "); $w1!=$w2 ? print("True") : print("False"); print("<br>");
			print ("strcmp(".$w1.", ".$w2.") ---> "); print (strcmp($w1, $w2));
			
		?>
		<h4>Zmienne globalne</h4>
		<?php
		print ($_SERVER['SERVER_ADDR']." ".$_SERVER['SERVER_NAME']." ".$_SERVER['SERVER_SOFTWARE'].'</br>');
		print ($_SERVER [ 'REMOTE_ADDR']." ".$_SERVER [ 'REMOTE_PORT'].'</br>');
		print ("http://www.capaciouscore.pl/kursy/kurs-php/superglobalne/");
		print("</br></br>");
		
		if(strstr($_SERVER['HTTP_USER_AGENT'],"Windows"))
			print("Windows OS user detected.");
	
		
		?>
		
	</body>
</html>