<?php 
session_start();
include "../connect.php";
?>
<html>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<title>FaceOU.com</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="outline">
			<div id="header">
			</div>
			<div id="content">
			<?php 
				if ($_SESSION['id'] == FALSE)
					{
			?>
				
				<form method="post" action="index.php">
				<img src="lock.png" align ="left"alt="lock">
				<table width="251" height="101" border="0" align="left">
				<tr valign="top">
				    <td><p align="right"><h3>CUSTOMER</h3></p></font></td>
				</tr>
				<tr valign="bottom">
					<td width="100" height="40"><font size="4" face="verdana">name</font></td>
					<td width="90"><font size="4" face="verdana">
					<input type="text" name="name"required=required placeholder='Masukkan nama' >
					</font></td>
				</tr>
				<tr valign="top">
					<td height="34"><font size="4" face="verdana">Email</font></td>
			        <td><font size="4" face="verdana">
					<input type="text" name="email"required=required placeholder='Masukkan email'>
					</font></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><font size="4" face="verdana">
					<input type="submit" value="SUBMIT">
					</font></td>
				</tr>
				</table>
				<div style="clear:both">
					</div>
					<div id="footer">
				<p>© Membuat e-commerce  dengan PHP dan MySQL <br>Created by Kelompok:4</a></p>
				</div>
	     		</form>				
				<?php 
				$name = $_POST['name'];
				$email = $_POST['email'];
				if(isset($name) or isset($email))
					{
						if($name == "" or $email== "")
							{
								echo "Data belum terisi";
							}
						else
							{
								$query = mysql_query("select * from user where username = '$name' and password = '$email'");
								$row = mysql_num_rows($query);
								if($row == 0)
									{
										echo "nama tidak ditemukan";
									}
								else
									{
										$data = mysql_fetch_array($query);
										$_SESSION['id'] = $data['id'];
										echo "<meta http-equiv='refresh' content='0;url=index.php' />";
									}
							}
					}
					}
				else
					{
				?>
				<h3>Welcome Admin</h3>
				<p>Ini adalah halaman untuk admin KedaiOnline</p>
				<?php
					}
				?>
			
			<?php
				if ($_SESSION['id'] == TRUE)
					{
			?>
			</div>
			<div id="sidebar">
				<a href="index.php">Home</a><br>
				<a href="profil.php">Profil Kelompok</a><br>
				<a href="add_product.php">Tambah Product</a><br>
				<a href="add_category.php">Tambah Kategory</a><br>
				<a href="report.php">Report</a><br>
				<a href="logout.php">Logout</a>
			</div>
			<?php
					}
			?>	
		</div>
	</body>
</html>