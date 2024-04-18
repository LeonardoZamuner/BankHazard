<?php 
    include_once("../BaseFunction/BaseFunction.php");
class  BankFunction{    
    function Bonifico(int $idIntestatario, string $nomeIntestatario, int $importo, string $IBAN, string $causale) : bool|string {
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
    function ZontaSchei(int $idIntestatario, int $importo) : bool|string {
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
    function CavaSchei(int $idIntestatario, int $importo) : bool|string {
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
}
?>