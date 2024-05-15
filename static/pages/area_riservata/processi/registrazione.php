<?php

session_start();

require_once("../../../../db.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
if (preg_match("/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/", $email)) {
    echo "L'email è valida.";
} else {
    echo "L'email non è valida.";
}
    
$password = md5($_POST["password"]);
$cognome = $_POST["cognome"];
$indirizzo = $_POST['indirizzo'];
$data_nascita = $_POST['data_nascita'];
$luogo_nascita = $_POST['luogo_nascita'];
$numero_patente = $_POST['numero_patente'];
$numero_documento_identita = $_POST['numero_documento_identita'];
$data_scadenza_patente = $_POST['data_scadenza_patente']; //se la patente è scaduta, non può pubblicare un viaggio
$numero_telefono = $_POST['numero_telefono'];

$_SESSION['username'] = $nome;
$_SESSION['password'] = $password;

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

//inserimento immagine

$immagine = $_FILES['fotografia'];

$immagine_nome = $immagine['name'];
$immagine_nome_temp = $immagine['tmp_name'];
$fileType = $_FILES['fotografia']['type'];
//echo $fileType;
if ($immagine_nome != "" && $fileType == "image/jpeg" || $fileType == "image/png") {

    move_uploaded_file($immagina_nome_temp, "images/" . $immagine_nome);
    $sql = "INSERT INTO utente 
        (nome, cognome, indirizzo, data_nascita, luogo_nascita, numero_patente, 
        numero_documento_identita, data_scadenza_patente, numero_telefono, email, password, fotografia) 
        VALUES 
        ('$nome', '$cognome', '$indirizzo', '$data_nascita', '$luogo_nascita', '$numero_patente',
        '$numero_documento_identita', '$data_scadenza_patente', '$numero_telefono', '$email', '$password', '$immagine_nome')";

    if ($db_connection->multi_query($sql) === TRUE) {
        echo "Inserimento riuscito";
        header("Location: ../../../../index.php");
    } else {
        echo "Errore nella compilazione";
    }
} else {
    echo "Errore nel caricamento dell'immagine";
    exit();
}

// Chiudi la connessione
$db_connection->close();