/*
 * Copyright (c) 2024 Donato Maglie
 * Codice di proprietà di Donato Maglie
 * Tutti i diritti riservati
 * È vietata la copia o la distribuzione non autorizzata.
 */


//Dichiarazione delle variabili

let v=document.getElementById("fine");
let vit=document.getElementById("vit");
let tabella = document.getElementById("tabella");
let m = [
    [0, 0, 0],
    [0, 0, 0],
    [0, 0, 0]
];
const matrice = [];
const colonne = 3;
const righe = 3;
let x = 0;
let y = 0;
let celle = []; 
let hoDifeso = false;
let hoAttaccato = false;
let vincitore = 0;
let bot="";
let utente="";
let nUtente=0;
let nBot=0;
let fatto=false;
let primo=0;
let secondo=0;
let casuale=0;
let c = 0;
let winner="";
let urlParams = new URLSearchParams(window.location.search);
let sceltaUtente = urlParams.get('valore');

//-----------------------------------------------------------------------------------------

//In base alla scelta dell'utente effettuata nella pagina "scelta.html" assegno la croce e il cerchio al bot o all'utente

if(sceltaUtente=="cerchio"){
    utente="cerchio"
    bot="croce";
    nUtente=2;
    nBot=1;
}else{
    utente="croce";
    bot="cerchio";
    nUtente=1;
    nBot=2;
    
}

//Con questa funzione riempio la tabella con le celle in modo dinamico 

function riempiTabella() {
    for (var i = 0; i < 9; i++) {
        const c = document.createElement("div");
        c.classList.add("cella");
        tabella.appendChild(c);
        celle.push(c);
    }
}
riempiTabella();

//Con questa funzione genero un numero casuale che determina che inizia a giocare

function inizio(){
    casuale=Math.floor(Math.random() * 2);
}
inizio()

//In base al numero generato nella funzione "inizio()" assegno le variabili primo e secondo, che definiscono il susseguirsi dei turni

if(casuale==1){
    primo=0;
    secondo=1
}
else{
    secondo=0;
    primo=1;
}

//Nel caso in cui deve cominciare il bot allora faccio eseguire la prima mossa in modo casuale

if(primo==1){
    secondaMossa();
    c++
}

//Questa funzione gestisce i turni del bot e dell utente

