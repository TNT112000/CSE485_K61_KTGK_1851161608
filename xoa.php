<?php
include 'config.php';
if(isset($_GET['id'])){
   $id=$_GET['id'];
}
$sql="DELETE FROM exam WHERE id=$id";
$query = mysqli_query($conn,$sql);
header("location: index.php");
?>