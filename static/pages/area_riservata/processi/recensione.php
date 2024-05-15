<?php
session_start();
require_once("../../../../db.php");

$giudizio = $_POST['giudizio'];
$voto = $_POST['voto'];
$nome_ricevente = $_POST['riceventeNome'];
$cognome_ricevente = $_POST['riceventeCognome'];

// Esegui la query per ottenere l'ID dell'utente ricevente
$stmt_ricevente = $db_connection->prepare("SELECT id FROM utente WHERE nome LIKE ? AND cognome LIKE ?");
$stmt_ricevente->bind_param("ss", $nome_ricevente, $cognome_ricevente);
$stmt_ricevente->execute();
$result_ricevente = $stmt_ricevente->get_result();

if ($result_ricevente->num_rows > 0) {
    $row_ricevente = $result_ricevente->fetch_assoc();
    $id_utente_ricevente = $row_ricevente['id'];
} else {
    echo "Nessun utente ricevente trovato.";
    exit; // Esci dallo script se non c'è un utente ricevente
}

// Esegui la query per ottenere l'ID dell'utente scrittore
$select_scrittore = "SELECT id FROM utente WHERE nome LIKE ?";
$stmt_scrittore = $db_connection->prepare($select_scrittore);
$stmt_scrittore->bind_param("s", $_SESSION['username']);
$stmt_scrittore->execute();
$result_scrittore = $stmt_scrittore->get_result();

if ($result_scrittore->num_rows > 0) {
    $row_scrittore = $result_scrittore->fetch_assoc();
    $id_utente_scrittore = $row_scrittore['id'];
} else {
    echo "Nessun utente scrittore trovato.";
    exit; // Esci dallo script se non c'è un utente scrittore
}

// Esegui l'inserimento nella tabella recensioni
$sql = "INSERT INTO recensione (giudizio, voto, id_utente_ricevente, id_utente_scrittore) VALUES (?, ?, ?, ?)";
$stmt_recensione = $db_connection->prepare($sql);
$stmt_recensione->bind_param("siii", $giudizio, $voto, $id_utente_ricevente, $id_utente_scrittore);

if ($stmt_recensione->execute()) {
    echo "Recensione inserita con successo!";
    header("Location: ../../../../index.php");
} else {
    echo "Errore durante l'inserimento della recensione: " . $stmt_recensione->error;
}

// Chiudi le connessioni e le istruzioni preparate
$stmt_ricevente->close();
$stmt_scrittore->close();
$stmt_recensione->close();
$db_connection->close();
