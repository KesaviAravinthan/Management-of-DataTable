<?php
include 'dbh.php';
$name = $_GET['name'];
$id = $_GET['id'];

$sql = "SELECT firstname from students where id='$id';";
$result = mysqli_query($conn,$sql);
if(!$result){die('QUERY FAIL!');}
$rowcount=mysqli_num_rows($result);
if($rowcount>0){
    $sql = "DELETE FROM students where id='$id'";
    mysqli_query($conn,$sql);
    $msg = "successfully deleted."; 
}else{
    $msg = "not deleted ERROR!!!";
}
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?php echo $msg; ?></strong> 
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
