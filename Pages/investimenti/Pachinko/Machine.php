<?php
    include_once("Cards.php");
    class Machine{
        private const INITIAL_PROBABILITY = 256;
        private int $incomingProbabilty = self::INITIAL_PROBABILITY;
        private bool $mode = true;
        public function __construct(bool $mode) {
            $this->mode = $mode;
        }
        function changeMode() : void {
            $this->mode = !$this->mode;
        }
        function reroll() : Card {
            return new Card(rand(0,6));
        }
        function victoryAlgorithm(Card $first, Card $second, Card &$third) : bool {
            if($this->mode)
                if($first == $second && $second == $third && $first == $third){
                    $won = self::wonnaWin($third);
                    if($won === true){
                        $this->incomingProbabilty = self::INITIAL_PROBABILITY;
                        return true;
                    }else{
                        $third->impostaCarta($third->valore);
                        $this->incomingProbabilty *= 2;
                        return false;
                    }
                }else if($first == $second || $second == $third || $third == $first){
                    $this->incomingProbabilty *= 2;
                    return false;
                }else{
                    return false;
                }
            else{
                if($first == $second && $second == $third && $first == $third){
                    $this->incomingProbabilty = self::INITIAL_PROBABILITY;
                    return true;
                }else{
                    return false;
                }
            }
        }
        function wonnaWin(Card &$val) : bool | int {
            if(rand(0, $this->incomingProbabilty) == 1)return true;
            else if($val->valore < 6) return $val->valore+1;
            else return $val->valore-1;
        }
    }
?>