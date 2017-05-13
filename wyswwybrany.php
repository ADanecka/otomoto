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
			<h2>Znalezione samochody</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<?php include('db_connect.php'); 
				

				if(isset($_GET['wyslij'])){	/* wysłanie wprowadzonych danych */
					$marka = $_GET['marka'];
					$model = $_GET['model'];
					$cenaod = $_GET['cenaod'];
					$cenado = $_GET['cenado'];
					$rok = $_GET['rok'];
					$przebiegod = $_GET['przebiegod'];
					$przebiegdo = $_GET['przebiegdo'];

					if(($_GET['marka'] == '') && ($_GET['model'] == '')){ /* instrukcja kiedy marka i model nie zostały wybrane, reszta jest obowiązkowa */
						$result= $mysqli->query("SELECT *FROM samochod WHERE (cena BETWEEN $cenaod AND $cenado) AND (rokprod >= $rok) AND (przebieg BETWEEN $przebiegod AND $przebiegdo) ORDER BY idcat");
						

						$obAmount=mysqli_num_rows($result); /* zliczenie ilości samochodów po wprowadzeniu i szukaniu */ 
						
						if($obAmount<1){
							echo '<h2>Brak samochodów!</h2><br><br>';
						}else {
							for($x=0;$x<$obAmount;$x++) /* pętla odpowiadająca za wyświetlenie wszystkich samochodów */ 
							{
								$samochod=mysqli_fetch_assoc($result);

								echo '<a href='.'samochod.php?idcar='.$samochod['idcar'].'><div class="obrmin">'; 
									echo '<div class="polowa">';
										echo '<img src="img/'.$samochod['zdjecie'].'" class="img" alt=""><br>';
									echo '</div>';
									echo '<div class="polowa">';
										echo '<h3>'.$samochod['marka'].' '.$samochod['model'].'</h3>';
										echo '<h3> Cena '.$samochod['cena'].' zł '.' Rok '.$samochod['rokprod'].'</h3>';
										echo '<h3>Krótki opis</h3>';
										echo '<p>'.substr($samochod['opis'],0,30).'...</p><br><br>'; /*funkcja substr() skraca ciąg znaków*/
									echo '</div>';
								echo '</div></a>';
							}
						}
					}else{ /* instrukcja wykonująca się jeśli model i marka zostały wybrane */

							$result= $mysqli->query("SELECT *FROM samochod WHERE (marka LIKE '$marka') AND (model LIKE '$model') AND (cena BETWEEN $cenaod AND $cenado) AND (rokprod >= $rok) AND (przebieg BETWEEN $przebiegod AND $przebiegdo)");
							

							$obAmount=mysqli_num_rows($result);
							
							if($obAmount<1){
								echo '<h2>Brak samochodów!</h2><br><br>';
							}else {
								for($x=0;$x<$obAmount;$x++)
								{
									$samochod=mysqli_fetch_assoc($result);

									echo '<a href='.'samochod.php?idcar='.$samochod['idcar'].'><div class="obrmin">';
										echo '<div class="polowa">';
											echo '<img src="img/'.$samochod['zdjecie'].'" class="img" alt=""><br>';
										echo '</div>';
										echo '<div class="polowa">';
											echo '<h3>'.$samochod['marka'].' '.$samochod['model'].'</h3>';
											echo '<h3> Cena '.$samochod['cena'].' zł '.' Rok '.$samochod['rokprod'].'</h3>';
											echo '<h3>Krótki opis</h3>';
											echo '<p>'.substr($samochod['opis'],0,30).'...</p><br><br>'; /*funkcja substr() skraca ciąg znaków*/
										echo '</div>';
									echo '</div></a>';
								}
						
							}
						}
					}

			?>
		</div>
	</section>


	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>