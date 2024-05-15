<?php

session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Siamo - Car Pooling</title>
    <link rel="stylesheet" href="static/css/style.css">

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

header {
    background-color: #007bff;
    padding: 20px;
    border-radius: 8px 8px 0px 0px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    width: 600px;
    text-align: center;
}

h1 {
    color: #ffffff;
    margin-bottom: 20px;
}

nav {
    display: flex;
    justify-content: center;
    align-items: center;
}

nav a {
    color: #ffffff;
    text-decoration: none;
    margin: 10px;
}

.about-us {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 0px 0px 8px 8px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    width: 600px;
    text-align: center;
}

.about-us h2 {
    color: #007bff;
    margin-bottom: 20px;
}

.about-us p {
    color: #333333;
}

.about-us ul {
    list-style-type: none;
    padding: 0;
}

.about-us li {
    margin-bottom: 10px;
}

.about-us img {
    height: 400px;
    width: 400px;
    border-radius: 8px;
}

footer {
    background-color: #007bff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    width: 600px;
    text-align: center;
    margin-top: 20px;
}

footer p {
    color: #ffffff;
    margin: 0;
}
    </style>
</head>

<body>
    <header>
        <h1>Chi Siamo</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="about-us">
        <h2>Benvenuti in Car Pooling</h2>
        <p>Siamo una piattaforma di car-pooling che mira a ridurre il traffico stradale, i costi di viaggio e l'impatto
            ambientale promuovendo la condivisione delle auto.</p>
        <p>La nostra missione è connettere persone che condividono viaggi in modo sicuro, efficiente ed ecologico.</p>
        <h3>Obiettivi Principali</h3>
        <ul>
            <li>Promuovere la condivisione dei viaggi per ridurre il traffico stradale.</li>
            <li>Ridurre l'inquinamento atmosferico e l'impatto ambientale legato all'uso eccessivo di veicoli privati.
            </li>
            <li>Fornire un'opzione economica e conveniente per gli spostamenti quotidiani e i viaggi occasionali.</li>
        </ul>
        <h3>Contatti</h3>
        <p>Se hai domande, suggerimenti o vuoi collaborare con noi, contattaci:</p>
        <ul>
            <li>Email: info@carpooling.com</li>
            <li>Telefono: +39 0123 456789</li>
        </ul>
        <img src="https://st2.depositphotos.com/1005049/50665/v/950/depositphotos_506659688-stock-illustration-blue-car-tiger-driver-driving.jpg"
         >
    </section>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>