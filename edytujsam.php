<?php include('db_connect.php');

if(isset($_POST['wyslij'])){	
	$idcar = $_POST['idcar'];

	$marka = $_POST['marka'];
	$model = $_POST['model'];
	$pojsiln = $_POST['pojsiln'];
	$mocsiln = $_POST['mocsiln'];
	$cena = $_POST['cena'];
	$rokprod = $_POST['rokprod'];
	$przebieg = $_POST['przebieg'];
	$opis = $_POST['opis'];
	
	$statement = $mysqli->prepare("UPDATE samochod SET marka = ?, model = ?, pojsiln=?, mocsiln=?, cena=?, rokprod=?, przebieg=?, opis=? WHERE idcar=$idcar");
	$statement->bind_param("sssiiiis",$marka, $model, $pojsiln, $mocsiln, $cena, $rokprod, $przebieg, $opis);
	$statement->execute();
	$statement->close();


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
		<div class="przes-h2">
			<h2>Edytuj samochód</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<div class="polowa">
				<form  name="formularz" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
						<?php include('db_connect.php'); 
							$result = $mysqli->query("SELECT * FROM samochod WHERE idcar='".$_GET['idcar']."' ORDER BY idcar");

							while( $samochod = mysqli_fetch_array($result) ){
									echo '<div class="polowa">';
										echo '<input type="hidden" name="idcar" value ="'.$samochod['idcar'].'">';
										echo '<h3>Marka</h3><br>';
										echo '<input type="text" name="marka" value ="'.$samochod['marka'].'">';
										echo '<h3>Model</h3><br>';
										echo '<input type="text" name="model" value ="'.$samochod['model'].'">';
										echo '<h3>Pojemność silnika</h3><br>';
										echo '<input type="text" name="pojsiln" value ="'.$samochod['pojsiln'].'"><br>';
										echo '<h3>Moc silnika</h3><br>';
										echo '<input type="text" name="mocsiln" value ="'.$samochod['mocsiln'].'"><br>';
										echo '<h3>Cena</h3><br>';
										echo '<input type="text" name="cena" value ="'.$samochod['cena'].'"><br>';
										echo '<h3>Rok produkcji</h3><br>';
										echo '<input type="text" name="rokprod" value ="'.$samochod['rokprod'].'"><br>';
										echo '<h3>Przebieg</h3><br>';
										echo '<input type="text" name="przebieg" value ="'.$samochod['przebieg'].'"><br>';
										echo '<h3>Opis</h3><br>';
										echo '<textarea cols="100" rows="10" name="opis">'.$samochod['opis'].'</textarea><br>';

										echo '<input type="submit" name="wyslij" value="Edytuj" class="button" />';
									echo '</div>';
							}
						?>
				</form>
			</div>

			</div>

			<div class="polowa">
				<img src="icon/icon5.png" alt="">
			</div>
		</div>
	</section>

	

	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>