<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP02</title>
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

            public function getville() {
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

    <form action="TP.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom">
        <br>
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville">
        <br>
        <label for="date">Abonnement valide : </label>
        <select name="date">
            <option value=" "></option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
        <br>
        <input type="submit" name="submit" value="rechercher">
    </form>

    <?php
        if(isset($_POST["submit"]))
        {
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
            $result = $req->execute(array($nom, $prenom, $ville));
            if($result === "false")
            {
                die("Erreur de la requête : " . $db->errorInfo()[2]);
            }
            $abonne = $req->fetchObject("abonne");
            if($abonne == false)
            {
                die("Abonné inexistant");
            }
            echo "<p style='font-weight: bold;'>Prénom Nom Date de naissance Date fin abonnement</p>";
            while($abonne)
            {
                echo $abonne->getNom() . " " . $abonne->getPrenom() . " " . $abonne->getville() . " " . $abonne->getdateNaissance() . " " . $abonne->getdateFinAbo() . "<br>";
                $abonne = $req->fetchObject("abonne");
            }
        }
    ?>
</body>
</html>