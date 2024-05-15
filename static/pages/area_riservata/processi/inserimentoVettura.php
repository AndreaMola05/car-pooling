<?php

session_start();

require_once("../../../../db.php");


// Ottieni i valori inviati dal form in futuro
$targa = $_POST['targa'];
$casaProduttrice = $_POST['casaProduttrice'];
$modello = $_POST['modello'];
$numeroPosti = $_POST['numeroPosti'];
$annoImmatricolazione = $_POST['annoImmatricolazione'];
$numeroPatente = $_POST['numeroPatente'];
$colore = $_POST['colore'];
$chilometri = $_POST['chilometri'];
$carburante = $_POST['carburante'];
$cilindrata = $_POST['cilindrata'];

$select_id = "SELECT id FROM utente WHERE numero_patente = ?";
if ($stmt_id = $db_connection->prepare($select_id)) {
    $stmt_id->bind_param("s", $numeroPatente);
    if ($stmt_id->execute()) {
        $result_id = $stmt_id->get_result();
        $row_id = $result_id->fetch_assoc();
        $result_id = $row_id['id'];
    } else {
        echo "Errore nell'esecuzione della query";
    }
    $stmt_id->close();
} else {
    echo "Errore nella preparazione dell'istruzione SQL: " . $db_connection->error;
}

$sql_insert = "INSERT INTO automobile (targa, casa_produttrice, modello, numero_posti, colore, anno_immatricolazione, chilometri, carburante, cilindrata, id_utente) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt_insert = $db_connection->prepare($sql_insert)) {
    // Associa i parametri e setta i tipi di dato
    $stmt_insert->bind_param("sssissisii", $targa, $casaProduttrice, $modello, $numeroPosti, $colore, $annoImmatricolazione, $chilometri, $carburante, $cilindrata, $result_id);

    // Esegui l'istruzione INSERT
    if ($stmt_insert->execute()) {
        echo "Dati inseriti correttamente nella tabella automobile.";
    } else {
        echo "Errore nell'esecuzione dell'istruzione INSERT: " . $stmt_insert->error;
    }

    // Chiudi lo statement INSERT
    $stmt_insert->close();
} else {
    echo "Errore nella preparazione dell'istruzione SQL di inserimento: " . $db_connection->error;
}

// Chiudi la connessione al database
$db_connection->close();
