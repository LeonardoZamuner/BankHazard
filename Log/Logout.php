<?php
    include_once("../BaseFunction/BaseFunction.php");
    BaseFunction::CreateSession();
    // elimina le variabili di sessione impostate
    $_SESSION = array();
    // elimina la sessione
    session_destroy();
    header("Location: Login.html");
?>