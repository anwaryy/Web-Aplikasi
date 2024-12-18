<?php 
 
include 'fungsi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Register</title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <section class="From my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./img/kunci.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">ASHA COURSE</h1>
            <h4>Buat akun baru</h4>
            <form action="" method="POST">
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Username" name="username"  class="form-control my-3 p-4" value="<?php echo $username; ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="email"  placeholder="Email" name="email"  class="form-control my-3 p-4"  value="<?php echo $email; ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password"  name="password" placeholder="Password" class="form-control my-3 p-4" value="<?php echo $_POST['password']; ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control my-3 p-4"  value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button name="submit" class="btn1 mt-3 mb-5">Register</button>
                </div>
              </div>
              <p>Sudah punya akun!! <a href="Login.php">Masuk disni!</a></p>
              <p><a href="halaman.php">Kembali ke halaman utama</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>