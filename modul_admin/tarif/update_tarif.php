<div id="konten">

  <div class="container-modaldua muka" id="containermodaldua">
    <?php
    $id= $_GET['id'];
    $queryEdit = mysqli_query($connection,"SELECT * FROM tbl_tarif where id_tarif='$id' limit 1")or die(mysqli_error());
    $dataEdit = mysqli_fetch_array($queryEdit);
    ?>
    <form class="form-pelanggan" method="POST"
      action="media_admin.php?module=update_proses_tarif&amp;id=<?php echo $dataEdit['id_tarif'];?>"
      onsubmit="return validasi(this)">
      <h2>Update data tarif</h2>
      <div class="user-details">
        <div class="input-box">
          <span class="detail">id tarif</span>
          <input type="text" name="input_id_tarif" value=<?php echo $dataEdit['id_tarif'];?> required />
        </div>
        <div class="input-box">
          <span class="detail">Daya</span>
          <input type="text" name="input_daya" value=<?php echo $dataEdit['daya'];?> required />
        </div>
        <div class="input-box">
          <span class="detail">TarifPerKWH</span>
          <input type="text" name="input_tarif_perkwh" required value=<?php echo $dataEdit['tarif_perkwh'];?> />
        </div>
      </div>

      <input class="tambah" type="submit" name="tambah_tarif" value="Tambah" />
      <input class="reset" type="reset" name="reset" value="Reset" />
      <a href="media_admin.php?module=tarif" class="tutup">Tutup</a>

    </form>
  </div>

  <div class="container-tabel">
    <h1>Data Tarif</h1>
    <div class="container-cari">
      <form method="POST" action="" align="center" onsubmit="return validasi(this)">
        <div class="kiri">
          <input type="text" name="inputcari" placeholder="Masukan keywoard pencarian" />
        </div>
        <div class="kanan">
          <select name="inputkategori">
            <option value="id_tarif">id Tarif</option>
            <option value="daya">Daya</option>
            <option value="tarif_perkwh">Tarif Per KWH</option>
          </select>
          <button class="btn-cari" name="btncari" type="submit" value="Cari">Cari</button>
          <a class="btn-print" href="modul_admin/tarif/laporan_tarif.php" target="blank">print</a>
        </div>
      </form>
    </div>
    <div class="tambah-data">
      <button id="btnmanggilmodal">Tambah data</button>
    </div>

    <div class="container">
      <table border="1">
        <thead>
          <th>ID</th>
          <th>Daya</th>
          <th>Tarif PerKWH</th>
          <th colspan="2">Aksi</th>
        </thead>
        <tbody>
          <?php
			if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"SELECT * FROM tbl_tarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"SELECT * FROM tbl_tarif")or die (mysqli_error());
			}
			while($mydata=mysqli_fetch_array($sql)){
		?>
          <tr>
            <td><?php echo $mydata['id_tarif']; ?></td>
            <td><?php echo $mydata['daya']; ?></td>
            <td><?php echo $mydata['tarif_perkwh']; ?></td>
            <td><a id="btnmanggilmodaldua" class="btn-ubah"
                href="media_admin.php?module=update_tarif&amp;id=<?php echo $mydata['id_tarif'];?>">Update</a>
            </td>

            <td><a class="btn-hapus"
                href="media_admin.php?module=delete_tarif&amp;id=<?php echo $mydata['id_tarif'];?>">Hapus</a></td>
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
    if (form.inputid_tarif.value == "") {
      alert("Kode tarif masih kosong!");
      form.inputid_tarif.focus();
      return false;
    }
    if (form.inputdaya.value == "") {
      alert("Daya masih kosong!");
      form.inputdaya.focus();
      return false;
    }
    if (form.inputtarif_perkwh.value == "") {
      alert("Tarif Per KWH masih kosong!");
      form.inputtarif_perkwh.focus();
      return false;
    }
    return true;
  }
  </script>