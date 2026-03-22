<?php
$style = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Color (radio)
    if (!empty($_POST['color'])) {
        $style .= 'color:' . $_POST['color'] . ';';
    }

    // Size (select)
    if (!empty($_POST['size'])) {
        $sizes = [
                'small' => '12px',
                'medium' => '18px',
                'large' => '26px'
        ];
        $style .= 'font-size:' . $sizes[$_POST['size']] . ';';
    }

    // Font styles (checkboxes)
    if (!empty($_POST['style'])) {
        if (in_array('bold', $_POST['style'])) {
            $style .= 'font-weight:bold;';
        }
        if (in_array('italic', $_POST['style'])) {
            $style .= 'font-style:italic;';
        }
    }
}
?>

<?php include('./inc/header.php'); ?>

    <div>
        <form method="post">

            <!-- Color -->
            <p>Color:</p>
            <label><input type="radio" name="color" value="red"> Red</label>
            <label><input type="radio" name="color" value="green"> Green</label>
            <label><input type="radio" name="color" value="blue"> Blue</label>

            <!-- Size -->
            <p>Size:</p>
            <select name="size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>

            <!-- Font style -->
            <p>Font style:</p>
            <label><input type="checkbox" name="style[]" value="bold"> Bold</label>
            <label><input type="checkbox" name="style[]" value="italic"> Italic</label>

            <br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

<?php if (!empty($style)): ?>
    <div style="<?php echo $style; ?>">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        This text reflects your selected styles.
    </div>
<?php endif; ?>

<?php include('./inc/footer.php'); ?>