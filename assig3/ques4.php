<?php
include('config.php');
?>
<?php
$sql ="SELECT * FROM `users`";
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
        <?php
        $row =mysqli_fetch_assoc($result);
       
    }
    ?>
    </table>
    <?php
}
?>