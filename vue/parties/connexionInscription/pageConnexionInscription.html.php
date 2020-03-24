            <link href='public/css/connexionInscription.css' rel='stylesheet'>
            <link href="public/css/footerGeneral.css" rel="stylesheet">
            <!--Ajouter des polices google pour rendre le tout plus jolie-->
            
        </head>

        <body>
            <header>
                <div class='titleName'>
                    <h1>World Of Warcraft</h1>
                </div>
                <!--Affichage du formulaire de connexion -->
                <div class='connexionFormContent'>
                    <?php include('formPageConnexion.php');?>
                </div>
            </header>
            <section class='inscriptionSection'>
                <div class='partieEsthetique'>
                    <div class='partieEsthetiqueContent'>
                        <h2>Le nouveau jeux en ligne</h2>
                        <p>Choisissez entre la horde ou l'alliance, combattez les plus grands champions, et devenez le maitre d'Azeroth.<br />
                            Arène, bataille générale, et raid contre des boss contrôlé par l'ordinateur, faites votre choix. <br />
                            Un monde sans fin vous attends derrière cette porte. Porte qu'il est facile d'ouvrir, mais arriverez vous à revenir en vie ?
                        </p>
                    </div>  
                </div>
                <!--Affichage du formulaire d'inscription -->
                <div class='informationInscription'>
                    <div class='titleInscription'>
                        <h2>Inscription</h2>
                        <p>Le monde de la finance s'ouvre bientôt à vous</p>
                    </div>
                    <form action='index.php?controllers=routeur&task=chargerOne' method='post' class='inscriptionFormContent'>
                        <?= empty($_GET['mdic']) ? false : writteAlert($errorObj->missDonnee(), 'p');?>
                        <div class='firstLastNameContent'>
                            <input type='text' name='firstNameInscription' placeholder="Prénom">
                            <input type='text' name='lastNameInscription' placeholder="Nom">
                        </div>
                        <div class='userNameInscriptionContent'>
                            <!-- "und" est le get qui est renvoyé du fichier post si l'userName rentré pour inscription n'est pas disponible -->
                            <?= empty($_GET['unf']) ? false : writteAlert($errorObj->userNameNoFree(), 'p'); ?>
                                <input type='text' name='userNameInscription' placeholder='UserName = Nom du personnage' class='userNameInscription'>

                        </div>
                        <input type='password' name='passwordInscription' placeholder="Mot de passe" class='passwordInscription'>
                        <button type='submit' name='submitInscription' class='submitInscription'>Inscription</button>

                    </form>
                </div>
            </section>
        <?php include('vue/parties/multiPage/footerGeneral.php');?>
        </body>