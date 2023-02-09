<?php 
$id = $_GET["id"] ?? null;
$reference = $_GET["reference"] ?? null;
$nom_article = $_GET["nom_article"] ?? null;
$description_article = $_GET["description_article"] ?? null;
$prix_achat = $_GET["prix_achat"] ?? null;
$prix_vente = $_GET["prix_vente"] ?? null;
$stock = $_GET["stock"] ?? null;
$action = $_GET["action"] ?? null;


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
        
        if (!empty($reference) && !empty($nom_article) && !empty($description_article) && !empty($prix_achat) && !empty($prix_vente) && !empty($stock)) {  
            try {
            $sql = "INSERT INTO vapoteuses_eliquides (reference, nom_article, description_article, prix_achat, prix_vente, stock) 
                        VALUES ('$reference', '$nom_article', '$description_article', '$prix_achat', '$prix_vente', '$stock')";
            $mysqlConnection->exec($sql);
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }
        } 

        if ($action == "Supprimer") {
            try {
                $sql = "DELETE from vapoteuses_eliquides where id = '$id' ";
                $stmt = $mysqlConnection->query($sql);
            }
            catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }

        }

        
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

<!-- Formulaire pour ajouter un produit dans my sql -->
        <form action="" >
            <div class="line1">
                <input type="number" name="reference" id="reference" placeholder="Référence">
                <input type="text" placeholder="Nom du produit" name="nom_article">
            </div>
            <div class="line2">
                <textarea
                    name="description_article"
                    id="description_article"
                    placeholder="Description du produit"></textarea>
            </div>
            <div class="line3">
                <input
                    type="number"
                    name="prix_achat"
                    id="prix_achat"
                    placeholder="Prix d'achat">
                <input
                    type="number"
                    name="prix_vente"
                    id="prix_vente"
                    placeholder="Prix de vente">
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
              ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['reference']; ?></td>
                    <td><?php echo $product['nom_article']; ?></td>
                    <td><?php echo $product['description_article']; ?></td>
                    <td><?php echo $product['prix_achat']; ?></td>
                    <td><?php echo $product['prix_vente']; ?></td>
                    <td><?php echo $product['stock']; ?></td>

                        <form action="">
                            <td>
                                <button id="modif">Modifier</button>
                            </td>
                        </form>
                        <form action="">
                        <td>
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <input type="submit" name="action" value="Supprimer">
                            <!-- <button type="submit" >Supprimer</button>     -->
                        </td>
                    </form>
                    </tr>
            <?php
            }
            ?>
                </tbody>
            </table>

        <script>
        </script>
    </body>
</html>