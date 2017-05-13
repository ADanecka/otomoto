<!DOCTYPE html PUBLIC>

<head>
	<title>Otomoto</title>

	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">

	
	<script>
	function sprawdz_formularz(){
		var bledy = '';
		var f = document.forms['formularz'];

		if (f.cenaod.value.trim() == ''){
			bledy += 'Wpisz cenę od!\n';
		}else if(isNaN(f.cenaod.value)){
			bledy += 'Popraw cenę od!\n';
		}
		
		if (f.cenado.value.trim() == ''){
			bledy += 'Wpisz cenę do!\n';
		}else if(isNaN(f.cenado.value)){
			bledy += 'Popraw cenę do!\n';
		}
		
		if (f.rok.value.trim() == ''){
			bledy += 'Wstaw rok produkcji!\n';
		}else if(isNaN(f.rok.value)){
			bledy += 'Popraw rok produkcji!\n';
		}
		
		if (f.przebiegod.value.trim() == ''){
			bledy += 'Wstaw przebieg od!\n';
		}else if(isNaN(f.przebiegod.value)){
			bledy += 'Popraw przebieg od!\n';
		}
		
		if (f.przebiegdo.value.trim() == ''){
			bledy += 'Wstaw przebieg do!\n';
		}else if(isNaN(f.przebiegdo.value)){
			bledy += 'Popraw przbeieg od!\n';
		}
		
		if (bledy == ''){
			return true;
		} else{
			alert(bledy);
			return false;
		}
	}
</script>
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


	<section class="szukaj">

		<div class="przes-h2">
				<h2>Znajdź samochód</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<div class="polowa">
				<form name="formularz" action="wyswwybrany.php" method="get" onsubmit="return sprawdz_formularz()">
					<fieldset>
						<label for="markamodel">
							<strong>Marka i Model</strong>
						</label><br>
						<input type="text" name="marka" placeholder="marka">
						<input type="text" name="model" placeholder="model"><br>

						<label for="cena">
							<strong>Cena</strong>
						</label><br>
						<input type="text" name="cenaod" placeholder="od">
						<input type="text" name="cenado" placeholder="do"><br>
						
						<label for="rok-produkcji">
							<strong>Rok produkcji</strong>
						</label><br>
						<input type="text" name="rok" placeholder="od"><br>
						
						<label for="przebieg">
							<strong>Przebieg</strong>
						</label><br>
						<input type="text" name="przebiegod" placeholder="od">
						<input type="text" name="przebiegdo" placeholder="do"><br>

						<input type="submit" name="wyslij" value="Znajdź" class="button" />
					</fieldset>
				</form>
			</div>
			<div class="polowa polowa-wys">
				<img src="icon/icon1.png" class="icon" alt="">
			</div>
		</div>
	</section>

	<section class="minaut">
		<div class="przes-h2">
			<h2>Ostatnie oferty</h2>
		</div>
		<div class="wyrownanie kolortla">
			<?php include('db_connect.php'); 
				$result = $mysqli->query("SELECT * FROM samochod ORDER BY idcar DESC LIMIT 3"); /*wykonujemy polecenie do bazy, która pobiera nam ostatnie 3 dodane ogloszenia*/

				/*do wyswietlenia uzywamy petli while, do funkcji fetch_array() wstawiamy zmienna $result, pod którą jest wpisane polecenie SELECT, dzieki echo wyswietlamy potrzebne nam informacje*/
				while( $samochod = mysqli_fetch_array($result) ){
					echo '<a href='.'samochod.php?idcar='.$samochod['idcar'].'><div class="obrmin">'; /* po naciśnięciu ogłoszenia wstawiany jest w link ID samochodu dzięki czemu inne strony wiedzą o jaki samochód chodzi */ 
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
			?>
		</div>
	</section>


	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>