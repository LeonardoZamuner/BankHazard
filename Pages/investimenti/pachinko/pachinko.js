var images = [ 
    "Immagini/primotassello.png",
    "Immagini/secondoTassello.png",
    "Immagini/terzotassello.png",
    "Immagini/quartoTassello.png",
    "Immagini/quintoTassello.png"
];

var a = setInterval("Animate()", 50);
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

async function takeTheFuckingJsonFromTheServer(){
    const response = await fetch('image.json');

    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.json();
    document.getElementById("imgLeft").src = "Immagini/"+data.imgLeft+".jpg";
    document.getElementById("imgCentre").src = "Immagini/"+data.imgCentre+".jpg";
    document.getElementById("imgRight").src = "Immagini/"+data.imgRight+".jpg";
}

document.getElementById("banana").addEventListener("click", async (evento)=>{
    if(a != null && a != NaN && a != undefined){
        evento.preventDefault();
        clearInterval(a);
        a = null;
        await takeTheFuckingJsonFromTheServer();
    }else{
        document.getElementById("bananaForm").submit();
    }
});

