<?php 
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "kelompoksatu");
// string - (nama host, username mysql admin, password, nama database)


// menertima parameter tabel pada index
function query($query) {
	global $koneksi; // mengacu variable sama
	$hasil = mysqli_query($koneksi, $query); //ambil data dari tabel parameter(koneksi database)
	$rows = []; // menyiapkan wadah berupa array kosong 
	while( $row = mysqli_fetch_assoc($hasil) ) {
		$rows[] = $row; // menambahkan elemen baru 
	}
	return $rows; //mengembalikan kotaknya
}

?>