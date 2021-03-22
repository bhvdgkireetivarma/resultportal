<link rel="stylesheet" href="studentlogin.css?version=1"/>
<style>
table{
    width:100%;
   border-bottom:1px solid black;
   padding:5px;
}
td{
    
    padding:8px;
}
</style>
<?php
session_start();
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name="";
$studentid=$_SESSION['studentroll'];
$sql="SELECT * FROM student_details WHERE roll='$studentid' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row['studentname'];
$rollnumber=$row['roll'];
$gender=$row['gender'];
$bday=$row['birthdate'];
$email=$row['email'];
$class=$row['class'];
$phone=$row['phonenumber'];
if(isset($_POST['submit']))
{
    $sql2="UPDATE studentcheck
    SET checked='1' 
    where rollnumber='$studentid'";
    $result3=$conn->query($sql2);
  $_SESSION['namee']=$name;
    
    header('location:result.php');
    
}
?>
<html>
<head>
    
</head>
<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class="name">
        welcome <?php echo "$name" ; ?>
</div>
<div class="main">
 
 

<table>
<tr>

    <td>Student Name:  <span><?php echo " $name" ;?></span></td>


  <td>  Gender: <span><?php echo " $gender" ;?></span></td>
    </tr>
<tr>
   <td> Roll Number: <span><?php echo " $rollnumber" ;?></span></td>

    <td>Class: <span><?php echo " $class" ;?></span></td>
</tr>
<tr>
   <td> Email Id: <span><?php echo " $email" ;?></span></td>

 <td>Birth Date: <span><?php echo " $bday" ;?></span></td>
 </tr>
<tr>
 <td>Phone Number: <span><?php echo " $phone" ;?></span></td>
 </tr>
 </table>


<div class="button">
    <button type="submit" name="submit">Get Result
</button>
</div>


</form>
<div class="logout">
<a href="logout.php" class="log"><button type="submit">Log out</a>
</div>
</div>
</body>




    </html>