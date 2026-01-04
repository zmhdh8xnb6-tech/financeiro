<?php
$host = 'localhost';
$db = 'financeiro';
$user = 'usuario';
$pass = 'senha';

$pdo = new PDO(
    "mysql:host=$host;dbname=$db;charset=utf8",
    $user,
    $pass
);
