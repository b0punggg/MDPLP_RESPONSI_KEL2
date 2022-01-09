<?php
    include('koneksi.php');
?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="shortcut icon" href="icon/redwolf.png">
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS  -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

            <title>print</title>
        </head>
        <body>
            <h3 class="text-center">DATA PELANGGAN</h3>


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">ALAMAT</th>
                                <th class="text-center">TELP</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        //mengurutkan berdasarkan id yang paling besar
                        $sql = mysqli_query($koneksi, "SELECT * FROM data_pelanggan ORDER BY id_pelanggan DESC") or die(mysqli_error($koneksi));
                        //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                        if(mysqli_num_rows($sql) > 0){
                            //membuat variabel $no untuk menyimpan nomor urut
                            $no = 1;
                            //melakukan perulangan while
                            while($data_pelanggan = mysqli_fetch_assoc($sql)){
                                //data perulangan
                                echo '
                                <tr class="text-center">
                                    <td>'.$no.'</td>
                                    <td>'.$data_pelanggan['nama_pelanggan'].'</td>
                                    <td>'.$data_pelanggan['alamat_pelanggan'].'</td>
                                    <td>'.$data_pelanggan['telp_pelanggan'].'</td>
                                    
                                </tr>
                                ';
                                $no++;
                            }
                        //jika query menghasilkan nilai 0
                        }else{
                            echo '
                            <tr align="center">
                                <td colspan="7">Tidak ada data.</td>
                            </tr>
                            ';
                        }
                        ?>
                    </table>
                </div>

            <script>
                window.print();
            </script>
            <!-- javascript -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        </body>
    </html>