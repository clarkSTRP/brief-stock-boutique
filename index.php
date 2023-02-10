<?php 

require_once 'database.php';

include 'create.php';



        $sqlQuery = 'SELECT * FROM vapoteuses_eliquides';
        $productsStatement = $mysqlConnection->prepare($sqlQuery);
        $productsStatement->execute();
        $products = $productsStatement->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Vap Factory</title>
    </head>
    <body>
        <header>
            <img src="images/Logo.png">
        </header>

<!-- Formulaire pour ajouter un produit dans my sql -->
        <form action="" class="ajout">
            <div class="line1"> 
                <input type="number" name="reference" id="reference" placeholder="Référence">
                <input type="text" placeholder="Nom du produit" name="nom_article">
            </div>
            <div class="line2">
                <textarea name="description_article" id="description_article" placeholder="Description du produit"></textarea>
            </div>
            <div class="line3">
                <input type="number" name="prix_achat" id="prix_achat" placeholder="Prix d'achat">
                <input type="number" name="prix_vente" id="prix_vente" placeholder="Prix de vente">
            </div>
            <div class="line4">
                <input type="number" name="stock" id="stock" placeholder="Stock produit">
                <button type="submit" class="btn btn-primary" ><i class="fa-regular fa-plus"></i></a> Ajouter un produit</button>
            </div>
        </form>


        <table class="table">
            <thead>
                <tr>
                        <th>ID</th>
                        <th>Référence</th>
                        <th>Nom de l'article</th>
                        <th>Description</th>
                        <th>Prix d'achat</th>
                        <th>Prix de vente</th>
                        <th>Stock</th>
                        <th>Modifications</th>
                </tr>
            </thead>

            <tbody>
                    <?php 
            foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['reference']; ?></td>
                    <td><?php echo $product['nom_article']; ?></td>
                    <td><?php echo $product['description_article']; ?></td>
                    <td><?php echo $product['prix_achat']; ?></td>
                    <td><?php echo $product['prix_vente']; ?></td>
                    <td><?php echo $product['stock']; ?></td>

                    <td>
                    <a href="update.php?id=<?=$product['id']?>" name="updateId" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i> </a>
                    <a href="delete.php?id=<?=$product['id']?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> </a>
                    </td>

                </tr>
            <?php endforeach;?>
                </tbody>
            </table>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </body>
</html>