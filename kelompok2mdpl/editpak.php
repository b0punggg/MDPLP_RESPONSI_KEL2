<?php include('koneksi.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_paket'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_paket = $_GET['id_paket'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM data_paket WHERE id_paket='$id_paket'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data_paket = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama_paket		= $_POST['nama_paket'];
			$jenis_paket			= $_POST['jenis_paket'];
			$harga_paket			= $_POST['harga_paket'];
			
			$sql = mysqli_query($koneksi, "UPDATE data_paket SET nama_paket='$nama_paket', jenis_paket='$jenis_paket', harga_paket='$harga_paket' WHERE id_paket='$id_paket'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_paket";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_paket&id_paket=<?php echo $id_paket; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Paket</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_paket" class="form-control" size="4" value="<?php echo $data_paket['nama_paket']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Paket</label>
				<div class="col-md-6 col-sm-6">
					<select name="jenis_paket" class="form-control" value="<?php echo $data_paket['jenis_paket']; ?>" required>
                        <option value="">Pilih Jenis Paket</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="bedcover">Bedcover</option>
                    </select> 
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Paket</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="harga_paket" class="form-control" value="<?php echo $data_paket['harga_paket']; ?>" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_paket" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
