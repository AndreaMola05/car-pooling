<?php
session_start();

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Pooling home page</title>
    <style>
       body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

header {
  background-color: #007bff;
  color: #fff;
  padding: 20px;
  text-align: center;
}

h1 {
  margin: 0;
}

nav {
  margin-top: 20px;
}

nav a {
  color: #fff;
  text-decoration: none;
  margin: 0 10px;
}

nav a:hover {
  text-decoration: underline;
}

.immagine_principale {
  text-align: center;
  margin-top: 20px;
}

.immagine_principale img {
  max-width: 100%;
  height: auto;
}

main {
  margin: 20px;
}

form {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="number"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

footer {
  background-color: #007bff;
  color: #fff;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;
}

    </style>
</head>

<body>
    <header>

        <?php if (!isset($_SESSION['username'])): ?>
            <h1>Accedi o registrati su Car Pooling</h1>
            <nav>
                <a href="static/pages/area_riservata/login.html">Accedi</a>
                <a href="static/pages/area_riservata/registrazione.html">Registrati</a>

            </nav>

            <div class="immagine_principale">
                <img src="https://st3.depositphotos.com/6751976/14041/v/950/depositphotos_140411090-stock-illustration-funny-blue-car-with-eyes.jpg"
                    alt="immagine macchina">

            </div>
        <?php else: ?>
            <h1>Benvenuto su Car Pooling</h1>
            <a href="static/pages/area_riservata/logout.php">Logout</a>

            <a href="static/pages/area_riservata/inserisciRecensioni.html">Inserisci recensione</a>
            <a href="static/pages/area_riservata/visualizzaRecensioni.php">Visualizza recensioni</a>
            <a href="static/pages/area_riservata/pubblicaViaggio.php">Pubblica passaggio</a>
            <a href="static/pages/newsletter.php">Newsletter</a>
            <a href="static/pages/chiSiamo.php">Chi Siamo</a>
        </header>
        <main>

            <form action="static/pages/area_riservata/ricercaViaggio.php" method="post" class="container">
                <label for="partenza">Partenza</label>
                <input type="text" name="partenza" id="partenza" required>
                <label for="arrivo">Arrivo</label>
                <input type="text" name="arrivo" id="arrivo" required>

                <label for="data">Data</label>
                <input type="date" name="data" id="data" required>
                <label for="passeggeri">Numero passeggeri</label>
                <input type="number" name="passeggeri" id="passeggeri" required>
                <input type="submit" value="cerca">
            </form>

        </main>
    <?php endif; ?>







    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>