<?php
    include_once("../BaseFunction/BaseFunction.php");
    include_once("../BaseFunction/CryptoFunctions.php");
    $conn = BaseFunction::DBconnection();
    $criptofunzione = new CryptoFunctions(hash('sha128', "MiDevoInventareVelocementeUnaFraseDaUsarePerCriptareIMieiDati101110004111011!!!UwU"), 'AES-128-CBC');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["email"]) && isset($_POST["pass"])){
            $email = $_POST["email"];
            $cryptoMail = $criptofunzione->Cryptazionamento($email);
            $pass = $_POST["pass"];
            $myquery = "SELECT * FROM utenti WHERE email = ? AND password = ?";
            $result = $conn->prepare($myquery);
            $result->bind_param("ss", $cryptoMail, $passmd5);
            $result->execute();
            $result = $result->get_result();
            if($result->num_rows>0){
                BaseFunction::CreateSession();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $pass;
                header("Location: ../Pages/homepage/homepage.php");
            }else{
                echo "Email e/o password errati";
            }
        } else {
            echo "Si prega di compilare tutti i campi";
        }
    }
    $conn->close();
?>