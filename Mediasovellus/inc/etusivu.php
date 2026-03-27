<?php
if (isset($_GET['operation']) && $_GET['operation'] === 'modify') {
    require_once 'update-form.php';
} else {
    require_once 'media-form.php';
}
require_once 'media-table.php';