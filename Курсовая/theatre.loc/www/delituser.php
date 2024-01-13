<?php
session_start();
include ('conn.php');
$id = $_GET["id"];
        $stmt = $conn->query("DELETE FROM `users` WHERE `users`.`id` = $id");
            header('Location: админка.php');
       
    
?>