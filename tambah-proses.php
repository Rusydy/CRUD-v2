<?php
//mulai proses tambah data
//cek dahulu, jika tombol tambah di klik
if(isset($_POST['tambah'])){
	
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	
	$siswa_nis	= $_POST['nis'];  //membuat variabel $nama dan datanya dari inputan Nama NIS
	$siswa_nama	= $_POST['nama']; //membuat variabel $kelas dan datanya dari inputan dropdown NAMA Lengkap
	$siswa_kelas = $_POST['kelas']; //membuat variabel $jurusan dan datanya dari inputan dropdown Kelas
	$siswa_jurusan = $_POST['jurusan']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan

//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
$input = mysqli_query($koneksi,"INSERT INTO tbl_siswa (siswa_nis, siswa_nama, siswa_kelas, siswa_jurusan) VALUES('$siswa_nis', '$siswa_nama', '$siswa_kelas','$siswa_jurusan')") or die(mysql_error());
	
//jika query input sukses
if($input){
echo 'Data berhasil di tambahkan! ';	//Pesan jika proses tambah sukses
	echo '<a href="tambah.php">Kembali</a>'; } 	//membuat Link untuk kembali ke halaman tambah

else{
	echo 'Gagal menambahkan data! ';	//Pesan jika proses tambah gagal
	echo '<a href="tambah.php">Kembali</a>'; }	  //membuat Link untuk kembali ke halaman tambah

}else{	//jika tidak terdeteksi tombol tambah di klik
 
	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>'; 
}
?>
