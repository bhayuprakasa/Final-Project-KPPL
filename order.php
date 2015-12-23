<?php 
session_start();
include "connect.php";
?>
<html>
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
				<h3>Order Product</h3>
				<?php
					/*$id = $_GET['product'];
					$query = mysql_query("select * from product where id = '$id'");
					$data = mysql_fetch_array($query);*/
				?>
				<center>
					<img src="<?php echo $data['link_image'];?>"><br />
					<form action="order.php?product=<?php echo $id?>" method="post">
					<input type="hidden" name="id" value="<?php echo $data['id']?>">
					<table>
					
					<td>Produk</td>
						<td><form action="" method="post">   
						<select name="category">  
						<option value="">Silahkan Pilih</option>  
						<option value="Apel">Karikatur</option>  
						<option value="Jeruk">Vector</option>  
						</select>   
						<input type="submit" name="enter" value="Enter">   
						</form></td>
						
						
						<tr>
							<td>Nama</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><textarea name="address" cols="40" rows="7"></textarea></td>
						</tr>
						<tr>
							<td>No HP</td>
							<td><input type="text" name="nohp"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="order"> </td>
						</tr>
					</table>
				</center>
				<?php
					$query = mysql_query("select * from category");
					while($data=mysql_fetch_array($query))
					{
					
					$name = $_POST['name'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$nohp = $_POST['nohp'];
					if(isset($name) or isset($email) or isset($address) or isset($nohp))
						{
							if($name == "" or $email == "" or $address == "" or $nohp == "")
								{
									echo "<p>Ada data yang kurang lengkap</p>";
								}
							else
								{
									$insert = "insert into order_product set name = '$name',email = '$email', address = '$address',number_phone = ".$nohp.",id_product = '$id'";
									$query = mysql_query($insert);
									if($query == TRUE)
										{
											echo "<p>Selamat Anda Berhasil Memesan Barang yang anda pilih, silahkan Transfer sejumlah uang
												ke Bank KedaiOnline dengan No Rekening 2345122222</p>";
										}
									else
										{
											echo "data error, alesannya :".(mysql_error());
										}
								}
						}
					if(isset($_POST['enter']))   
						{   
							if(empty($_POST['category']))  
								{  
									echo "Anda belum memilih!";  
								}  
					else echo "Pilihan anda: ".$_POST['category'];  
								}   
								}
				?>
			
			</div>
			<div id="sidebar">
				<a href="index.php">Home</a><br>
				<a href="profil.php">Profil Kelompok</a><br>
				<a href="order.php">Order</a><br>
			</div>
			<div style="clear:both">
			</div>
			<div id="footer">
				<p>© Membuat e-commerce  dengan PHP dan MySQL <br>Created by Kelompok:4</a></p>
			</div>
		</div>
	</body>
</html>