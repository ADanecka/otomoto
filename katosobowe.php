<!DOCTYPE html PUBLIC>

<head>
	<title>Otomoto</title>

	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

	<header class="gora kolortla">
		<div class="wyrownanie">
			<div class="wyrownanie zmien-logo">
				<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
			</div>
			<div class="wyrownanie odstep">
				<div class="main-menu">
					<ul>
						<li><a href="kategoria.php">Kategoria</a></li>
						<li>/</li>
						<li><a href="rejestracja.php">Rejestracja</a></li>
						<li>/</li>
						<li><a href="zaloguj.php">Zaloguj się</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<section class="minaut">
		<div class="przes-h2">
			<h2>Samochody osobowe</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<?php include('db_connect.php'); 
				$result = $mysqli->query("SELECT * FROM samochod INNER JOIN kategoria ON samochod.idcat=kategoria.idcat WHERE nazwakat='Osobowy' ORDER BY idcar DESC");

				while( $samochod = mysqli_fetch_array($result) ){
					echo '<a href='.'samochod.php?idcar='.$samochod['idcar'].'><div class="obrmin">';
						echo '<div class="polowa">';
							echo '<img src="img/'.$samochod['zdjecie'].'" class="img" alt=""><br>';
						echo '</div>';
						echo '<div class="polowa">';
							echo '<h3>'.$samochod['marka'].' '.$samochod['model'].'</h3>';
							echo '<h3> Cena '.$samochod['cena'].' zł '.' Rok '.$samochod['rokprod'].'</h3>';
							echo '<h3>Krótki opis</h3>';
							echo '<p>'.substr($samochod['opis'],0,35).'...</p><br><br>';
						echo '</div>';
					echo '</div></a>';
				}
			?>
		</div>
	</section>


	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>