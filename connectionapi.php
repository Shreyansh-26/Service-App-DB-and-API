<?php 
 
 $hostname='localhost';
 $username='root';
 $password='';
 $dbname='appdb';

 $conn=mysqli_connect($hostname,$username,$password,$dbname,3308);

 if(!$conn){
 	echo"connection failure";
 }
 else
 	echo"connection success";

 ?>