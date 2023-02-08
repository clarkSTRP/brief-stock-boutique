<?php 

$reference = $_GET["reference"] ?? null;
$nom_article = $_GET["nom_article"] ?? null;
$description_article = $_GET["description_article"] ?? null;
$prix_achat = $_GET["prix_achat"] ?? null;
$prix_vente = $_GET["prix_vente"] ?? null;
$stock = $_GET["stock"] ?? null;


    try {
        $mysqlConnection = new PDO(
            'mysql:host=localhost;dbname=VapFactory;charset=utf8',
            'admin',
            'adminpwd'
            );
            }
            catch (Exception $e)
            {
            die('Erreur : ' . $e->getMessage());
            }
                
        $sqlQuery = 'SELECT * FROM vapoteuses_eliquides';
        $productsStatement = $mysqlConnection->prepare($sqlQuery);
        $productsStatement->execute();
        $products = $productsStatement->fetchAll();
        $columnHead = $productsStatement-> columnCount();
        

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Vap Factory</title>
    </head>
    <body>
        <header>
            <h1>VAP FACTORY</h1>
        </header>
        <form action="">
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
                <button type="submit" class="ajouter">Ajouter</button>
            </div>
        </form>

        <table>
            <thead>
                <tr> 
                    <?php
                for ($i=0; $i < $columnHead; $i++) { ?>
                    <th>
                       <?php 
                         echo $productsStatement->getColumnMeta($i)["name"];
                        ?> 
                    </th>
                <?php } ?>
                </tr>
            </thead>

            <tbody>
                <?php 
        foreach ($products as $product) {
          ?> <tr> <?php 
            for ($i=0; $i <= count($products); $i++) { ?>
                    <td><?php echo $product[$i]; ?></td>
                <?php 
            } ?>
                <td><button>Modifier</button></td>
                <td><button>Supprimer</button></td>
                </tr>
        <?php
        }
        ?>
            </tbody>
        </table>

        <script>
            let addButton = document.getElementsByClassName('ajouter')[0]

            addButton.addEventListener('click', createProduct)
        
            function createProduct($reference, $nom_article, $description_article, $prix_achat, $prix_vente, $stock) {
                <?php try {
       
                $sql = " INSERT INTO vapoteuses_eliquides (reference, nom_article, description_article, prix_achat, prix_vente, stock) 
                        VALUES ('$reference', '$nom_article', '$description_article', '$prix_achat', '$prix_vente', '$stock')";
                $mysqlConnection->exec($sql);
                }
                catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
                } ?>
    }
        </script>
    </body>
</html>