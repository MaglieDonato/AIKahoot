let tabella=document.getElementById("tabella");
const inizio=document.getElementById("h1");
let v=document.getElementById("fine");
let vit=document.getElementById("vit");

let celle=[];
function riempiTabella(){
    for(var i=0; i<9;i++){
        const c=document.createElement("div");
        c.classList.add("cella");  
        tabella.appendChild(c);  
        celle.push(c);
    }
        
}
let x=0;

riempiTabella();

console.log(celle)



let turno = 0;
function turni() {
    for (let i = 0; i < celle.length; i++) {
        celle[i].addEventListener("click", function(event) {
            x++;        
            if (!this.classList.contains("croce") && !this.classList.contains("cerchio")) {
                if (turno % 2 === 0) {
                    this.classList.add("croce"); 
                    turno += 1;
                } else {
                    this.classList.add("cerchio"); 
                    turno += 1;
                }
                if(turno>0){
                    inizio.style.opacity="0";
                }
            }
            matrice();
            vittoria_function();
            this.removeEventListener("click", arguments.callee);
        });
    }
}
let matrice1=[[],[],[]];
turni();
function matrice(){
    let indice=0;
    let matrice2=[[],[],[]];
    for(let i =0;i<3;i++){
        for(let j=0; j<3;j++){
            matrice2[i][j]=celle[indice];
            indice++;
        }
    }
    matrice1=matrice2;
    console.log(matrice1);
}
let vittoria=0;
function vittoria_function() {
    //righe
    if (matrice1[0][0].classList.contains("cella") && matrice1[0][1].classList.contains("cella") && matrice1[0][2].classList.contains("cella") && 
        matrice1[0][0].classList.contains("croce") && matrice1[0][1].classList.contains("croce") && matrice1[0][2].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[0][0].classList.contains("cella") && matrice1[0][1].classList.contains("cella") && matrice1[0][2].classList.contains("cella") && 
               matrice1[0][0].classList.contains("cerchio") && matrice1[0][1].classList.contains("cerchio") && matrice1[0][2].classList.contains("cerchio")) {
        vittoria=2;
    }

    if (matrice1[1][0].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[1][2].classList.contains("cella") && 
        matrice1[1][0].classList.contains("croce") && matrice1[1][1].classList.contains("croce") && matrice1[1][2].classList.contains("croce")) {
        vittoria=1;
        } else if (matrice1[1][0].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[1][2].classList.contains("cella") && 
               matrice1[1][0].classList.contains("cerchio") && matrice1[1][1].classList.contains("cerchio") && matrice1[1][2].classList.contains("cerchio")) {
        vittoria=2;
    }

    if (matrice1[2][0].classList.contains("cella") && matrice1[2][1].classList.contains("cella") && matrice1[2][2].classList.contains("cella") && 
        matrice1[2][0].classList.contains("croce") && matrice1[2][1].classList.contains("croce") && matrice1[2][2].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[2][0].classList.contains("cella") && matrice1[2][1].classList.contains("cella") && matrice1[2][2].classList.contains("cella") && 
               matrice1[2][0].classList.contains("cerchio") && matrice1[2][1].classList.contains("cerchio") && matrice1[2][2].classList.contains("cerchio")) {
        vittoria=2;
    }

    //colonne
    if (matrice1[0][0].classList.contains("cella") && matrice1[1][0].classList.contains("cella") && matrice1[2][0].classList.contains("cella") && 
        matrice1[0][0].classList.contains("croce") && matrice1[1][0].classList.contains("croce") && matrice1[2][0].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[0][0].classList.contains("cella") && matrice1[1][0].classList.contains("cella") && matrice1[2][0].classList.contains("cella") && 
               matrice1[0][0].classList.contains("cerchio") && matrice1[1][0].classList.contains("cerchio") && matrice1[2][0].classList.contains("cerchio")) {
        vittoria=2;
    }

    if (matrice1[0][1].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[2][1].classList.contains("cella") && 
        matrice1[0][1].classList.contains("croce") && matrice1[1][1].classList.contains("croce") && matrice1[2][1].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[0][1].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[2][1].classList.contains("cella") && 
               matrice1[0][1].classList.contains("cerchio") && matrice1[1][1].classList.contains("cerchio") && matrice1[2][1].classList.contains("cerchio")) {
        vittoria=2;
    }

    if (matrice1[0][2].classList.contains("cella") && matrice1[1][2].classList.contains("cella") && matrice1[2][2].classList.contains("cella") && 
        matrice1[0][2].classList.contains("croce") && matrice1[1][2].classList.contains("croce") && matrice1[2][2].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[0][2].classList.contains("cella") && matrice1[1][2].classList.contains("cella") && matrice1[2][2].classList.contains("cella") && 
               matrice1[0][2].classList.contains("cerchio") && matrice1[1][2].classList.contains("cerchio") && matrice1[2][2].classList.contains("cerchio")) {
        vittoria=2;
    }

    //diagonali
    if (matrice1[0][0].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[2][2].classList.contains("cella") && 
        matrice1[0][0].classList.contains("croce") && matrice1[1][1].classList.contains("croce") && matrice1[2][2].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[0][0].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[2][2].classList.contains("cella") && 
               matrice1[0][0].classList.contains("cerchio") && matrice1[1][1].classList.contains("cerchio") && matrice1[2][2].classList.contains("cerchio")) {
        vittoria=2;
    }
    if (matrice1[0][2].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[2][0].classList.contains("cella") && 
        matrice1[0][2].classList.contains("croce") && matrice1[1][1].classList.contains("croce") && matrice1[2][0].classList.contains("croce")) {
        vittoria=1;
    } else if (matrice1[0][2].classList.contains("cella") && matrice1[1][1].classList.contains("cella") && matrice1[2][0].classList.contains("cella") && 
               matrice1[0][2].classList.contains("cerchio") && matrice1[1][1].classList.contains("cerchio") && matrice1[2][0].classList.contains("cerchio")) {
        vittoria=2;
    }
    if(vittoria==1){
        v.style.display="block";
        vit.innerHTML="HA VINTO CROCE"
    }else if(vittoria==2){
        v.style.display="block";
        vit.innerHTML="HA VINTO CERCHIO"
    }
    if(x==9){
        v.style.display="block";
        vit.innerHTML="PAREGGIO"    }
}
