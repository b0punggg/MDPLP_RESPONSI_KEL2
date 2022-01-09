<?php include('koneksi.php'); ?>

		<center><font size="6">KONFIRMASI PEMBAYARAN</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$invoice			= $_POST['invoice'];
			$nama_pelanggan			= $_POST['nama_pelanggan'];
			$total_bayar			= $_POST['total_bayar'];
			$jumlah			= $_POST['jumlah'];

			$cek = mysqli_query($koneksi, "SELECT * FROM data_konfirmasi WHERE id_konfirmasi='$id_konfirmasi'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO data_konfirmasi (invoice,nama_pelanggan,total_bayar,jumlah,) VALUES('$invoice','$nama_pelanggan', '$total_bayar', '$jumlah')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil melakukan pembayaran."); document.location="index.php?page=tampil_konfirmasi";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah antrian.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=konfirmasi" method="post">
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Total Bayar</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="number" name="total_bayar" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Dibayar</label>
				<div class="col-md-6 col-sm-6">
					<input type="number" name="jumlah" class="form-control" required>
				</div>
			</div>

			<div class="text-center">
                    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
					<button type="submit" name="btn-simpan" id="btn-simpan" class="btn btn-success"><i class="fa fa-check fa-fw"></i> Bayar</button>
                </div>
		</form>
	</div>
