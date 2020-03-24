<?php

session_start();
$perso = unserialize($resp);

?>


<!Doctype>
<html>
<head>

            <link href="public/css/mapp.css" rel="stylesheet">
            <link href="public/javascript/mapp.js" type="text/javascript"/>
            <script>let data = <?php echo json_encode($perso->getRace());?></script>
            <script src="public/javascript/mapp.js"></script>

        </head>

        <body>

        <section class="mainPage allEcran"><!--heho-->
            <div class="contentPersonnage">
                <div class="infoPerso">
                    <?php echo $perso->getRace();?>
                    <?php echo $perso->getClasse();?>
                    <?= $perso->name;?>
                </div>
                <div class="personnage">
                </div>
            </div>
            <form action="index.php?controllers=user&task=logOut" method="post">

                <button type="submit" name="deco" id="decoButton">deconnexion</button>
            </form>


        </section>
        </body>
    </html>
