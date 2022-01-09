<?php
include 'koneksi.php';

//daftar
if(isset($_POST['register'])){
	//jika tombol register di klik

	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password']; //belum enkripsi

	//fungsi enkripsi
	$epassword = password_hash($password, PASSWORD_DEFAULT);

	//insert to db
	$insert = mysqli_query($koneksi,"INSERT INTO login (name,username,email,password) VALUES ('$name','$username','$email','$epassword')");

	if($insert){
		//jika berhasil
		header('location:login.php'); //ke halaman login
	} else {
		//jika gagal
		echo '
		<script>
			alert("Registrasi gagal"); 
			window.location.href="register.php";
		</script>
		';
	}
}
?>