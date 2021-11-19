<?php
include 'dbh.php';

$name = $_POST['name'];

if(isset($_POST['name'])){
    $sql = "insert into students (firstname) VALUES ('$name');";
   mysqli_query($conn, $sql);
   $id = mysqli_insert_id($conn);
    ?>
    <td><?php  echo $id;  ?></td>
    <td><?php  echo $name;  ?></td>
    <td><button type="button" id="del" class="btn btn-primary del" data-id="<?php echo $id; ?>">DEL</button></td>
    <td><button type="button" id="edit" class="btn btn-primary edit" data-id='{$id}'>Edit</button></td>

    
    
<?php


}else{
    echo "NO _POST['submit'] created yet!!";
}




?>