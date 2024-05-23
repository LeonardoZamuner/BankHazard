<?php 
    class  BaseFunction{
        public static function DBconnection() : mysqli{
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bankhazarddb";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connessione al database fallita: " . $conn->connect_error);
            }
            return $conn;
        }

        public static function CreateSession() : bool {
            session_save_path();
            return session_start();
        }
        public static function takeID(string $email) : int {
            $conn = BaseFunction::DBconnection();
            return $conn->query("SELECT DISTINCT ID_utente FROM utenti WHERE email = $email")->fetch_assoc();
        }
    }
?>