<?php session_start();
include "koneksi.php";
include "fungsi_rupiah.php";

		$idk= $_GET['id'];
		$lbg= $_GET['lembaga'];
		$thn= $_GET['tahun'];
		$bln= $_GET['bulan'];
		$passwd= $_GET['passwd'];
		
		$allow='xxx';
		$cek_valid=mysql_query("select * from validasi where bulan='$bln' and tahun='$thn' and status='Close'");
		$allow=mysql_num_rows($cek_valid);
		
		if ($allow!=1) {
		

		//echo $lbg;
		if ($lbg=='MAPINDO') {
			$logo="./img/logo_mapindo.bmp";
			$sql=mysql_query("select karyawan.*,histori_gaji_mapindo.*,histori_gaji_mapindo.uang_makan,histori_gaji_mapindo.gaji_pokok from karyawan,histori_gaji_mapindo 
			where password='$passwd' and histori_gaji_mapindo.id_karyawan=karyawan.id_karyawan and tahun='$thn' and bulan='$bln' and karyawan.id_karyawan='$idk' order by karyawan.nama asc");
		} elseif ($lbg=='STIE') {
			$logo="./img/logo_stie.bmp";
			$sql=mysql_query("select karyawan.*,histori_gaji_stie.*,histori_gaji_stie.uang_makan,histori_gaji_stie.gaji_pokok from karyawan,histori_gaji_stie 
			where password='$passwd' and  histori_gaji_stie.id_karyawan=karyawan.id_karyawan and tahun='$thn' and bulan='$bln' and karyawan.id_karyawan='$idk' order by karyawan.nama asc");
		} elseif ($lbg=='SMK') {
                        $logo="./img/logo_stie.bmp";
                        $sql=mysql_query("select karyawan.*,histori_gaji_smk.*,histori_gaji_smk.uang_makan,histori_gaji_smk.gaji_pokok from karyawan,histori_gaji_smk
                        where password='$passwd' and  histori_gaji_smk.id_karyawan=karyawan.id_karyawan and tahun='$thn' and bulan='$bln' and karyawan.id_karyawan='$idk' order by karyawan.nama asc");
              	} else {
			$logo="./img/logo_stipar.bmp";
			$sql=mysql_query("select karyawan.*,histori_gaji_stipar.*,histori_gaji_stipar.uang_makan,histori_gaji_stipar.gaji_pokok from karyawan,histori_gaji_stipar 
			where password='$passwd' and  histori_gaji_stipar.id_karyawan=karyawan.id_karyawan and tahun='$thn' and bulan='$bln' and karyawan.id_karyawan='$idk' order by karyawan.nama asc");
		}
		$data=mysql_fetch_array($sql);
		$ket=mysql_num_rows($sql);

		if ($ket<=0) {
			echo "Maaf Password Yang Anda Masukkan Salah!!!!! ,Silahkan Hubungi IT atau Keuangan";
		}

		}else {
			echo "Gaji Untuk Periode Ini Belum Tersedia";
		}
		

		
?>
<?php
	if ($ket>=1) {
?>
    <!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Slip Gaji Karyawan</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="Description" content="description" />
		<meta name="Keywords" content="keywords" />
		<link rel="shortcut icon" href="favicon.gif" type="image/x-icon">
	</head>
	<body onLoad="document.postform.elements['username'].focus();">
		<div id="outer">
			<div id="header">
			<div id="body-middle" class="clearfix">
			
				<!-- Main Column -->
				<div id="main-col">
				
					<!-- Nameplate Box -->
					<div id="nameplate-top"></div>
					<div id="nameplate-bottom"></div>

					<!-- Main Content -->
					<div id="content-top"></div>
					<div id="content-wrapper">
						<div id="content">
						       <h1></h1>							 
    
        <p>
        <table width="500" border="0">
		<tr><td width="100" valign='top'><img src=<?php echo $logo; ?> width=80 border="0" /></td><td valign='mid'><b> <?php echo $lbg; ?><br> SLIP GAJI KARYAWAN</td></tr>
		<tr><td colspan=2><hr></td></tr>
		</table>
		<table>
		<tr></tr>
		<tr><td>Periode</font></td><td><?php echo $bln." ".$thn; ?></td></tr>
		<tr><td>Nama</font></td><td><?php echo $data['nama']; ?></td></tr>
		<tr><td>Jabatan</font></td><td><?php echo $data['jabatan']; ?></td></tr>
		<tr><td>Golongan</font></td><td><?php echo $data['golongan']; ?></td></tr>
		<tr><td>Masa Kerja</font></td><td><?php echo $data['masa_kerja']; ?></td></tr>		
		<tr><td>Gaji Pokok</font></td><td align='right'><?php echo format_rupiah($data['gaji_pokok']); ?></td></tr>
		<tr><td>Tunjangan Jabatan</font></td><td align='right'><?php echo format_rupiah($data['tunjangan_jabatan']); ?></td></tr>
		<tr><td>Tunjangan Lain</font></td><td align='right'><?php echo format_rupiah($data['tunjangan_lain']); ?></td></tr>
		<tr><td colspan=2><b>TAMBAHAN</b></font></td></tr>
		<?php
		$total=$data['gaji_pokok']+$data['tunjangan_jabatan']+$data['tunjangan_lain'];
		
		//get Tunjangan
		$tunj=mysql_query("select * from tunjangan where lembaga='$lbg'");
		while($row=mysql_fetch_array($tunj)){
		$jml_tunj=$row['tabel'];
		$total=$total+$data[$jml_tunj];
		//if ($data[$jml_tunj]>=1) {
		?>
			<tr bgcolor="FFFFFF">
			 <td><?php echo $row['tunjangan'];?></font></td><td align='right'><?php echo format_rupiah($data[$jml_tunj]); ?></td>			 
            </tr>
		<?php
		
			}
		?>
		<tr><td><u>TOTAL KOTOR</u></font></td><td align='right'><?php echo format_rupiah($total); ?></td></tr>
		<tr><td colspan=2><b>POTONGAN</b></font></td></tr>
		<?php		
		//get Potongan
		$tpot=0;
		$pot=mysql_query("select * from potongan where lembaga='$lbg'");
		while($rows=mysql_fetch_array($pot)){
		$jml_pot=trim($rows['tabel']);
		$tpot=$tpot+$data[$jml_pot];
		//if ($data[$jml_pot]>=1) {
		?>
			<tr bgcolor="FFFFFF">
			 <td><?php echo $rows['potongan'];?></font></td><td align='right'><?php echo format_rupiah($data[$jml_pot]);?></td>			 
            </tr>
		<?php
		
			}
		?>
		<tr><td><u>TOTAL POTONGAN</u></font></td><td align='right'><?php echo format_rupiah($tpot); ?></td></tr>
		<tr><td colspan=2><hr></td></tr>
		<tr><td><b><u>TOTAL BERSIH</u></font></td><td align='right'><b><?php echo format_rupiah($total-$tpot); ?><b></td></tr>
        </table>        

			<!-- Footer -->
			<div id="footer">
				<p><font color="#666666"></font></p>
		  </div>
			
		</div>
	</body>
	</html>
    
<?php
	}
?>
