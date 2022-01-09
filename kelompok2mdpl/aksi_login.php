<?php
include 'koneksi.php';

//daftar
if(isset($_POST['login'])){
	//jika tombol login di klik

	$username = $_POST['username'];
	$password = $_POST['password']; //belum enkripsi

	//insert to db
	$cekdb = mysqli_query($koneksi,"SELECT * FROM login where username='$username'");
	$hitung = mysqli_num_rows($cekdb);
	$pw = mysqli_fetch_array($cekdb);
	$passwordsekarang = $pw['password'];

	if($hitung>0){
		//jika ada
		//verifikasi pw
		if(password_verify($password,$passwordsekarang)){
			//jika pw benar
			header('location:index.php'); //ke halaman index
		} else {
			//jika pw salah
		echo '
		<script>
			alert("password salah"); 
			window.location.href="register.php";
		</script>
		';
		}
	} else {
			//jika gagal
		echo '
		<script>
			alert("login gagal"); 
			window.location.href="register.php";
		</script>
		';
		}
}
?>