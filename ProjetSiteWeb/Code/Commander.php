<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander à emporter</title>
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
    <link rel="stylesheet" type="text/css" href="Commander.css">
</head>

<body onload="Total(5)">
    
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
            <div class="row imageCommander">
                <h1 class="titre">Commander</h1>
            </div>
            <div class="row heightDiv1">
                <h4 class="col-md-12 Titre colorTitre">Commander a emporter</h4>
                <p class="col-md-7 paragraphe">Oscillant habilement entre tradition et modernité, nous livrons
                    une cuisine gourmande et raffinée à la fois : des plats classiques,
                    sont revisités pour leur apporter une touche de créativité subtile. Les assiettes savoureuses
                    vous invitent à prendre le temps de vivre ce voyage culinaire, initié par notre équipe.
                    <br><br> Notre équipe fait également parler son expérience et sa technique pour ne mettre
                    en valeur que des produits de saison, sélectionnés auprès des producteurs locaux
                </p>
            </div>
            <div class="row row1">
                <div class="col-md-6 menu1">

                </div>
                <div class="col-md-5 backGrey">
                    <h4 class="colorTitre">Menu Houppier</h4>
                    <p><span>31.00 €</span></p>
                    <div>
                        <p>Ce menu comprend :</p>
                        <ul>
                            <li>Mini chaussons aux épices</li>
                            <li>Bourguignon au tofu et seitan</li>
                            <li>Tarte au citron meringuée</li>
                            <li>1 Boisson au choix</li>
                            <li>2 sauces au choix</li>
                        </ul>
                        <p>Hors jours fériés</p>
                        <a href="#Commander">Commander à emporter</a>
                    </div>

                </div>
            </div>
            <div class="row row1 justify-content-end">
                <div class="col-md-6 menu2 order-md-2">

                </div>
                <div class="col-md-5 backGrey order-md-1">
                    <h4 class="colorTitre">Menu Floraison</h4>
                    <p><span>23.00 €</span></p>
                    <div>
                        <p>Ce menu comprend :</p>
                        <ul>
                            <li>Aumônières</li>
                            <li>Vichyssoise</li>
                            <li>Panna cotta vanille et citron</li>
                            <li>1 Boisson au choix</li>
                            <li>2 sauces au choix</li>
                        </ul>
                        <p>Hors jours fériés</p>
                        <a href="#Commander">Commander à emporter</a>
                    </div>
                    
                </div>
            </div>

            <div class="row row1">
                <div class="col-md-6 menu3">

                </div>
                <div class="col-md-5 backGrey heightMenu3">
                    <h4 class="colorTitre">Menu Racine</h4>
                    <p><span>27.00 €</span></p>
                    <div>
                        <p>Ce menu comprend :</p>
                        <ul>
                            <li>Tartines au pesto et tomates cerise</li>
                            <li>Calzone</li>
                            <li>Fondant chocolat cœur coulant</li>
                            <li>1 Boisson au choix</li>
                            <li>2 sauces au choix</li>
                        </ul>
                        <p>Hors jours fériés</p>
                        <a href="#Commander">Commander à emporter</a>
                    </div>

                </div>
            </div>
            <span id="Commander"></span>
            <div class="row h3">
                <h3>Commander a emporter</h3>
            </div>
            <div class="row">
                <form class="col-md-11 commanderBack" action="Commander2.php?retour=2" method="POST" id="heightForm">
                    <div class="row form cibleNbP">
                        <div class="marginLeft">
                            <label for="nbPersonnes">Nombre de personnes : </label>
                            <select name="nbPersonnes" id="nbPersonnes" value=" " onchange="nbChange()">
                                <option value=" ">Choisissez</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <br>
                            <label for="choixMenu">Choix du menu : </label>
                            <select name="menu1" id="menu1" value=" " onchange="Total('1')">
                                <option value="Choisissez">Choisissez</option>
                                <option value="Houppier">Houppier (31 €)</option>
                                <option value="Floraison">Floraison (23 €)</option>
                                <option value="Racine">Racine (27 €)</option>
                            </select>
                            <br>
                            <label for="Boisson">Boisson (33cl) : </label>
                            <select name="Boisson1" id="Boisson" value=" ">
                                <option value="Choisissez">Choisissez</option>
                                <option value="IceTea">Ice Tea</option>
                                <option value="Coca">Coca</option>
                                <option value="Pepsi">Pepsi</option>
                                <option value="Orangina">Orangina</option>
                                <option value="Oasis">Oasis</option>
                            </select>
                            <br>
                            <label for="Sauce1">Sauce 1 : </label>
                            <select name="Sauce1p1" id="Sauce1" value=" ">
                                <option value="Choisissez">Choisissez</option>
                                <option value="Barbecue">Barbecue</option>
                                <option value="Moutarde">Moutarde</option>
                                <option value="Mayonnaise">Mayonnaise</option>
                                <option value="Hollandaise">Hollandaise</option>
                                <option value="Aigre-douce">Aigre-douce</option>
                            </select>
                            <br>
                            <label for="Sauce2">Sauce 2 : </label>
                            <select name="Sauce2p1" id="Sauce2" value=" ">
                                <option value="Choisissez">Choisissez</option>
                                <option value="Barbecue">Barbecue</option>
                                <option value="Moutarde">Moutarde</option>
                                <option value="Mayonnaise">Mayonnaise</option>
                                <option value="Hollandaise">Hollandaise</option>
                                <option value="Aigre-douce">Aigre-douce</option>
                            </select>
                        </div>
                    </div>
                    <div class="row ligne"></div>
                    <div class="row">
                        <div class="col-7 col-sm-7 col-md-10 CibleDate">

                        </div>
                        <div class="col-5 col-sm-5 col-md-2 cible">

                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <a href="Accueil.html" class="button"><input type="submit" name="continue" id="continue"
                                value="Continuer                >"></a>
                    </div>
                </form>
            </div>
            <div class="row reserver">
                <div class="col-md-12 reservation">
                    <h5>Reservation</h5>
                    <p>Réserver une table pour 1 à 6 personnes de 9h30-12h30 et 13h30-17h00 toute
                        la semaine hors dimanche et jours fériés. Nous vous garantissons un accueil chaleureux et
                        aucune attente pour accéder à votre table.</p>
                    <a href="Reserver.php">Réserver une table</a>
                </div>
            </div>

        </main>
        <footer>
            <div class="row black">
                <div class="col-md-7 FooterHeight">
                    <ul class="ulFlex">
                        <li class="footer"><a href="Mentionlegale.html" class="colorF">Mentions légales</a></li>
                        <li class="footer widthLi"><a href="Politique.html" class="colorF">Politique de
                                confidentialité</a></li>
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

    <script>
        function ResizeDivForm () {
        let height = document.getElementById("heightForm");
            if(nbP == "4")
            {
                if(document.body.clientWidth >= 1310)
                    height.style.height = "500px";
                else if(document.body.clientWidth < 1310 && document.body.clientWidth >= 614)
                    height.style.height = "750px";
                else if(document.body.clientWidth < 614 && document.body.clientWidth >= 362)
                    height.style.height = "1200px";
                else if(document.body.clientWidth < 362)
                    height.style.height = "1350px";
            }
            else if(nbP == "3")
            {
                if(document.body.clientWidth >= 1000)
                    height.style.height = "500px";
                else if(document.body.clientWidth >= 614 && document.body.clientWidth < 1000)
                    height.style.height = "800px";
                else if(document.body.clientWidth < 614 && document.body.clientWidth >= 362)
                    height.style.height = "1050px";
                else if(document.body.clientWidth < 362)
                    height.style.height = "1150px";
            }
            else if(nbP == "2")
            {
                if(document.body.clientWidth >= 614)
                    height.style.height = "500px";
                else if(document.body.clientWidth < 614 && document.body.clientWidth >= 362)
                    height.style.height = "750px";
                else if(document.body.clientWidth < 362)
                    height.style.height = "900px";
            }
            else if(nbP == "1")
            {
                if(document.body.clientWidth < 360)
                    height.style.height = "600px";
            }
        }

        window.addEventListener('resize', ResizeDivForm);
    </script>

</body>

</html>