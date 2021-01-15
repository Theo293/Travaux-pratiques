<?php

    function suppresion()
    {
        $connexion = new mysqli("localhost", "root", "", "CommandeRestaurant", "3306");
        if($connexion->connect_error == null)
        {
            $connexion->query("DELETE FROM MenuChoix WHERE IdCommande=(SELECT Id FROM Commande ORDER BY Id Desc LIMIT 1)");
            $connexion->query("DELETE FROM Client WHERE Id=(SELECT Id FROM Client ORDER BY Id Desc LIMIT 1)");
            $connexion->query("DELETE FROM Commande WHERE Id=(SELECT Id FROM Commande ORDER BY Id Desc LIMIT 1)");
        }
        else
        {
            echo $connexion->connect_error;
            exit();
        }
    }

    suppresion();
    $connexion->close();
    header('Location: Commander.php');
?>