<?php
include("../Koneksi.php");

$kode = $_POST['kode'] ?? null;
$no = $_POST['no_pengajuan'] ?? null;
// echo $no."<br>";

$sql = "SELECT surat_ijin.*, pengajuan_surat.id FROM surat_ijin 
INNER JOIN pengajuan_surat
on surat_ijin.no_pengajuan = pengajuan_surat.no_pengajuan
WHERE surat_ijin.no_pengajuan ='$no'";
$result = $konek->query($sql);

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $id = $row['id'];
    // echo $id;
}




if ($kode == 0) {
    include("../Koneksi.php");
    
    // $no = $_POST['no_pengajuan'];
    
    $sql = "SELECT * FROM surat_ijin WHERE no_pengajuan ='$no'";
    $result = $konek->query($sql);
    
    $response = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        // Pisahkan tempat dan tanggal menggunakan koma sebagai pemisah
        $hasil = explode(", ", $row["Tempat_tanggal_lahir"]);
    
        // $hasil[0] akan berisi tempat, $hasil[1] akan berisi tanggal
        $tempat = $hasil[0];
        $tanggal = $hasil[1];
    
        // Tambahkan data ke dalam array
        $response["kode"] = true;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array();
        $data = array(
            'Nama' => $row['Nama'],
            'Nik' => $row['NIK'],
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'Agama' => $row['Agama'],
            'Jenis_kelamin' => $row['Jenis_kelamin'],
            'Kewarganegaraan' => $row['Kewarganegaraan'],
            'Pekerjaan' => $row['Pekerjaan'],
            'Alamat' => $row['Alamat'],
            'Tempat_Kerja' => $row['Tempat_Kerja'],
            'Bagian' => $row['Bagian'],
            'Tanggal_Ijin' => $row['Tanggal'],
            'Alasan' => $row['Alasan']
        );
        array_push($response["data"], $data);
    } else {
        // Data tidak ditemukan
        $response["kode"] = false;
        $response["pesan"] = "Data Tidak Ada";
    }
    
    echo json_encode($response);
    
    $konek->close();
    
    
} elseif ($kode == 1) {

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
    
    $sql = "UPDATE `surat_ijin` SET 
            `Nama`='$Nama',
            `NIK`='$NIK',
            `Jenis_kelamin`='$Jenis_kelamin',
            `Tempat_tanggal_lahir`='$Tempat_tanggal_lahir',
            `Kewarganegaraan`='$Kewarganegaraan',
            `Agama`='$Agama',
            `Pekerjaan`='$Pekerjaan',
            `Alamat`='$Alamat',
            `Tempat_Kerja`='$Tempat_Kerja',
            `Bagian`='$Bagian',
            `Tanggal`='$Tanggal',
            `Alasan`='$Alasan'
            WHERE `no_pengajuan`='$no'";
    
    $eksekusi = mysqli_query($konek, $sql);

    $sql = "UPDATE `laporan` SET 
    `status`='Masuk'
    WHERE `id`='$id'";
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
    $response['kode'] = false;
    $response['pesan'] = "Error 404 not found";

    echo json_encode($response);
    // mysqli_close($konek);
}
?>