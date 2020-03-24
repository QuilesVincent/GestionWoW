window.onload =  () => {
    var name;
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
        httpRequest1.open("GET", "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/creationPersonnagePreMapp.php", true);
        httpRequest1.send();
        httpRequest1.addEventListener("onload", (e) => {
            if(httpRequest1.readyState ===  XMLHttpRequest.DONE &&  httpRequest1.status === 200){
                console.log(httpRequest1.responseText);
            }
        });
    }

    function postHTTPRequest (data) {
        let httpRequest;

        if(window.XMLHttpRequest) {
            httpRequest = new XMLHttpRequest();
            if(httpRequest.overrideMimeType){
                httpRequest.overrideMimeType('json');
            }
        } else if (window.ActiveXObject) {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        data = "data="+data;
        //httpRequest.open("POST", "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/creationPersonnagePreMapp.php", true);
        httpRequest.open("POST", "http://localhost/xampp/code/jeuxCombatPHPJS/partie_2_choix_personnage/mesPersos.php", true);
        httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpRequest.send(data);
        httpRequest.addEventListener("onload", (e) => {
            if(httpRequest.readyState ===  XMLHttpRequest.DONE &&  httpRequest.status === 200){
                console.log(name);
            }
        });
    }

    function postAjax(url, data) {
        var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        xhr.open('POST', url);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(params);
        return xhr;
    }



    let sideBar = document.getElementById("spacePersonnage");
    let fewPersonnage = data;
    //création d'un div pour chaque personnage possédé par l'utilisateur
    fewPersonnage.forEach( (perso) => {
        let divAllContent = document.createElement("DIV");
        divAllContent.classList.add("divContentPersonnage");
        divAllContent.classList.add(perso['name_personnage'] + "DivContentPersonnage");

        let paraphName = document.createElement("p");
        paraphName.textContent = perso['name_personnage'];
        paraphName.classList.add("paraphName");
        let paraphInfo = document.createElement("p");
        paraphInfo.classList.add("paraphInfo");
        paraphInfo.textContent = `${perso['classe_personnage']} niveau ${perso['niveau_personnage']}`;

        divAllContent.appendChild(paraphName);
        divAllContent.appendChild(paraphInfo);

        sideBar.appendChild(divAllContent);
    });

    let divPersonnage = document.getElementsByClassName("divContentPersonnage");
    let divPersonnageLength = divPersonnage.length;

    //function pour supprimer une classe sur un ensemble de cible (function qui revient souvent donc devrait être mise dans un fichier
    function deleteClasse(target, classCSSToDelete){
        targetLength = target.length;
        for(let i = 0; i < targetLength; i++){
            target[i].classList.remove(classCSSToDelete)
        }
    }
    for(let i = 0; i < divPersonnageLength; i++){
        divPersonnage[i].addEventListener("click", (e) => {
            deleteClasse(divPersonnage, "personnageChoice");
            divPersonnage[i].classList.add("personnageChoice");
            name = divPersonnage[i].firstElementChild.textContent;
            console.log(name);
        });
    }
    function ajaxhttp(){
        let requetAjax = new XMLHttpRequest();
        requetAjax.open("POST", "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/creationPersonnagePreMapp.php");
        requetAjax.send(name);
    }
    //Toutes les redirection suite au clic sont contenu ici
    let backPageConnexion = document.getElementById("buttonBack");
    let newPersonnageCreate = document.getElementById("buttonCreatePersonnage");
    let deletePersonnage = document.getElementById("buttonDeletePersonnage");
    let startButton = document.getElementById("buttonStart");
    backPageConnexion.addEventListener("click", (e) => {
        document.location.href = "http://localhost/code/jeuxCombatPHPJS/partie_1_inscription_connexion/pageInscriptionConnexion.php";
    });
    newPersonnageCreate.addEventListener("click", (e) => {
        document.location.href = "http://localhost/code/jeuxCombatPHPJS/partie_2_choix_personnage/choix_personnage_test1form.php";
    });

    //notre ajax:
    let ajax = {};
    //Permettra d'ajouter un objet de donnée en get dans l'url
    ajax.getQS = function(data){
        let qs = [];
        for(k in data){
            qs.push(`${k}=${data[k]}`);
        }
        return qs.join('&');
    };
    //function pour effectuer l'appel ajax
    ajax.get = function (url, data, success, error) {
        let xhr = new XMLHttpRequest();
        console.log(1, xhr.readyState);

        url = `${url}?${this.getQS(data)}`;

        xhr.open('GET', url);
        console.log(2, xhr.readyState);

        xhr.onreadystatechange = function () {
            console.log('x', xhr.readyState);
            if(xhr.readyState === 4){
                if(xhr.status >= 200 && xhr.status < 300){
                    success(xhr.responseText);
                } else {
                    error(xhr.status, xhr.statusText, xhr);
                }
            }

        };
        xhr.send();
    };
    //appel ajax en post
    ajax.post = function (url, data, success, error) {
        let xhr = new XMLHttpRequest();

        xhr.open('POST', url);
        xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            console.log('x', xhr.readyState);
            if(xhr.readyState === 4){
                if(xhr.status >= 200 && xhr.status < 300){
                    success();
                } else {
                    console.log(error);
                }
            }

        };
        xhr.send(this.getQS(data));
    };

    function success(data){
        console.log(data);
    }
    function error(err, txt){
        console.log(err, txt);
    }
    function successDelete(){
        for(let i = 0; i < divPersonnageLength; i++){
            if(divPersonnage[i].firstElementChild.textContent === name){
                divPersonnage[i].parentElement.removeChild(divPersonnage[i]);
            }
        }
    }
    deletePersonnage.addEventListener("click", (e) => {
        let data = {delete:name};
        ajax.post("http://localhost/code/jeuxCombatPHPJS/partie_2_choix_personnage/deletePlayerPost.php", data, successDelete, "error");
    });
    startButton.addEventListener("click", (e) => {
        let namo = "hackerBaby";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/creationPersonnagePreMapp.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send('param1=' + name);
        document.location.href = "http://localhost/xampp/code/jeuxCombatPHPJS/partie3/mapp.php";
    });


    console.log(data);

};