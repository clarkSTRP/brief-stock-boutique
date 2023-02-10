<?php

require_once 'database.php';


        $reference = $_GET["reference"] ?? null;
        $nom_article = $_GET["nom_article"] ?? null;
        $description_article = $_GET["description_article"] ?? null;
        $prix_achat = $_GET["prix_achat"] ?? null;
        $prix_vente = $_GET["prix_vente"] ?? null;
        $stock = $_GET["stock"] ?? null;


        
        if (!empty($reference) && !empty($nom_article) && !empty($description_article) && !empty($prix_achat) && !empty($prix_vente) && !empty($stock)) {  
            try {
            $sql = "INSERT INTO vapoteuses_eliquides (reference, nom_article, description_article, prix_achat, prix_vente, stock) 
                    VALUES ('$reference', '$nom_article', '$description_article', '$prix_achat', '$prix_vente', '$stock')";
            $mysqlConnection->exec($sql);
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }

            header('Location: index.php');
            exit;
        } 

?>
