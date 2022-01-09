<?php include('koneksi.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_pelanggan'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_pelanggan = $_GET['id_pelanggan'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM data_pelanggan WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data_pelanggan = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama_pelanggan			= $_POST['nama_pelanggan'];
			$alamat_pelanggan			= $_POST['alamat_pelanggan'];
			$telp_pelanggan			= $_POST['telp_pelanggan'];
			
			$sql = mysqli_query($koneksi, "UPDATE data_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', telp_pelanggan='$telp_pelanggan' WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_antri";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_antri&id_pelanggan=<?php echo $id_pelanggan; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_pelanggan" class="form-control" size="4" value="<?php echo $data_pelanggan['nama_pelanggan']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat_pelanggan" class="form-control" value="<?php echo $data_pelanggan['alamat_pelanggan']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Telp</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="telp_pelanggan" class="form-control" value="<?php echo $data_pelanggan['telp_pelanggan']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_antri" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
