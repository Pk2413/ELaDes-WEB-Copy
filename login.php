<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <img src="gambar/Logo-Kabupaten-Nganjuk-Warna-removebg-preview 2.png" class="mx-auto d-block" alt="Logo" 
                                    style="width: 30%;" >
                                    <h3 class="text-center font-weight-light ">Login</h3>
                                    
                                </div>
                                <div class="card-body">
                                    <form action="login_proses.php" method="POST" name="login">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text"
                                                placeholder="Username" required />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Password" required />
                                            <label for="password">Password</label>
                                        </div>
                                        <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="true" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="verKodeOTP/proses_kirimkodeotp.php">Lupa Password?</a>
                                            <input class="btn btn-primary" type="submit" value="Login">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </main>

            <!-- Modal -->
    <div class="modal" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="errorModalLabel">Error</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="error-message">Login gagal. Silakan coba lagi.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>


        </div>
        <footer class="sticky-footer bg-white mt-auto py-4 g-col-12">
            <div class="container my-auto">
                <div class="text-center my-auto">
                    <img src="gambar/logo.png" height="35dp" width="60dp">

                    <!-- <span>
                      &copy; 2023 Di Develop oleh P-RESH</span> -->
                    <span class="text-muted">&copy; Copyright 2023 P-Resh Developer</span>
                    <!-- <div>
                          <a href="#">Privacy Policy</a>
                          &middot;
                          <a href="#">Terms &amp; Conditions</a>
                      </div> -->
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/toast.js"></script>
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    var showErrorModal = <?php echo isset($_GET['error']) ? 'true' : 'false'; ?>;
    if (showErrorModal) {
      var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
      myModal.show();
    }
  });
</script>

</body>

</html>