<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Visualizzazione recensioni</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color:  #0056b3;
;
		}

		header {
			background-color: #333;
			color: #fff;
			text-align: center;
			padding: 20px 0;
		}

		h2 {
			margin-top: 0;
		}

		form {
			text-align: center;
			margin-bottom: 20px;
		}

		input[type="text"] {
			padding: 8px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}

		input[type="submit"] {
			padding: 8px 20px;
			font-size: 16px;
			border-radius: 5px;
			border: none;
			background-color: #333;
			color: #fff;
			cursor: pointer;
		}

		main {
			padding: 20px;
		}

		footer {
			background-color: #333;
			color: #fff;
			text-align: center;
			padding: 10px 0;
			position: fixed;
			bottom: 0;
			width: 100%;
		}

		footer a {
			color: #fff;
			text-decoration: none;
			margin: 0 10px;
		}

		div{

			border-bottom: 1px solid black;
		}
	</style>
</head>

<body>
	<header>
		<h2>Visualizza recensioni</h2>
	</header>

	<main>
		<?php

		require_once("../../../db.php");

		$sql = "SELECT * FROM recensione";
		$select_scrittore = "SELECT nome, cognome FROM utente";
		$stmt_scrittore = $db_connection->prepare($select_scrittore);
		$stmt_scrittore->execute();
		$result_scrittore = $stmt_scrittore->get_result();



		if ($result_scrittore->num_rows > 0) {
			$row_scrittore = $result_scrittore->fetch_assoc();
		} else {
			echo "Nessun utente scrittore trovato.";
		}

		$result = $db_connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<div>";
				echo "<h3>" . "utente scrittore numero " . $row['id_utente_scrittore'] . "</h3>";
				echo "<p>" . "giudizio: " . $row['giudizio'] . "</p>";
				echo "<p>" . "voto numerico: " . $row['voto'] . "</p>";
				echo "</div>";
			}
		} else {
			echo "Nessun risultato";
		}
		$db_connection->close();
		?>


	</main>
	<footer>
		<a href="inserisciRecensioni.php">Pagina di inserimento recensioni</a>
		<a href="../../../index.php">Home page</a>
		<a href="logout.php">Logout</a>
	</footer>
</body>

</html>