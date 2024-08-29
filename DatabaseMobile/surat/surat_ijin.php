<?php
require("../Koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $Nama = $_POST['Nama'];
    $NIK = $_POST['NIK'];
    $Jenis_kelamin = $_POST['Jenis_kelamin'];
    $Tempat_tanggal_lahir = $_POST['Tempat_tanggal_lahir'];
    $Kewarganegaraan = $_POST['Kewarganegaraan'];
    $Agama = $_POST['Agama'];
    $Pekerjaan = $_POST['Pekerjaan'];
    $Alamat = $_POST['Alamat'];
    $Tempat_Kerja = $_POST['Tempat_Kerja'];
    $Bagian = $_POST['Bagian'];
    $Tanggal = $_POST['Tanggal'];
    $Alasan = $_POST['Alasan'];

    

    // SQL query
    $sql = "INSERT INTO `surat_ijin`(`username`, `Nama`, `NIK`, `Jenis_kelamin`, `Tempat_tanggal_lahir`,
     `Kewarganegaraan`, `Agama`, `Pekerjaan`, `Alamat`, `Tempat_Kerja`, `Bagian`, `Tanggal`, `Alasan`)
            VALUES ('$username', '$Nama', '$NIK', '$Jenis_kelamin', '$Tempat_tanggal_lahir',
             '$Kewarganegaraan', '$Agama', '$Pekerjaan', '$Alamat', '$Tempat_Kerja', '$Bagian', '$Tanggal', '$Alasan')";

    $eksekusi = mysqli_query($konek, $sql);

    $response = array();

    if ($eksekusi) {
        // Jika insert berhasil
        $response['kode'] = true;
        $response['pesan'] = "Data berhasil ditambahkan";
    } else {
        // Jika insert gagal
        $response['kode'] = false;
        $response['pesan'] = "Gagal menambahkan data. Error: " . mysqli_error($konek);
    }

    echo json_encode($response);
    mysqli_close($konek);
} else {
    // Handle non-POST requests
    $response['kode'] = false;
    $response['pesan'] = "Invalid request method";
    echo json_encode($response);
}
?>