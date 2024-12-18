<?php 
require 'fungsi.php';// menghubungkan
// require atau include
$users = query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
	<title>proglan</title>
</head>
<body>

<h1>Daftar Users</h1>

<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Opsi</th>
		<th>Username</th>
		<th>Email</th>
		<th>Password</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $users as $row ) : ?> <!--pengulangan pada array-->
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="">ubah</a> |
			<a href="">hapus</a>
		</td>
		<td><?= $row["username"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["password"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?> <!--menutup perulangan pada array-->
	
</table>

</body>
</html>