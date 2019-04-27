<?php
	include "koneksi.php";
?>

<html>
<head>
<link href="style-content.css" rel="stylesheet" />
</head>

<body>
<div id="login-box">
<b>Halaman Login </b>

</div>

<br>
<table border="1" align="center" width="50%">
<form action="ceklogin.php" method="post">
<tr bgcolor="#666666">
	<td colspan="2" align="center"><b>HALAMAN LOGIN</b></td>
</tr>
<tr bgcolor="#999999">
	<td>LEMBAGA</td>
    <td><select id='lembaga' name='lembaga'><option value="">- Pilih Satu -</option>
    <?php
                $query1 = mysql_query("SELECT * FROM lembaga");
                while ($row1 = mysql_fetch_array($query1)) {
    ?>
    <option value="<?php echo $row1['lembaga']; ?>"><?php echo $row1['lembaga']; ?></option>
    <?php
				}
	?>
    </select>
    </td>
</tr>
<tr bgcolor="#999999">
	<td>NAMA</td>
    <td><select id='nama' name='nama'>
    <?php
                $query = mysql_query("SELECT * FROM karyawan ORDER BY nama");
                while ($row = mysql_fetch_array($query)) {
    ?>
    <option id='nama' class="<?php echo $row['lembaga']; ?>" value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
    <?php
				}
	?>
    </select>
    </td>
</tr>
<tr bgcolor="#999999">
	<td>PASSWORD</td>
    <td><input type="password" name="password" /></td>
</tr>
<tr bgcolor="#999999">
    <td colspan="2"><input type="submit" value="Login" /> <i>Informasi Username dan Password Hubungi Keuangan</i></td>
</tr>
</table>
</form>
</body>
</html>

<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>
<script>
	$("#nama").chained("#lembaga");
</script>