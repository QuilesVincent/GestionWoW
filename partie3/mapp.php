<?php

require_once '../controller/controleur.php';

use App\Personnage\{
    Rogue,
    Demonist,
    War,
    Paladin,
    Hunt,
    Priest,
    Shaman,
    Mage,
    Monk,
    Druid,
    DeathKnight
};
session_start();

$perso = $_SESSION["personnage_select"];
$goodPerso = unserialize($perso);
?>

<!Doctype>
    <html lang="fr">
        <head>
            <title>Mapp</title>
            <meta charset="utf-8">
            <link href="../public/css/mapp.css" rel="stylesheet">
            <link href="../public/javascript/mapp.js" type="text/javascript"/>
            <script>let data = <?php echo json_encode($goodPerso->race);?></script>
            <script src="../public/javascript/mapp.js"></script>

        </head>

        <body>

        <section class="mainPage allEcran">
            <div class="contentPersonnage">
                <div class="infoPerso">
                    <?php echo $goodPerso->getRace();?>
                    <?php echo $goodPerso->getClasse();?>
                </div>
                <div class="personnage">
                </div>
            </div>
            <form action="deco.php" method="post">

                <button type="submit" name="deco" id="decoButton">deconnexion</button>
            </form>


        </section>
        </body>
    </html>