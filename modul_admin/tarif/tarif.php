<?php
	include "koneksi.php";
?>
<div id="konten">
  <div class="container-modal" id="containermodal">
    <form class="form-pelanggan" method="POST" action="media_admin.php?module=register_tarif"
      onsubmit="return validasi(this)">
      <h2>Tambah data tarif</h2>
      <div class="user-details">
        <div class="input-box">
          <span class="detail">id tarif</span>
          <input type="text" name="id_tarif" />
        </div>

        <div class="input-box">
          <span class="detail">Daya</span>
          <input type="text" name="daya" />
        </div>
        <div class="input-box">
          <span class="detail">TarifPerKWH</span>
          <input type="text" name="tarif_perkwh" />
        </div>
      </div>

      <input class="tambah" type="submit" name="tambah_tarif" value="Tambah" />
      <input class="reset" type="reset" name="reset" value="Reset" />
      <button class="tutup" type="button" id="btntutupmodal">Tutup</button>
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

            <td><a onClick="return confirm('Hapus ?')" class="btn-hapus"
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
    if (form.inputidTarif.value == '') {
      alert('id tarif masih kosong!');
      form.inputidTarif.focus();
      return false;
    }
    if (form.inputDaya.value == '') {
      alert('Daya masih kosong!');
      form.inputDaya.focus();
      return false;
    }
    if (form.inputTarifPerKWH.value == '') {
      alert('Tarif Per KWH masih kosong!');
      form.inputTarifPerKWH.focus();
      return false;
    }
    return true;
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
</div>