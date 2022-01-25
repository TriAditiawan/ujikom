<?php
	include "koneksi.php";
	if(isset($_SESSION['username'])){
		header("location:media_admin.php?module=home");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style_login.css" />
    <title>Login Pembayaran Listrik Pasca Bayar</title>
  </head>

  <body>
    <form action="cek_login.php" method="POST" onsubmit="return validasi(this)">
      <!-- <div class="garis-atas"></div> -->
      <h2>Login Sistem Informasi Pembayaran Listrik</h2>
      <div class="user-details">
        <div class="input-box">
          <span class="detail">Username</span>
          <input type="text" name="input_username" placeholder="Masukkan Username Anda" required />
        </div>
        <div class="input-box">
          <span class="detail">Password</span>
          <input type="password" name="input_password" placeholder="Masukan Password Anda" required />
        </div>
      </div>
      <input type="submit" value="Login" name="login" class="button-login" />
      <!-- <p class="login">Lupa password?<a href="#">Reset password </a></p>
      <p class="login2">Belum punya akun?<a href="#">Daftar sekarang</a></p> -->
      <div class="footer"><p>&copy 2022 by tri | 1920.10.321</p></div>
    </form>
  </body>
  <script type="text/javascript">
    function validasi(form) {
      if (form.input_username.value == '') {
        alert('Anda belum mengisikan username');
        form.input_username.focus();
        return false;
      }
      if (form.input_password.value == '') {
        alert('Anda belum mengisikan password.');
        form.input_password.focus();
        return false;
      }
      return true;
    }
  </script>
</html>
