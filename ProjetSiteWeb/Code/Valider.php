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
    <link rel="stylesheet" type="text/css" href="Valider.css">
    <title>Validation</title>
</head>
<body>
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
            if($_GET["id"] == 1)
            {
        ?>
        <div class="row valider">
            <div class="col-7 validerCol">
                <h1>Commande enregistrée !</h1>
                <p>Merci d'avoir commandé chez nous, votre commande sera prête à la date et l'heure indiquée. Nous espérons
                    que vous passerez un excellent repas.
                </p>
                <a href="Accueil.html">Accueil</a>
            </div>
        </div>
        <div class="space"></div>

        <?php
            } else if($_GET["id"] == 2) {
        ?>
        <div class="row valider">
            <div class="col-7 validerCol">
                <h1>Mail envoyé</h1>
                <p>Merci d'avoir utilisé notre formulaire. Votre mail a bel et bien été envoyé, nous vous répondrons sous peu.
                </p>
                <a href="Accueil.html">Accueil</a>
            </div>
        </div>
        <div class="space"></div>
        <?php
            }
        ?>
    </main>
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
                $requete = $connexion->prepare("SELECT Menu, Boisson, Sauce1, Sauce2 FROM MenuChoix WHERE IdCommande=(SELECT IdCommande FROM MenuChoix ORDER BY IdCommande Desc LIMIT 1)");
                $requete->execute();
                $dest = "mathiastheo42@gmail.com";
                $objet = "Commande à emporter";
                $message = "Un utilisateur du site a commandé à emporter.<br>Recapitulatif de la commande<br>" .
                "Nom : " . $nom . '<br>' ."Prenom : " . $prenom . '<br>' . "Email : " . $email . '<br>' . "Téléphone : " .
                $telephone . '<br>' . "Nombre de personnes : " . $NbMenu . '<br>';
                $requete->bind_result($menu, $boisson, $sauce1, $sauce2);
                $i = 0;
                $messageMenu = "";
                while($requete->fetch())
                {
                    $i++;
                    $messageMenu .= "Menu " . $i . '<br>' . "Menu : " . $menu . '<br>' . "Boisson : " . $boisson . '<br>' .
                    "Sauce 1 : " . $sauce1 . '<br>' . "Sauce 2 : " . $sauce2 . '<br>';
                }
                $message .= $messageMenu;
                $message .= "Date : " . $date . '<br>' . "Heure : " . $heure . '<br>' . "Total : " . $total . "€";
                $entetes =  'MIME-Version: 1.0' . "\r\n";
                $entetes .= "From: " . $email . "\r\n";
                $entetes .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
                mail($dest, $objet, $message, $entetes);
                $dest = $email;
                $message = "Merci d'avoir commandé chez nous" . '<br>' . "Récapitulatif de la commande" . '<br>' .
                "Nom : " . $nom . '<br>' ."Prenom : " . $prenom . '<br>' . "Email : " . $email . '<br>' . "Téléphone : " .
                $telephone . '<br>' . "Nombre de personnes : " . $NbMenu . '<br>' . $messageMenu . "Date : " . $date .
                '<br>' . "Heure : " . $heure . '<br>' . "Total : " . $total . "€";
                mail($dest, $objet, $message, $entetes);
            }
            else {
                echo $connexion->connect_error;
                exit();
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