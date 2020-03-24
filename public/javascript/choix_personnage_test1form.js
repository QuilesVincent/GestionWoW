window.onload = function () {

    let principalScreen = document.querySelector(".mainPage");

    let formGeneral = document.getElementById("formInfoPlayerPersonnage");

    let formRaceAlliance = document.getElementById("formRaceAlliance");
    let formRaceHorde = document.getElementById("formRaceHorde");
    let formRaceGeneral = document.getElementById("formRaceGeneral");
    let formChoiceClasse = document.getElementById("formChoiceClasse");

    let buttonValid = document.getElementById("divButtonValidGeneral");

    let allRace = document.getElementsByClassName("race");
    let inputRace = document.getElementsByClassName("inputRace");
    let divRace = document.getElementsByClassName("divRace");
    let infoCamp = document.querySelector(".textRaceChoice");

    let divClasse = document.getElementsByClassName("divClasse");

    let divSex = document.getElementsByClassName("divInputSex");

    let divInfoClasse = document.querySelector(".sousDivContentInfoClass");
    let paraphInfo = document.getElementById("textInfoClasse");
    let textWar = "Seigneurs de guerre\n" +
        "Depuis que la guerre fait rage, des héros de toutes races ont cherché à maîtriser l’art du combat. Les guerriers combinent force, autorité et maîtrise des armes et des armures pour causer des ravages dans des combats épiques. Certains montent au front avec leur bouclier en protection pour bloquer les ennemis, permettant à leurs alliés en soutien à l’arrière de faire usage de leurs sorts et de leurs arcs. D’autres renoncent au bouclier pour lâcher les coups enragés de leurs diverses armes meurtrières sur leurs adversaires les plus proches.\n" +
        "\n" ;
    let textHunt = "Traqueurs infatigables \n" + "L’appel de la nature tire dès leur plus jeune âge certains aventuriers du confort de leur demeure pour les plonger dans la sauvagerie impitoyable du monde extérieur. Ceux qui y survivent deviennent des chasseurs. Maîtrisant leur environnement, ils savent se faufiler comme des ombres à travers les arbres et poser des pièges sur les chemins de leurs ennemis."
    let textPriest = "Invocateurs de Lumière et d'ombre\n" +
        "C’est au spirituel que les prêtres ont consacré leur vie et c’est en étant au service des autres que leurs actes traduisent la force de leur foi. Depuis des millénaires, ils ont quitté le confort de leurs lieux saints et sont sortis du cadre de leurs temples pour aller soutenir leurs alliés sur les terres dévastées par la guerre. Tous les héros reconnaissent la valeur de l’ordre des prêtres, que la tourmente de ce terrible conflit a révélée.\n" +
        "\n";
    let textShaman = "Adepte des éléments\n" +
        "Les chamans sont des guides spirituels qui font appel à des puissances non pas divines mais élémentaires. Ce mysticisme particulier amène le chaman à communier avec des forces qui ne sont pas toujours bienveillantes. Les éléments sont chaotiques, et livrés à eux-mêmes, ils se déchaînent les uns contre les autres dans une fureur primale permanente. Il est du devoir des chamans d’amener un équilibre dans ce chaos. Capable de modérer la terre, le feu, l’eau et l’air, le chaman invoque des totems qui dirigent ces forces pour soutenir ses alliés ou frapper leurs adversaires.";
    let textDemonist = "Maîtres des puissances de l'ombre\n" +
        "Pour la plupart des héros, les puissances démoniaques sont synonymes de mort. Les démonistes, eux, voient en elles une opportunité. La domination est leur but et ils comptent y parvenir en se consacrant aux arts sombres. Ces lanceurs de sort insatiables invoquent des serviteurs démoniaques et les font combattre à leurs côtés. Au début, le démoniste ne peut contrôler que des diablotins. Mais à mesure que ses connaissances croissent, des succubes séduisantes, des marcheurs du Vide loyaux et d’horribles chasseurs corrompus rejoignent les rangs du sorcier noir pour exterminer quiconque se mettra en travers du chemin de leur maître.";

    let textDruid = "Changeformes féroces \n" +
        "Les druides font appel aux vastes pouvoirs de la nature pour préserver son équilibre et protéger la vie. Avec de l’expérience, les druides peuvent déchaîner les énergies brutes de la nature contre leurs ennemis et faire s’abattre à distance sur eux la fureur des cieux, les immobiliser avec des sarments enchantés ou les piéger dans des cyclones sans fin.";
    let textPaladin = "Parangons de justice\n" +
        "Le paladin observe fidèlement ces règles : protéger le faible, faire régner la justice et vaincre le mal jusque dans les recoins les plus sombres de ce monde. Ces saints guerriers sont dotés de solides armures pour pouvoir affronter les adversaires les plus coriaces. La bénédiction de la Lumière leur permet de soigner les blessures et, dans certains cas, de redonner vie aux morts.";
    let textRogue = "Assassins silencieux\n" +
        "Un seul code pour les voleurs : remplir le contrat. Quant à leur honneur… tout s’achète avec des pièces d’or. Ces mercenaires s’appuient sur des tactiques brutales et efficaces sans l’ombre d’un remords. Assassins mortels et maîtres de la furtivité, ils approchent leurs cibles par derrière, frappent un organe vital et s’évanouissent dans l’ombre avant que leur victime ne touche le sol.";
    let textDeathKnight = "Hérauts de la damnation\n" +
        "Quand les chevaliers de la mort du Roi Liche furent libérés de son emprise, ces anciens champions crièrent veangeance pour les horreurs commises sous ses ordres. Ayant eu leur revanche, les chevaliers de la mort se retrouvèrent alors à errer sans but et sans patrie. L’un après l’autre, ils gagnèrent le monde des vivants à la recherche d’un nouveau sens à leur existence.";

    let textMage = "Maîtres de l'espace-temps\n" +
        "Les étudiants les plus intelligents et les plus disciplinés peuvent envisager une carrière de mage. Comme la magie des arcanes que manipulent les mages est à la fois puissante et dangereuse, elle n’est enseignée qu’à ceux qui la pratiquent avec respect et assiduité. Pour éviter toute interférence avec les sorts qu’ils lancent, les mages ne portent pour armure que de simples vêtements, mais les boucliers arcaniques et les enchantements leur confèrent une protection supplémentaire. Pour prendre le dessus sur leurs ennemis, les mages peuvent invoquer des boules de feu à lancer sur des cibles à distance ou causer l’éruption de toute une zone pour calciner tout un groupe d’adversaires.";

    let textMonk = "Lutteurs d'exception\n" +
        "Il y a des siècles, quand les pandarens étaient sous la coupe des mogu, ce sont les moines qui apportèrent l’espoir à un avenir qui paraissait bien terne. L’usage des armes leur étant interdit par leurs maîtres, ils se concentrèrent sur le contrôle de leur chi et l’apprentissage du combat à mains nues. Quand l’occasion arriva de faire la révolution, ils étaient prêts à briser le joug de l’oppresseur.";

    //remove text information on the classe
    function cacheTextInfo(){
        paraphInfo.classList.remove("infoChoisi");
        paraphInfo.textContent = "";
        divInfoClasse.classList.remove("apparitionDivInfoClasse");
    }

    //function to add or remove class on all div and color the div which contain the checked input
    function verifWichIsClick(onWichEvent, onWhichModificationRemove, classContainActually, whatClassAdd, whatClassRemove) {
        for(let i = 0; i < onWichEvent.length; i++) {
            onWichEvent[i].addEventListener("click", (e) => {
                cacheTextInfo();
                let elementChange = e.currentTarget;
                elementChange.classList.add(whatClassAdd);
                elementChange.firstElementChild.checked = true;
                for(let j = 0; j< onWhichModificationRemove.length; j++){
                    if (onWhichModificationRemove[j].classList.contains(classContainActually) && onWhichModificationRemove[j] !== elementChange) {
                        onWhichModificationRemove[j].classList.remove(whatClassRemove);
                        onWhichModificationRemove[j].checked = false;
                    }
                }
                if(onWichEvent === divRace){
                    if(onWichEvent[i].classList.contains("divRaceHorde")){
                        infoCamp.textContent = "Horde";
                    }else {
                        infoCamp.textContent = "Alliance";
                    }
                }
            });
        }
    }

    verifWichIsClick(divSex, divSex, "divInputSex", "divInputSexChoisi", "divInputSexChoisi");
    verifWichIsClick(divRace, divRace, "divRace", "raceChoisi", "raceChoisi");
    verifWichIsClick(divClasse, divClasse, "divClasse", "classeChoisi", "classeChoisi");

    function rmClasseIfNotAvaible(target){
        target.style.backgroundColor = "black";
        target.style.opacity = "0";
        //target.firstElementChild.style.display = "none";
    }

    //Supression des classes pour le background de .mainPage selon la race choisi
    function rmClassBackgroundPrincpal(){
        principalScreen.classList.remove("screenHumanFemale");
        principalScreen.classList.remove("screenHumanMan");
        principalScreen.classList.remove("screenDwarveMan");
        principalScreen.classList.remove("screenDwarveFemale");
        principalScreen.classList.remove("screenNightElfeMan");
        principalScreen.classList.remove("screenNightElfeFemale");
        principalScreen.classList.remove("screenDraneiFemale");
        principalScreen.classList.remove("screenDraneiMan");
        principalScreen.classList.remove("screenGnomeMan");
        principalScreen.classList.remove("screenGnomeFemale");
        principalScreen.classList.remove("screenWorgenFemale");
        principalScreen.classList.remove("screenWorgenMan");
        principalScreen.classList.remove("screenOrcFemale");
        principalScreen.classList.remove("screenOrcMan");
        principalScreen.classList.remove("screenUndeadMan");
        principalScreen.classList.remove("screenUndeadFemale");
        principalScreen.classList.remove("screenTrollMan");
        principalScreen.classList.remove("screenTrollFemale");
        principalScreen.classList.remove("screenTaurenFemale");
        principalScreen.classList.remove("screenTaurenMan");
        principalScreen.classList.remove("screenBloodElfeMan");
        principalScreen.classList.remove("screenBloodElfeFemale");
        principalScreen.classList.remove("screenGobelinMan");
        principalScreen.classList.remove("screenGobelinFemale");
        principalScreen.classList.remove("screenPandarenMan");
        principalScreen.classList.remove("screenPandarenFemale");
    }

    //Supression des classes indisponible suite au click sur une race
    //Utilisation de la fonction rmClasseIfNotAvaible pour faire disparaitre les div des classes non utilisable par la race
    //Change also the backgroundImage chosen according to the race
    function whatClassePossible(targetEvent){
        targetEvent.addEventListener("click", (e) => {
            rmClassBackgroundPrincpal();
            let sexChoisi = "Female";
            if(divSex[0].classList.contains("divInputSexChoisi")){
                sexChoisi = "Man";
            }
            let classes = formChoiceClasse.childNodes;
            let classesLength = classes.length;
            for(let i = 0; i < classesLength; i++){
                if(classes[i].nodeName === "DIV"){
                    classes[i].style.backgroundColor = "white";
                    classes[i].style.opacity = "1";
                    if(targetEvent.classList.contains("human")){
                        principalScreen.classList.add(`screenHuman${sexChoisi}`);
                        if(classes[i].classList.contains("divChaman") || classes[i].classList.contains("divMonk") || classes[i].classList.contains("divDruid")){
                            rmClasseIfNotAvaible(classes[i]);
                        }
                    }
                    if(targetEvent.classList.contains("nain")) {
                        principalScreen.classList.add(`screenDwarve${sexChoisi}`);
                        if (classes[i].classList.contains("divMage") || classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divMonk") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("nightElfe")){
                        principalScreen.classList.add(`screenNightElfe${sexChoisi}`);
                        if(classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divPaladin")){
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("gnome")) {
                        principalScreen.classList.add(`screenGnome${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("dranei")) {
                        principalScreen.classList.add(`screenDranei${sexChoisi}`);
                        if (classes[i].classList.contains("divRogue") || classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("worgen")) {
                        principalScreen.classList.add(`screenWorgen${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divMage")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("orc")) {
                        principalScreen.classList.add(`screenOrc${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divPretre") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("undead")) {
                        principalScreen.classList.add(`screenUndead${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divChaman") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("tauren")) {
                        principalScreen.classList.add(`screenTauren${sexChoisi}`);
                        if (classes[i].classList.contains("divRogue") || classes[i].classList.contains("divMage") || classes[i].classList.contains("divDemonist")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("troll")) {
                        principalScreen.classList.add(`screenTroll${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("bloodElfe")) {
                        principalScreen.classList.add(`screenBloodElfe${sexChoisi}`);
                        if (classes[i].classList.contains("divChaman") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("gobelin")) {
                        principalScreen.classList.add(`screenGobelin${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divMonk") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }
                    if(targetEvent.classList.contains("pandaren")) {
                        principalScreen.classList.add(`screenPandaren${sexChoisi}`);
                        if (classes[i].classList.contains("divPaladin") || classes[i].classList.contains("divDemonist") || classes[i].classList.contains("divDruid")) {
                            rmClasseIfNotAvaible((classes[i]));
                        }
                    }


                }
            }
        })
    }
    //Pour chaque race, selon le target, supression ou non des classes disponibles
    for(let i= 0; i <divRace.length; i++){
        whatClassePossible(divRace[i]);
    }


    function afficheInfoClasse(target){
        targetLength = target.length;
        paraphInfo.className = "infoChoisi";
        for(let i = 0; i < targetLength; i++){
            if(target[i].classList.contains("classeChoisi")){
                if(target[i].classList.contains("divWar")){
                    paraphInfo.textContent = textWar;
                }
                if(target[i].classList.contains("divPaladin")){
                    paraphInfo.textContent = textPaladin;
                }
                if(target[i].classList.contains("divHunt")){
                    paraphInfo.textContent = textHunt;
                }if(target[i].classList.contains("divRogue")){
                    paraphInfo.textContent = textRogue;
                }
                if(target[i].classList.contains("divPriest")){
                    paraphInfo.textContent = textPriest;
                }
                if(target[i].classList.contains("divChaman")){
                    paraphInfo.textContent = textShaman;
                }
                if(target[i].classList.contains("divMage")){
                    paraphInfo.textContent = textMage;
                }
                if(target[i].classList.contains("divDemonist")){
                    paraphInfo.textContent = textDemonist;
                }
                if(target[i].classList.contains("divMonk")){
                    paraphInfo.textContent = textMonk;
                }
                if(target[i].classList.contains("divDruid")){
                    paraphInfo.textContent = textDruid;
                }
                if(target[i].classList.contains("divDeathKnight")){
                    paraphInfo.textContent = textDeathKnight;
                }

            }
        }
    }

    //Si clique sur button info, si div déjà ouvert, on supprime le text, cache le div
    //Sinon, on execute la foction qui permet d'ajouter le text
    document.getElementById("textDivMoreInfoClasse").addEventListener("click", (e) => {
        if(paraphInfo.classList.contains("infoChoisi")){
            cacheTextInfo();
        }else {
            afficheInfoClasse(divClasse);
            divInfoClasse.classList.add("apparitionDivInfoClasse");
        }
    })
}