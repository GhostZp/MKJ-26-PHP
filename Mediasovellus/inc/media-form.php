<?php
require_once __DIR__ . '/../config/config.php';
?>


<section>
    <h3>Insert media item</h3>
    <form method="post" action="<?php echo SITE_URL; ?>operations/insertData.php" enctype="multipart/form-data">
        <div class="form-control">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-control">
            <label for="description">Description: </label>
            <input type="text" name="description" id="description">
        </div>
        <div class="form-control">
            <label for="file">File: </label>
            <input type="file" name="file" id="file" accept="image/*,video/*">
        </div>
        <div class="form-control">
            <button type="submit">
                Send
            </button>
        </div>
    </form>
</section>