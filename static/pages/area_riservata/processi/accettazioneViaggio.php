<?php
session_start();

// Connessione al database
require_once("../../../../db.php");

// Verifica se l'utente è loggato e se ha un'email in sessione
if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];

    $id_viaggio = $_POST['id_viaggio'];
    $accettata = rand(0, 1);

    if ($accettata == 1) {

        $accettata = true;
        // Query per inserire la prenotazione nella tabella prenotazioni
        $sql_insert_prenotazione = "INSERT INTO prenotazione (accettata, id_viaggio) VALUES (?, ?)";
        if ($stmt_insert_prenotazione = $db_connection->prepare($sql_insert_prenotazione)) {
            $stmt_insert_prenotazione->bind_param("ii", $accettata, $id_viaggio);
            if ($stmt_insert_prenotazione->execute()) {
                $sql_update_prenotato = "UPDATE viaggio SET prenotato = 1 WHERE id = ?";
                if ($stmt_prenotato = $db_connection->prepare($sql_update_prenotato)) {
                    $stmt_prenotato->bind_param("i", $id_viaggio);
                    $stmt_prenotato->execute();
                } else {
                    echo "Errore nella preparazione dell'istruzione SQL per l'aggiornamento del viaggio.";
                }
            }}
    } else {
        echo "L'utente non è loggato.";
    }
}



// Chiudi la connessione al database
$db_connection->close();

echo "<script>window.location.href = '../../../../index.php';</script>";
