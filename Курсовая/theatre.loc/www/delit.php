<?php
session_start();
include ('conn.php');
$id = $_GET["id"];
        $stmt = $conn->query("DELETE FROM `spectacles` WHERE `spectacles`.`id` = $id");
            header('Location: админка.php');
    
?>