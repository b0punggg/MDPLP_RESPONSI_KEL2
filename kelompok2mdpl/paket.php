<?php include('koneksi.php'); ?>

        <center><font size="6">Input Paket</font></center>
        <hr>
        <?php
        if(isset($_POST['submit'])){
            $nama_paket         = $_POST['nama_paket'];
            $jenis_paket           = $_POST['jenis_paket'];
            $harga_paket         = $_POST['harga_paket'];

            $cek = mysqli_query($koneksi, "SELECT * FROM data_paket WHERE id_paket='$id_paket'") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($cek) == 0){
                $sql = mysqli_query($koneksi, "INSERT INTO data_paket (nama_paket, jenis_paket, harga_paket) VALUES('$nama_paket', '$jenis_paket', '$harga_paket')") or die(mysqli_error($koneksi));

                if($sql){
                    echo '<script>alert("Berhasil menambahkan paket."); document.location="index.php?page=tampil_paket";</script>';
                }else{
                    echo '<div class="alert alert-warning">Gagal melakukan proses tambah paket.</div>';
                }
            }else{
                echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
            }
        }
        ?>

        <form action="index.php?page=paket" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Paket</label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="nama_paket" class="form-control" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Paket</label>
                <div class="col-md-6 col-sm-6">
                    <select name="jenis_paket" class="form-control" required>
                        <option value="">Pilih Jenis Paket</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="bedcover">Bedcover</option>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Paket</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="harga_paket" class="form-control" required>
                </div>
            </div>
            <div class="item form-group">
                <div  class="col-md-6 col-sm-6 offset-md-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
    </div>
