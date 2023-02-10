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
        header('Location: index.php');
        exit;
        
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Modification produit</title>
</head>
<body>
    <header>
        <img src="images/Logo.png">
    </header>
    <h1 class="titreUpdate" >Mise à jour du produit</h1>

    <form class="ajout" action="" method="post">
        <div class="line1">
            <input type="number" name="reference" value="<?php echo $updateReference ?>">
            <input type="text" name="nom_article" value="<?php echo $updateNomArticle ?>">
        </div>
        <div class="line2">
            <textarea class="updateform__description" type="text" name="description_article"><?php echo $updateDescriptionArticle ?></textarea>
        </div>
        <div class="line3">
            <input type="text" name="prix_achat" value="<?php echo $updatePrixAchat ?>">
            <input type="number" name="prix_vente" value="<?php echo $updatePrixVente ?>">
        </div>
        <div class="line4">
            <input type="number" name="stock" value="<?php echo $updateStock ?>">
            <button class="btn btn-primary" name="submit" type="submit">ENVOYER</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>