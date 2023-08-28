<?php

	$naziv = $_POST['naziv'];
	$adresa = $_POST['adresa'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];
	$obrok = $_POST['obrok'];
	$obrok_explode = explode('|', $obrok);
	$obrok_naziv = (string)$obrok_explode[0];
	$obrok_cena = (int)$obrok_explode[1];
	$kolicina = $_POST['kolicina'];
	$kreditna = $_POST['kreditna'];

	function izracunajIznos(int $obrok, int $kolicina) {
		return $obrok * $kolicina;
	}

	$cookie_name = 'Korisnik';
	$cookie_value = $naziv;
	setcookie($cookie_name, $cookie_value, time()+(86400*30), "/");
	
	$server = "localhost";
	$username = "korisnik";
	$password = "korisnik";
	$database = "projekat";
	$port = "3307";
	
	$link = mysqli_connect($server, $username, $password, $database, $port);

	if (!$link) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$duplicate = mysqli_query($link, "SELECT * FROM Korisnik WHERE Email = '$email'");
	
	if (!(mysqli_num_rows($duplicate) > 0)) {

		$sql = "INSERT INTO Korisnik (Naziv, Adresa, Telefon, Email) 
				VALUES ('$naziv', '$adresa', '$telefon', '$email')";

		if (!(mysqli_query($link, $sql))) {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		} 

	} 

	$sql = "INSERT INTO Porudzbina (KorisnikID, Obrok, Cena, Kolicina) 
			VALUES ((SELECT KorisnikID FROM Korisnik WHERE Email = '$email'), 
			'$obrok_naziv', '$obrok_cena', '$kolicina')";

	if (!(mysqli_query($link, $sql))) {
		echo "Error: " . $sql . "<br>" . mysqli_error($link);
	} 

	mysqli_close($link);

	
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Burger Joint</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" href="slike/logo.png" />
		<script type="text/javascript" src="javascript.js"></script>
	</head>
	
	<body>
		<header>
			<img id="logo" src="slike/logo.png" />
			<p id="ime">Burger Joint</p>
			
			<nav>
				<ul>
					<li><a href="https://www.instagram.com" target="_blank"><img src="slike/instagram.png" /></a></li>
					<li><a href="https://www.facebook.com" target="_blank"><img src="slike/facebook.png" /></a></li>
					<li><a href="https://www.twitter.com" target="_blank"><img src="slike/twitter.png" /></a></li>
				</ul>
			</nav>
		</header>
		
		<main>
		
			<nav>
				<ul id="tabovi">
					<li><a href="index.html">POČETNA</a></li>
					<li><a href="meni.html">MENI</a></li>
					<li><a href="naruči.html">NARUČI</a></li>
					<li><a href="porudzbine.php">PORUDŽBINE</a></li>
				</ul>
			</nav>
			
			<section id="potvrda">
				<h1>Detalji narudžbine</h1>
				<?php
					function function_alert($message) {
						echo "<script>alert('$message');</script>";
					}

					if (!isset($_COOKIE[$cookie_name])) {
						function_alert("Cookie pod nazivom " . $cookie_name . " nije postavljen!");
					} else {
						function_alert("Cookie pod nazivom " . $cookie_name . " je postavljen i njegova vrednost je: " . $cookie_value);
					}
					echo "<b><font color=red>Ime i prezime:</font></b><br/>" , $naziv;
					echo "<br/>";
					echo "<b><font color=red>Adresa:</font></b><br/>" , $adresa;
					echo "<br/>";
					echo "<b><font color=red>Broj telefona:</font></b><br/>" , $telefon;
					echo "<br/>";
					echo "<b><font color=red>E-Mail:</font></b><br/>" , $email;
					echo "<br/>";
					echo "<b><font color=red>Iznos:</font></b><br/>" , izracunajIznos($obrok_cena, $kolicina) , " DIN";
					echo "<br/>";
					echo "<b><font color=red>Vreme naručivanja:</font></b><br/>", date('H:i d.m.y.');
					echo "<br/>";
					if ($kreditna != "")
						echo "<b><font color=red>Kreditna kartica:</font></b><br/>**** **** **** " , substr($kreditna, -4);
				?>
			</section>
		
		</main>
		
		<footer>
			Igor Mišić 2019201487 | Univerzitet Singidunum
		</footer>
	</body>
	
	
</html>