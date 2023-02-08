<?php 
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

function getAllProducts() {
    $con = getDatabaseConnexion();
	$requete = 'SELECT * from vapoteuses_eliquides';
	$rows = $con->query($requete);
	return $rows;
}
function readProduct($id) {
    $con = getDatabaseConnexion();
		$requete = "SELECT * FROM vapoteuses_eliquides where id = '$id' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
}
function createProduct($reference, $nom_article, $description_article, $prix_achat, $prix_vente, $stock) {
    try {
        $con = getDatabaseConnexion();
        $sql = "INSERT INTO vapoteuses_eliquides (reference, nom_article, description_article, prix_achat, prix_vente, stock) 
                VALUES ('$reference', '$nom_article', '$description_article', '$prix_achat', '$prix_vente', '$stock')";
        $con->exec($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function updateProduct($id, $reference, $nom_article, $description_article, $prix_achat, $prix_vente, $stock) {
    try {
        $con = getDatabaseConnexion();
        $sql = "UPDATE vapoteuses_eliquides set 
                    reference = '$reference',
                    nom_article = '$nom_article',
                    description_article = '$description_article',
                    prix_achat = '$prix_achat',
                    prix_vente = '$prix_vente',
                    stock = '$stock',
                    where id = '$id' ";
        $stmt = $con->query($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function deleteProduct($id){
    try {
        $con = getDatabaseConnexion();
        $sql = "DELETE from vapoteuses_eliquides where id = '$id' ";
        $stmt = $con->query($sql);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

?>