<?php include('koneksi.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Transaksi</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM transaksi2 WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$status			= $_POST['status'];
			$tgl			= $_POST['tgl'];
			$berat			= $_POST['berat'];
			$total			= $_POST['total'];
			$sql = mysqli_query($koneksi, "UPDATE transaksi2 SET nama='$nama', status='$status, tgl='$tgl', berat='$berat', total='$total' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_transaksi";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_transaksi&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" size="4" value="<?php echo $data['nama']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<select name="status" class="form-control" required>
						<option value="">Pilih Status</option>
						<option value="masuk" <?php if($data['status'] == 'masuk'){ echo 'selected'; } ?>>Masuk</option>
						<option value="keluar" <?php if($data['status'] == 'keluar'){ echo 'selected'; } ?>>Keluar</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tgl" class="form-control" value="<?php echo $data['tgl']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Berat/kg</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="berat" class="form-control" value="<?php echo $data['berat']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Total</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="total" class="form-control" value="<?php echo $data['total']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_transaksi" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
