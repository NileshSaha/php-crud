<?php
    require 'classes/Add.php';

    $add=new Add();
    if($add->checkSubmit($_POST)){
        unset($_POST['submit']);
        $add->addData($_POST);
    }else{
        $add->output_errors();
    }
?>
    <form action="" method='POST'>
        <h1>ADD DETAILS</h1>
        <ul>
            <li>
                Student Name*:<br>
                <input type="text" name="name">
            </li>
            <li>
                Class*:<br>
                <input type="text" name="class">
            </li>
            <li>
                Section*:<br>
                <input type="text" name="section">
            </li>
            <input type="Submit" name="submit" value="Add Data">
        </ul>
    </form>