<?php

$host = 'localhost';
$port = 3306;
$dbname = 'utilisateur';
$user = 'root';
$pwd = '';


$newBD = new PDO("mysql:host={$host};port={$port};dbname={$dbname}",$user,$pwd);
$newBD->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$newBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>