<?php
	include "koneksi.php";
?>

<div id="konten">

  <div class="container-modal" id="containermodal">
    <form class="form-pelanggan" method="POST" action="media_admin.php?module=register_pelanggan"
      onsubmit="return validasi(this)">
      <h2>Tambah data pelanggan</h2>
      <div class="user-details">
        <div class="input-box">
          <span class="detail">id Pelanggan</span>
          <input type="text" name="input_id_pelanggan" required>
        </div>
        <div class="input-box">
          <span class="detail">Nomor Meter</span>
          <input type="text" name="input_no_meter" required>
        </div>
        <div class="input-box">
          <span class="detail">Nama Pelanggan</span>
          <input type="text" name="input_nama" required>
        </div>
        <div class="input-box">
          <span class="detail">Alamat Pelanggan</span>
          <input type="text" name="input_alamat" required>
        </div>
        <div class="input-box">
          <span class="detail">Daya</span>
          <select name="input_id_tarif">
            <option value="" selected></option>
            <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_tarif")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
            <option value=<?php echo $dataForeign['id_tarif']?>> <?php echo $dataForeign['daya']?> </option>
            <?php
						}
					?>
          </select>
        </div>
      </div>
      <input class="tambah" type="submit" name="tambah_pelanggan" value="Tambah">
      <input class="reset" type="reset" name="reset" value="Reset">
      <button class="tutup" type="button" id="btntutupmodal">Tutup</button>

    </form>
  </div>



  <div class="container-tabel">
    <h1>Data Pelanggan</h1>
    <div class="container-cari">
      <form method="POST" action="" align="center" onsubmit="return validasi(this)">
        <div class="kiri">
          <input type="text" name="inputcari" placeholder="Masukan keywoard pencarian">
        </div>
        <div class="kanan">
          <!-- <label for=""> Kategori :</label> -->
          <select name="inputkategori">
            <option value="id_pelanggan">ID Pelanggan</option>
            <option value="no_meter">Nomor</option>
            <option value="nama">Nama</option>
            <option value="alamat">Alamat</option>
            <option value="daya">Daya</option>
          </select>
          <button name="btncari" class="btn-cari" type="submit" value="Cari">Cari</button>

          <a class="btn-print" href="modul_admin/pelanggan/laporan_pelanggan.php" target="blank">print</a>
        </div>
      </form>
    </div>
    <div class="tambah-data">
      <button id="btnmanggilmodal">Tambah data</button>
    </div>
    <div class="container">

      <table cellspacing="10">
        <thead>
          <th>ID</th>
          <th>Nomor</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Daya</th>
          <th colspan="2">Aksi</th>
        </thead>
        <tbody>
          <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_pelanggan 
					inner join tbl_tarif on tbl_pelanggan.id_tarif = tbl_tarif.id_tarif 
					ORDER BY id_pelanggan")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
          <tr>
            <td><?php echo $data['id_pelanggan']; ?> </td>
            <td><?php echo $data['no_meter']; ?> </td>
            <td><?php echo $data['nama']; ?> </td>
            <td><?php echo $data['alamat']; ?> </td>
            <td><?php echo $data['daya']; ?> </td>
            <td><a class="btn-ubah"
                href="media_admin.php?module=update_pelanggan&amp;id=<?php echo $data['id_pelanggan'];?>">Update</a>
            </td>
            <td><a onClick="return confirm('Hapus ?')" class="btn-hapus"
                href="media_admin.php?module=delete_pelanggan&amp;id=<?php echo $data['id_pelanggan'];?>">Hapus</a>
            </td>
          </tr>
          <?php
			}
		?>
        </tbody>
      </table>
    </div>
  </div>

  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_pelanggan.value == "") {
      alert("id Pelanggan masih kosong!");
      form.input_kIdPelanggan.focus();
      return (false);
    }
    if (form.input_NoMeter.value == "") {
      alert("Nomor Meter masih kosong!");
      form.inputNoMeter.focus();
      return (false);
    }
    if (form.input_Nama.value == "") {
      alert("Nama Pelanggan masih kosong!");
      form.input_Nama.focus();
      return (false);
    }
    if (form.input_Alamat.value == "") {
      alert("Alamat Pelanggan masih kosong!");
      form.input_Alamat.focus();
      return (false);
    }
    if (form.input_idTarif.value == "") {
      alert("Daya masih kosong!");
      form.input_idTarif.focus();
      return (false);
    }
    return (true);;
  }
  const open = document.getElementById("btnmanggilmodal");
  const modal = document.getElementById("containermodal");
  const close = document.getElementById("btntutupmodal");

  open.addEventListener("click", () => {
    modal.classList.add("buka");
  });
  close.addEventListener("click", () => {
    modal.classList.remove("buka");
  });
  </script>