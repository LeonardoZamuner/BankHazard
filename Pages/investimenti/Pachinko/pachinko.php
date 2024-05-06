<html>
    <head>
        
        <link rel="stylesheet" href="pachinko.css">
    </head>
    <body> 
        
        <div class="center"> 
            <img id="imgCentre" src= "Immagini/primotassello.png"> 
        </div> 
        <div class="left"> 
            <img id="imgLeft" src= "Immagini/primotassello.png"> 
        </div>
        <div class="right"> 
            <img id="imgRight" src= "Immagini/primotassello.png"> 
        </div> 
        <script src="pachinko.js"></script>
        
        <?php
            include_once("Cards.php");
            include_once("Machine.php");
            include_once("../../../BaseFunction/BaseFunction.php");
            BaseFunction::CreateSession();
            function spin(Machine $mac, int &$numGiri, bool &$victory) : bool
            {
                $first = $mac->reroll();
                $second = $mac->reroll();
                $third = $mac->reroll();
                $numGiri--;
                return $victory = $mac->victoryAlgorithm($first, $second, $third);                
            }

            if(isset($_POST["configure"]) && $_POST["configure"]){
                $_SESSION["GameMode"] = $_POST["GameMode"];
                $_SESSION["somma"] = $_POST["scommessa"];
                $_SESSION["macchina"] = new Machine($_SESSION["GameMode"]);
                $_SESSION["vittoria"] = false;
                $_SESSION["numGiri"] = $_SESSION["GameMode"] ? 30 : 70;
            }

            echo "questa è la sessione cacca:".$_SESSION["GameMode"];
            $vittoria = false;
            if($_SESSION["GameMode"] == true){
                ?>
                <div class = "bottomCentreButton">
                    <form action="pachinko.php" method="post">
                        <input type="submit" name="Banana" value="spin">
                    </form>
                </div>
                <?php
                if(isset($_POST["Banana"]) && $_POST["Banana"] == "spin")$vittoria = spin($_SESSION["macchina"], $_SESSION["numGiri"], $_SESSION["vittoria"]);
                if($vittoria){
                    echo "vittoria";
                    sleep(2);
                    header("Location: ../investimenti.php");
                } 
                elseif($_SESSION["numGiri"] <= 0) {
                    echo "giri terminati <br> Reindirizzamento in corso";
                    sleep(1);
                    header("Location: ../investimenti.php");
                }
                else echo "non vittoria";
            }else{
                while($_SESSION["numGiri"] > 0 && !($_SESSION["vittoria"])){
                    $first = $_SESSION["macchina"]->reroll();
                    $second = $_SESSION["macchina"]->reroll();
                    $third = $_SESSION["macchina"]->reroll();
    
                    $vittoria = $_SESSION["macchina"]->victoryAlgorithm($first, $second, $third);
                    $_SESSION["numGiri"]--;
                    sleep(1);
                    if($vittoria){
                        echo "vittoria";
                        sleep(2);
                        header("Location: ../investimenti.php");
                    }elseif($_SESSION["numGiri"] <= 0) {
                        echo "giri terminati <br> Reindirizzamento in corso";
                        sleep(1);
                        header("Location: ../investimenti.php");
                    }
                    else echo "non vittoria";
                }
               
            }
            echo "Numero giri".$_SESSION["numGiri"];
        ?>
    </body>
</html>