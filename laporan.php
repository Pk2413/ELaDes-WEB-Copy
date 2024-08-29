<?php
include 'utility/sesionlogin.php';  
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include('navbar/upbar.php') ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include("navbar/lefbar.php"); ?>
        </div>

        <!-- isi konten -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-5">
                    <h1 class="" style="margin-top: 50px;">Laporan</h1>
                    <ol class="breadcrumb mb-4">
                        <!-- <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li> -->
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                    <div class="card mb-4 px-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>

                                        <th data-search="false">ID</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kode Surat</th>
                                        <th data-search="false">No Pengajuan</th>
                                        <th data-search="false">Tanggal</th>
                                        <th data-search="false">Status</th>
                                        <th data-search="false">Detail</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-search="false">ID</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kode Surat</th>
                                        <th data-search="false">No Pengajuan</th>
                                        <th data-search="false">Tanggal</th>
                                        <th data-search="false">Status</th>
                                        <th data-search="false">Detail</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    include("koneksi.php");

                                    try {
                                        $sql = "SELECT laporan.id,  pengajuan_surat.nik, 
                                        pengajuan_surat.nama ,pengajuan_surat.kode_surat,
                                        pengajuan_surat.no_pengajuan,laporan.tanggal, laporan.status 
                                                FROM `laporan`
                                                join pengajuan_surat
                                                on pengajuan_surat.id = laporan.id
                                                GROUP by id 
                                                ORDER BY tanggal desc ;";
                                        $query = $conn->prepare($sql);
                                        $query->execute();

                                        $query->store_result(); // This is necessary to use num_rows with prepared statements
                                        $rowCount = $query->num_rows;

                                        if ($rowCount > 0) {
                                            $query->bind_result($id, $nik, $nama, $kode_surat, $no_pengajuan,$tanggal, $status, );

                                            while ($query->fetch()) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlentities($id); ?>
                                                    </td>


                                                    <td>
                                                        <?php echo htmlentities($nik); ?>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="suratmasuk_detail.php?no_pengajuan=<?php echo htmlentities($no_pengajuan); ?>&kode_surat=<?php echo htmlentities($kode_surat); ?>&user=<?php echo htmlentities($user)?>">
                                                            <?php echo htmlentities($nama); ?> 
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($kode_surat); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($no_pengajuan); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($tanggal); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlentities($status); ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a class="btn btn-primary" role="button"
                                                            href="suratmasuk_detail.php?no_pengajuan=<?php echo htmlentities($no_pengajuan); ?>&kode_surat=<?php echo htmlentities($kode_surat); ?>&user=<?php echo htmlentities($user)?>">
                                                            Detail
                                                        </a>
                                                        <!-- <a class="btn btn-danger" role="button"
                                                            href="utility/delete_pengajuan_surat.php?id=<?php echo htmlentities($id); ?>"
                                                            onclick="
                                                            return confirm('Apakah anda ingin menghapus surat?')">
                                                            Hapus
                                                        </a> -->
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "No results found.";
                                        }
                                    } catch (Exception $e) {
                                        die("Error: " . $e->getMessage());
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>




                </div>
            </main>
        </div>
    </div>
    <script>
    // $(document).ready(function() {
//     $('#datatablesSimple').DataTable({
//         columnDefs: [
//             { targets: [2, 3, 4], searchable: true }, // Nama Lengkap, Tipe Surat, Tanggal Laporan
//             { targets: [0, 1, 5, 6], searchable: false } // Kolom lainnya tidak dapat dicari
//         ]
//     });
// });

$('#datatablesSimple').dataTable( {
    "columns": [
    null,
    { "searchable": true },
    { "searchable": true },
    { "searchable": false },
    { "searchable": false },
    { "searchable": false },
    { "searchable": false },
    nulll
  ] } );

    </script>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    
</body>

</html>