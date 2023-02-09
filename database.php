<?php 
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