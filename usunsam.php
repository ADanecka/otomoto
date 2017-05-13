<?php
	include('db_connect.php');

	
	if(isset($_GET['idcar'])){ /* pobieranie ID samochodu z linku */ 
		$idcar = $_GET['idcar'];
		$statement = $mysqli->prepare("DELETE FROM samochod WHERE idcar = ? LIMIT 1"); /* usunięcie samochodu */
		$statement->bind_param("s",$idcar);
		$statement->execute();
		$statement->close();

		$statement2 = $mysqli->prepare("DELETE FROM wystawauto WHERE idcars = ? LIMIT 1"); /* usunięcie połączenia samochodu z użytkownikiem */
		$statement2->bind_param("s",$idcar);
		$statement2->execute();
		$statement2->close();
		
		header('Location: zalogouzytk.php');
	}
?>