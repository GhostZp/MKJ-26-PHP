<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
global $DBH;

if (!isset($_POST['media_id'])) {
    exit('No ID');
}

$sql = "UPDATE MediaItems 
        SET title = :title, description = :description 
        WHERE media_id = :media_id";

$data = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'media_id' => $_POST['media_id']
];

try {
    $STH = $DBH->prepare($sql);
    $STH->execute($data);

    header('Location: ' . SITE_URL);
} catch (PDOException $e) {
    echo "Update failed";
}