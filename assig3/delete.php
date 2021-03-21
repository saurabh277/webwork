<?php
include('config.php');
?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM `users` WHERE id=$id";
$result = mysqli_query($conn,$sql);
if($result){
echo "Record with id=$id deleted"; 
}
else{
    echo "Deletion failed";
}
?>