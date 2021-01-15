<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP03</title>
</head>
<body>
<?php
        class abonne {
            private $id;
            private $nom;
            private $prenom;
            private $date_naissance;
            private $ville;
            private $date_inscription;
            private $date_fin_abo;

            public function getId() {
                return $this->id;
            }

            public function getNom() {
                return $this->nom;
            }

            public function getPrenom() {
                return $this->prenom;
            }

            public function getdateNaissance() {
                return $this->date_naissance;
            }

            public function getVille() {
                return $this->ville;
            }

            public function getdateInscription() {
                return $this->date_inscription;
            }

            public function getdateFinAbo() {
                return $this->date_fin_abo;
            }
        }
    ?>

<?php
        $enregistrement = 0;

        if (isset($_POST["enregistrer"])) {
            $dsn = "mysql:host=localhost; dbname=exo9";
            try {
                $db = new PDO($dsn, "root", "");
            } catch(Exception $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
            $id = $_POST["id"];
            $ville = strtoupper($_POST["ville"]);
            $dateInscription = $_POST["dateInscription"];
            $dateFinAbo = $_POST["dateFinAbo"];
            $dateInscriptionVerif = explode("-", $dateInscription);
            $dateFinAboVerif = explode("-", $dateFinAbo);
            if(!checkdate($dateInscriptionVerif[1], $dateInscriptionVerif[2], $dateInscriptionVerif[0]) || !checkdate($dateFinAboVerif[1], $dateFinAboVerif[2],
            $dateFinAboVerif[0]))
            {
                echo "Date invalide";
            } else {
                $sql = "UPDATE abonne SET nom = '"  . $_POST["nom"] . "', prenom = '" . $_POST["prenom"] . "', ville = '" . $ville . "', date_inscription = '" . $dateInscription
                . "', date_fin_abo = '" . $dateFinAbo . "' WHERE id = ?";
                $req = $db->prepare($sql);
                $result = $req->execute(array($id));
                $enregistrement = 1;
            }
        }

        if(isset($_GET["id"]) || isset($_POST["id"]))
        {
            $dsn = "mysql:host=localhost; dbname=exo9";
            if(isset($_POST["id"]))
                $id = $_POST["id"];
            else
                $id = $_GET["id"];
            try {
                $db = new PDO($dsn, "root", "");
            } catch(Exception $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
            $sql = "SELECT * FROM abonne WHERE id = ?";
            $req = $db->prepare($sql);
            $result = $req->execute(array($id));
            if($result === "false")
            {
                die("Erreur de la requête : " . $db->errorInfo()[2]);
            }
            $abonne = $req->fetchObject("abonne");
            if($abonne == false)
            {
                die("Abonné inexistant");
            }

        }
    ?>

    <form action="TP03.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php if(isset($abonne)) echo $abonne->getNom(); else echo ""; ?>">
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?php if(isset($abonne)) echo $abonne->getPrenom(); else echo ""; ?>">
        <br>
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" value="<?php if(isset($abonne)) echo $abonne->getVille(); else echo ""; ?>">
        <br>
        <?php
            if(isset($abonne))
            {
        ?>
            <label for="dateInscription">Date inscription</label>
            <input type="text" name="dateInscription" value="<?php if(isset($abonne)) echo $abonne->getdateInscription(); else echo ""; ?>">
            <br>
            <label for="dateFinAbo">Date fin abonnement</label>
            <input type="text" name="dateFinAbo" value="<?php if(isset($abonne)) echo $abonne->getdateFinAbo(); else echo ""; ?>">
            <br>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
            <input type="submit" name="enregistrer" value="Enregistrer">
            <input type="hidden" name="id" value="<?php echo $abonne->getId(); ?>">
        <?php
            } else {
        ?>
            <label for="date">Abonnement valide : </label>
            <select name="date">
            <option value=" "></option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Rechercher">
        <?php
            }

            if($enregistrement == 1)
                echo "Enregistrement effectué";
        ?>
    </form>

    <?php
        if(isset($_POST["submit"])) {
        $and = 0;
        $dsn = "mysql:host=localhost; dbname=exo9";
        try {
            $db = new PDO($dsn, "root", "");
        } catch(Exception $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
        $sql = "SELECT * FROM abonne WHERE ";
        $nom = $_POST["nom"];
        if($nom != "")
        {
            $sql .= "nom = '" . $nom . "' ";
            $and = 1;
        }
        $prenom = $_POST["prenom"];
        if($prenom != "" && $and == 1)
        {
            $sql .= "&& prenom = '" . $prenom . "' ";
        }
        else if($prenom != "")
        {
            $sql .= "prenom = '" . $prenom . "' ";
            $and = 1;
        }

        $ville = $_POST["ville"];
        $ville = strtoupper($ville);
        if($ville != "" && $and == 1)
        {
            $sql .= "&& ville = '" . $ville . "' ";
        }
        else if($ville != "")
        {
            $sql .= "ville = '" . $ville . "' ";
            $and = 1;
        }

        $dateActuelle = new DateTime();

        $aboValide = $_POST["date"];
        if($aboValide == "oui" && $and == 1)
        {
            $sql .= "&& '" . $dateActuelle->format("Y-m-d") . "' < date_fin_abo";
        }
        else if($aboValide == "oui")
        {
            $sql .=  "'" . $dateActuelle->format("Y-m-d") . "' < date_fin_abo";
        }
        else if($aboValide == "non" && $and == 1)
        {
            $sql .=  "&& '" . $dateActuelle->format("Y-m-d") . "' > date_fin_abo";
        }
        else if($aboValide == "non")
        {
            $sql .=  "'" . $dateActuelle->format("Y-m-d") . "' > date_fin_abo";
        }

        if($sql == "SELECT * FROM abonne WHERE ")
        {
            die("Vous devez au moins renseigner un champ");
        }

        $req = $db->prepare($sql);
        $result = $req->execute(array());
        if($result === "false")
        {
            die("Erreur de la requête : " . $db->errorInfo()[2]);
        }
        $abonne = $req->fetchObject("abonne");
        if($abonne == false)
        {
            die("Abonné inexistant");
        }
        echo "<p style='font-weight: bold; position: relative; left: 5%'>Nom Prénom Ville Date de naissance date fin abonnement</p>";
        while($abonne)
        {
            echo "<a href='TP03.php?id=" . $abonne->getId() . "'>Modifier</a> " . $abonne->getNom() . " " . $abonne->getPrenom() . " " . $abonne->getVille() . " " .
            $abonne->getdateNaissance() . " " . $abonne->getdateFinAbo() . "<br>"; 
            $abonne = $req->fetchObject("abonne");
        }
        }
    ?>
</body>
</html>