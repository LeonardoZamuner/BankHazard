<?php
    include_once("../BaseFunction/BaseFunction.php");
    $conn = BaseFunction::DBconnection();
    
    $dataToEncrypt = 'Hello World';

    $cypherMethod = 'AES-128-CBC';
    $frasePerLaChiave = "yfxayfxyusxfasxfsauyxasuyxfsaxtfsaxasyuxasuxtfasuxyfsaxfasxuyasfxusayfxsayuxfsauyxtfasxuyf";
    $key = hash('sha128', $frasePerLaChiave);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypherMethod));

    $encryptedData = openssl_encrypt($dataToEncrypt, $cypherMethod, $key, $options=0, $iv);

    echo $encryptedData;
    
    $decryptedData = openssl_decrypt($encryptedData, $cypherMethod, $key, $options=0, $iv);

    echo $decryptedData;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]) && isset($_POST["residenza"]) && isset($_POST["CF"]) && isset($_POST["dataNascita"]) && isset($_POST["luogoNascita"]) && isset($_POST["sesso"])) {
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $telefono = $_POST["telefono"];
            $residenza = $_POST["residenza"];
            $CF = $_POST["CF"];
            $dataNascita = $_POST["dataNascita"];
            $luogoNascita = $_POST["luogoNascita"];
            $sesso = $_POST["sesso"];
            $CAP = $_POST["CAP"];
            $query = "SELECT * FROM utenti WHERE email='$email'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $error_message = "L'email inserita è già associata a un account.";
            } else {
                $password_hash = md5($password);
                $insert_query = "INSERT INTO utenti (Nome, Cognome, email, Password, CF, NumeroTelefono, CAP, Residenza, LuogoNascita, DataNascita, Sesso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $result = $conn->prepare($insert_query);
                $result->bind_param("sssssiisssi", $nome, $cognome, $email, $passmd5, $CF, $telefono, $CAP, $residenza, $luogoNascita, $dataNascita, $sesso);
                $result->execute();
                if ($result) {
                    BaseFunction::CreateSession();
                    $_SESSION["email"] = $email;
                    $_SESSION["pass"] = $password;
                    header("Location: ../Page/HomePage.php");
                    exit();
                } else {
                    $error_message = "Errore durante la registrazione: " . $conn->error;
                }
            }
        } else {
            $error_message = "Si prega di compilare tutti i campi.";
        }
        header("Location: ../Pages/homepage/homepage.php");
    }
    $conn->close();
?>
