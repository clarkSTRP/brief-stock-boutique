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

        </script>
    </body>
</html>