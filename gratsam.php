<?php include('db_connect.php'); 
	
	session_start();
	
	/*instrukcja blokuje niezalogowanych uzytkowników przed wejściem do pliku ogloszenie.php z poziomu linku, czyli z ręcznego wpisania*/
	if(!isset($_SESSION['zalogowany'])){ 
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['wyslij'])){	
	
		$iduser = $_SESSION['iduser'];
		/*$idcar= 'SELECT AUTO_INCREMENT FROM TABLES WHERE TABLE_SCHEMA = "otomoto" AND TABLE_NAME = "samochod"';*/
		$idcar = $_POST['idcar'];

		$statement2 = $mysqli->prepare("INSERT wystawauto (idcars,idusers) VALUES (?,?)");
		$statement2->bind_param("ii",$idcar,$iduser);
		$statement2->execute();
		$statement2->close();
		header("Location:zalogouzytk.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">

<head>
	<title>Otomoto</title>

	<meta charset= "utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</script>
	
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

	<section class="szukaj">
		<div class="wyrownanie kolortla2">
			<div class="polowa polowa-wys">
				<h2>GRATULUJEMY, DODAŁEŚ SWÓJ SAMOCHÓD!</h2>
				<h3>NACIŚNIJ OK, żeby przejść dalej<h3>
			</div>
			<div class="polowa">
				<form  name="formularz" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
					<?php include('db_connect.php'); 
							$idcar = $mysqli->query("SELECT *FROM samochod ORDER BY idcar DESC LIMIT 1");

							while( $samochod = mysqli_fetch_array($idcar) ){
								echo '<input type="hidden" name="idcar" value ="'.$samochod['idcar'].'">';
							}
							
					?>

					<input type="submit" name="wyslij" value="OK" class="button" />						
				</form>
			</div>
		</div>
	</section>
	

	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>