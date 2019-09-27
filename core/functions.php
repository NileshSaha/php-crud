<?php
    require 'connection.php';

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
?>