<?php
include 'dbh.php';

$name = $_POST['student_name'];
$id = $_POST['id_num'];


    $sql = "UPDATE students SET firstname='$name'  WHERE id='$id'";
    mysqli_query($conn,$sql);
  
    ?>
   
    <td><?php echo $id;  ?></td>
    <td><?php echo $name;  ?></td>
    <td><button type="button" id="del" class="btn btn-primary del" data-id=''>DEL</button></td>
    <td><button type="button" id="edit" class="btn btn-primary edit" data-id=''>Edit</button></td>
    
