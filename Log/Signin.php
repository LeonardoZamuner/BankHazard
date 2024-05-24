<?php
    include_once("../BaseFunction/BaseFunction.php");
    include_once("../BaseFunction/CryptoFunctions.php");

    $conn = BaseFunction::DBconnection();
    $criptofunzione = new CryptoFunctions(sha1("MiDevoInventareVelocementeUnaFraseDaUsarePerCriptareIMieiDati101110004111011!!!UwU"), 'AES-128-CBC');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]) && isset($_POST["residenza"]) && isset($_POST["CF"]) && isset($_POST["dataNascita"]) && isset($_POST["luogoNascita"]) && isset($_POST["sesso"])) {
            $nome = $_POST["nome"];
            $crtyptoName  = $criptofunzione->Cryptazionamento($nome);
            $cognome = $_POST["cognome"];
            $crtyptoSurname  = $criptofunzione->Cryptazionamento($cognome);
            $email = $_POST["email"];
            $crtyptoEmail = $criptofunzione->Cryptazionamento($email);
            $password = $_POST["password"];
            $telefono = $_POST["telefono"];
            $crtyptoTel  = $criptofunzione->Cryptazionamento($telefono);
            $residenza = $_POST["residenza"];
            $crtyptoRes  = $criptofunzione->Cryptazionamento($residenza);
            $CF = $_POST["CF"];
            $crtyptoCF  = $criptofunzione->Cryptazionamento($CF);
            $dataNascita = $_POST["dataNascita"];
            $crtyptoNascita  = $criptofunzione->Cryptazionamento($dataNascita);
            $luogoNascita = $_POST["luogoNascita"];
            $crtyptoLuogo  = $criptofunzione->Cryptazionamento($luogoNascita);
            $sesso = $_POST["sesso"];
            $CAP = $_POST["CAP"];
            $query = "SELECT * FROM utenti WHERE email='$email'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $error_message = "L'email inserita è già associata a un account.";
            } else {
                $passmd5 = md5($password);
                $insert_query = "INSERT INTO utenti (Nome, Cognome, email, Password, CF, NumeroTelefono, CAP, Residenza, LuogoNascita, DataNascita, Sesso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $result = $conn->prepare($insert_query);
                $result->bind_param("sssssiisssi", $crtyptoName, $crtyptoSurname, $crtyptoEmail, $passmd5, $crtyptoCF, $crtyptoTel, $CAP, $crtyptoRes, $crtyptoLuogo, $crtyptoNascita, $sesso);
                $result->execute();
                if ($result) {
                    BaseFunction::CreateSession();
                    $_SESSION["email"] = $email;
                    $_SESSION["pass"] = $password;
                    header("Location: ../Pages/homepage/homepage.php");
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