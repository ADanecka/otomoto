<?php include('db_connect.php'); 
	
	session_start();

	if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
		header('Location:zalogouzytk.php');
		exit();
	}

	if ( isset( $_POST['wyslij'] ) ) {
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$sql="SELECT *FROM uzytkownicy WHERE login='$login' AND haslo='$haslo'";
		
		if($result = $mysqli->query($sql)){
			$ilu_userow = $result->num_rows;
			if($ilu_userow>0){ /*jeśli komuś uda się zalogować, będzie zapisany w sesji- zalogowany*/ 
				
				/*zeby system pamietał, że jestesmy zalogowani, ustawiamy sobie taką flagę/sesję ['zalogowany']- zmienną typu boolean (true/false)*/
				$_SESSION['zalogowany'] = true;



				$rows = $result->fetch_assoc();
				
				$_SESSION['iduser'] = $rows['iduser'];
				$_SESSION['login'] = $rows['login'];
				$_SESSION['imie'] = $rows['imie'];
				$_SESSION['nazwisko'] = $rows['nazwisko'];
				$_SESSION['email'] = $rows['email'];
				$_SESSION['telefon'] = $rows['telefon'];
				$_SESSION['ulica'] = $rows['ulica'];
				$_SESSION['miasto'] = $rows['miasto'];

				unset($_SESSION['blad']); /*po poprawnym zalogowaniu usuwamy 'blad z sesji'*/
				$result->free_result();
				header('Location: zalogouzytk.php');
			}else{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>'; /*sesja ['blad'] bedzie wyswietlala na czerwono komunikat na czerwono o źle podanym haśle lub loginie*/
				header('Location:zaloguj.php');
			}
		}
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

	<header class="gora">
		<div class="wyrownanie">
			<div class="wyrownanie">
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


	<section class="zaloguj">
		<div class="przes-h2">
			<h2>Zaloguj się</h2>
		</div>
		<div class="wyrownanie kolortla2">
			<div class="polowa">
				<form action="" method="post">
					<fieldset>
						<label for="login">
							<strong>Podaj login</strong>
						</label><br>
						<input type="text" name="login"><br>
						<label for="haslo">
							<strong>Podaj hasło</strong>
						</label><br>
						<input type="password" name="haslo"><br>

						<?php
							if(isset($_SESSION['blad'])){ /*zeby wyswietlic blad musimy uzyc if'a */
								echo $_SESSION['blad'].'<br>';
							}
						?>

						<input type="submit" name="wyslij" value="Zaloguj się" class="button" />

					</fieldset>
				</form>
				<a href="rejestracja.php">Nie masz konta? Zarejestruj się!!</a>
			</div>

			<div class="polowa">
				<img src="icon/icon3.png" class="icon" alt="">
			</div>
		</div>
	</section>

	

	<footer>
		<p>Projekt wykonany przez: Danecka Agnieszka, Michałowski Oskar, Puk Dominika</p>
	</footer>
</body>
</html>