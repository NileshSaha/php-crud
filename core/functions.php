<?php
    require 'connection.php';

    // function addData(array $data){
    //     $connect = db();
    //     $fields = '"'.implode('","',$data).'"';
    //     $sql = "INSERT INTO `students` (`name`,`class`,`section`) VALUES ($fields)";
    //     $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    // }

    function view(){
        $connect = db();
        $sql = "SELECT * FROM `students`";
        $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
        $s = [];
        while($row = mysqli_fetch_assoc($query)){
           $s[]=$row;
        }
        ?>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
            <?php
            foreach($s as $value){
                ?>
                <tr>
                    <td>
                        <?php echo $value['id']?>
                    </td>
                    <td>
                        <?php echo $value['name']?>
                    </td>
                    <td>
                        <?php echo $value['class']?>
                    </td>
                    <td>
                        <?php echo $value['section']?>
                    </td>
                    <td>
                        <a href='?action=update&id=<?php echo $value['id'];?>'><button type="button" >Update</button></a>
                        <a href='?action=delete&id=<?php echo $value['id'];?>'><button type="button" >Delete</button></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }

    function delete($id){
        $connect = db();
        $sql = "DELETE FROM `students` WHERE `id`='{$id}'";
        $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    }
/*
    // function update($id){
    //     $connect = db();
    //     $sql = "SELECT `name`,`class`,`section` FROM `students` WHERE `id`='{$id}'";
    //     $query = mysqli_query($connect,$sql);
    //     $row = mysqli_fetch_assoc($query);
    //     edit($row,$id);
    // }

    function edit($data,$id){
        $fields = [
            'name' ,
            'class',
            'section'
        ];
        $fieldvalue = [];
        $errors = [];
        if(isset($_POST['submit'])){
            // foreach($fields as $field){
            //     if(empty($_POST[$field])){
            //         $errors[] = $field." value is missing.";
            //     }
            // }
            if(empty($errors)){
                foreach($fields as $field){
                    $fieldvalue[$field]=$_POST[$field];
                }
                updateInDB($fieldvalue,$id);
                //update value to database
                echo "ok";
                ?>
                <script>
                    window.location.href = '?action=view';
                </script>
                <?php
            }else{
               output_errors($errors);
            }
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
        <?php
    }
    // function updateInDB(array $data,$id){
    //     $connect = db();
    //     $sql = "UPDATE `students` SET `name`='{$data['name']}',`section`='{$data['section']}',`class`='{$data['class']}' WHERE `id`='{$id}'";
    //     $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    // }

    function output_errors($errors){
        foreach($errors as $error){
            echo $error.'<br>';
        }
    }
    */
?>