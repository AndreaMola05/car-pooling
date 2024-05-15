<?php
//quando inserisci il viaggio, devi inserire anche l'id dell'utente che lo ha inserito
session_start();


require_once("../../../../db.php");

// Ottieni i valori inviati dal form
$data_inizio = $_POST["data_inizio"];
$data_fine = $_POST["data_fine"];
$numero_soste = $_POST["numero_soste"];
$aperto = $_POST["aperto"];
if ($aperto == "si") {
    $aperto = true;
} else {
    $aperto = false;
}
$prezzo_passeggero = $_POST["prezzo_passeggero"];
$animali = $_POST["animali"];
if ($animali == "si") {
    $animali = true;
} else {
    $animali = false;
}
$bagaglio = $_POST["bagaglio"];

if ($bagaglio == "si") {
    $bagaglio = true;
} else {
    $bagaglio = false;
}
$fumatori = $_POST["fumatori"];
if ($fumatori == "si") {
    $fumatori = true;
} else {
    $fumatori = false;
}
$numero_posti_disponibili = $_POST["numero_posti_disponibili"];
$numeroPatente = $_POST["numeroPatente"];
$partenza = strtolower($_POST["partenza"]);
$arrivo = strtolower($_POST["arrivo"]);

//echo "data inizio: $data_inizio" . " " . "data fine: $data_fine" . " " . "numero soste: $numero_soste" . " " . "aperto: $aperto" . " " . "prezzo passeggero: $prezzo_passeggero" . " " . "animali: $animali" . " " . "bagaglio: $bagaglio" . " " . "fumatori: $fumatori" . " " . "numero posti disponibili: $numero_posti_disponibili" . " " . "numero patente: $numeroPatente";

$sql = "SELECT data_scadenza_patente FROM utente WHERE numero_patente = ?";
$result_id = 0;
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


if ($stmt = $db_connection->prepare($sql)) {
    // Associa il parametro e setta il tipo di dato
    $stmt->bind_param("s", $numeroPatente);

    if ($stmt->execute()) {
        // Ottieni il risultato della query
        $result = $stmt->get_result();

        // Verifica se esiste un utente con il numero di patente fornito
        if ($result->num_rows == 1) {
            // Ottieni la data di scadenza della patente
            $row = $result->fetch_assoc();
            $dataScadenza = $row['data_scadenza_patente'];           

                $sql_insert = "INSERT INTO viaggio (data_inizio, data_fine, numero_soste, aperto, prezzo_passeggero, animali, bagaglio, fumatori, numero_posti_disponibili, id_utente, partenza, arrivo) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                if ($stmt_insert = $db_connection->prepare($sql_insert)) {
                    // Associa i parametri e setta i tipi di dato
                    $stmt_insert->bind_param("ssiidiiiiiss", $data_inizio, $data_fine, $numero_soste, $aperto, $prezzo_passeggero, $animali, $bagaglio, $fumatori, $numero_posti_disponibili, $result_id, $partenza, $arrivo);

                    // Esegui l'istruzione INSERT
                    if ($stmt_insert->execute()) {
                        
                        header("Location: ../inserimentoVettura.html");
                    } else {
                        echo "Errore nell'esecuzione dell'istruzione INSERT: " . $stmt_insert->error;
                    }

                    // Chiudi lo statement INSERT
                    $stmt_insert->close();
                } else {
                    echo "Errore nella preparazione dell'istruzione SQL di inserimento: " . $db_connection->error;
                }
            
        } else {
            echo "Errore: Numero di patente non trovato.";
        }
    } else {
        echo "Errore nell'esecuzione della query";
    }

    // Chiudi lo statement SELECT
    $stmt->close();
} else {
    echo "Errore nella preparazione dell'istruzione SQL: " . $db_connection->error;
}

// Chiudi la connessione al database
$db_connection->close();
