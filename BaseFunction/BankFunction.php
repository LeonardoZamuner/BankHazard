<?php 
    include_once("../BaseFunction/BaseFunction.php");
class  BankFunction{    
    public static function Bonifico(int $idIntestatario, string $nomeIntestatario, float $importo, string $IBAN, string $causale) : bool|string {
        $conn = BaseFunction::DBconnection();
        //disattivo gli autocommit per iniziare una transaction
        $conn->autocommit(false);
        //controllo se l'intestatario ha abbastanza danari
        $sql = "SELECT SaldoCorrente FROM contocorrente WHERE Intestatario = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $idIntestatario);
        $result->execute();
        $result = $result->get_result();
        $saldoCorrente = $result->fetch_assoc()["SaldoCorrente"] - $importo;
        //faccio l'update del conto altrimenti esco dalla funzione
        if($saldoCorrente >= 0){
            $sql = "UPDATE contocorrente SET SaldoCorrente = ? WHERE Intestatario = ?";
            $result = $conn->prepare($sql);
            $result->bind_param("ii", $saldoCorrente, $idIntestatario);
            $result->execute();
            $result = $result->get_result();
        }else{
            $conn->autocommit(true);
            return "not enought money, for CAPITALISM";
        }
        //Controllo conto beneficiato
        $sql = "SELECT SaldoCorrente FROM contocorrente WHERE IBAN = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $IBAN);
        $result->execute();
        $result = $result->get_result();
        $saldoCorrente = $result->fetch_assoc()["SaldoCorrente"] + $importo;
        //update conto beneficiato
        $sql = "UPDATE contocorrente SET SaldoCorrente = ? WHERE IBAN = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("ii", $saldoCorrente, $IBAN);
        $result->execute();
        $result = $result->get_result();
        if (!$conn -> commit()) {
            return "Commit transaction failed";
        }
        return true;
    }
    public static function ZontaSchei(int $idIntestatario, float $importo) : bool|string {
        $conn = BaseFunction::DBconnection();
        //controllo i danari posseduti dal gentil cittadino
        $sql = "SELECT SaldoCorrente FROM contocorrente WHERE Intestatario = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $idIntestatario);
        $result->execute();
        $result = $result->get_result();
        $saldoCorrente = $result + $importo;
        //faccio l'update del conto 
        $sql = "UPDATE contocorrente SET SaldoCorrente = ? WHERE Intestatario = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("ii", $saldoCorrente, $idIntestatario);
        $result->execute();
        $result = $result->get_result();
        return true;
    }
    public static function CavaSchei(int $idIntestatario, int $importo) : bool|string {
        $conn = BaseFunction::DBconnection();
        //controllo i danari posseduti dal gentil cittadino
        $sql = "SELECT SaldoCorrente FROM contocorrente WHERE Intestatario = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $idIntestatario);
        $result->execute();
        $result = $result->get_result();
        $saldoCorrente = $result - $importo;
        //faccio l'update del conto altrimenti esco dalla funzione
        if($saldoCorrente >= 0){
            $sql = "UPDATE contocorrente SET SaldoCorrente = ? WHERE Intestatario = ?";
            $result = $conn->prepare($sql);
            $result->bind_param("ii", $saldoCorrente, $idIntestatario);
            $result->execute();
            $result = $result->get_result();
        }else{
            return "not enought money, for CAPITALISM";
        }
        return true;
    }
    public static function newCard(string $IBAN, int $idIntestatario, int $numeroCarta, int $CVV, string $tipologia, int $contoCorrelato = null) : void
    {
        $conn = BaseFunction::DBconnection();
        if($contoCorrelato == null){
            $insert_query = "INSERT INTO carte (IBAN, Scadenza, NumeroCarta, SaldoDisponibile, SaldoContabile, CVV, Tipologia, Intestatario) VALUES (?, ? , ?, ?, ?, ?, ?, ?)";
            $result = $conn->prepare($insert_query);
            $dataScadenza = self::calcolaScadenza();
            $contantiBase = 0;
            $result->bind_param("ssiddisi", $IBAN, $dataScadenza, $numeroCarta, $contantiBase, $contantiBase, $CVV, $tipologia, $idIntestatario);
            $result->execute();
        }else{
            $insert_query = "INSERT INTO carte (IBAN, Scadenza, NumeroCarta, SaldoDisponibile, SaldoContabile, CVV, Tipologia, Intestatario, ContoCorrelato) VALUES (?, ?, ? , ?, ?, ?, ?, ?, ?)";
            $result = $conn->prepare($insert_query);
            $dataScadenza = self::calcolaScadenza();
            $contantiBase = 0;
            $result->bind_param("ssiddisii", $IBAN, $dataScadenza, $numeroCarta, $contantiBase, $contantiBase, $CVV, $tipologia, $idIntestatario, $contoCorrelato);
            $result->execute();
        }
        
    }
    public static function calcolaScadenza() : string
    {
        $dataOggi = date("Y/m/d");
        $dataScadenza = date('Y-m-d', strtotime($dataOggi. ' + 5 years'));;
        return $dataScadenza;
    }
    public static function newBankAccount(string $IBAN, int $idIntestatario) : void
    {
        $conn = BaseFunction::DBconnection();

        $insert_query = "INSERT INTO carte (IBAN, SaldoDisponibile, SaldoContabile, Intestatario) VALUES (?, ? , ?, ?)";
        $result = $conn->prepare($insert_query);
        $dataScadenza = self::calcolaScadenza();
        $contantiBase = 0;
        $result->bind_param("sddi", $IBAN, $contantiBase, $contantiBase, $idIntestatario);
        $result->execute();
    }
    public static function TakeTheCurrent(string $email) : int
    {
        $conn = BaseFunction::DBconnection();

        $sql = "SELECT * FROM utenti WHERE email=$email";
        $result = $conn->query($sql);
        $id = $result->fetch_array()["ID_utente"];

        $sql = "SELECT SaldoCorrente FROM contocorrente WHERE Intestatario=$id";
        $result = $conn->query($sql);

        return $result->fetch_array()["SaldoCorrente"];
    }
    public static function TakeTheContabile(string $email) : int
    {
        $conn = BaseFunction::DBconnection();
        $sql = "SELECT * FROM utenti WHERE email=$email";
        $result = $conn->query($sql);
        $id = $result->fetch_array()["ID_utente"];

        $sql = "SELECT SaldoContabile FROM contocorrente WHERE Intestatario=$id";
        $result = $conn->query($sql);

        return $result->fetch_array()["SaldoContabile"];
    }
}
?>