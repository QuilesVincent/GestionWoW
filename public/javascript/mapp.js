window.onload = function () {
    console.log(data);

    function getHttpRequest () {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/mapp.php");
        xhr.send();
        xhr.onload = function(){
            //Si le statut HTTP n'est pas 200...
            if (xhr.status != 200){
                //...On affiche le statut et le message correspondant
                alert("Erreur " + xhr.status + " : " + xhr.statusText);
                //Si le statut HTTP est 200, on affiche le nombre d'octets téléchargés et la réponse
            }else{
                //Tout fonctionne très bien
                //alert(xhr.response.length + " octets  téléchargés\n" + JSON.stringify(xhr.response));
                //console.log(xhr.responseText);
                //console.log(xhr.responseURL);
                //console.log(xhr.getAllResponseHeaders());
            }
        };
    }
    /* façon grafikart
    function getHttpRequest () {
        let httpRequest1;

        if(window.XMLHttpRequest) {
            httpRequest1 = new XMLHttpRequest();
            if(httpRequest1.overrideMimeType){
                httpRequest1.overrideMimeType('json');
            }
        } else if (window.ActiveXObject) {
            httpRequest1 = new ActiveXObject("Msxml2.XMLHTTP");
        }
        httpRequest1.open("GET", "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/mapp.php", true);
        httpRequest1.send();
        httpRequest1.addEventListener("onload", (e) => {
            if(httpRequest1.readyState ===  XMLHttpRequest.DONE &&  httpRequest1.status === 200){
                console.log(httpRequest1.response);
            }
        });
    }*/
    getHttpRequest();

    const PERSONNAGE = document.querySelector(".ContentPersonnage");
    let topPersonnage = getComputedStyle(PERSONNAGE).getPropertyValue("top");
    let leftPersonnage = getComputedStyle(PERSONNAGE).getPropertyValue("left");

    switch (data) {
        case "undead" :
            PERSONNAGE.classList.add("undead");
            break;
        case "orc" :
            PERSONNAGE.classList.add("orc");
            break;
        case "troll" :
            PERSONNAGE.classList.add("troll");
            break;
        case "tauren" :
            PERSONNAGE.classList.add("tauren");
            break;
        case "bloodElfe" :
            PERSONNAGE.classList.add("bloodElfe");
            break;
        case "gobelin" :
            PERSONNAGE.classList.add("gobelin");
            break;
        case "pandaren" :
            PERSONNAGE.classList.add("pandaren");
            break;
        case "human" :
            PERSONNAGE.classList.add("human");
            break;
        case "dwarf" :
            PERSONNAGE.classList.add("dwarf");
            break;
        case "nightElfe" :
            PERSONNAGE.classList.add("nightElfe");
            break;
        case "gnome" :
            PERSONNAGE.classList.add("gnome");
            break;
        case "draenei" :
            PERSONNAGE.classList.add("draenei");
            break;
        case "worgen" :
            PERSONNAGE.classList.add("worgen");
            break;
        default :
            alert("error");
    }


    window.addEventListener("keydown", (e) => {
        if(e.key === "z"){
            let toppo = parseInt(topPersonnage);
            topPersonnage = toppo - 10;
            topPersonnage += "px";
            PERSONNAGE.style.top = topPersonnage;
        }
        if(e.key === "s"){
            let toppo = parseInt(topPersonnage);
            topPersonnage = toppo + 10;
            topPersonnage += "px";
            PERSONNAGE.style.top = topPersonnage;
        }
        if(e.key === "d"){
            let left = parseInt(leftPersonnage);
            leftPersonnage = left + 10;
            leftPersonnage += "px";
            PERSONNAGE.style.left = leftPersonnage;
        }
        if(e.key === "q"){
            let left = parseInt(leftPersonnage);
            leftPersonnage = left - 10;
            leftPersonnage += "px";
            PERSONNAGE.style.left = leftPersonnage;
        }
    });

};
/* Cette fonction ne marche pas
ça modifie de 10 la première fois, puis ensuite, plus aucune modification
function deplacer(parseIntVariable,signe,cssAffect){
    let parseResult = parseInt(parseIntVariable);
    if(signe === "+"){
        parseIntVariable = parseResult + 10;
    }else{
        parseIntVariable = parseResult - 10;
    }
    parseIntVariable += "px";
    if(cssAffect === "left"){
        PERSONNAGE.style.left = parseIntVariable;
    }else{
        PERSONNAGE.style.top = parseIntVariable;
    }
}*/
