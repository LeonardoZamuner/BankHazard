<html>
    <head>
        <script src="pachinko.js" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="pachinko.css">
    </head>
    <body id = "bodyMachine"> 
       <div class="center"> 
            <img id="imgCentre" src= "Immagini/primotassello.png"> 
        </div> 
        <div class="left"> 
            <img id="imgLeft" src= "Immagini/primotassello.png"> 
        </div>
        <div class="right"> 
            <img id="imgRight" src= "Immagini/primotassello.png"> 
        </div>
        <?php
        
            include_once("Cards.php");
            include_once("Machine.php");
            include_once("./../../../BaseFunction/BaseFunction.php");
            //include_once("./../../../BaseFunction/BankFunction.php");
            
            BaseFunction::CreateSession();
            function spin(Machine $mac, int &$numGiri) : bool
            {
                $first = $mac->reroll();
                $second = $mac->reroll();
                $third = $mac->reroll();
                $numGiri--;
                $json = array('imgLeft' => $first->imgPath, 'imgCentre' => $second->imgPath, 'imgRight' => $third->imgPath);
                file_put_contents('json.json', json_encode($json));
                return $mac->victoryAlgorithm($first, $second, $third);
            }

            if(isset($_POST["configure"]) && $_POST["configure"]){
                $_SESSION["GameMode"] = $_POST["GameMode"];
                $_SESSION["somma"] = $_POST["scommessa"];
                $_SESSION["macchina"] = new Machine($_SESSION["GameMode"]);
                $_SESSION["vittoria"] = false;
                $banana = $_SESSION["GameMode"];
                switch($banana){
                    case 0:
                        $_SESSION["numGiri"] = 30;
                        break;
                    case 1:
                        $_SESSION["numGiri"] = 70;
                        break;
                }
            }
            $vittoria = false;
            if($_SESSION["GameMode"] == 0){
                ?>
                <div class = "bottomCentreButton">
                    <form action="pachinko.php" method="post" id = "bananaForm">
                        <button id = "banana" name = "banana" class="btn btn-danger btn-lg btn-block">SPIN</button>
                    </form>
                </div>
                <?php
                if(isset($_POST["banana"])){
                    $vittoria = spin($_SESSION["macchina"], $_SESSION["numGiri"]);
                }
                if($vittoria){
                    //BankFunction::ZontaSchei(BaseFunction::takeID($_SESSION["email"]), $_SESSION["somma"]*2);
                    echo "vittoria";
                    header("Location: ../investimenti.php");
                } 
                elseif($_SESSION["numGiri"] <= 0) {
                    //BankFunction::CavaSchei(BaseFunction::takeID($_SESSION["email"]), $_SESSION["somma"]);
                    echo "giri terminati <br> Reindirizzamento in corso";
                    sleep(1);
                    header("Location: ../investimenti.php");
                }
            }else{
                while($_SESSION["numGiri"] > 0 && !($_SESSION["vittoria"])){
                    $first = $_SESSION["macchina"]->reroll();
                    $second = $_SESSION["macchina"]->reroll();
                    $third = $_SESSION["macchina"]->reroll();
    
                    $vittoria = $_SESSION["macchina"]->victoryAlgorithm($first, $second, $third);
                    $_SESSION["numGiri"]--;
                    sleep(1);
                    if($vittoria){
                        //BankFunction::ZontaSchei(BaseFunction::takeID($_SESSION["email"]), $_SESSION["somma"]*2);
                        header("Location: ../investimenti.php");
                    }elseif($_SESSION["numGiri"] <= 0) {
                        //BankFunction::CavaSchei(BaseFunction::takeID($_SESSION["email"]), $_SESSION["somma"]);
                        sleep(1);
                        header("Location: ../investimenti.php");
                    }
                    else echo "non vittoria";
                }
               
            }
        ?>
    </body>
</html>