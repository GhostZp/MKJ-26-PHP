<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['remember'])) {
        setcookie('username', $_POST['username'], 0, '', '', true, true);
    } else {
        setcookie('username', '', time() - 3600);
    }
}
?>

<?php
include('./inc/header.php');
?>


<div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username</label>
        <input name="username" id="username" value="<?php echo $_COOKIE['username'] ?? ''; ?>">

        <label>
            Remember me
            <input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked': ''; ?>>
        </label>

        <button type="submit">Send</button>
    </form>
</div>

<?php
include('./inc/footer.php');
?>