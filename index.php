<?php 
    try{
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
                
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vap Factory</title>
    </head>
    <body>

        <table border="1" width="90%;" >
            <tbody>
                <?php 
        foreach ($products as $product) {
          ?> <tr> <?php 
            for ($i=0; $i <= count($products); $i++) { ?>
                    <td><?php echo $product[$i]; ?></td>
                <?php } ?>
                </tr>
                <?php
        }
        ?>
            </tbody>
        </table>
    </body>
</html>