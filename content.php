<?php if(@$_GET['p']=='dasboard' || empty($_GET['p'])) { ?>
	<?php include"content/dasboard.php"; ?>

<?php }elseif(@$_GET['p']=='slipbulan') { ?>
	<?php include"content/slipbulan.php"; ?>

<?php }elseif(@$_GET['p']=='view') { ?>
	<?php include"content/view.php"; ?>

<?php }elseif(@$_GET['p']=='detail') { ?>
	<?php include"content/detail.php"; ?>
    
<?php }elseif(@$_GET['p']=='sliptahun') { ?>
	<?php include"content/sliptahun.php"; ?>

<?php } ?>