<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
global $DBH;

if ( $_FILES['file'] == null ) {
    exit("No file uploaded");
}

if(!empty($_POST['title']) || !empty($_POST['description']) || $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $tmp_name    = $_FILES['file']['tmp_name'];
    $filename    = $_FILES['file']['name'];
    $destination = __DIR__ . '/../uploads/' . $filename;

    if ( !move_uploaded_file( $tmp_name, $destination ) ) {
        exit("Move failed");
    }

    $sql = "INSERT INTO MediaItems (title, description, user_id, filename, filesize, media_type) VALUES (:title, :description, :user_id, :filename, :filesize, :media_type)";

    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'user_id' => 1,
        'filename' => $filename,
        'filesize' => $_FILES['file']['size'],
        'media_type' => $_FILES['file']['type'],
    ];

    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        header('Location: ' . SITE_URL);
    } catch (PDOException $e) {
        echo "Could not insert data into the database.";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.log', 'insertData.php - ' . $e->getMessage() . "\n", FILE_APPEND);
    }

} else {
    exit('No data or file');
}