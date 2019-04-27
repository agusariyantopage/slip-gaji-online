<?php
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

select{
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #f44336;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 30%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Login Ke Sistem Informasi Slip Gaji</h2>

<form action="ceklogin.php" method="post">
  <div class="imgcontainer">
    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Lembaga</b></label>
	<select id='lembaga' name='lembaga'>
        <option value="">- Pilih Satu -</option>
        <?php
                    $query1 = mysql_query("SELECT * FROM lembaga");
                    while ($row1 = mysql_fetch_array($query1)) {
        ?>
        <option value="<?php echo $row1['lembaga']; ?>"><?php echo $row1['lembaga']; ?></option>
        <?php
                    }
        ?>
    </select>
    
    <label for="uname"><b>Nama Karyawan</b></label>
	<select id='nama' name='nama'>
    <?php
                $query = mysql_query("SELECT * FROM karyawan ORDER BY nama");
                while ($row = mysql_fetch_array($query)) {
    ?>
    <option id='nama' class="<?php echo $row['lembaga']; ?>" value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
    <?php
				}
	?>
    </select>
    
    
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

</form>

<script src="jquery-1.10.2.min.js"></script>
<script src="jquery.chained.min.js"></script>
<script>
	$("#nama").chained("#lembaga");
</script>

</body>
</html>

