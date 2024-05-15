<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iscriviti alla Newsletter - Car Pooling</title>
    <link rel="stylesheet" href="../../static/css/style.css">
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

        .newsletter {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 0px 0px 8px 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
        }

        .newsletter h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        .newsletter form {
            display: flex;
            flex-direction: column;
        }

        .newsletter label {
            color: #333333;
            margin-bottom: 10px;
        }

        .newsletter input[type="email"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .newsletter input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
        <h1>Iscriviti alla Newsletter</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="newsletter">
        <h2>Rimani aggiornato sui nostri servizi e offerte</h2>
        <form action="#" method="post">
            <label for="email">Indirizzo Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="invia">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Car Pooling</p>
    </footer>
</body>

</html>