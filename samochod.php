<!DOCTYPE html PUBLIC>

<head>
	<title>Otomoto</title>

	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="jquery.js"></script>

</head>

<body>

	<header class="gora">
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

	
	<section class="border-sam">
		<div class="">
			<h2>Opis samochodu</h2>
		</div>
		<div class="wyrownanie kolortla">
			
			<div id="fb-root"></div>
				<script>(function(d, s, id) { /* skrypt wygenerowany ze strony facebook for developer */
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.9";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				  <!-- wygenerowanie przycisku "Udostępnij" -->
				  <div class="fb-share-button" data-href="http://localhost/otomoto/samochod.php?idcar=52" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fotomoto%2Fsamochod.php%3Fidcar%3D52;src=sdkpreparse">Udostępnij</a></div>

			<?php include('db_connect.php'); 				
				$result = $mysqli->query("SELECT *FROM wystawauto INNER JOIN uzytkownicy ON wystawauto.idusers=uzytkownicy.iduser INNER JOIN samochod ON wystawauto.idcars=samochod.idcar WHERE idcar='".$_GET['idcar']."'"); /* pobranie ID samochodu */

				while( $samochod = mysqli_fetch_array($result) ){ /* wyświetlenie informacji o samochodzie i o użytkowniku po pobraniu ID */
					
					echo '<div class="obrmin">';
						echo '<div class="polowa">';
							echo '<img src="img/'.$samochod['zdjecie'].'" class="img-sam" alt=""></a><br>';
							echo '<h3>Dane sprzedawcy:</br></h3>';
							echo '<h4> Imię: '.$samochod['imie'].'</h4>';
							echo '<h4> Telefon kontaktowy: '.$samochod['telefon'].'</h4>';
							echo '<h4> Miasto: '.$samochod['miasto'].'</h4>'; 
						echo '</div>';
						echo '<div class="polowa">';
							echo '<h3>'.$samochod['marka'].' '.$samochod['model'].'</h3>';
							echo '<h3> Pojemność silnika: '.$samochod['pojsiln'].'</h3>';
							echo '<h3> Moc silnika: '.$samochod['mocsiln'].' KM</h3>';
							echo '<h3> Cena: '.$samochod['cena'].' zł</h3>';
							echo '<h3> Rok produkcji: '.$samochod['rokprod'].'</h3>';
							echo '<h3> Przebieg: '.$samochod['przebieg'].' kilometrów</h3><br>';
							echo '<h3>Opis</h3>';
							echo '<p>'.$samochod['opis'].'</p><br><br>';
						echo '</div>';
					echo '</div>';
				}
			?>
			</div>
	</section>

	<section class="form-kont kolortla3">
		<div class="przes-h2">
			<h2>Formularz kontaktowy</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<div class="polowa">
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
					<fieldset>
						<label for="name">
							<strong>Imię</strong>
						</label><br>
						<input type="text" name="imie" id="imie"><br>
						<label for="nazwisko">
							<strong>Nazwisko</strong>
						</label><br>
						<input type="text" name="nazwisko"><br>
						
						<label for="email">
							<strong>E-mail</strong>
						</label><br>
						<input type="text" name="email"><br>

						<label for="telefon">
							<strong>Telefon</strong>
						</label><br>
						<input type="text" name="telefon"><br>
						
						<label for="opis">
							<strong>Treść e-maila</strong>
						</label><br>
						<textarea name="tresc" cols="100" rows="10"></textarea>

						<input type="submit" name="wyslij" id="login" value="Wyślij" class="button" />
					</fieldset>
				</form>
			</div>

			<div class="polowa">
				<img src="icon/contact.ico" class="icon" alt="">
			</div>
		</div>
	</section>

	


	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>