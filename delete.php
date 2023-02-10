<?php

require_once 'database.php';

$id = $_GET["id"] ?? null;

if (!empty($id)) {
    try {
        $sql = "DELETE FROM `vapoteuses_eliquides` WHERE `id` = $id;";
        $mysqlConnection->query($sql);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    header('Location: index.php');
    exit;
}

?>