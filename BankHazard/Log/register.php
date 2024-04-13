<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tecnoteca";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]) && isset($_POST["residenza"])) {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $telefono = $_POST["telefono"];
        $residenza = $_POST["residenza"];
        $query = "SELECT * FROM utenti WHERE email='$email'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $error_message = "L'email inserita è già associata a un account.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO utenti (nome, cognome, email, password, telefono, residenza) VALUES ('$nome', '$cognome', '$email', '$password_hash', '$telefono', '$residenza')";
            if ($conn->query($insert_query) === TRUE) {
                $_SESSION["user_id"] = $conn->insert_id;
                header("Location: dashboard.php");
                exit();
            } else {
                $error_message = "Errore durante la registrazione: " . $conn->error;
            }
        }
    } else {
        $error_message = "Si prega di compilare tutti i campi.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registrazione</h2>
        <?php
        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
        <form method="post" action="">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <label for="cognome">Cognome:</label>
            <input type="text" name="cognome" id="cognome" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <label for="telefono">Telefono:</label>
            <input type="tel" name="telefono" id="telefono" required>
            <label for="residenza">Residenza:</label>
            <input type="text" name="residenza" id="residenza" required>
            <input type="submit" value="Registrati">
        </form>
        <p>Hai già un account? <a href="login.php">Accedi</a></p>
    </div>
</body>

</html>