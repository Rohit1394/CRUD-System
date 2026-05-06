<?php 
$con = mysqli_connect("localhost","root","","08d1");

if($con){
    echo "<script>alert('connection built successfully')</script>";
}
else{
    echo "<script>alert('connection error')</script>";
}
?>