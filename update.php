<?php
include'index.php';
$getid = $_GET["id"] ?? null;
function getDatabaseConnexion() {
    try {
        $user = "root";
        $pass = "";
        $pdo = new PDO('mysql:host=localhost;dbname=tuto_php', $user, $pass);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
        $requete = "SELECT * FROM vapoteuses_eliquides WHERE id= '$getid'";
        $rows = $con->query($requete);
        return $productUpdate;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
    <p><?php  echo $productUpdate?></p>          
    <input type="number" placeholder="<?php  echo $products["id"] ?>">
    <input type="text" placeholder="<?php $products ?>">
    <input type="text" placeholder="description article ">
    <input type="number" placeholder="prix achat">
    <input type="number" placeholder="prix vente">
    <input type="number" placeholder="stock">
    <button type="submit">submit</button>
    </form>
</body>
</html>