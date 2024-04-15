<?php
    $conn = BaseFunction::DBconnection();

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
                $password_hash = md5($password);
                $insert_query = "INSERT INTO utenti (Nome, Cognome, email, pass, CF) VALUES (?, ? ,?, ?, ?)";
                $result = $conn->prepare($insert_query);
                $result->bind_param("sssss",$nome, $cognome, $email, $passmd5, $CF);
                $result->execute();
                if ($result) {
                    BaseFunction::CreateSession();
                    $_SESSION["email"] = $email;
                    $_SESSION["pass"] = $password;
                    header("Location: ../HomePage.php");
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
