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
				?>
				<h4>Report Order Product</h4>
				<?php
					$query = mysql_query("SELECT * from order_product");
					$row = mysql_num_rows($query);
					if($row == 0)
						{
							echo "<b>Tidak ada hasil Penjualan</b>";
						}
					else
						{
							?>
								<table border="1">
									<tr>
										<td width="5%">No.</td>
										<td width="15%">ID Barang</td>
										<td width="20%">Nama</td>
										<td width="15%">Email</td>
										<td width="30%">Alamat</td>
										<td width="10%">Nomor HP</td>
										<td width="5%">Status</td>
									</tr>
									<?php
									$i = 0;
									while($data=mysql_fetch_array($query))
										{
										$i++
											?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $data['id_product']?></td>
													<td><?php echo $data['name']?></td>
													<td><?php echo $data['email']?></td>
													<td><?php echo $data['address']?></td>
													<td><?php echo $data['number_phone']?></td>
													<td><?php echo $data['status']?></td>
												</tr>
											<?php
										}
									?>
								</table>
							<?php
						}
					}
				?>
			</div>
			<?php
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