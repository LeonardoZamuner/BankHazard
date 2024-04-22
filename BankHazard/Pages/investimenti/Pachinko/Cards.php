<?php
    class Card{
        public int $valore = -1;
        private string $imgPath = null;
        public function __construct(int $var) {
            $this->valore = $var;
            $this->impostaCarta($var);
        }
        public function impostaCarta(int $val) : void {
            switch($val){
                case 0:
                    $this->imgPath = "immagine1";
                    break;
                case 1:
                    $this->imgPath = "immagine2";
                    break;
                case 2:
                    $this->imgPath = "immagine3";
                    break;
                case 3:
                    $this->imgPath = "immagine4";
                    break;
                case 4:
                    $this->imgPath = "immagine5";
                    break;
                case 5:
                    $this->imgPath = "immagine6";
                    break;
                case 6:
                    $this->imgPath = "immagine7";
                    break;
                default:
                    $this->imgPath = "Ulisse";
                    break;
            }
        
        }

    }
?>