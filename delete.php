<?php

require_once 'database.php';

$action = $_GET["action"] ?? null;
$id = $_GET["id"] ?? null;


try {
    $sql = "DELETE FROM `vapoteuses_eliquides`.`id` = $id ";
    $stmt = $mysqlConnection->query($sql);
 }
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

header('Location: index.php');
exit;
