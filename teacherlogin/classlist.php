<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
.heading{
    text-align:center;
    margin:20px;
    font-family:helvetica;
    font-size:2em;
}


</style>



<?php
session_start();
$classnumber=$_SESSION['classnum'];
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<body>";
echo "<div class='heading'>
Class Students Result
</div>";
$sql="SELECT * FROM studentgrades 
     WHERE class='$classnumber' ";
     $result=$conn->query($sql);
     echo "<table>";
     echo "<tr>";
         echo "<th>Roll number</th>";
         echo "<th>name</th>";
         echo "<th>Telugu</th>";
         echo "<th>English</th>";
         echo "<th>Hindi</th>";
         echo "<th>Social</th>";
         echo "<th>Science</th>";
         echo "<th>cp</th>";
     echo "</tr>";
    while($row=$result->fetch_assoc())
    {
        echo "<tr><td>".$row['rollnumber']."</td><td>".$row['name']."</td><td>".$row['Telugu']."</td><td>". $row['English']."</td><td>".$row['Hindi']."</td><td>".

        $row['Social']."</td><td>".$row['Science']."</td><td>".$row['CP']."</td></tr>";

    }
   

    echo "</body>";


?>
