

//push input on false if they are not the choice
//function call in the function checkedFalseOtherForm to push input on false for all forms

export function checkedFalseInput(classCss,form1, form2){
    let childForm1 = form1.childNodes;
    let childForm1Length = childForm1.length;
    let childForm2 = form2.childNodes;
    let childForm2Length = childForm2.length;
    for (let i = 0; i < childForm1Length; i++) {
        if(childForm1[i].nodeName === "DIV" && childForm1[i].classList.contains(classCss)){
            childForm1[i].firstElementChild.checked = false;
            childForm1[i].classList.remove(classCss);
        }
    }
    for (let i = 0; i < childForm2Length; i++) {
        if(childForm2[i].nodeName === "DIV" && childForm2[i].classList.contains(classCss)){
            childForm2[i].firstElementChild.checked = false;
            childForm2[i].classList.remove(classCss);
        }
    }
}

//If there an event click, run the function checkedFalseInput
function checkedFalseOtherForm(form1, form2, form3){
    let childForm1 = form1.childNodes;
    let childForm1Length = childForm1.length;
    let childForm2 = form2.childNodes;
    let childForm2Length = childForm2.length;
    let childForm3 = form3.childNodes;
    let childForm3Length = childForm3.length;
    for (let i = 0; i < childForm1Length; i++){
        if(childForm1[i].nodeName ==="DIV"){
            childForm1[i].addEventListener("click", (e) => {
                checkedFalseInput("raceChoisi", form2,form3);
            })
        }
    }
    for (let i = 0; i < childForm2Length; i++){
        if(childForm2[i].nodeName === "DIV"){
            childForm2[i].addEventListener("click", (e) => {
                checkedFalseInput("raceChoisi", form1, form3);
            })
        }
    }
    for (let i = 0; i < childForm3Length; i++){
        if(childForm3[i].nodeName === "DIV"){
            childForm3[i].addEventListener("click", (e) => {
                checkedFalseInput("raceChoisi", form1, form2);
            })
        }
    }
}
//function to add or remove class on all div and color the div which contain the checked input
function verifWichIsClick(onWichEvent, onWhichModificationRemove, classContainActually, whatClassAdd, whatClassRemove) {
    for(let i = 0; i < onWichEvent.length; i++) {
        onWichEvent[i].addEventListener("click", (e) => {
            let elementChange = e.currentTarget;
            elementChange.classList.add(whatClassAdd);
            elementChange.firstElementChild.checked = true;
            for(let j = 0; j< onWhichModificationRemove.length; j++){
                if (onWhichModificationRemove[j].classList.contains(classContainActually) && onWhichModificationRemove[j] !== elementChange) {
                    onWhichModificationRemove[j].classList.remove(whatClassRemove);
                    onWhichModificationRemove[j].checked = false;
                }
            }
            for(let p=0; p< allRace.length; p++){
                if(allRace[p].checked === true){
                    allRace[p].parentElement.style.backgroundColor = "red";
                }else{
                    allRace[p].parentElement.style.backgroundColor = "white";
                }
            }
        });
    }
}

//display on off div which can't be clicked
function whoBlackColorAndInputDisplayNone(target){
    target.style.backgroundColor = "black";
    target.firstElementChild.style.display = "none";
}

function whatClassePossible(targetEvent){
    targetEvent.addEventListener("click", (e) => {
        let classes = formChoiceClasse.childNodes;
        let classesLength = classes.length;
        for(let i = 0; i < classesLength; i++){
            if(classes[i].nodeName === "DIV"){
                classes[i].style.backgroundColor = "white";
                if(targetEvent.classList.contains("human")){
                    if(classes[i].classList.contains("divChaman") || classes[i].classList.contains("divMonk") || classes[i].classList.contains("divDruid")){
                        whoBlackColorAndInputDisplayNone(classes[i]);
                    }
                }
                if(targetEvent.classList.contains("nain")) {
                    if (classes[i].classList.contains("divMage") || classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divMonk") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("nightElfe")){
                    if(classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divPaladin")){
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("gnome")) {
                    if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("dranei")) {
                    if (classes[i].classList.contains("divRogue") || classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("worgen")) {
                    if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divMage")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("orc")) {
                    if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divPretre") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("undead")) {
                    if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("tauren")) {
                    if (classes[i].classList.contains("divRogue") || classes[i].classList.contains("divMage") || classes[i].classList.contains("divDemonist")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("troll")) {
                    if (classes[i].classList.contains("divPaladin")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("bloodElfe")) {
                    if (classes[i].classList.contains("divChaman") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("gobelin")) {
                    if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divMonk") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }
                if(targetEvent.classList.contains("pandaren")) {
                    if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divDruid")) {
                        whoBlackColorAndInputDisplayNone((classes[i]));
                    }
                }


            }
        }
    })
}


function ajaxGet(url, data) {
    let xhr = new XMLHttpRequest();
    console.log(1, xhr.readyState);

    xhr.open('get', url);
    console.log(2, xhr.readyState);

    xhr.onreadystatechange = function () {
        console.log('x', xhr.readyState);
        if(xhr.readyState === 4){
            if(xhr.status >= 200 && xhr.status < 300){
                console.log('Good...');
                console.log(xhr.responseText);
                console.log(xhr.getAllResponseHeaders());
            } else {
                console.log('Bad !!!!!');
            }
        }

    }
}