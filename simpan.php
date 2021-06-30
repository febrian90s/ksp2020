<?php
    include 'koneksi.php';

    if(isset($_POST['bsimpan']))
    {
        //apakah data diedit atau dimpan baru
        if($_GET['hal'] =="edit")
        {
            //data akan di edit
            $edit = mysqli_query($koneksi,"UPDATE tb_simpanan set
                                        tanggal = '$_POST[stanggal]',
                                        nama ='$_POST[snama]',
                                        jenis ='$_POST[sjenis]',
                                        jumlah='$_POST[sjumlah]',
                                        keterangan ='$_POST[sketerangan]'
                                        WHERE id_simpanan ='$_GET[id]'
                                        ");

         if ($edit)//edit jika sukses
         {
             echo "<script>
                 alert('edit data SUKSES');
                 document.location='simpan.php';
                 </script>";
         }
         else
         {
             echo "<script>
                 alert('edit data GAGAL');
                 document.location='simpan.php';
                </script>";
         }
        }
        else
        //data disimpan baru
        {
            $simpan=mysqli_query($koneksi,"INSERT INTO tb_simpanan(tanggal,nama,jenis,jumlah,keterangan) VALUES 
                                            ('$_POST[stanggal]', '$_POST[snama]', '$_POST[sjenis]', '$_POST[sjumlah]', '$_POST[sketerangan]') ");

         if ($simpan)//simpan jika sukses
        {
             echo "<script>
                 alert('simpan data SUKSES');
                 document.location='simpan.php';
                 </script>";
         }
        else
         {
             echo "<script>
                 alert('simpan data GAGAL');
                 document.location='simpan.php';
                </script>";
         }
        }
        
    }
    // jika tombol edit/hapus ditekan
    if (isset($_GET['hal']))
    {
        //jika edit ditekan
        if($_GET['hal']=='edit')
        {
            ////menampilkan data yang akan di ubah
            $tampil=mysqli_query($koneksi, "SELECT*FROM tb_simpanan WHERE id_simpanan='$_GET[id]' "); //id dari url edit&id
            $data=mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan akan ditampung dulu ke variabel
                $vtgl=$data ['tanggal'];
                $vnm=$data   ['nama'];
                $vjs=$data     ['jenis'];
                $vjmlh=$data      ['jumlah'];
                $vket=$data     ['keterangan'];

            }


        }
        else if($_GET['hal'] =="hapus")
        {
            //persiapan hapus data
            $tampil=mysqli_query($koneksi,"DELETE FROM tb_simpanan WHERE id_simpanan='$_GET[id]'");
            if($hapus)
            {
                echo "<script>
                 alert('Hapus data BERHASIL!');
                 document.location='simpan.php';
                </script>";
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simpanan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<?php
include 'header.php';
?>

<div class="container">
    <h3 class="text mt-3"> Simpanan Anggota</h3>
      <!-- halaman form -->
    <div class="card">
        <div class="card-header bg-success text-white">
        Input Data Simpanan
    </div>
    <div class="card-body">
    <form method="post" action="">
        <div class="form-grup">
            <label>Tanggal</label>
            <input type="date" name="stanggal" value="<?php echo ($vtgl)?>" class="form-control" placeholder="Inputkan tanggal ">
        </div>
        <div class="form-grup">
            <label>Nama</label>
            <input type="text" name="snama" value="<?php echo ($vnm)?>" class="form-control" placeholder="Inputkan nama ">
        </div>
        <div class="form-grup">
        <label>Jenis</label>
        <select class="form-control" name="sjenis" >
                <option value="<?php echo($vjs)?>"><?php echo($vjs)?></option>
                <option value="Pokok">Pokok</option>
                <option value="Wajib">Wajib</option>
                <option value="Angsuran">Angsuran</option>
            </select>
        </div>
        <div class="form-grup">
            <label>Jumlah</label>
            <input type="text" name="sjumlah" value= "<?php echo($vjmlh)?>" class="form-control" placeholder="Inputkan jumlah ">
        </div>
        <div class="form-grup">
            <label>keterangan</label>
            <input type="text" name="sketerangan" value="<?php echo($vket)?>" class="form-control" placeholder="Inputkan keterangan">
        </div>
        
        <button type="submit" class="btn btn-success mt-3" name="bsimpan">Simpan</button>
        <button type="reset" class="btn btn-danger mt-3" name="breset">Reset</button>
    </div> 
    </div>
    </form>
  
    

    <!-- halaman daftar -->
    
    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
        Daftar Simpanan
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 1; /*ketika data di inputkan ototmatis akan mulai dari 1*/
                $tampil= mysqli_query($koneksi, "SELECT*FROM tb_simpanan order by id_simpanan desc ");
                while($data=mysqli_fetch_array($tampil)):
            ?>
            <!-- diisi sesuai nama field pada database -->
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo$data['tanggal']?></td>
                <td><?php echo$data['nama']?></td>
                <td><?php echo$data['jenis']?></td>
                <td><?php echo$data['jumlah']?></td>
                <td><?php echo$data['keterangan']?></td>
                <td>
                 <!-- berpindah halaman ketika klik edit berdasarkan id -->
                    <a href="simpan.php?hal=edit&id=<?php echo $data['id_simpanan']?>" class="btn btn-warning"> Edit</a> 
                   <!-- ketika klik tombol hapus -->
                    <a href="simpan.php?hal=hapus&id=<?php echo $data['id_simpanan']?>" onclick="return confirm('Apakah yakin menghapus data ini?')" 
                    class="btn btn-danger"> Hapus</a> 

                </td>
            </tr>
         <?php endwhile;//menutup perulangan while?>

        </table>
    </div>



</div>

<script type="text/javascript" scr="js/bootstrap.min.js"></script>
</body>
</html>