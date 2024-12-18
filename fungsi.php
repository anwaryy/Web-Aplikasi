<?php 
 // koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ashacourse");

if (!$koneksi) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}


function query($query) {
	global $koneksi;
	$hasil = mysqli_query($koneksi, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($hasil) ) {
		$rows[] = $row;
	}
	return $rows;
}

 
?>