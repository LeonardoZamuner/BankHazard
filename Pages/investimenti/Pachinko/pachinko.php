<html>
    <head>
        <script src="pachinko.js"></script>
        <link rel="stylesheet" href="pachinko.css">
    </head>
    <body>

        
        <?php
            include_once("Cards.php");
            include_once("Machine.php");
            include_once("../../../BaseFunction/BaseFunction.php");
            BaseFunction::CreateSession();
            function spin(Machine $mac, int &$numGiri, bool &$victory) : void
            {
                $first = $mac->reroll();
                $second = $mac->reroll();
                $third = $mac->reroll();
                $numGiri--;
                $victory = $mac->victoryAlgorithm($first, $second, $third);                
            }
            if(isset($_POST["configure"]) && $_POST["configure"]){
                $_SESSION["GameMode"] = $_POST["GameMode"];
                $_SESSION["somma"] = $_POST["scommessa"];
                $_SESSION["macchina"] = new Machine($_SESSION["GameMode"]);
                $victory = false;
                $_SESSION["numGiri"] = $_SESSION["GameMode"] ? 30 : 70;
                echo "sono nei settings";
            }
            
            /*for ($i = 0; $i <= PHP_INT_MAX; $i++) { if((new \Random\Randomizer())->getInt(0, 2) == 1) {
                $i -= 2;
            }
        }*/
            if($_SESSION["GameMode"]){
                ?> 
                <form action="pachinko.php" method="post">
                    <input type="submit" name="Banana" value="spin">
                </form>
                <?php
                if(isset($_POST["Banana"]) && $_POST["Banana"] == "spin")spin($_SESSION["macchina"], $_SESSION["numGiri"], $victory);
                if($victory){
                    echo "vittoria";
                    sleep(3);
                    header("Location: ../investimenti/investimenti.php");
                } 
                elseif($numGiri == 0) echo "giri terminati";
                else echo "non vittoria";
            }else{
                while($numGiri > 0 && !($victory)){
                    $first = $mac->reroll();
                    $second = $mac->reroll();
                    $third = $mac->reroll();
    
                    $victory = $_SESSION["macchina"]->victoryAlgorithm($first, $second, $third);
                    $_SESSION["numGiri"]--;
                    sleep(2);
                }
            }
            echo "Numero giri".$_SESSION["numGiri"];
            
            
        ?>
    </body>
</html>