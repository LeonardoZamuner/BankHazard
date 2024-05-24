<?php
    class CryptoFunctions{

        //private $frasePerLaChiave = "MiDevoInventareVelocementeUnaFraseDaUsarePerCriptareIMieiDati101110004111011!!!UwU";
        //private $key = hash('sha128', "MiDevoInventareVelocementeUnaFraseDaUsarePerCriptareIMieiDati101110004111011!!!UwU");
        private $key;
        private $iv;
        private $cypherMethod;

        public function __construct(string $chiave, string $metodoCifratura) {
            $this->key = $chiave;
            $this->cypherMethod = $metodoCifratura;
            $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($metodoCifratura));
        }
        
        public function Cryptazionamento(string $dataToEncrypt) : string {
            return openssl_encrypt($dataToEncrypt, $this->cypherMethod, $this->key, $options=0, $this->iv); 
        }

        public function Decriptazionamento(string $encryptedData) : string | false {
            return openssl_decrypt($encryptedData, $this->cypherMethod, $this->key, $options=0, $this->iv);
        }
    }
?>