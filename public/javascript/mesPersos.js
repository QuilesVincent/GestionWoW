window.onload =  () => {
    var name;

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
    };

    //Toutes les redirection suite au clic sont contenu ici
    let backPageConnexion = document.getElementById("buttonBack");
    let newPersonnageCreate = document.getElementById("buttonCreatePersonnage");
    let deletePersonnage = document.getElementById("buttonDeletePersonnage");
    let startButton = document.getElementById("buttonStart");
    backPageConnexion.addEventListener("click", (e) => {
        document.location.href = "http://localhost/code/GestionWorldOfWarcraft/index.php?controllers=user&task=logOut";
    });
    newPersonnageCreate.addEventListener("click", (e) => {
        document.location.href = "http://localhost/code/GestionWorldOfWarcraft/index.php?controllers=afficheur&task=afficheCreationPersonnage";
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
/* Resoudre le problème du delete
    deletePersonnage.addEventListener("click", (e) => {
        let data = {delete:name};
        ajax.post("http://localhost/code/GestionWorldOfWarcraft/vue/parties/mapp/receptJS.php", data, successDelete, "error");
    });*/

    startButton.addEventListener("click", (e) => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/code/GestionWorldOfWarcraft/vue/parties/mapp/receptJS.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send('param1=' + name);
        document.location.href = `http://localhost/code/GestionWorldOfWarcraft/index.php?controllers=routeur&task=goMapp&name_personnage=${name}`;
    });


    console.log(data);

};