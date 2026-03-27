<?php

require_once __DIR__ . '/../../../../dbconfig.php';

global $host;
global $dbname;
global $username;
global $password;

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $DBH = new PDO($dsn, $username, $password);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $e) {
    exit("DB ERROR: " . $e->getMessage());
    echo "Could not connect to database.";
    file_put_contents('PDOErrors.txt', 'dbConnect.php - ' . $e->getMessage() . "\n", FILE_APPEND);
}
?>