function turni() {
    for (let i = 0; i < celle.length; i++) {
        celle[i].addEventListener("click", function (event) {
            let turno = c;
            hoAttaccato=false;
            hoDifeso=false;

            //Controllo che la cella sia vuota

            if (!this.classList.contains(utente) && !this.classList.contains(bot)) {
                
                //Questa è la parte che gestisce la mossa effettuata dall'utente

                if (turno % 2 ==primo) {
                    this.classList.add(utente);

                    //Incremento turno

                    c += 1;

                    //Funzione che determina il vincitore

                    winner=terminaGioco();
                    if(winner=="pareggio"){
                        v.style.display="block";
                        vit.innerHTML="PAREGGIO";
                    } else if(winner=="cerchio"){
                        v.style.display="block";
                        vit.innerHTML="HA VINTO CERCHIO";
                    }else if(winner=="croce"){
                        v.style.display="block";
                        vit.innerHTML="HA VINTO CROCE";
                    }else{

                    }
                }

                //Questa è la parte che gestisce le messo effettuate dal bot

                setTimeout(function () {
                    if (c % 2 == secondo) {

                        //Prima il bot verifica se è c'è una possibilità di vittoria

                        hoAttaccato = botAttacco()

                        //Se non ci sono possibilità controlla se ci sono delle situazioni critiche da difendere

                        if (!hoAttaccato) {
                            hoDifeso = botDifesa()
                        }

                        //Nel caso in cui non ci sono possibiltà di vittoria e non ci sono situazioni critiche, allora inizia a costruire una   strategia di attacco

                        if (!hoDifeso && !hoAttaccato) {
                            let controllo=0;
                            fatto=false;
                            for(let i=0;i<3;i++){
                                for (let j=0;j<3;j++){
                                    if(m[i][j]==nBot){
                                        controllo=0;

                                        //Verifica prima se può iniziare a costruire un attacco sulle righe

                                        if(controllo !=3){
                                            for(let x=0;x<3;x++){
                                                if(m[i][x]!=nUtente){
                                                    controllo++;
                                                }
                                                if(controllo==3 && j<2){
                                                    matrice[i][j+1].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                                if(controllo==3 && j==2){
                                                    matrice[i][j-1].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                                
                                            }
                                        }

                                        //Poi se nelle righe non è possibile allora vengono verificate le colonne

                                        if(controllo!=3){
                                            controllo=0;
                                            for(let x=0;x<3;x++){
                                                if(m[x][j]!=nUtente){
                                                    controllo++;
                                                }
                                                if(controllo==3 && i<2){
                                                    matrice[i+1][j].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                                if(controllo==3 && i==2){
                                                    matrice[i-1][j].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                            }
                                        }

                                        //Nel caso in cui nè alle righe nè alle colonne è possibile si verifica la prima diagonale

                                        if(controllo!=3){
                                            controllo=0;
                                            for(let x=0;x<3;x++){
                                                if(m[x][x]!=nUtente){
                                                    controllo++;
                                                }
                                                if(controllo==3 && x<2){
                                                    matrice[x+1][x+1].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                                if(controllo==3 && x==2){
                                                    matrice[x-1][x-1].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                            }
                                        }

                                        //Nel caso in cui non c'è possibilità nè per le righe, nè per le colonne e nè per la prima diagonale verifica anche l'ultima diagonale

                                        if(controllo!=3){
                                            controllo=0;
                                            let y = 2;
                                            for (let x = 0; x < 3; x++) {
                                                if(m[x][y]!=nUtente){
                                                    controllo++;
                                                }
                                                if(controllo==3 && x<2 && y>0){
                                                    matrice[x+1][y-1].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                                if(controllo==3 && x==2 && y==0){
                                                    matrice[x-1][y+1].classList.add(bot);
                                                    fatto=true;
                                                    break
                                                }
                                                y--;
                                            }
                                            
                                        }
                                    }

                                    //Se è stata eseguita una delle prime 4 possibilità allora esce dal ciclo

                                    if(fatto){
                                        break
                                    }
                                }
                                
                            }

                            //Se fino a questo momento non è stata eseguita nessuna mossa, allora esegue una mossa casuale, per evitare che il programma si blocchi 

                            if(!fatto){
                                secondaMossa();
                            }
                        }

                        //Incremento del turno

                        c += 1;

                        //Funzione che determina il vincitore

                        winner=terminaGioco();
                        
                        if(winner=="pareggio"){
                            v.style.display="block";
                            vit.innerHTML="PAREGGIO";
                        } else if(winner=="cerchio"){
                            v.style.display="block";
                            vit.innerHTML="HA VINTO CERCHIO";
                        }else if(winner=="croce"){
                            v.style.display="block";
                            vit.innerHTML="HA VINTO CROCE";
                        }else{

                        }
                    }
                }, 500);
            }

            //Tolgo la possibilità di poter ricliccare su un bottone dopo che è gia stato settato come cerchio o croce

            this.removeEventListener("click", arguments.callee);
        });
    }
}
turni();

//Funzione che serve per far eseguire una mossa casuale al bot, con il relativo controllo per evitare che una cella già occupata venga reimpostata

function secondaMossa() {
    let numeroCasuale;
    do {
        numeroCasuale = Math.floor(Math.random() * 9);
    } while (celle[numeroCasuale].classList.contains(utente) || celle[numeroCasuale].classList.contains(bot));
    celle[numeroCasuale].classList.add(bot);
}

//Funzione che gestisce la difesa del bot

function botDifesa() {

    //Popolo l'array di array "matrice[]"che farà da riferimento per la tabella di tris

    for (let i = 0; i < righe; i++) {
        const righe = [];
        for (let j = 0; j < colonne; j++) {
            const indice = i * colonne + j;
            righe.push(celle[indice]);
        }
        matrice.push(righe);
    }

    //Facendo riferimento a "matrice[]" popolo la matrice "m[]" dove 0 vuol dire che la cella è vuota, e 1 o 2 che indicano testa o croce in base alla scelta dell'utente

    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            if (matrice[i][j].classList.contains(utente) && matrice[i][j].classList.contains("cella")) {
                m[i][j] = nUtente;
            } else if (matrice[i][j].classList.contains(bot) && matrice[i][j].classList.contains("cella")) {
                m[i][j] = nBot;
            }
        }
    }

    //Dichiaro le variabili che servono per controllare se una mossa è stata eseguita o meno

    let e0 = 0;
    let e1 = 0;
    let e2 = 0;
    
    //Controllo effettuato sulle righe

    for (let i = 0; i < 3; i++) {
        x = 0;
        for (let j = 0; j < 3; j++) {
            if (m[i][j] == nUtente) {
                x++;
            }
            if (m[i][j] == nBot) {
                x - 1;
                break
            }
            if (x == 2 && j == 2) {
                fixaRiga(i, m);
                e0 = 1;
                return true
            }
        }
    }

    //Controllo effettuato sulle colonne

    if (e0 == 0) {
        for (let i = 0; i < 3; i++) {
            y = 0;
            for (let j = 0; j < 3; j++) {
                if (m[j][i] == nUtente) {
                    y++;
                }
                if (m[j][i] == nBot) {
                    y - 1;
                    break
                }
                if (y == 2 && j == 2) {
                    fixaColonna(i, m);
                    e1 = 1;
                    return true
                }
            }
        }
    }

    //Controllo effettuato sulla prima diagonale

    if (e0 == 0 && e1 == 0) {
        let z = 0;
        for (let i = 0; i < 3; i++) {
            if (m[i][i] == nUtente) {
                z++;
            }
            if (m[i][i] == nBot) {
                z - 1;
                break
            }
            if (z == 2 && i == 2) {
                fixaDiagonale1(m);
                e2 = 1;
                return true
            }
        }
    }

    //Controllo effettuato sulla seconda diagonale

    let p = 0;
    if (e0 == 0 && e1 == 0 && e2 == 0) {
        let j = 2;
        for (let i = 0; i < 3; i++) {
            if (m[i][j] == nUtente) {
                p++;
            }
            if (m[i][j] == nBot) {
                p - 1;
                break;
            }
            if (p == 2 && i == 2) {
                fixaDiagonale2(m);
                return true
            }
            j--;
        }
    }

    //Resetto le variabili utilizzate per i controlli

    e0 = 0;
    e1 = 0;
    e2 = 0;
    return false;
}

//Questa funzione in caso di pericolo sulla riga inserisce nella cella libera la contromossa

function fixaRiga(i, m) {
    for (let j = 0; j < 3; j++) {
        if (m[i][j] == 0 && m[i][j] != nBot) {
            matrice[i][j].classList.add(bot);
            return;
        }
    }
}

//Questa funzione in caso di pericolo sulla colonna inserisce nella cella libera la contromossa

function fixaColonna(i, m) {
    for (let j = 0; j < 3; j++) {
        if (m[j][i] == 0 && m[j][i] != nBot) {
            matrice[j][i].classList.add(bot);
            return;
        }
    }
}

//Questa funzione in caso di pericolo sulla diagonale 1 inserisce nella cella libera la contromossa

function fixaDiagonale1(m) {
    for (let j = 0; j < 3; j++) {
        if (m[j][j] == 0 && m[j][j] != nBot) {
            matrice[j][j].classList.add(bot);
            return;
        }
    }
}

//Questa funzione in caso di pericolo sulla diagonale 2 inserisce nella cella libera la contromossa

function fixaDiagonale2(m) {
    let j = 2;
    for (let i = 0; i < 3; i++) {
        if (m[i][j] == 0 && m[i][j] != nBot) {
            matrice[i][j].classList.add(bot);
            return;
        }
        j--;
    }
}

//Questa funzione gestisce l'attacco del bot

function botAttacco() {

    //Popolo l'array di array "matrice[]"che farà da riferimento per la tabella di tris

    for (let i = 0; i < righe; i++) {
        const righe = [];
        for (let j = 0; j < colonne; j++) {
            const indice = i * colonne + j;
            righe.push(celle[indice]);
        }
        matrice.push(righe);
    }

    //Facendo riferimento a "matrice[]" popolo la matrice "m[]" dove 0 vuol dire che la cella è vuota, e 1 o 2 che indicano testa o croce in base alla scelta dell'utente

    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            if (matrice[i][j].classList.contains(utente) && matrice[i][j].classList.contains("cella")) {
                m[i][j] = nUtente;
            } else if (matrice[i][j].classList.contains(bot) && matrice[i][j].classList.contains("cella")) {
                m[i][j] = nBot;
            }
        }
    }

    //Viene verificato se in riga c'è una possibilità di vittoria

    for (let i = 0; i < 3; i++) {
        x = 0;
        for (let j = 0; j < 3; j++) {
            if (m[i][j] == nBot) {
                x++;
            }
            if (m[i][j] == nUtente) {
                x - 1;
                break;
            }
            if (x == 2 && j == 2) {
                completaRiga(i, m);
                return true;
            }
        }
    }

    //Viene verificato se in colonna c'è una possibilità di vittoria

    for (let i = 0; i < 3; i++) {
        y = 0;
        for (let j = 0; j < 3; j++) {
            if (m[j][i] == nBot) {
                y++;
            }
            if (m[j][i] == nUtente) {
                y - 1;
                break;
            }
            if (y == 2 && j == 2) {
                completaColonna(i, m);
                return true;
            }
        }
    }

    //Viene verificato se nella diagonale 1 c'è una possibilità di vittoria

    let z = 0;
    for (let i = 0; i < 3; i++) {
        if (m[i][i] == nBot) {
            z++;
        }
        if (m[i][i] == nUtente) {
            z - 1;
            break;
        }
        if (z == 2 && i == 2) {
            completaDiagonale1(m);
            return true;
        }
    }

    let p = 0;
    let j = 2;

    //Viene verificato se nella diagonale 2 c'è una possibilità di vittoria

    for (let i = 0; i < 3; i++) {
        if (m[i][j] == nBot) {
            p++;
        }
        if (m[i][j] == nUtente) {
            p - 1;
            break;
        }
        if (p == 2 && i == 2) {
            completaDiagonale2(m);
            return true;
        }
        j--;
    }
    return false;
}

//Questa funzione in caso di possibilità di vittoria effettua la mossa di attacco sulla riga

function completaRiga(i, m) {
    for (let j = 0; j < 3; j++) {
        if (m[i][j] == 0 && m[i][j] != 1) {
            matrice[i][j].classList.add(bot);
            return;
        }
    }
}

//Questa funzione in caso di possibilità di vittoria effettua la mossa di attacco sulla colonna

function completaColonna(i, m) {
    for (let j = 0; j < 3; j++) {
        if (m[j][i] == 0 && m[j][i] != 1) {
            matrice[j][i].classList.add(bot);
            return;
        }
    }
}

//Questa funzione in caso di possibilità di vittoria effettua la mossa di attacco sulla diagonale 1

function completaDiagonale1(m) {
    for (let j = 0; j < 3; j++) {
        if (m[j][j] == 0 && m[j][j] != 1) {
            matrice[j][j].classList.add(bot);
            return;
        }
    }
}

//Questa funzione in caso di possibilità di vittoria effettua la mossa di attacco sulla diagonale 2

function completaDiagonale2(m) {
    let j = 2;
    for (let i = 0; i < 3; i++) {
        if (m[i][j] == 0 && m[i][j] != 1) {
            matrice[i][j].classList.add(bot);
            return;
        }
        j--;
    }
}

//Questa funzione serve a controllare se uno dei due giocatori ha vinto

function vittoria() {

    //Popolo l'array di array "matrice[]"che farà da riferimento per la tabella di tris
    
    for (let i = 0; i < righe; i++) {
        const righe = [];
        for (let j = 0; j < colonne; j++) {
            const indice = i * colonne + j;
            righe.push(celle[indice]);
        }
        matrice.push(righe);
    }
    
    //Facendo riferimento a "matrice[]" popolo la matrice "m[]" dove 0 vuol dire che la cella è vuota, e 1 o 2 che indicano testa o croce in base alla scelta dell'utente

    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            if (matrice[i][j].classList.contains(utente) && matrice[i][j].classList.contains("cella")) {
                m[i][j] = 1;
            } else if (matrice[i][j].classList.contains(bot) && matrice[i][j].classList.contains("cella")) {
                m[i][j] = 2;
            }
        }
    }

    //Controlla nel caso in cui c'è stata una condizione di vittoria nelle righe

    let vincitore = 0;
    for (let i = 0; i < 3; i++) {
        if (m[i][0] !== 0 && m[i][0] === m[i][1] && m[i][1] === m[i][2]) {
            vincitore = m[i][0]; // Restituisce il valore del giocatore vincitore (1 per croce, 2 per cerchio)
            break;
        }
    }

    //Controlla nel caso in cui c'è stata una condizione di vittoria nelle colonne

    for (let j = 0; j < 3; j++) {
        if (m[0][j] !== 0 && m[0][j] === m[1][j] && m[1][j] === m[2][j]) {
            vincitore = m[0][j];
            break;
        }
    }

    //Controlla nel caso in cui c'è stata una condizione di vittoria nella prima diagonale

    if (m[0][0] !== 0 && m[0][0] === m[1][1] && m[1][1] === m[2][2]) {
        vincitore = m[0][0];
    }

    //Controlla nel caso in cui c'è stata una condizione di vittoria nella seconda diagonale

    if (m[0][2] !== 0 && m[0][2] === m[1][1] && m[1][1] === m[2][0]) {
        vincitore = m[0][2];
    }

    //Nel caso in cui nessuno ha vinto restituisce come valore 0

    return vincitore;
}

//Questa funzione serve per stabilire chi ha vinto in base al valore restituito da "vittoria()" ovvero(testa/croce) e in base ai valori scelti dall'utente nella pagina "scelta.html"

function terminaGioco(){
    vincitore = vittoria();
    switch (vincitore) {
        case 0:
            if (celle.length == c) {
                return "pareggio"
            } else {
                break;
            }
        case 1:
            return utente
        case 2:
            return bot
    }
}