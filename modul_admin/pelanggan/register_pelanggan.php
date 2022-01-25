<?php
	include "koneksi.php";

	$idpelanggan = $_POST['input_id_pelanggan'];
	$nometer = $_POST['input_no_meter'];
	$nama = $_POST['input_nama'];
	$alamat = $_POST['input_alamat'];
	$idtarif = $_POST['input_id_tarif'];
	
	$query = "INSERT into tbl_pelanggan values ('$idpelanggan','$nometer','$nama','$alamat','$idtarif')";
	
	$cekquery = mysqli_query($connection,$query);

	if ($cekquery) {
?>

<script>
alert('Data berhasil di tambahkan!');
location = 'media_admin.php?module=pelanggan';
</script>

<?php
	}else{
?>
<script>
alert('Gagal di tambahkan!');
location = 'media_admin.php?module=pelanggan';
</script>
<?php
	}
?>