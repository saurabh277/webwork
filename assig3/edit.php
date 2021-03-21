<?php
    include('config.php');
?>

<?php 
 $id=$_GET['id'];
 $sql="SELECT * FROM `users` WHERE `id`=$id";
 $result=mysqli_query($conn,$sql);
 $row=$result->fetch_assoc();
 $username=$row['username'];
 $email=$row['email'];
 $gender=$row['gender'];
 $city=$row['city'];
?>

<?php
if(isset($_POST['submit']))
{
    $username=$row['username'];
    $email=$row['email'];
    $gender=$row['gender'];
    $city=$row['city'];
    $sql= "UPDATE  `users` SET username='$username', email='$email', gender='$gender', city='$city' WHERE id='$id'"; 

    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Data updated successfully";
        header("Location:ques4.php");
    }
    else{
        echo "Failed to update";
    }
}
?>

<html>
<head>

</head>
<body>
<form action="edit.php" method="POST">
    Username <input type="text" name="username" value="<?php echo $username ?>"  required/>
    <br>
    Email-id  <input type="email" name="email" value="<?php echo $email ?> " required/>
    <br>
    Gender-
    <input type="radio" name="gender" value="Male" <?php if($gender =="Male"){echo "Checked" ;} ?>>Male 
    <input type="radio" name="gender" value="Female" <?php if($gender =="Female"){echo "Checked" ;} ?>>Female 
    <br>
    Select City  <select name="city">
    <option>Choose city--></option> 
    <option value="Pithoragarh" <?php if($city=="Pithoragarh"){ echo "selected";}?>>Pithoragarh</option>
    <option value="DehraDun" <?php if($city=="DehraDun"){ echo "selected";}?>>DehraDun</option>
    <option value="Delhi" <?php if($city=="Delhi"){ echo "selected";}?>>Delhi</option>
    <option value="Jaipur"<?php if($city=="Jaipur"){ echo "selected";}?>>Jaipur</option>
    <option value="Goa" <?php if($city=="Goa"){ echo "selected";}?>>gao</option>
    <option value="Kerala" <?php if($city=="Kerala"){ echo "selected";}?>>kerala</option>
    </select>
    <br>
    <input type="submit" name="submit" value="Click here to Update">  
</form>
</body>
</html>