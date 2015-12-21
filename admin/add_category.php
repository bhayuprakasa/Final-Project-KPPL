<?php
session_start();
include "../connect.php";
?>
<html>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<title>KedaiOnline.com</title>
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
						echo "<meta http-equiv='refresh' content='0;url=index.php' />";
					}
				else
					{
					$query = mysql_query("select * from category");
				?>
				<h3>Tambah Kategory</h3>
				<form method="post" action="add_category.php">
					<label>Nama Kategori</label> <input type="text" name="cat"> <input type="submit" value="add">
				</form>
				<?php
					$cat = $_POST['cat'];
					if(isset($cat))
						{
							if($cat == "")
								{
									echo "nama kategori harus dimasukkan";
								}
							else
								{
									$insert = "insert into category (id,category,status) values ('','$cat',1)";
									$query_insert = mysql_query($insert);
									if($query_insert == TRUE)
										{
											echo "<p>kategori berhasil ditambahkan</p>";
										}
									else
										{
											echo "<p>Kategori gagal Ditambahkan, alasanya:".(mysql_error())."</p>";
										}
								}
						}
				?>
				<h3>Kategori Lainnya</h3>
				<?php
				$row = mysql_num_rows($query);
				if($row == 0)
					{
						echo "<p>Tidak ada Kategori yang dimasukkan";
					}
				else
					{
				?>
					<table border="1">
						<tr>
							<td>No</td>
							<td>Nama Kategori</td>
						</tr>
					<?php
					$i = 0;
						while($data=mysql_fetch_array($query))
							{
							$i++
								?>
								<tr>
								<td><?php echo $i?></td>
								<td><?php echo $data['category'];?></td>
								</tr>
								<?php
							}
					}
					?>
					</table>
			</div>
			<?php
					}
				if ($_SESSION['id'] == TRUE)
					{
			?>
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
			<div style="clear:both">
			</div>
			<div id="footer">
				<p>© Membuat e-commerce  dengan PHP dan MySQL <br>Created by Kelompok:4</a></p>
			</div>
		</div>
	</body>
</html>