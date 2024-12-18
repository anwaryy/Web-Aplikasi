<?php 
 
include 'fungsi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: Index.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: cekbot.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['error']?>
    </div>
    <section class="From my-4 mx-5">
      <div class="container">
        <div class="login-box">
          <div class="row no-gutters">
            <div class="col-lg-5">
              <img src="./img/kunci.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 px-5 pt-5">
              <h1 class="font-weight-bold py-3">ASHA COURSE</h1>
              <h4>Masukkan akun anda</h4>
              
              <form action="" method="POST" name="login" class="login" >
                <div class="form-row">
                <div class="col-lg-7">
                    <label for="">Email</label>
                    <input type="email" placeholder="Email" class="form-control my-3 p-4" name="email" value="<?php echo $email; ?>" required>
                </div>
                  <div class="col-lg-7">
                    <label for="">Password</label>
                    <input type="password" placeholder="Password" class="form-control" name="password" value="<?php echo $_POST['password']; ?>" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-7">
                    <a href="Index.html">
                    <button class="btn1 mt-3 mb-5" type="submit" name="submit" >Login</button>
                   </a>
                  </div>
                </div>
                <a href="forget.php ">Lupa password</a>
                <p>Tidak punya akun?? <a href="Register.php">Daftar disni!</a></p>
                <p><a href="halaman.php">Kembali ke halaman utama</a></p>
              </form>
            </div>
          </div>
        </div>  
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>