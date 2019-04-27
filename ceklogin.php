<?php 

include"koneksi.php";

$lembaga	= $_POST['lembaga'];	
$username	= $_POST['nama'];
$password	= $_POST['password'];

$sql=mysql_query("SELECT * from karyawan where nama='$username' and password='$password' and lembaga='$lembaga'");
$ketemu=mysql_num_rows($sql);
$r=mysql_fetch_array($sql);

if ($ketemu > 0) {

	session_start();
	$_SESSION['idk']	=$r['id_karyawan'];
	$_SESSION['nama'] 	= $r['nama'];
	$_SESSION['password'] = $r['password'];
	$_SESSION['lembaga'] = $r['lembaga'];

	header("location:index.php");

}else{
	header("location:login.php#erorlogin");
};
 ?>}
