<?php
    include_once("../BaseFunction/BaseFunction.php");
    $conn = BaseFunction::DBconnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["email"]) && isset($_POST["pass"])){
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $myquery = "SELECT * FROM utenti WHERE email = ? AND password = ?";
            $result = $conn->prepare($myquery);
            $result->bind_param("ss", $email, $passmd5);
            $result->execute();
            $result = $result->get_result();
            if($result->num_rows>0){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $pass;
            }else{
                echo "Email e/o password errati";
            }
        } else {
            echo "Si prega di compilare tutti i campi";
        }
    }
    $conn->close();
    BaseFunction::CreateSession();
?>
