<?php include('db_connect.php'); 
	
	session_start();
	
	/*instrukcja blokuje niezalogowanych uzytkowników przed wejściem do pliku ogloszenie.php z poziomu linku, czyli z ręcznego wpisania*/
	if(!isset($_SESSION['zalogowany'])){ 
		header('Location: index.php');
		exit();
	}

$marka = '';
$model = '';
$poj = '';
$moc = '';
$rok = '';
$przeb = '';
$cena = '';
$zdjecie = '';
$opis = '';
$idcat = '';
$idcar = '';

$errorMarka = '';
$errorModel = '';
$errorPoj = '';
$errorMoc = '';
$errorRok = '';
$errorPrzeb = '';
$errorCena = '';
$errorOpis = '';
$errorIdcat = '';


if(isset($_POST['wyslij'])){	
	$marka = $_POST['marka'];
	$model = $_POST['model'];
	$poj = $_POST['poj'];
	$moc = $_POST['moc'];
	$rok = $_POST['rok'];
	$przeb = $_POST['przeb'];
	$cena = $_POST['cena'];
	$zdjecie = $_POST['zdjecie'];
	$opis = $_POST['opis'];
	$idcat = $_POST['idcat'];

	if(! ($marka && $model && $poj && $moc && $rok && $przeb && $cena && $opis && $idcat) ){

		if ( ! $marka ) {
			$errorMarka = 'Uzupełnij pole';
		} 

		if ( ! $model ) {
			$errorModel = 'Uzupełnij pole';
		} 

		if ( ! $poj ) {
			$errorPoj = 'Uzupełnij pole';
		} 

		if ( ! $moc ) {
			$errorMoc = 'Uzupełnij pole';
		} 

		if ( ! $rok ) {
			$errorRok = 'Uzupełnij pole';
		} 

		if ( ! $przeb ) {
			$errorPrzeb = 'Uzupełnij pole';
		} 

		if ( ! $cena ) {
			$errorCena = 'Uzupełnij pole';
		} 

		if ( ! $opis ) {
			$errorOpis = 'Uzupełnij pole';
		} 	 

		if ( ! $idcat ) {
			$errorIdcat = 'Uzupełnij pole';
		}
	}else {
		$statement = $mysqli->prepare("INSERT samochod (marka,model,pojsiln,mocsiln,rokprod,przebieg,cena,opis,zdjecie,idcat) VALUES (?,?,?,?,?,?,?,?,?,?)");
		$statement->bind_param("sssiiiissi",$marka,$model,$poj,$moc,$rok,$przeb,$cena,$opis,$zdjecie,$idcat);
		$statement->execute();
		$statement->close();
		
		header("Location:gratsam.php");
	}
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
			<h2>Wystaw samochochód</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<div class="polowa">
				<form  name="formularz" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
					<label for="name">
							<strong>Marka</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorMarka != null ) { ?>
								<?php echo $errorMarka; ?>
						<?php } ?>
					</div>
					<input type="text" name="marka" value="<?php echo $marka;?>"><br>
					
					<label for="name">
							<strong>Model</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorModel != null ) { ?>
								<?php echo $errorModel; ?>
						<?php } ?>
					</div>
					<input type="text" name="model" value="<?php echo $model;?>"><br>
					
					<label for="name">
							<strong>Pojemność silnika</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorPoj != null ) { ?>
								<?php echo $errorPoj; ?>
						<?php } ?>
					</div>
					<input type="text" name="poj" value="<?php echo $poj;?>"><br>

					<label for="name">
							<strong>Moc silnika</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorMoc != null ) { ?>
								<?php echo $errorMoc; ?>
						<?php } ?>
					</div>
					<input type="text" name="moc" value="<?php echo $moc;?>"><br>
					
					<label for="name">
							<strong>Rok produkcji</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorRok != null ) { ?>
								<?php echo $errorRok; ?>
						<?php } ?>
					</div>
					<input type="text" name="rok" value="<?php echo $rok;?>"><br>
					
					<label for="name">
							<strong>Przebieg</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorPrzeb != null ) { ?>
								<?php echo $errorPrzeb; ?>
						<?php } ?>
					</div>
					<input type="text" name="przeb" value="<?php echo $przeb;?>"><br>
					
					<label for="name">
							<strong>Cena</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorCena != null ) { ?>
								<?php echo $errorCena; ?>
						<?php } ?>
					</div>
					<input type="text" name="cena" value="<?php echo $cena;?>"><br>

					<label for="name">
							<strong>Zdjecie</strong>
					</label><br>
					<input type="file" name="zdjecie"><br>

					<label for="name">
							<strong>Kategoria</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorIdcat != null ) { ?>
								<?php echo $errorIdcat; ?>
						<?php } ?>
					</div>
					<select name="idcat" value="<?php echo $idcat;?>">
							<option></option>
							<?php include('db_connect.php');
								$result = $mysqli->query("SELECT * FROM kategoria ORDER BY idcat"); /*wykonujemy polecenie do bazy, która pobiera nam ostatnie 3 dodane ogloszenia*/
								
								while( $kategoria = mysqli_fetch_array($result) ){
									echo '<option value="'.$kategoria['idcat'].'"">'.$kategoria['nazwakat'].'</option>';
								}
							?>
					</select></br>
					
					<label for="name">
							<strong>Opis</strong>
					</label><br>
					<div class="zmien">
						<?php if ( $errorOpis != null ) { ?>
								<?php echo $errorOpis; ?>
						<?php } ?>
					</div>
					<textarea name="opis" cols="100" rows="10" value="<?php echo $opis;?>"></textarea><br>
					
					

					<input type="submit" name="wyslij" value="Dodaj" class="button" />
						
				</form>
			</div>

			<div class="polowa polowa-wys">
				<img src="icon/icon4.png" class="icon-center" alt="">
			</div>
		</div>
	</section>

	

	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>