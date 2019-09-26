
<h1>UPDATE DETAILS</h1>
<?php
require 'classes/Update.php';
$id = $_GET['id'];
$update = new Update($id);
$data = $update->selectRow();

if($update->checkSubmit($_POST)){
    unset($_POST['submit']);
    $update->updateInDB($_POST);
    ?>
        <script>
            window.location.href = '?action=view';
        </script>
    <?php
}else{
    $update->output_errors();
}

?>
<form action='' method="POST">
    <ul>
        <li>
            Name*:<br>
            <input type="text" name="name" value="<?php echo $data['name']?>";>
        </li>
        <li>
            Class*:<br>
            <input type="text" name="class" value="<?php echo $data['class']?>";>
        </li>
        <li>
            Section*:<br>
            <input type="text" name="section" value="<?php echo $data['section']?>";>
        </li>
    </ul>
    <input type="submit" name="submit" value="submit">
</form>