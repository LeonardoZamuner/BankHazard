var images = [ 
    "Immagini/primotassello.png",
    "Immagini/secondoTassello.png",
    "Immagini/terzotassello.png",
    "Immagini/quartoTassello.png",
    "Immagini/quintoTassello.png"
]; 

setInterval("Animate()", 50); 
var x = 0; 

function Animate() { 
    document.getElementById("imgLeft").src = images[x];
    document.getElementById("imgCentre").src = images[x];
    document.getElementById("imgRight").src = images[x];
    x++; 
    if (images.length == x) { 
        x = 0; 
    } 
}