<?php
    class CryptoFunctions{
        private $cypherMethod = 'AES-128-CBC';
        private $frasePerLaChiave = "MiDevoInventareVelocementeUnaFraseDaUsarePerCriptareIMieiDati101110004111011!!!UwU";
        private $key = hash('sha128', $frasePerLaChiave);
        private $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypherMethod));
        
        public static function Cryptazionamento(string $dataToEncrypt) : string {
            return openssl_encrypt($dataToEncrypt, self::$cypherMethod, self::$key, $options=0, self::$iv); 
        }

        public static function Decriptazionamento(string $encryptedData) : string | false {
            return openssl_decrypt($encryptedData, self::$cypherMethod, self::$key, $options=0, self::$iv);
        }
    }
?>