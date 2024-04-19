<?php
    include_once("Cards.php");
    include_once("Machine.php");

    $checkMode = $_POST["modalita"];

    if($checkMode != "" || $checkMode != null || !isset($checkMode))
        $checkMode = true;
    else
        $checkMode = false;

    $mac = new Machine($checkMode);
    $victory = false;
    $numGiri = $checkMode ? 30 : 70;

    while($numGiri > 0 && !($victory)){
        $first = $mac->reroll();
        $second = $mac->reroll();
        $third = $mac->reroll();

        $victory = $mac->victoryAlgorithm($first, $second, $third);
    }
?>