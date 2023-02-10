<?php

$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=VapFactory;charset=utf8',
    'admin',
    'adminpwd'
    );

$getid = $_GET['id'] ?? null;
$sql = "SELECT * FROM vapoteuses_eliquides WHERE id = $getid";
$productUpdates = $mysqlConnection->query($sql);
$product = $productUpdates->fetch();
$updateReference = $_POST['reference'] ?? $product['reference'];
$updateNomArticle = $_POST['nom_article'] ?? $product['nom_article'];
$updateDescriptionArticle = $_POST['description_article'] ?? $product['description_article'];
$updatePrixAchat = $_POST['prix_achat'] ?? $product['prix_achat'];
$updatePrixVente = $_POST['prix_vente'] ?? $product['prix_vente'];
$updateStock = $_POST['stock'] ?? $product['stock'];

if (isset($_POST['submit'])) {
    $updating = "UPDATE vapoteuses_eliquides SET reference = '$updateReference', nom_article = '$updateNomArticle', description_article = '$updateDescriptionArticle', prix_achat = '$updatePrixAchat', prix_vente = '$updatePrixVente', stock = '$updateStock' WHERE id = $getid;";
    $result = $mysqlConnection->query($updating);
    if ($result) {
        echo "mis a jour";
        
        
    }
}

include 'index.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updatestyle.css">
    <title>Document</title>
</head>
<body>
    <form class="updateform" action="" method="post">
        <input type="number" name="reference" value="<?php echo $updateReference ?>">
        <input type="text" name="nom_article" value="<?php echo $updateNomArticle ?>">
        <input class="updateform__description" type="text" name="description_article" value="<?php echo $updateDescriptionArticle ?>">
        <input type="text" name="prix_achat" value="<?php echo $updatePrixAchat ?>">
        <input type="number" name="prix_vente" value="<?php echo $updatePrixVente ?>">
        <input type="number" name="stock" value="<?php echo $updateStock ?>">
    
        <button name="submit" type="submit">submit</button>
    </form>
</body>
</html>