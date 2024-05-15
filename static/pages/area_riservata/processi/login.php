<?php

session_start();
require_once("../../../../db.php");

// Ottieni i valori inviati dal form
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];

// Prepara la query SQL utilizzando una dichiarazione preparata
$sql = "SELECT nome, cognome FROM utente WHERE nome like ? AND cognome like ? and email like ?";

if ($stmt = $db_connection->prepare($sql)) {
    // Associa i parametri e setta i tipi di dato
    $stmt->bind_param("sss", $nome, $cognome, $email);

    // Esegui la query
    if ($stmt->execute()) {
        // Ottieni il risultato della query
        $result = $stmt->get_result();

        // Verifica se esiste un utente con le credenziali fornite
        if ($result->num_rows == 1) {
            // Login riuscito, imposto la variabile di sessione e reindirizzo alla home page
            $_SESSION['username'] = $email;
            header("Location: ../../../../index.php");
            exit;
        } else {
            echo "Credenziali non valide";
        }
    } else {
        echo "Errore nell'esecuzione della query";
    }

    // Chiudi lo statement
    $stmt->close();
} else {
    echo "Errore nella preparazione della query";
}

// Chiudi la connessione al database
$db_connection->close();
