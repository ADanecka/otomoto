<?php
	session_start();

	session_unset(); /*funkcja, która "niszczy" wszystkie ustawione sesje*/

	header('Location:index.php');

?>