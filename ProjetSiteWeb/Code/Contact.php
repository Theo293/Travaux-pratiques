<?php 
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="General.css">
    <link rel="stylesheet" type="text/css" href="Contact.css">
</head>
<body>
    <div class="container-fluid">
<?php

if(isset($_POST["envoyer"]))
{

    $valide = true;
    $nom = (String) $_POST["nom"];
    $Email = (String) $_POST["Email"];
    $sujet = (int) $_POST["objet"];
    $message = (String) $_POST["message"];

    if(empty($nom))
    {
        $valide = false;
        $erreurNom = "Le nom n'a pas été renseigné";
    }

    if(empty($Email))
    {
        $valide = false;
        $erreurMail = "L'email n'a pas été renseigné";
    }
    else if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
    {
        $valide = false;
        $erreurMail = "L'email n'est pas correcte";
    }

    $testValeur = [1, 2, 3, 4];
    if(!in_array($sujet, $testValeur))
    {
        $valide = false;
        $erreurSujet = "Le sujet ne correspond pas";
    }

    $nbSujet = $sujet;

        switch ($sujet) 
        {
            case 1:
                $sujet = "Question";
            break;
            case 2:
                $sujet = "Partenariat";
            break;
            case 3:
                $sujet = "Recrutement";
            break;
            case 4:
                $sujet = "Autre";
            break;
            default:
                $sujet = "Incorrect";
            break;
        }

    if(empty($message))
    {
        $valide = false;
        $erreurMessage = "Le message ne peut pas être vide";
    }

    if($valide)
    {
        $dest = "mathiastheo42@gmail.com";
        $objet = "Formulaire de contact (". $sujet . ")";
        $message = "Un utilisateur du site a utilisé le formulaire de contact pour vous contacter.<br>" .
        "Nom : " . $nom . '<br>' ."Objet : " . $sujet . '<br>' . "Message : " . $message;
        $entetes =  'MIME-Version: 1.0' . "\r\n";
        $entetes .= "From: " . $Email . "\r\n";
        $entetes .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        mail($dest, $objet, $message, $entetes);

        header('Location: Valider.php?id=2');
    }
}

?>
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
                        <a class="nav-link" href="Commander.php">Commander à emporter</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link active" href="Contact.php">Contact</a>
                    </li>
                </ol>
            </div>
        </nav>
    </header>
    <main>
        <div class="row imageContact">
            <h1>Contact</h1>
        </div>
        <div class="row map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.6738752389306!2d3.870870003856345!3d43.592508844767664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6afb64a393fa1%3A0xd493d2ec3a9c3a2d!2s1%20Place%20de%20Poblet%2C%2034070%20Montpellier!5e0!3m2!1sfr!2sfr!4v1606340261229!5m2!1sfr!2sfr"
                width="1100" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0"></iframe>
        </div>
        <div class="row titreContact">
            <h2 class="col-sm-6">Contactez-nous</h2>
        </div>
        <div class="row contact">
            <form action="Contact.php" method="POST" class="col-lg-7">
                <input type="text" name="nom" id="nom" placeholder="Nom*" value="<?php if(isset($nom)) { echo $nom; }?>">
                <input type="text" name="Email" id="Email" placeholder="Email*" value="<?php if(isset($Email)) {echo $Email;}?>">
                <?php
                    if(isset($erreurNom))
                    {
                ?>
                        <div class="error marginError"><?= $erreurNom ?></div>
                <?php
                    } else {
                ?>
                        <div></div>
                <?php
                    }
                ?>
                <?php
                    if(isset($erreurMail))
                    {
                ?>
                        <div class="error"><?= $erreurMail ?></div>
                <?php
                    } else {
                ?>
                        <div></div>
                <?php
                    }
                ?>
                <br>
                <select name="objet" id="objet">
                    <?php
                        if(isset($sujet))
                        {
                    ?>
                            <option value="<?= $nbSujet ?>" selected><?= $sujet ?></option>
                    <?php
                        } else {
                    ?>
                            <option selected>Choisissez</option>
                    <?php
                        }
                    ?>
                    <option value="1">Question</option>
                    <option value="2">Partenariat</option>
                    <option value="3">Recrutement</option>
                    <option value="4">Autre</option>
                </select>
                <?php
                    if(isset($erreurSujet))
                    {
                ?>
                        <div class="error"><?= $erreurSujet ?></div>
                <?php
                    } else {
                ?>
                        <div></div>
                <?php
                    }
                ?>
                <br>
                <textarea name="message" id="message" maxlength="1000" placeholder="Votre message*"><?php if(isset($message)) {echo $message;}?></textarea>
                <?php
                    if(isset($erreurMessage))
                    {
                ?>
                        <div class="error"><?= $erreurMessage ?></div>
                <?php
                    } else {
                ?>
                        <div></div>
                <?php
                    }
                ?>
                <br>
                <input type="submit" value="Envoyer" id="button" name="envoyer">
            </form>

            <div class="col-lg-2 coordonnees">
                <h5>Coordonnees</h5>
                <span>1 Place Poblet, 34070</span>
                <br>
                <span>06 99 99 99 99</span>
                <br>
                <span>mathiastheo42@gmail.com</span>
            </div>
        </div>
        <div class="row arrierePlan">
            <div class="col-md-4 horaire">
                <h6>Heures d'ouverture</h6>
                <span>Du Lundi au Samedi</span>
                <div class="ligne"></div>
                <span>Matin</span>
                <span>8h30 - 12h30</span>
                <div class="ligne"></div>
                <span>Après-Midi</span>
                <span>13h30 - 17h00</span>
            </div>
            <div class="col-md-4 contactM">
                <h5>Retrouvez nous également sur les réseaux sociaux !</h5>
                <div class="ligne2"></div>
                <div class="row imgPosition text-center">
                    <div class="col-3">
                        <a href="https://twitter.com/?logout=1606358251947" class="a"><img
                            src="Images/iconfinder_online_social_media_twitter_734377.png" class="img"></a>
                    </div>
                    <div class="col-3">
                        <a href="https://fr-fr.facebook.com/" class="a"><img
                            src="Images/iconfinder_facebook_online_social_media_734399.png" class="img"></a>
                    </div>
                    <div class="col-3">
                        <a href="https://www.instagram.com/?hl=fr" class="a"><img
                            src="Images/iconfinder_instagram_online_social_media_734394.png" class="img"></a>
                    </div>
                    <div class="col-3">
                        <a href="https://www.linkedin.com/home" class="a"><img
                            src="Images/iconfinder_online_social_media_linked_in_734383.png" class="img"></a>
                    </div>
                </div>
            </div>
        </div>
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