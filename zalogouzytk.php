<?php
	session_start();

	/*instrukcja blokuje niezalogowanych uzytkowników przed wejściem do pliku zalogouzyt.php z poziomu linku, czyli z ręcznego wpisania*/

	if(!isset($_SESSION['zalogowany'])){ 
		header('Location: zaloguj.php');
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">

<head>
	<title>Otomoto</title>

	<meta charset= "utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

	<header class="gora kolortla">
		<div class="wyrownanie">
			<div class="wyrownanie">
				<a href="index.php"><img src="img/logo.png" class="logo" alt=""></a>
			</div>
			<div class="wyrownanie odstep">
				<div class="main-menu">
					<ul>
						<li><a href="zalogouzytk.php">Moje konto</a></li>
						<li>/</li>
						<li><a href="kategoria.php">Kategoria</a></li>
						<li>/</li>
						<li><a href="ogloszenie.php">+ Dodaj ogłoszenie</a></li>
						<li>/</li>
						<li><a href="wyloguj.php">Wyloguj się</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="przes-h2"> <!-- informacje o zalogowanym użytkowniku są przekazywane z pliku zaloguj.php dzięki sesji -->
				<?php 
					echo '<h2>Witaj '.$_SESSION['login'].'! <br> Oto twoje dane osobowe: </h2>' 
				?>
		</div>
		<?php
			echo '<div class="wyrownanie kolortla2">';
				echo '<div class="polowa">';
					echo "<p>Imie: ".$_SESSION['imie']."</p>";
					echo "<p>Nazwisko: ".$_SESSION['nazwisko']."</p>";
					echo "<p>E-mail: ".$_SESSION['email']."</p>";
					echo "<p>Telefon: ".$_SESSION['telefon']."</p>";
				echo "</div>";
				echo '<div class="polowa">';
					echo "<p>Ulica: ".$_SESSION['ulica']."</p>";
					echo "<p>Miasto: ".$_SESSION['miasto']."</p>";
				echo "</div>";
			echo "</div>"
		?>	
	</section>

	<section class="minaut">
		<div class="przes-h2">
			<h2>Wstawione samochody</h2>
		</div>
		<div class="wyrownanie">
			<div class="obrmin">
				<div class="wyrownanie kolortla2">
					<?php include('db_connect.php'); 
						
						$iduser = $_SESSION['iduser'];

						$result = $mysqli->query("SELECT *FROM wystawauto INNER JOIN uzytkownicy ON wystawauto.idusers=uzytkownicy.iduser INNER JOIN samochod ON wystawauto.idcars=samochod.idcar WHERE iduser = '$iduser'"); /* dzięki zmiennej iduser w której zapisana jest sesja danego użytkownika, możemy wyświetlić jego wystawione samochody na sprzedaż */

						/*do wyswietlenia uzywamy petli while, do funkcji fetch_array() wstawiamy zmienna $result, pod którą jest wpisane polecenie SELECT, dzieki echo wyswietlamy potrzebne nam informacje*/
						while( $samochod = mysqli_fetch_array($result) ){
							echo '<a href='.'usunsam.php?idcar='.$samochod['idcar'].'>Usuń </a>';
							echo '<a href='.'edytujsam.php?idcar='.$samochod['idcar'].'>Edytuj </a>';

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
					?>
				</div>	
			</div>
		</div>
	</section>

	

	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>