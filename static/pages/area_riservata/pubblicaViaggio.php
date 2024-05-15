<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina di pubblicazione</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    width: 600px; /* Aumenta la larghezza del form */
    text-align: center;
}

h2 {
    color: #007bff;
    margin-bottom: 20px;
}

label {
    color: #007bff;
    display: block;
    margin-bottom: 5px;
}

input[type="date"],
input[type="number"],
input[type="text"],
input[type="submit"] {
    width: calc(100% - 20px);
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.form-group {
    margin-bottom: 20px;
}
    </style>
</head>

<body>

    <div class="container">
        <h2>Pubblica un viaggio</h2>


        <form action="processi/inserimentoViaggio.php" method="post">
            <label for="data_inizio">Data inizio</label>
            <input type="date" name="data_inizio" id="data_inizio" required>
            <br>
            <label for="data_fine">Data fine</label>
            <input type="date" name="data_fine" id="data_fine" required>
            <br>
            <label for="numero_soste">Numero soste</label>
            <input type="number" name="numero_soste" id="numero_soste" required>
            <br>
            <label for="aperto">Aperto</label>
            <div>
                <input type="radio" id="aperto_si" name="aperto" value="si" required>
                <label for="aperto_si">Si</label>
            </div>
            <div>
                <input type="radio" id="aperto_no" name="aperto" value="no">
                <label for="aperto_no">No</label>
            </div>

            <br>
            <label for="prezzo_passeggero">Prezzo passeggero</label>
            <input type="number" name="prezzo_passeggero" id="prezzo_passeggero" required>
            <br>
            <label for="animali">Animali</label>
            <div>
                <input type="radio" id="animali_si" name="animali" value="si" required>
                <label for="animali_si">Si</label>
            </div>
            <div>
                <input type="radio" id="animali_no" name="animali" value="no">
                <label for="animali_no">No</label>
            </div>

            <br>
            <label for="bagaglio">bagaglio</label>
            <div>
                <input type="radio" id="bagaglio_si" name="bagaglio" value="si" required>
                <label for="bagaglio_si">Si</label>
            </div>
            <div>
                <input type="radio" id="bagaglio_no" name="bagaglio" value="no">
                <label for="bagaglio_no">No</label>
            </div>

            <br>
            <label for="fumatori">fumatori</label>
            <div>
                <input type="radio" id="fumatori_si" name="fumatori" value="si" required>
                <label for="fumatori_si">Si</label>
            </div>
            <div>
                <input type="radio" id="fumatori_no" name="fumatori" value="no">
                <label for="fumatori_no">No</label>
            </div>

            <br>
            <label for="numero_posti_disponibili">Numero posti disponibili</label>
            <input type="number" name="numero_posti_disponibili" id="numero_posti_disponibili" required>
            <br>
            <label for="numeroPatente">Numero di patente</label>
            <input type="number" name="numeroPatente" id="numeroPatente" required>
            <br>
            <label for="partenza">Partenza</label>
            <input type="text" name="partenza" id="partenza" required>
            <br>
            <label for="arrivo">Arrivo</label>
            <input type="text" name="arrivo" id="arrivo" required>
            <br><br>
            <input type="submit" value="Pubblica">
        </form>

    </div>

</body>

</html>