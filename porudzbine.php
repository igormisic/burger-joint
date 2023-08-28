<?php 

	$server = "localhost";
	$username = "korisnik";
	$password = "korisnik";
	$database = "projekat";
	$port = "3307";
	
	$link = mysqli_connect($server, $username, $password, $database, $port);

	if (!$link) {
		die("Connection failed: " . mysqli_connect_error());
	}

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Burger Joint</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" href="slike/logo.png" />
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
					<li class="active"><a href="#">PORUDŽBINE</a></li>
				</ul>
			</nav>
			
			<section id="porudzbine">
				<h1>PORUDŽBINE</h1><br/>
				<?php 

					$sql = "SELECT Korisnik.Naziv, Korisnik.Email, Porudzbina.Obrok, Porudzbina.Kolicina, Porudzbina.Datum
							FROM Porudzbina INNER JOIN Korisnik ON Porudzbina.KorisnikID = Korisnik.KorisnikID";
					$result = mysqli_query($link, $sql);

					echo "
					<table id='table'>
						<tr>
							<th><b><font color='F7CA25'>Naziv</font></b></th>
							<th><b><font color='F7CA25'>E-Mail</font></b></th>
							<th><b><font color='F7CA25'>Obrok</font></b></th>
							<th><b><font color='F7CA25'>Količina</font></b></th>
							<th><b><font color='F7CA25'>Datum</font></b></th>
						</tr>";

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr><td>" . $row["Naziv"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Obrok"]. 
							"</td><td>" . $row["Kolicina"]. "</td><td>" . $row["Datum"] ."</td></tr>";
						}
					} else {
						echo "Nema podataka!";
					}

					echo "</table>";

					mysqli_close($link);
				
				?>
			</section>
		
		</main>
		
		<footer>
			Igor Mišić 2019201487 | Univerzitet Singidunum
		</footer>
	</body>
	
	
</html>