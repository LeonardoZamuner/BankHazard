var images = [ 
    "Immagini/primotassello.png",
    "Immagini/secondoTassello.png",
    "Immagini/terzotassello.png",
    "Immagini/quartoTassello.png",
    "Immagini/quintoTassello.png"
]; 

setInterval("Animate()", 50); 

function Animate() {
    var x = 0; 
    document.getElementById("imgLeft").src = images[x];
    document.getElementById("imgCentre").src = images[x];
    document.getElementById("imgRight").src = images[x];
    x++; 
    if (images.length == x) { 
        x = 0; 
    } 
}

function retardedSpinForAutospin(){
    jQuery.ajax({
        type: "POST",
        url: 'pachinko.php',
        dataType: 'json',
        data: {functionname: 'add', arguments: [1, 2]},

        success: function (obj, textstatus) {
            if( !('error' in obj) ) {
                yourVariable = obj.result;
            }
            else {
                console.log(obj.error);
            }
        }
    });
}
