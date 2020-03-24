<?php

require_once '../controller/controleur.php';
session_start();

$id_target_user = $_SESSION['id'];
$req = $personnageManagerObj->getPersonnageByUserTarget($id_target_user);
$tableau = [];
while($resp = $req->fetch()){
    //echo $resp['name_personnage'];
    array_push($tableau, $resp);
};
$pap = "heho";
if(isset($_POST["data"])){
    $pap = $_POST["data"];
}
$req->closeCursor();


?>
<!Doctype>
        <html lang="fr">
            <head>
                <title>CHoix personnag</title>
                <meta charset="utf-8">
                <link href="../public/css/mesPersos.css" rel="stylesheet">
                <link href="../public/javascript/mesPersos.js" type="text/javascript"/>
                <script>let data = <?php echo json_encode($tableau);?></script>
                <script>let data2 = <?php echo json_encode($pap);?></script>
                <script src="../public/javascript/mesPersos.js"></script>

            </head>

            <body>
                <section class="mainPage">
                    <div class="centralFree">
                    </div>
                    <div class="divRubrique">
                        <div class="divContentAddon">
                            <div class="addon">
                                <button id="buttonAddon">addon</button>
                            </div>
                        </div>
                        <div class="divContentStart">
                            <div class="start"> <!--Faire un post javascript pour rediriger vers mapp et créer un personnage -->
                                <button id="buttonStart">start</button>
                            </div>
                        </div>
                        <div class="divContentDeleteCreatePersonnage">
                            <div class="deletePersonnage">
                                <button id="buttonDeletePersonnage">Delete Personnage</button> <!--Faire un post javascript -->
                            </div>
                            <div class="createPersonnage"> <!--mettre un lien en click javascript vers la page de création de perso -->
                                <button id="buttonCreatePersonnage">New Personnage</button>
                            </div>
                        </div>
                        <div class="divContentBack">
                            <div class="back"><!--mettre un lien en click javascript vers la page de connexion -->
                                <button id="buttonBack">Back</button>
                            </div>
                        </div>
                    </div>
                </section>
                <aside>
                    <div class="sideBar choicePersonnage" id="sideBar">
                        <div class="freeSpace"></div>
                        <div id="spacePersonnage"></div>

                    </div>
                </aside>
            </body>
    </html>

