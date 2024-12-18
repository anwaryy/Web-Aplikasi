<?php 
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "kelompoksatu");
// string - nama host, username mysql admin, password, nama database 

// ambil data dari tabel users / query data users
$result = mysqli_query($koneksi, "SELECT * FROM users");
// 2 parameter(koneksi, mau perintah apa?)

// ambil data (fetch) users ari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object()

// while( $mhs = mysqli_fetch_assoc($result) ) {
// 	var_dump($mhs);
// }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
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

	<?php $i = 1; ?> <!--membuat variable i-->
	<?php while( $row = mysqli_fetch_assoc($result) ) : ?> <!--perulangan-->
	<tr>
		<td><?= $i; ?></td> <!--mencetak variabel i-->
		<td>
			<a href="">ubah</a> |
			<a href="">hapus</a>
		</td>
		<td><?= $row["username"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["password"]; ?></td>
	</tr>
	<?php $i++; ?> <!--menambah variabel i-->
	<?php endwhile; ?>
	
</table>

</body>
</html>