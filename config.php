<?php
$host = "postgres";
$db = "postgres";
$user = $db;
$password = $db;

try {
	$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	//$conexao = pg_connect("host=$host port=$5432 dbname=$postgres "+"user=$db password=$db");
} catch (PDOException $e) {

} 
