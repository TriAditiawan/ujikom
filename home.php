<?php
$data_pelanggan = mysqli_query($connection,"SELECT * FROM tbl_pelanggan");
$data_user = mysqli_query($connection,"SELECT * FROM tbl_user");
$data_tagihan = mysqli_query($connection,"SELECT * FROM tbl_tagihan");
$data_pembayaran = mysqli_query($connection,"SELECT * FROM tbl_pembayaran");

// menghitung 
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
$jumlah_user = mysqli_num_rows($data_user);
$jumlah_tagihan = mysqli_num_rows($data_tagihan);
$jumlah_pembayaran = mysqli_num_rows($data_pembayaran);
?>

<div class="container">


  <a href="media_admin.php?module=pelanggan" class="card">
    <h1>
      <?php echo"$jumlah_pelanggan"?>
      <br />
      <span>Pelanggan</span>
    </h1>
  </a>
  <div class="card">
    <h1>
      <?php echo"$jumlah_user"?>
      <br />
      <span>User</span>
    </h1>
  </div>
  <div class="card">
    <h1>
      <?php echo"$jumlah_tagihan"?><br />
      <span>tagihan</span>
    </h1>
  </div>
  <div class="card">
    <h1>
      <?php echo"$jumlah_pembayaran"?>
      <br />
      <span>Pembayaran</span>
    </h1>
  </div>
</div>
<!-- <img class="benner" src="./images/FA-merdeka-pln.jpg" alt="" /> -->
<img class="benner" src="./images/langkah-mudah.jpg" alt="" />