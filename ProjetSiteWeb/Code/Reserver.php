<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="General.css">
    <link rel="stylesheet" type="text/css" href="Reserver.css">
    <link rel="stylesheet" type="text/css" href="Valider.css">
    <script src="Commander.js"></script>
    <title>Réservation</title>
</head>
<body onload="DateValide(false)">
    <div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg bg-light navbar-light" id="navBarre">
            <a class="navbar-brand" href="#"><img
                    src="Images/vector-leaf-green-nature-logo-and-symbol-templateR.png">le Jardin Goumand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">
                <ol class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link px-4" href="Accueil.html">Accueil</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="LaCarte.html">La carte</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="Commander.php">Commander à emporter</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="Contact.php">Contact</a>
                    </li>
                </ol>
            </div>
        </nav>
    </header>
    <main>
        <?php
            $valide = false;

            if(isset($_POST["verification"]))
            {
                $formValide = true;
                $nom = $_POST["nom"]; $prenom = $_POST["prenom"]; $heure = $_POST["heure"]; $date = $_POST["date"];
                $nbPersonnes = $_POST["nbPersonnes"]; $email = $_POST["Email"];

                if(empty($nom))
                {
                    $formValide = false;
                    $errorNom = "Le nom n'a pas été renseigné";
                }

                if(empty($prenom))
                {
                    $formValide = false;
                    $errorPrenom = "Le prénom n'a pas été renseigné";
                }

                if(empty($heure))
                {
                    $formValide = false;
                    $errorHeure = "L'heure n'a pas été renseignée";
                }

                if(empty($date))
                {
                    $formValide = false;
                    $errorDate = "La date n'a pas été renseignée";
                }

                if(empty($email))
                {
                    $formValide = false;
                    $errorEmail = "L'email n'a pas été renseignée";
                }

                $testValeur = ["1", "2", "3", "4", "5", "6"];
                if(!in_array($nbPersonnes, $testValeur))
                {
                    $formValide = false;
                    $errorNb = "Vous devez choisir le nombre de personnes pour la table";
                }

                if($formValide)
                {
                    $valide = true;
                }
            }

            if($valide)
            {

                $connexion = new mysqli("localhost", "root", "", "reservation", "3306");
                if($connexion->connect_error == null)
                {
                    $connexion->query("INSERT INTO tablereserve (Nom, Prenom, Heure, nbPersonnes, dateR, Email) values
                    ('$_POST[nom]', '$_POST[prenom]', '$_POST[heure]', '$_POST[nbPersonnes]', '$_POST[date]', '$_POST[Email]')");
                } else {
                    echo $connexion->connect_error;
                    exit();
                }
                $connexion->close();
        ?>
        
        <div class="row valider">
            <div class="col-md-7 validerCol">
                <h1>Reservation enregistree</h1>
                <p>Une table à bel et bien était réservé pour vous. Elle vous attendra à la date et l'heure que vous avez
                    indiqué
                </p>
                <a href="Accueil.html">Accueil</a>
            </div>
        </div>
        <div class="space"></div>

        <?php

                $connexion = new mysqli("localhost", "root", "", "reservation", "3306");
                if($connexion->connect_error == null)
                {
                    $resultat = $connexion->query("SELECT Nom, Prenom, Heure, nbPersonnes, DateR, Email FROM tablereserve
                    WHERE Id=(SELECT MAX(Id) FROM tablereserve)");
                    $row = $resultat->fetch_array(MYSQLI_ASSOC);
                    $dest = "mathiastheo42@gmail.com";
                    $objet = "Réservation de table";
                    $message = "Un utilisateur du site a réservé une table.<br>" .
                    "Nom : " . $row["Nom"] . " " . $row["Prenom"] . '<br>' . "La table à été réservée pour le " . $row["DateR"] . " à " . 
                    $row["Heure"] . " pour " . $row["nbPersonnes"] . " personne(s)";
                    $entetes =  'MIME-Version: 1.0' . "\r\n";
                    $entetes .= "From: " . $row["Email"] . "\r\n";
                    $entetes .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
                    mail($dest, $objet, $message, $entetes);
                } else {
                    echo $connexion->connect_error;
                    exit();
                }
                $connexion->close();

            } else {

        ?>
        <form action="Reserver.php" method="POST">
        <div class="row">
            <h1>Reserver une table</h1>
            <div class="col-11 backGrey row">
                <div class="col-lg-6 form">
                        <label for="nom">Nom : </label>
                        <input type="text" name="nom" id="nom" value="<?php if(isset($nom)) {echo $nom;}?>">
                        <?php
                            if(isset($errorNom))
                            {
                        ?>
                                <br><span class="error"><?=$errorNom?></span>
                        <?php
                            } else {
                        ?>  
                                <span></span>
                        <?php
                            }
                        ?>
                        <br>
                        <label for="prenom">Prenom : </label>
                        <input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>">
                        <?php
                            if(isset($errorPrenom))
                            {
                        ?>
                                <br><span class="error"><?=$errorPrenom?></span>
                        <?php
                            } else {
                        ?>  
                                <span></span>
                        <?php
                            }
                        ?>
                        <br>
                        <label for="Email">Email : </label>
                        <input type="text" name="Email" id="Email" value="<?php if(isset($Email)) {echo $Email;}?>">
                        <?php
                            if(isset($errorEmail))
                            {
                        ?>
                                <br><span class="error"><?=$errorEmail?></span>
                        <?php
                            } else {
                        ?>  
                                <span></span>
                        <?php
                            }
                        ?>
                        <br>
                        <label for="heure">Heure : </label>
                        <input type="time" name="heure" id="heure" value="<?php if(isset($heure)) {echo $heure;}?>">
                        <?php
                            if(isset($errorHeure))
                            {
                        ?>
                                <br><span class="error"><?=$errorHeure?></span>
                        <?php
                            } else {
                        ?>  
                                <span></span>
                        <?php
                            }
                        ?>
                        <br>
                        <label for="nbPersonnes">Nombre de personnes : </label>
                        <select name="nbPersonnes" id="nbPersonnes">
                        <?php
                            if(isset($nbPersonnes))
                            {
                        ?>
                            <option value="<?=$nbPersonnes?>"><?=$nbPersonnes?></option>
                        <?php
                            } else {
                        ?>
                            <option value="Choisissez">Choisissez</option>
                        <?php
                            }
                        ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <?php
                            if(isset($errorNb))
                            {
                        ?>
                                <br><span class="error nbError"><?=$errorNb?></span>
                        <?php
                            } else {
                        ?>  
                                <span></span>
                        <?php
                            }
                        ?>
                </div>
                <div class="col-lg-6">
                <div class="CibleDate row">
                    
                </div>
                <?php
                    if(isset($errorDate))
                    {
                ?>
                        <br><span class="error dateError"><?=$errorDate?></span>
                <?php
                    } else {
                ?>  
                    <span class="dateError"></span>
                <?php
                    }
                ?>
                <div class="errorCible"></div>
                <div class="row height align-items-end">
                <input class="validationReserver" type="submit" name="verification" 
                id="verification" value="Valider">
                </div>
                </div>
            </div>
        </div>
        </form>

        <?php
            }
        ?>
    </main>
    <footer>
        <div class="row black">
            <div class="col-md-7 FooterHeight">
                <ul class="ulFlex">
                    <li class="footer"><a href="Mentionlegale.html" class="colorF">Mentions légales</a></li>
                    <li class="footer widthLi"><a href="Politique.html" class="colorF">Politique de confidentialité</a></li>
                </ul>
            </div>
            <div class="col-md-4 alignAdresse">
                <h6 id="Adresse">Adresse</h6>
                <p class="positionA">1 Place Poblet, 34070 Montpellier</p>
                <p class="textF">06 99 99 99 99</p>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>