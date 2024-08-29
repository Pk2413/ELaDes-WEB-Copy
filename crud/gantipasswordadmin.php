<?php
require("../koneksi.php");
require ("../DatabaseMobile/sender/phpmailer.php");
require ('../DatabaseMobile/vendor/autoload.php'); 

// Menerima data dari aplikasi Android
// $username = $_POST['username']; // 'email' harus sesuai dengan key yang dikirim dari Android
$kode_otp = mt_rand(100000, 999999);



// periksa  apakah email sudah terdaftar 
$perintah = "SELECT * FROM `akun_admin` WHERE 1";
$eksekusi = mysqli_query($conn, $perintah);
$cek = mysqli_num_rows($eksekusi);

$response = array();

if ($cek = 0) {
   
    $response["kode"]=0;
    $response["pesan"] = "Username tidak tercantum";

    } else {
        $data = mysqli_fetch_assoc($eksekusi);
        $email = $data['email'];
        $username = $data['username'];
        $type = "Lupa Password";
        // echo $username."\n".$email."\n";
        // echo $kode_otp;
        $mail = new EmailSender();
        $mail->sendEmail($email, $type, $kode_otp);
        
        // jika username belum terdaftar, lakukan proses registrasi
        $perintah = "UPDATE `akun_admin` SET `kode_otp` = '$kode_otp' Where username = '$username'";
        $eksekusi = mysqli_query($conn, $perintah);

        


        // $F["username"] = $username;
        // array_push($response["data"], $F);

        if($eksekusi){
            $response["kode"] =1;
            $response["pesan"] = "kode otp berhasil diupdate";
            header("Location: ../ubahpassword/"); 
        }else {
            $response["kode"]= 2;
            $response["pesan"] = "koed otp gagal diupdate";
        }
    }


echo json_encode($response);
mysqli_close($konek);
?>