<?php
session_start();

?>

<!Doctype>
<html lang="fr">
<head>
    <title>CHoix personnag</title>
    <meta charset="utf-8">
    <link href="../public/css/choix_personnage-test1form.css" rel="stylesheet">
    <script src="../public/javascript/choix_personnage_test1form.js"></script>

</head>

<body>

<section class="mainPage allEcran"> <!-- Changer tout le div section une fois le choix fais, remplacer par les 4 races possibles
                            Ensuite, faire la même chose une fois la race choisi, faire apparaitre les 4 classes possibles-->
    <form action='CreationPlayerPost.php' method='post' id="formInfoPlayerPersonnage">
    <div class="divSection divSectionPrincipal">
        <div class="divChoiceRaceSex">
            <div class="divChoiceSex">

                    <div class="divInputMan divInputSex">
                        <input type="radio" name="sex" value="man">
                    </div>
                    <div class="divInputWoman divInputSex">
                        <input type="radio" name="sex" value="woman">
                    </div>

            </div>
            <div class="divChoiceRace">
                <div class="divRacePerCamp">
                    <div class="formRaceAlliance">
                        <div class="human divRace divRaceAlliance">
                            <input class="inputRace" type="radio" name="race" value="human">
                        </div>
                        <div class="nain divRace divRaceAlliance">
                            <input class="inputRace" type="radio" name="race" value="dwarf">
                        </div>
                        <div class="nightElfe divRace divRaceAlliance">
                            <input class="inputRace" type="radio" name="race" value="nightElfe">
                        </div>
                        <div class="gnome divRace divRaceAlliance">
                            <input class="inputRace" type="radio" name="race" value="gnome">
                        </div>
                        <div class="dranei divRace divRaceAlliance">
                            <input class="inputRace" type="radio" name="race" value="draenei">
                        </div>
                        <div class="worgen divRace divRaceAlliance">
                            <input class="inputRace" type="radio" name="race" value="worgen">
                        </div>
                    </div>
                    <div class="formRaceHorde">
                        <div class="orc divRace divRaceHorde">
                            <input class="inputRace" type="radio" name="race" value="orc">
                        </div>
                        <div class="undead divRace divRaceHorde">
                            <input class="inputRace" type="radio" name="race" value="undead">
                        </div>
                        <div class="troll divRace divRaceHorde">
                            <input class="inputRace" type="radio" name="race" value="troll">
                        </div>
                        <div class="tauren divRace divRaceHorde">
                            <input class="inputRace" type="radio" name="race" value="tauren">
                        </div>
                        <div class="bloodElfe divRace divRaceHorde">
                            <input class="inputRace" type="radio" name="race" value="bloodElfe">
                        </div>

                        <div class="gobelin divRace divRaceHorde">
                            <input class="inputRace" type="radio" name="race" value="gobelin">
                        </div>
                    </div>
                </div>

                <div class="raceGeneral">
                    <div class="pandaren divRace divRaceHorde">
                        <input class="inputRace" type="radio" name="race" value="pandaren">
                    </div>
                </div>

            </div>


        </div>
        <div class="divCentralSectionPrincipal">
            <div class="divTitlePage">
                <h1 class="titlePage">Choisis ta race et ta classe</h1>
                <input class="namePersonnage" name="namePersonnage" type="text" placeholder="Nom de personnage">
            </div>
            <div class="divInfoClasse">
                <div class="sousDivContentInfoClass">
                    <p id="textInfoClasse"></p>
                </div>
            </div>
            <div class="divRubrique">
                <div class="divnameRaceCamp divSpecificRubrique">
                    <p class="textRaceChoice"></p>
                </div>
                <div class="divButtonReturn divSpecificRubrique">
                    <div class="contentLien">
                        <a href="../partie_1_inscription_connexion/pageInscriptionConnexion.php">Retour</a>
                    </div>
                </div>
                <div id="divButtonValidGeneral divSpecificRubrique">
                    <input id="buttonValidGeneral" type="submit" value="Valider">
                </div>
                <div class="divButtonMoreInfoClasse divSpecificRubrique">
                    <div class="contentButtonInfo">
                        <input id="textDivMoreInfoClasse" type="button" value="infos">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="divSection divDroiteSection divClasseChoiceSection sideBar">
        <div class="divContentClasse" id="formChoiceClasse">
            <div class="divWar divClasse">
                <input type="radio" name="classe" value="war" class="radioWar">
            </div>
            <div class="divPaladin divClasse">
                <input type="radio" name="classe" value="paladin">
            </div>
            <div class="divHunt divClasse">
                <input type="radio" name="classe" value="hunt">
            </div>
            <div class="divRogue divClasse">
                <input type="radio" name="classe" value="rogue">
            </div>
            <div class="divPriest divClasse">
                <input type="radio" name="classe" value="priest">
            </div>
            <div class="divChaman divClasse">
                <input type="radio" name="classe" value="shaman">
            </div>
            <div class="divMage divClasse">
                <input type="radio" name="classe" value="mage">
            </div>
            <div class="divDemonist divClasse">
                <input type="radio" name="classe" value="demonist">
            </div>
            <div class="divMonk divClasse">
                <input type="radio" name="classe" value="monk">
            </div>
            <div class="divDruid divClasse">
                <input type="radio" name="classe" value="druid">
            </div>
            <div class="divDeathKnight divClasse">
                <input type="radio" name="classe" value="deathKnight">
            </div>

        </div>
    </div>
    </form>
</section>
</body>
</html>

