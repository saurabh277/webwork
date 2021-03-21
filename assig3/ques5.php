<?php
    include('config.php');
?>
<br>

<html>
<head>
<script>
function confirmDelete(Id){
    if(confirm("are you sure")){
        location.href = "delete.php?id=" + Id;
    }
    else{
        location.href = "ques4.php";
    }
}
</script>
</head>
<body>
<form action ="ques5.php" method="POST">
 Name :<input type="text" name ="user">
<input type ="submit" name="submit" value="see details" >
</form>
</body>
</html>
<br>

<?php
if(isset($_POST['submit'])){
    $username=$_POST['user'];

$sql = "SELECT * FROM `users` WHERE `username` = '$username'";
$result = mysqli_query($conn,$sql);

$no_rows = mysqli_num_rows($result);
if($no_rows > 0)
{
    ?>
    <table border ="1px">
    <tr>
    <th>ID</th>
    <th>USERNAME</th>
    <th>EMAIL</th>
    <th>GENDER</th>
    <th>CITY</th>
    <th>UPDATE</th>
    <th>DELETE</th>
    </tr>
    <?php
    $row  =mysqli_fetch_assoc($result);
    while($row!=NULL){
        ?>
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['city'] ?></td>
        <td><a href="edit.php?id=<?php echo $row['id']?>"><input type="button" name="edit" value="edit"></a></td>
        <td><input type="button" name="delete" value="delete" onclick="confirmDelete('<?php echo $row['id'] ?>')"></td>
        </tr>
        <?php
        $row =mysqli_fetch_assoc($result);
       
    }
    ?>
    </table>
    <?php
}
}
?>

