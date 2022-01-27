<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nis = $_POST['id'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO user (id, nama, jenis_kelamin, alamat) VALUES(:id,:nama,:jk,:alamat)");
$sql->bindParam(':id', $nis);
$sql->bindParam(':nama', $nama);
$sql->bindParam(':jk', $jenis_kelamin);
$sql->bindParam(':alamat', $alamat);
$sql->execute(); // Eksekusi query insert

if($sql){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: index.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>