<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aperçu Entrées</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="General.css">
    <link rel="stylesheet" type="text/css" href="Apercu.css">
</head>
<body>
    <div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg bg-light navbar-light" id="navBarre">
            <a class="navbar-brand" href="#"><img src="Images/vector-leaf-green-nature-logo-and-symbol-templateR.png">le Jardin Gourmand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">
                <ol class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link px-4" href="Accueil.html">Accueil</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link active" href="LaCarte.html">La carte</a>
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
            $id = $_GET["id"];
            if($id == 1) 
            { 
                echo "<div class='row imageEntrées'>
                <div class='col-md-6'>
                    <h1>Apercu des entrees</h1>
                    <p></p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Mini chaussons aux epices</h4>
                    <p class='paragraphe'>Ces chaussons s'accompagnent délicieusement bien avec la petite sauce 
                        au yaourt et menthe pour un petit voyage gustatif aux airs indiens</p>
                </div>
                <div class='col-md-6 MiniChaussons'>
    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 order-md-2'>
                    <h4>Salade de quinoa</h4>
                    <p class='paragraphe'>Une salade végétarienne healthy fraîche et particulièrement savoureuse pour cet été</p>
                </div>
                <div class='col-md-6 SaladeQuinoa order-md-1'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Tartines au pesto et tomates cerise</h4>
                    <p class='paragraphe'>Tranches de pain nappez de pesto, recouvère de tomates cerise et arrosez d’un filet
                         d’huile, cette entrées sera ravir vos papilles.</p>
                </div>
                <div class='col-md-6 Tartines'>
    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 order-md-2'>
                    <h4>Aumonieres</h4>
                    <p class='paragraphe'>Confectionnées avec des feuilles de brick ou des crêpes, les aumônières font 
                        toujours beaucoup d’effet dans les assiettes</p>
                </div>
                <div class='col-md-6 Aumonières order-md-1'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Brouillade d'oeufs aux feves</h4>
                    <p class='paragraphe'>Cuits à feu doux, ces œufs sont crémeux,
                     parfumés à l'oseille et accompagnés de quelques fines lamelles de lardons et de jeunes fèves fraiches</p>
                </div>
                <div class='col-md-6 Brouillade'>
    
                </div>
            </div>";
            } elseif($id == 2) {
                echo "<div class='row imagePlats'>
                <div class='col-md-6'>
                    <h1>Apercu des plats</h1>
                    <p></p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Calzone</h4>
                    <p class='paragraphe'>Recette culinaire typique des Pouilles, notre calzone préparé avec le 
                    respect de la recette originale sera ravir vos papilles</p>
                </div>
                <div class='col-md-6 Calzone'>
    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 order-md-2'>
                    <h4>Courgettes farcies</h4>
                    <p class='paragraphe'>Recette de courgettes farcies légères est idéale pour un repas complet</p>
                </div>
                <div class='col-md-6 Courgettes order-md-1'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Papillotes de lentilles</h4>
                    <p class='paragraphe'>Recette de Papillote légère de lentilles aux tomates cerises, courgette et chèvre émietté.</p>
                </div>
                <div class='col-md-6 Papillotes'>
    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 order-md-2'>
                    <h4>Bourguignon au tofu et seitan</h4>
                    <p class='paragraphe'>Plat emblématique de la province dont il se revendique, le bourguignon de seitan
                    est une estouffade de morceaux de viande (végétale) mijotée au vin rouge de Bourgogne 
                     et accompagnée d’une garniture de champignons et de petits oignons. </p>
                </div>
                <div class='col-md-6 Bourguignon order-md-1'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Vichyssoise</h4>
                    <p class='paragraphe'>Soupe, faite de purée de pomme de terre, de blanc de poireau et de bouillon de poule,
                     liée à la crème fraîche et condimentée de ciboulette ciselée.</p>
                </div>
                <div class='col-md-6 Vichyssoise'>
    
                </div>
            </div>";
            } elseif($id == 3) {
                echo "<div class='row imageDesserts'>
                <div class='col-md-6'>
                    <h1>Apercu des desserts</h1>
                    <p></p>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Tarte au citron meringuee</h4>
                    <p class='paragraphe'>Tarte au citron meringuee préparée sur une pâte légère et croustillante, 
                    avec une crème parfumée au citron et surmontée d'une meringue caramélisée au chalumeau.</p>
                </div>
                <div class='col-md-6 TarteMeringuée'>
    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 order-md-2'>
                    <h4>Fondant chocolat coeur coulant</h4>
                    <p class='paragraphe'>Petit dessert pour les vrais amateurs de chocolat ! Un fondant moelleux à
                     coeur qui coule lorsqu'on l'ouvre.</p>
                </div>
                <div class='col-md-6 Fondant order-md-1'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Panna cotta vanille et citron</h4>
                    <p class='paragraphe'>En mélangeant la douceur de la vanille et l'acidité du citron, Cette panna
                    cotta est un dessert irrésistible et parfait pour clôturer un repas</p>
                </div>
                <div class='col-md-6 PannaCotta'>
    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6 order-md-2'>
                    <h4>Flan patissier</h4>
                    <p class='paragraphe'>Recette de flan pâtissier à la vanille onctueux et plein de goût</p>
                </div>
                <div class='col-md-6 Flan order-md-1'>
                    
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <h4>Mousse au chocolat</h4>
                    <p class='paragraphe'>Recette de mousse au chocolat onctueuse et légère qui ravira tout les passionnés de chocolat</p>
                </div>
                <div class='col-md-6 Mousse'>
    
                </div>
            </div>";
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