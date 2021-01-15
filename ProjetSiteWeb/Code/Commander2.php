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
    <script src="Commander.js"></script>
    <link rel="stylesheet" type="text/css" href="General.css">
    <link rel="stylesheet" type="text/css" href="Commander2.css">
    <title>CommanderPt2</title>
</head>
<body>
    <div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg bg-light navbar-light" id="navBarre">
            <a class="navbar-brand" href="#"><img
                src="Images/vector-leaf-green-nature-logo-and-symbol-templateR.png">le Jardin Gourmand</a>
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
                        <a class="nav-link active" href="Commander.php">Commander à emporter</a>
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
            if(isset($_POST["Suite"]) && !isset($_POST["Recap"]) || $_GET["retour"] == 3)
            {
        ?>
            <h1>Moyens de paiements</h1>
            <p>Page non réalisé</p>
            <form action="Commander2.php?retour=4" method="POST">
            <a href="Commander2.php?retour=2">Retour</a>
            <input type="submit" name="Recap" id="Recap" value="Continuer">
            </form>

        <?php
            
            if($_GET["retour"] != 3)
            {
                $connexion = new mysqli("localhost", "root", "", "CommandeRestaurant", "3306");
                if($connexion->connect_error == null)
                {
                    $connexion->query("UPDATE Client SET Nom = '$_POST[nom]', Prenom = '$_POST[prenom]', Email = '$_POST[Email]', Téléphone = '$_POST[telephone]'
                    WHERE Client.IdCommande=(SELECT MAX(Id) As Id FROM Commande);");
                    $resultat= $connexion->query("SELECT MAX(Id) As Id FROM Client");
                    $row = $resultat->fetch_array(MYSQLI_ASSOC);
                    $connexion->query("UPDATE Commande SET IdClient = '$row[Id]' WHERE Id=(SELECT Id FROM Commande ORDER BY Id Desc LIMIT 1)");
                } else {
                    echo $connexion->connect_error;
                    exit();
                }

            $connexion->close();
            }
        
        } else if(isset($_POST["Recap"]))
            {

        ?>

        <?php

        $connexion = new mysqli("localhost", "root", "", "CommandeRestaurant", "3306");
        if($connexion->connect_error == null)
        {
            $resultat = $connexion->query("SELECT Nom, Prenom, Email, Téléphone FROM Client WHERE Id=(SELECT Id FROM Client ORDER BY Id Desc LIMIT 1)");
            $rowClient = $resultat->fetch_array(MYSQLI_ASSOC);
            $nom = $rowClient["Nom"]; $prenom = $rowClient["Prenom"]; $email = $rowClient["Email"]; $telephone = $rowClient["Téléphone"];
            $resultat = $connexion->query("SELECT Total, NbMenu, DateC, Heure FROM Commande WHERE Id=(SELECT Id FROM Commande ORDER BY Id Desc LIMIT 1)");
            $rowCommande = $resultat->fetch_array(MYSQLI_ASSOC);
            $NbMenu = $rowCommande["NbMenu"]; $date = $rowCommande["DateC"]; $heure = $rowCommande["Heure"]; $total = $rowCommande["Total"];
        }
        else {
            echo $connexion->connect_error;
            exit();
        }

?>

        <div class="row rowEtape">
            <ol class="col-11 flexOl colorB">
                <li>1 . Choix menu</li>
                <li>2 . Informations personnelles</li>
                <li>3 . Moyen de paiement</li>
                <li>4 . Récapitulatif</li>
            </ol>
            <h2 class="col-6 recapH2">Récapitulatif</h2>
        </div>
        <div class="row marginRow">
            <div class="col-8 recapBack">
            <p>Nom = <?=$nom?></p>
            <p>Prenom = <?=$prenom?></p>
            <p>Email = <?=$email?></p>
            <p>Téléphone = <?=$telephone?></p>
            <p>Nombre menu = <?=$NbMenu?></p>
            <div class="cible"></div>
<?php
            affichageMenu($NbMenu);
?>
            <p>Date = <?=$date?></p>
            <p>Heure = <?=$heure?></p>
            <div class="row">
            <p class="col-md-2 total">Total = <?=$total?> €</p>
            <div class="col-lg-3">
                <a href="Annuler.php" class="retourRecap">Annuler</a>
            </div>
            <div class="col-lg-3">
                <a class="retourRecap" href="Commander2.php?retour=3">Retour</a>
            </div>
            <form action="valider.php?id=1" method="POST" class="col-lg-4 centerValider">
                <input type="submit" name="Recap" id="Recap" value="Valider">
            </form>
        </div>

        <?php
            } else {
        ?>

        <div class="row rowEtape">
            <ol class="col-lg-11 flexOl colorBli">
                <li>1 . Choix menu</li>
                <li>2 . Informations personnelles</li>
                <li>3 . Moyen de paiement</li>
                <li>4 . Récapitulatif</li>
            </ol>
            <h2 class="col-lg-6">Informations personnelles</h2>
        </div>
        <div class="row form">
        <form action="Commander2.php?retour=2" method="POST" class="col-md-8">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom">
            <br>
            <label for="prenom">Votre prénom : </label>
            <input type="text" name="prenom" id="prenom">
            <br>
            <label for="Email">Votre mail : </label>
            <input type="text" name="Email" id="Email">
            <br>
            <label for="telephone">Votre numéro de téléphone : </label>
            <input type="number" name="telephone" id="telephone">
            <br>
            <div class="row">
            <div class="col-md-4">
            <a href="Annuler.php" class="annuler">Annuler</a>
            </div>
            <div class="col-md-8 row">
            <a class="retour" href="Commander.php#Commander">Retour</a>
            <input type="submit" name="Suite" id="Suite" value="Continuer">
            </div>
            </div>
        </form>
        </div>
        <?php
            }
        ?>
    </main>

    <?php

        function affichageMenu($nbMenu)
        {
            $connexion = new mysqli("localhost", "root", "", "CommandeRestaurant", "3306");
            if($connexion->connect_error == null)
            {
                $requete = $connexion->prepare("SELECT Menu, Boisson, Sauce1, Sauce2 FROM MenuChoix WHERE IdCommande=(SELECT IdCommande FROM MenuChoix ORDER BY IdCommande Desc LIMIT 1)");
                $requete->execute();
                $requete->bind_result($menu, $boisson, $sauce1, $sauce2);
                $i = 0;
                while($requete->fetch())
                {
                    $i++;
                    echo "<script> affichageMenuJs('$menu', '$boisson', '$sauce1', '$sauce2', $i) </script>";
                }
            } else {
                echo $connexion->connect_error;
                exit();
            }

            $connexion->close();
        }

        function TotalCalcul($Menu1, $Menu2, $Menu3, $Menu4)
        {
            $prixMenu = [" " => 0, "Houppier" => 31, "Floraison" => 23, "Racine" => 27];
            $Total = 0;
            $Total = $prixMenu[$Menu1] + $prixMenu[$Menu2] + $prixMenu[$Menu3] + $prixMenu[$Menu4];
            return $Total;
        }

        if(isset($_POST["continue"]))
        {
            $NbPersonnes = $_POST["nbPersonnes"]; $Total = 0; $DateCommande = $_POST["date"]; $Heure = $_POST["heure"];
            $connexion = new mysqli("localhost", "root", "", "CommandeRestaurant", "3306");
            if($connexion->connect_error == null)
            {
                if($NbPersonnes == "1")
                {
                    $menu1 = ["Menu" => $_POST["menu1"], "Boisson" => $_POST["Boisson1"], "Sauce1" => $_POST["Sauce1p1"],
                    "Sauce2" => $_POST["Sauce2p1"]];
                    $Total = TotalCalcul($menu1["Menu"] ," ", " ", " ");
                    $connexion->query("INSERT INTO commande (DateC, Total, NbMenu, Heure) values ('$DateCommande', $Total, '$NbPersonnes', '$Heure');");
                    $resultat = $connexion->query("SELECT MAX(Id) As Id FROM Commande");
                    $row = $resultat->fetch_array(MYSQLI_ASSOC);
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande) 
                    values ('$menu1[Menu]', '$menu1[Boisson]', '$menu1[Sauce1]', '$menu1[Sauce2]', $row[Id]);");
                }
                else if($NbPersonnes == "2")
                {
                    $menu1 = ["Menu" => $_POST["menu1"], "Boisson" => $_POST["Boisson1"], "Sauce1" => $_POST["Sauce1p1"],
                    "Sauce2" => $_POST["Sauce2p1"]];
                    $menu2 = ["Menu" => $_POST["menu2"], "Boisson" => $_POST["Boisson2"], "Sauce1" => $_POST["Sauce1p2"],
                    "Sauce2" => $_POST["Sauce2p2"]];
                    $Total = TotalCalcul($menu1["Menu"], $menu2["Menu"], " ", " ");
                    $connexion->query("INSERT INTO commande (DateC, Total, NbMenu, Heure) values ('$DateCommande', $Total, '$NbPersonnes', '$Heure');");
                    $resultat = $connexion->query("SELECT MAX(Id) As Id FROM Commande");
                    $row = $resultat->fetch_array(MYSQLI_ASSOC);
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande) 
                    values ('$menu1[Menu]', '$menu1[Boisson]', '$menu1[Sauce1]', '$menu1[Sauce2]', $row[Id]);");
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande)
                    values ('$menu2[Menu]', '$menu2[Boisson]', '$menu2[Sauce1]', '$menu2[Sauce2]', $row[Id]);");
                }
                else if($NbPersonnes == "3")
                {
                    $menu1 = ["Menu" => $_POST["menu1"], "Boisson" => $_POST["Boisson1"], "Sauce1" => $_POST["Sauce1p1"],
                    "Sauce2" => $_POST["Sauce2p1"]];
                    $menu2 = ["Menu" => $_POST["menu2"], "Boisson" => $_POST["Boisson2"], "Sauce1" => $_POST["Sauce1p2"],
                    "Sauce2" => $_POST["Sauce2p2"]];
                    $menu3 = ["Menu" => $_POST["menu3"], "Boisson" => $_POST["Boisson3"], "Sauce1" => $_POST["Sauce1p3"],
                    "Sauce2" => $_POST["Sauce2p3"]];
                    $Total = TotalCalcul($menu1["Menu"], $menu2["Menu"], $menu3["Menu"], " ");
                    $connexion->query("INSERT INTO commande (DateC, Total, NbMenu, Heure) values ('$DateCommande', $Total, '$NbPersonnes', '$Heure');");
                    $resultat = $connexion->query("SELECT MAX(Id) As Id FROM Commande");
                    $row = $resultat->fetch_array(MYSQLI_ASSOC);
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande) values
                     ('$menu1[Menu]', '$menu1[Boisson]', '$menu1[Sauce1]', '$menu1[Sauce2]', $row[Id]);");
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande) 
                    values ('$menu2[Menu]', '$menu2[Boisson]', '$menu2[Sauce1]', '$menu2[Sauce2]', $row[Id]);");
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande) 
                    values ('$menu3[Menu]', '$menu3[Boisson]', '$menu3[Sauce1]', '$menu3[Sauce2]', $row[Id]);");
                }
                else if($NbPersonnes == "4")
                {
                    $menu1 = ["Menu" => $_POST["menu1"], "Boisson" => $_POST["Boisson1"], "Sauce1" => $_POST["Sauce1p1"],
                    "Sauce2" => $_POST["Sauce2p1"]];
                    $menu2 = ["Menu" => $_POST["menu2"], "Boisson" => $_POST["Boisson2"], "Sauce1" => $_POST["Sauce1p2"],
                    "Sauce2" => $_POST["Sauce2p2"]];
                    $menu3 = ["Menu" => $_POST["menu3"], "Boisson" => $_POST["Boisson3"], "Sauce1" => $_POST["Sauce1p3"],
                    "Sauce2" => $_POST["Sauce2p3"]];
                    $menu4 = ["Menu" => $_POST["menu4"], "Boisson" => $_POST["Boisson4"], "Sauce1" => $_POST["Sauce1p4"],
                    "Sauce2" => $_POST["Sauce2p4"]];
                    $Total = TotalCalcul($menu1["Menu"], $menu2["Menu"], $menu3["Menu"], $menu4["Menu"]);
                    $connexion->query("INSERT INTO commande (DateC, Total, NbMenu, Heure) values ('$DateCommande', $Total, '$NbPersonnes', '$Heure');");
                    $resultat = $connexion->query("SELECT MAX(Id) As Id FROM Commande");
                    $row = $resultat->fetch_array(MYSQLI_ASSOC);
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande)
                    values ('$menu1[Menu]', '$menu1[Boisson]', '$menu1[Sauce1]', '$menu1[Sauce2]', $row[Id]);");
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande)
                    values ('$menu2[Menu]', '$menu2[Boisson]', '$menu2[Sauce1]', '$menu2[Sauce2]', $row[Id]);");
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande) 
                    values ('$menu3[Menu]', '$menu3[Boisson]', '$menu3[Sauce1]', '$menu3[Sauce2]', $row[Id]);");
                    $connexion->query("INSERT INTO MenuChoix (Menu, Boisson, Sauce1, Sauce2, IdCommande)
                    values ('$menu4[Menu]', '$menu4[Boisson]', '$menu4[Sauce1]', '$menu4[Sauce2]', $row[Id]);");
                }
            }
            else
            {
                echo $connexion->connect_error;
                exit();
            }

            $connexion->query("INSERT INTO Client (IdCommande) values ($row[Id]);");
            $connexion->close();
        }

    ?>
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