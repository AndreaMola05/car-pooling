<?php
session_start();
require_once("../../../db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricerca viaggio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .viaggio {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .viaggio:last-child {
            border-bottom: none;
        }

        .viaggio p {
            margin: 5px 0;
        }

        .viaggio .partenza {
            font-weight: bold;
            color: #007bff;
        }

        .viaggio .destinazione {
            font-weight: bold;
            color: #28a745;
        }

        .viaggio .dettagli {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ricerca viaggio</h2>
        <?php


        if (isset($_SESSION['username'])) {
            $partenza = strtolower($_POST['partenza']);
            $arrivo = strtolower($_POST['arrivo']);
            $passeggeri = strtolower($_POST['passeggeri']);


            $sql = "SELECT * FROM viaggio WHERE partenza LIKE ? AND arrivo LIKE ? AND numero_posti_disponibili >= ? AND prenotato = 0";

            if ($stmt = $db_connection->prepare($sql)) {
                $stmt->bind_param("ssi", $partenza, $arrivo, $passeggeri);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='viaggio'>";
                            echo "<p>Partenza: <span class='partenza'>" . $row['partenza'] . "</span></p>";
                            echo "<p>Destinazione: <span class='destinazione'>" . $row['arrivo'] . "</span></p>";
                            echo "<p class='dettagli'>Passeggeri: " . $row['numero_posti_disponibili'] . "</p>";
                            echo "<p class='dettagli'>Prezzo a persona: " . $row['prezzo_passeggero'] . "</p>";
                            echo "<p class='dettagli'>ID utente che offre il viaggio: " . $row['id_utente'] . "</p>";
                            echo "<p class='dettagli'>ID viaggio: " . $row['id'] . "</p>";
                            echo "</div>";
                        }

                        echo "
                            <form action='processi/accettazioneViaggio.php' method='post'>
                                <input type = 'number' name='id_viaggio' id='id_viaggio'>
                               <input type='submit' value='scegli'>
                            </form>
                            ";
                    } else {
                        echo "La ricerca non ha portato risultati";
                    }
                } else {
                    echo "Errore nell'esecuzione della query";
                }
                $stmt->close();
            } else {
                echo "Errore nella preparazione dell'istruzione SQL: " . $db_connection->error;
            }
        } else {
            echo "<center>Devi effettuare il login per visualizzare i viaggi</center>";
        }

        $db_connection->close();
        ?>

    </div>
</body>

</html>