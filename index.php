<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    bonjour je suis content
</body>
</html>
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
?>