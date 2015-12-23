<?php 
session_start();
include "connect.php";
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<title>Faceou.com</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="outline">
		<div id="header">
			<h1>Welcome...!</h1>
		</div>
		<table align="left">
			<tr>
				<td width="755" valign="top"><div align="center"><font face="verdana" size="5">Coloring the world with the best face illustrations</font></div></td>
			</tr>			
			</table>
			</div>
			<div id="content">
				<img src="hatta.jpg" align ="left"alt="promo">
				<h4>Produk Kami</h4>
				<hr>
				<table width="100%">			
				<?php
					$query = mysql_query("select * from customer");
					while($data=mysql_fetch_array($query))
					{
						?>
							<td width="25%">
								<a href="order.php?product=<?php echo $data['id'];?>"><img src="<?php echo $data['link_image'];?>" height="250" width="150px"></a>
								<?php echo $data['name']?> <br />Harga.<?php echo $data['price'];?>
							</td>
						<?php
						if($i%4 < 3) 
							{
						  echo "</td>";
							} 
						else 
							{
						  echo "</td><tr>";
							}
						$i++; 
						}
						?>
				</table>
			</div>
			<div id="sidebar">
				<a href="index.php">Home</a><br>
				<a href="profil.php">Profil Kelompok</a><br>
				<a href="order.php">Order</a><br>
			</div>
			<div style="clear:both">
			</div>
			<div id="footer">
				<p>© Membuat e-commerce dengan PHP dan MySQL <br>Created by Kelompok:4</a></p>
			</div>
		</div>
	</body>
</html>