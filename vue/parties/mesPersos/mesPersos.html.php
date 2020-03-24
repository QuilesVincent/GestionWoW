<?php

session_start();
$tableau = [];
foreach($personnages as $perso) {
    array_push($tableau, $perso);
}

if(isset($infoUser)){
        $_SESSION['userName'] = $infoUser['userName'];
        $_SESSION['idUser'] = $infoUser['id_user'];
        $_SESSION['lastName'] = $infoUser['lastName'];
        $_SESSION['firstName'] = $infoUser['firstName'];
        $id = $_SESSION['idUser'];
}

?>
<link href="public/css/mesPersos.css" rel="stylesheet">
<script>let data = <?php echo json_encode($tableau);?></script>
<script src="public/javascript/mesPersos.js"></script>

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
                                <button id="buttonDeletePersonnage">Delete Personnage</button>
                            </div>
                            <div class="createPersonnage"> 
                                <button id="buttonCreatePersonnage">New Personnage</button>
                            </div>
                        </div>
                        <div class="divContentBack">
                            <div class="back">
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