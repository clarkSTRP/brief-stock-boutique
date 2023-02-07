<?php 
	function getDatabaseConnexion() {
		try {
		    $user = "admin";
			$pass = "adminpwd";
			$pdo = new PDO('mysql:host=localhost;dbname=VapFactory', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

    function getAllUsers() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from vapoteuses_eliquides';
		$stmt = $con->query($requete);
        $rows = $stmt->fetchAll();
		return $rows;
    }
?>