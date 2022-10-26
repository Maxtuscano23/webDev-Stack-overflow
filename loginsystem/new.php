<html> 
  <head>
<title> Insertion </title>
<style>
  body{
    background-color: lightblue;
     }
   .data input {
    width: 48%;
    height: 5%;
    margin-top: 1%;
    padding: 17;
    border: 1px solid blue; 
    border-radius: 10px;
   }

   table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th,tr {
    color: black;
    text-decoration: none;
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.table1{
    color: black;
    text-decoration: none;
}
</style> 
</head>
<body> 
<center>
  <h1>ask your question</h1>
  <form action="" method="POST">
  <div class="data">
    <input type="text" name="name" placeholder="type you language in which you want to ask question" required/><br/>
    <input type="text" name="description" placeholder="type your question" required/><br/>
    <input type="submit" name="insert" values="INSERT DATA"/><br/>
  </div>
  </form>
</center>
</body>
</html>

<?php

$connection = mysqli_connect("localhost","root", "");
$db = mysqli_select_db($connection,'three38inc');

if(isset($_POST['insert']))
{
    // $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query = "INSERT INTO `employee`(`name`,`description`) VALUES('$name','$description')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo'<script> alert("Data Inserted")</script>';
    }
    else{
        echo'<script> alert("Data DID NOT Inserted")</script>';
    }
}
?>

 <?php 
include("connection.php");

?> 

<table class="table1">
    <tr>
    <th>Sr.no</th>
        <th>name</th>
        <th>description</th>
        <th>view answer</th>
       
    </tr>
    <?php
    $query = mysqli_query($connection,"select * from employee");
    while($row = mysqli_fetch_array($query))
    {
    ?>
    <tr>
    <td ><?php echo $row['id']; ?></td> 
        <td ><?php echo $row['name']; ?></td>  
        <td > <?php echo $row['description']; ?></a></td>
        <td ><a href="answer.php?id=<?php echo $row['id']; ?>">View answer</a></td> 
        
    </tr>

<?php }
?>
</table>