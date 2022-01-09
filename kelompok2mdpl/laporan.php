<?php
include('koneksi.php');
?>
<table border="0"  width="1000px">
    <tr>
      <td width="50" height="150">
        <table width="70%" border="1" align="center">
          <tr align="center">
            <td height="120px" bgcolor="">
                <i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
                <?php
                  $sqlcount = 'SELECT COUNT(*)AS COUNT FROM data';
                  $commit =  mysqli_query($koneksi,$sqlcount);
                  $result = mysqli_fetch_array($commit);
                  echo $result[0];
                ?>
                <p class="announcement-text">PENGHASILAN TAHUN INI</p>
                <a href="#">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </td> 
          </tr>
        </table>
      </td>
      <td width="50" height="150">
        <table width="70%" border="1" align="center">
          <tr align="center">
            <td height="120px" >
                <i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
                <?php
                  $sqlcount = 'SELECT COUNT(*)AS COUNT FROM transaksi2';
                  $commit =  mysqli_query($koneksi,$sqlcount);
                  $result = mysqli_fetch_array($commit);
                  echo $result[0];
                ?>
                <p class="announcement-text">PENGHASILAN BULAN INI</p>
                <a href="#">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </td> 
          </tr>
        </table>
      </td>
      <td width="50" height="150">
        <table width="70%" border="1" align="center">
          <tr align="center">
            <td height="120px" bgcolor="">
                <i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
                <?php
                  $sqlcount = 'SELECT COUNT(*)AS COUNT FROM transaksi';
                  $commit =  mysqli_query($koneksi,$sqlcount);
                  $result = mysqli_fetch_array($commit);
                  echo $result[0];
                ?>
                <p class="announcement-text">PENGHASILAN MINGGU INI</p>
                <a href="#">More Info<i class="fa fa-arrow-circle-right"></i></a>
            </td> 
          </tr>
        </table>
      </td>
    </tr>
    
  </table>
  <hr>
  <div class="container" style="margin-top:20px">
        <left><font size="4">LAPORAN PENJUALAN PAKET</font></left>
        <br><br>
        <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NAMA PAKET</th>
                    <th class="text-center">JUMLAH TRANSAKSI</th>
                    <th class="text-center">TANGGAL TRANSAKSI</th>
                    <th class="text-center">TOTAL HASIL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM data_paket ORDER BY id_paket DESC") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if(mysqli_num_rows($sql) > 0){
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($sql)){
                        //menampilkan data perulangan
                        echo '
                        <tr class="text-center">
                            <td>'.$no.'</td>
                            <td>'.$data['nama_paket'].'</td>
                            <td>'.$data['jumlah'].'</td>
                            <td>'.$data['tanggal'].'</td>
                            <td>'.$data['total'].'</td>
                        </tr>
                        ';
                        $no++;
                    }
                //jika query menghasilkan nilai 0
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            <tbody>
        </table>
    </div>
    </div>