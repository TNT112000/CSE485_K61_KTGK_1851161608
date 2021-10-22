<?php
define('HOST','localhost');
define('USER','root');
const PASS = '';
const DB   = 'exam';
$conn = mysqli_connect(HOST,USER, PASS,DB);
if(!$conn){
    die('Không thể kết nối');
}
?>