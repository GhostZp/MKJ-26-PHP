<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
global $DBH;

if (!isset($_GET['media_id'])) {
    exit('No media ID');
}

$sql = "SELECT * FROM MediaItems WHERE media_id = :media_id";

$STH = $DBH->prepare($sql);
$STH->execute(['media_id' => $_GET['media_id']]);
$media = $STH->fetch(PDO::FETCH_ASSOC);

if (!$media) {
    exit('Media not found');
}
?>

<section>
    <h3>Update media item</h3>

    <form method="post" action="<?php echo SITE_URL; ?>operations/updateData.php">
        <input type="hidden" name="media_id" value="<?php echo $media['media_id']; ?>">

        <div class="form-control">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value="<?php echo $media['title']; ?>">
        </div>

        <div class="form-control">
            <label for="description">Description: </label>
            <input type="text" name="description" id="description" value="<?php echo $media['description']; ?>">
        </div>

        <div class="form-control">
            <button type="submit">Send</button>
            <a href="<?php echo SITE_URL; ?>">Cancel</a>
        </div>
    </form>
</section>