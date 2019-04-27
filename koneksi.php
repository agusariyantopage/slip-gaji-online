<?php 
$server = "localhost";
$username = "root";
$password ="";
$db = "payroll";

mysql_connect($server,$username,$password) or die("cek koneksi");
mysql_select_db($db);
 ?>