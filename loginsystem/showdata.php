<!-- <?php 
include("connection.php");
?>
<style>
   table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<table>
    <tr>
        <th>name</th>
        <th>description</th>
    </tr>
    <?php 
    $query = mysqli_query($connection,"select * from employee");
    while($row = mysqli_fetch_array($query))
    {
    ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['description']; ?></td>
    </tr>

<?php }
?>
</table> -->