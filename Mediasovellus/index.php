<?php

require_once __DIR__ . '/inc/header.php';

if (isset($_GET['operation']) && $_GET['operation'] === 'modify') {
    require_once __DIR__ . '/inc/update-form.php';
} else {
    require_once __DIR__ . '/inc/media-form.php';
}

require_once __DIR__ . '/inc/etusivu.php';
require_once __DIR__ . '/inc/footer.php';
