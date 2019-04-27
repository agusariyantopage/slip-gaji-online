<?php 
include"koneksi.php";
include "fungsi_rupiah.php";
session_start();
	if(empty($_SESSION['username']) and empty($_SESSION['password'])){
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Slip Gaji</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
    
    <!-- CKEDITOR -->
    <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus berita ini ?")) {
return true;
} else {
return false;
}
}
</script>
</head>
<body>
    <div id="wrapper">
        <?php include "header.php"; ?>
        <!-- /. NAV TOP  -->
        <?php include "sidebar.php" ?>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
            	 <?php include "content.php" ?>
            </div>
        <!-- /. PAGE WRAPPER  -->
   		</div>
    </div>
    <!-- /. WRAPPER  -->

    <footer >
        &copy; 2018 Diana Software Developement | By : <a href="http://www.backtoskull.wordpress.com/" target="_blank">Agus Ariyanto</a>
    </footer>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
