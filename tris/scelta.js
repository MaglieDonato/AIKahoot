const bottoneCroce=document.getElementById("bcroce");
const bottoneCerchio=document.getElementById("bcerchio");
export let sceltaUtente="";
window.sharedVariable=sceltaUtente;
bottoneCerchio.addEventListener("click", function(){
    sceltaUtente="cerchio";
    console.log(sceltaUtente)
    bottoneCerchio.disabled=true;
    bottoneCroce.disabled=true;

})

bottoneCroce.addEventListener("click", function(){
    sceltaUtente="croce";
    bottoneCerchio.disabled=true;
    bottoneCroce.disabled=true;
})