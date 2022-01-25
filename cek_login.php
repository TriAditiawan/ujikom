<?php
	include "koneksi.php";
	$user	= $_POST['input_username'];
	$pass	= md5($_POST['input_password']);
	$login	= mysqli_query($connection,"SELECT * FROM tbl_user WHERE username='$user' AND password='$pass'");
	$ketemu	= mysqli_num_rows($login);
	if ($ketemu > 0){
		session_start();
	  	$datalogin = mysqli_fetch_array($login);
		$_SESSION['username'] = $datalogin['username'];
		$_SESSION['password'] = $datalogin['password'];
        header("location:media_admin.php?module=home");
	}else{
?>
<script>
alert('Maaf, username atau password salah.');
window.location.href = 'index.php';
</script>
<?php
	}
?>