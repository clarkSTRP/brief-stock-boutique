<?php

function afficherTableau($rows, $headers) {
		?>

		<table border="1">
		    <tr>
		    <?php foreach ($headers as $header): ?>
		        <th><?php echo $header; ?></th>
		    <?php endforeach; ?>
		    </tr>

			<?php foreach ($rows as $row): ?>
			    <tr>
			    <?php for ($k = 0; $k < count($headers); $k++): ?>
			    	<?php if ($k == 0){ ?>
			    		<td><?php echo '<a href=formulaireUtilisateur.php?id='.$row[$k].' >'.$row[$k].'</a>'; ?></td>
			    	<?php } else { ?>
			    		<td><?php echo $row[$k]; ?></td>
			    	<?php } ?>
			        
			    <?php endfor; ?>
			    </tr>
			<?php endforeach; ?>

		</table>
		<?php

}
function tableHeader(){
	$con = getDatabaseConnexion();
	$requete = 'SELECT * FROM vapoteuses_eliquides WHERE 1=0;';
	$stmt = $con->query($requete);
	$rows = $stmt->fetchAll();
	return $headValue; 
}

function getHeaderTable() {
	$headers = array(tableHeader());
	$headers[] = "id";
	$headers[] = "reference";
	$headers[] = "nom";
	$headers[] = "age";
	$headers[] = "adresse";
    $headers[] = "adresse";
    $headers[] = "adresse";

	return $headers;
}


?>
