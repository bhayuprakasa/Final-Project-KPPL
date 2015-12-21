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
				<h3>Tambah Barang</h3>
				<form method="post" action="add_product.php" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Nama Barang</td>
							<td><input type="text" name="name">
						</tr>
						<tr>
							<td>Harga</td>
							<td><input type="text" name="price"></td>
						</tr>
						<tr>
							<td>Gambar</td>
							<td><input type="file" name="file" id="file" />Format Gambar haruslah jpeg</td>
						</tr>
						<tr>
							<td>Kategori</td>
							<td>
								<select name="cat">
									<?php
										$query_cat = mysql_query("select * from category");
										while($data=mysql_fetch_array($query_cat))
											{
												?>
													<option value="<?php echo $data['id'];?>"><?php echo $data['category']?></option>
												<?php
											}
									?>
								</select>
								<a href="add_category.php">Tambah Kategory</a>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Add Product">
						</tr>
					</table>
				</form>
				<?php
					$name = $_POST['name'];
					$price = $_POST['price'];
					$cat = $_POST['cat'];
					if(isset($nama) or isset($price) or isset($cat))
						{
							if($name == "" or $price == "" or $cat == "")
								{
									echo "<p>Data ada yang kurang lengkap, silahkan ulangi</p>";
								}
							else
								{
									if(($_FILES["file"]["type"] == "image/jpeg") and ($_FILES["file"]["size"] <= 2000000))
										{
											if (file_exists("upload/" . $_FILES["file"]["name"]))
												{
												echo $_FILES["file"]["name"] . " already exists. ";
												}
											else
												{
												move_uploaded_file($_FILES["file"]["tmp_name"],"../images/" . $_FILES["file"]["name"]);
												$insert = "insert into product set name = '$name',price = '$price',
														  link_image = 'images/".$_FILES["file"]["name"]."',id_category = '$cat'";
												$query = mysql_query($insert);
												if ($query == TRUE)
													{
														echo "Produk berhasil Ditambahkan";
													}
												else
													{
														echo "Produk Gagal Ditambahkan";
													}
												}
										}
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