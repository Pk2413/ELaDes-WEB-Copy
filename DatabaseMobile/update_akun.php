<?php
require("Koneksi.php");
$username = $_POST['username']; // 'username' harus sesuai dengan key yang dikirim dari Android
$password = $_POST['password'];
$email = $_POST['email'];
$nama = $_POST['nama'];
$hashedPassword = md5($password);

$sql ="UPDATE `akun_user` SET `password`='$hashedPassword',`email`='$email',`nama`='$nama' WHERE `username`='$username'";

$eksekusi = mysqli_query($konek, $sql);

$response = array();

if ($eksekusi) {
    // Jika insert berhasil
    $response['kode'] = true;
    $response['pesan'] = "Akun Berhasil Diupdate";
} else {
    // Jika insert gagal
    $response['kode'] = false;
    $response['pesan'] = "Gagal menambahkan data. Error: " . mysqli_error($konek);
}

echo json_encode($response);
mysqli_close($konek);

?>