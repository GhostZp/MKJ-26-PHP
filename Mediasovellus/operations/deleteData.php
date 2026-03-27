<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
global $DBH;

if (!isset($_POST['media_id'])) {
    exit('No ID provided');
}

$sql = "DELETE FROM MediaItems WHERE media_id = :media_id";

try {
    $STH = $DBH->prepare($sql);
    $STH->execute([
        'media_id' => $_POST['media_id']
    ]);

    header('Location: ' . SITE_URL);
} catch (PDOException $e) {
    echo "Delete failed";
}