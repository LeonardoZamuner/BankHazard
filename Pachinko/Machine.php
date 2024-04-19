<?php
    class Machine{
        private const INITIAL_PROBABILITY = 1/256;
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
        function victoryAlgorithm(int $first, int $second, int $third) : bool {
            if($this->mode)
                if($first == $second == $third){
                    $this->incomingProbabilty = self::INITIAL_PROBABILITY;
                    return true;
                }else if($first == $second || $second == $third || $third == $first){
                    $this->incomingProbabilty *= 2;
                    return false;
                }else{
                    return false;
                }
            else{
                if($first == $second == $third){
                    $this->incomingProbabilty = self::INITIAL_PROBABILITY;
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>