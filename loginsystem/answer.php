<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<title> Answer </title>
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


<body>

<?php 
include("connection.php")
?>

<?php

$id= $_GET['id'];

$sql = "SELECT * FROM `employee` WHERE id = $id";
$result = mysqli_query($connection, $sql);

 
  while($row = mysqli_fetch_assoc($result)){
 
  
  $name=$row['name'];
  $desc=$row['description'];

     
   
  }

?>
<div class="container my-5 box "  >
<div class="jumbotron  text-center " >
<h1 class="display-6"></h1>
<h1 class="display-6">Language:<?php echo"$name"?></h1>

<p class="lead"><b>Question Description:</b><?php echo"$desc"?></p>



<?php
include("connection.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
  $id=$_GET['id'];
  $answer = $_POST['answer'];
 // $desc = $_POST['thread_desc'];
 //  echo"$id";
 //$sql=" INSERT INTO `comment` ( `comment`, `thread_id`) VALUES ( '$comment','$id')";
 $sql="INSERT INTO `answersofquestion` ( `Q_id`,`answer`) VALUES ('$id','$answer') ";

//$sql=" INSERT INTO `explore` ( 'thread_cat_id',`thread_name`, `thread_desc`) VALUES ('$cat_id','$title', '$desc')";
$result = mysqli_query($connection,$sql);
if($result){
    echo '<script>alert("Answer posted")</script>';
   
}else{
    echo '<script>alert("Answer posted")</script>'.mysqli_error($connection);
}
}


?>




<div class="cont">
    <div class="container" id="box">
  <h2 >Add Answers</h2>     
</div>
<div class="container">

<form action="<?php echo $_SERVER['REQUEST_URI']?>" method='post'>
  <div class="form-group">
   <B> <label for="comment" id="box"> ANSWER:</label></B>
    <textarea name="answer" id="title" cols="30" rows="2" class="form-control"placeholder="Enter Answer" required></textarea>
  </div>

 
  <button type="submit" class="button2">POST</button>
</form>

</div>
</div>
<h2 class="text-center" id="box">Answers</h2>

<?php
 $id= $_GET['id'];
$sql = "SELECT * FROM `answersofquestion` WHERE Q_id = $id";
    $result = mysqli_query($connection, $sql);
  
      // We can fetch in a better way using the while loop
     $no_result = true;
      while($row = mysqli_fetch_assoc($result)){
      $no_result = false;
        //  $cat_id=$row["category_id"];
      $answer=$row['answer'];
        $answer = str_replace("<", "&lt;", $answer);
        $answer = str_replace(">", "&gt;", $answer); 
      // need to display the title n description from database by using category id
    echo'  <div class="container  " id="box">
      <div class="media border p-3 ">
        
        <div class="media-body">
          <h5>  <small><i>  '. $answer .'.</i></small></a></h5>
         
        </div>
      </div>
      </div>';
    

      }
if($no_result){
  //echo"no result found";
  echo' <div class="container" id="box">
  <div class="jumbotron">
  <h1>NO ANSWERS POSTED YET!!</h1>
  <p>BE THE FIRST PERSON TO ADD THE COMMENT</p>
</div>
</div>
  ';
}

?>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
