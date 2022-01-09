<?php include('koneksi.php'); ?>

		<center><font size="6">Transaksi</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$invoice			= $_POST['invoice'];
			$nama_pelanggan			= $_POST['nama_pelanggan'];
			$nama_paket			= $_POST['nama_paket'];
			$jumlah			= $_POST['jumlah'];
			$total_harga			= $_POST['berat'];
			$total_bayar			= $_POST['total_bayar'];
			$tanggal			= $_POST['tanggal'];
			$status_transaksi			= $_POST['status_transaksi'];

			$cek = mysqli_query($koneksi, "SELECT * FROM data_transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO data_transaksi (invoice,nama_pelanggan,nama_paket,jumlah, status_transaksi, tanggal, total_bayar,total_harga,) VALUES('$invoice', '$nama_pelanggan', '$nama_paket', '$jumlah', '$status_transaksi','$tanggal', '$total_bayar','$total_harga')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan antrian."); document.location="index.php?page=tampil_transaksi";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah antrian.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=transaksi" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Invoice</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="invoice" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pelanggan</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nama_pelangan" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Paket</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nama_paket" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="number" name="jumlah" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Total Harga</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="number" name="total_harga" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Total Bayar</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="number" name="total_bayar" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Dibayar</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status Transaksi</label>
				<div class="col-md-6 col-sm-6">
					<select name="status" class="form-control" required>
						<option value="">Pilih Status</option>
						<option value="sudah bayar">Sudah bayar</option>
						<option value="sudah bayar">Belum bayar</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
