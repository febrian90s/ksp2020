<?php
    include 'koneksi.php';

    if(isset($_POST['bsimpan']))
    {
        //apakah data diedit atau dimpan baru
        if($_GET['hal'] =="edit")
        {
            //data akan di edit
            $edit = mysqli_query($koneksi,"UPDATE tb_pinjaman set
                                        tanggal = '$_POST[ptanggal]',
                                        id_anggota ='$_POST[pid_anggota]',
                                        jumlah ='$_POST[pjumlah]',
                                        bunga ='$_POST[pbunga]',
                                        jangka_waktu ='$_POST[pjangka_waktu]',
                                        keterangan ='$_POST[pketerangan]',
                                        kondisi ='$_POST[pkondisi]'
                                        WHERE id_pinjaman ='$_GET[id]'
                                        ");

            if ($edit)//edit jika sukses
             {
                 echo "<script>
                    alert('edit data SUKSES');
                    document.location='pinjam.php';
                    </script>";
             }
            else
            {
                echo "<script>
                    alert('edit data GAGAL');
                     document.location='pinjam.php';
                    </script>";
            }
        }
        else
        //data disimpan baru
        {
            $simpan=mysqli_query($koneksi,"INSERT INTO tb_pinjaman(tanggal,id_anggota,jumlah,bunga,jangka_waktu,keterangan,kondisi) VALUES 
                                            ('$_POST[ptanggal]', '$_POST[pid_anggota]','$_POST[pjumlah]', '$_POST[pbunga]', '$_POST[pjangka_waktu]', '$_POST[pketerangan]','$_POST[pkondisi]')");

         if ($simpan)//simpan jika sukses
        {
             echo "<script>
                 alert('simpan data SUKSES');
                 document.location='pinjam.php';
                 </script>";
         }
        else
         {
             echo "<script>
                 alert('simpan data GAGAL');
                 document.location='pinjam.php';
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
            $tampil=mysqli_query($koneksi, "SELECT*FROM tb_pinjaman WHERE id_pinjaman='$_GET[id]' "); //id dari url edit&id
            $data=mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan akan ditampung dulu ke variabel
                $vtgl=$data ['tanggal'];
                $vid_agt=$data   ['id_anggota'];
                $vjml=$data     ['jumlah'];
                $vbg=$data      ['bunga'];
                $vjwt=$data     ['jangka_waktu'];
                $vket=$data     ['keterangan'];
                $vkds=$data    ['kondisi'];

            }


        }
        else if($_GET['hal'] =="hapus")
        {
            //persiapan hapus data
            $tampil=mysqli_query($koneksi,"DELETE FROM tb_pinjaman WHERE id_pinjaman='$_GET[id]'");
            if($hapus)
            {
                echo "<script>
                 alert('Hapus data BERHASIL!');
                 document.location='pinjam.php';
                </script>";
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pinjaman</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<?php
include 'header.php';
?>

<div class="container">
    <h3 class="text mt-3"> Pinjaman Anggota</h3>
      <!-- halaman form -->
    <div class="card">
        <div class="card-header bg-success text-white">
        Input Data pinjaman
    </div>
    <div class="card-body">
    <form method="post" action="">
        <div class="form-grup">
            <label>Tanggal</label>
            <input type="date" name="ptanggal" value="<?php echo ($vtgl)?>" class="form-control" placeholder="Inputkan tanggal ">
        </div>
        <div class="form-grup">
            <label>ID anggota</label>
            <input type="text" name="pid_anggota" value="<?php echo ($vid_agt)?>" class="form-control" placeholder="Inputkan id anggota ">
        </div>
        <div>
            <label>Jumlah</label>
            <input type="text" name="pjumlah" value="<?php echo ($vjml)?>" class="form-control" placeholder="Inputkan jumlah">

        </div>
        <div class="form-grup">
            <label>Bunga</label>
            <input type="text" name="pbunga" value="<?php echo($vbg)?>" class="form-control" placeholder="Inputkan bunga ">
        </div>
        <div class="form-grup">
            <label>Jangka Waktu</label>
            <input type="text" name="pjangka_waktu" value="<?php echo($vjwt)?>" class="form-control" placeholder="Inputkan jangka waktu">
        </div>
        <div class="form-grup">
            <label>keterangan</label>
            <input type="text" name="pketerangan" value="<?php echo($vket)?>" class="form-control" placeholder="Inputkan keterangan">
        </div>
        <div class="form-grup">
        <label>Status</label>
        <select class="form-control" name="pkondisi" >
                <option value="<?php echo($vkds)?>"><?php echo($vkds)?></option>
                <option value="Lunas">Lunas</option>
                <option value="Belum">Belum</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success mt-3" name="bsimpan">Simpan</button>
        <button type="reset" class="btn btn-danger mt-3" name="breset">Reset</button>
    </div> 
    </div>
    </form>
  
    

    <!-- halaman daftar -->
    
    <div class="card mt-5">
        <div class="card-header bg-primary text-white">
        Daftar pinjaman
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>ID Anggota</th>
                <th>Jumlah</th>
                <th>Bunga</th>
                <th>Jangka Waktu</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 1; /*ketika data di inputkan ototmatis akan mulai dari 1*/
                $tampil= mysqli_query($koneksi, "SELECT*FROM tb_pinjaman order by id_pinjaman desc ");
                while($data=mysqli_fetch_array($tampil)):
            ?>
            <!-- diisi sesuai nama field pada database -->
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo$data['tanggal']?></td>
                <td><?php echo$data['id_anggota']?></td>
                <td><?php echo$data['jumlah']?></td>
                <td><?php echo$data['bunga']?></td>
                <td><?php echo$data['jangka_waktu']?></td>
                <td><?php echo$data['keterangan']?></td>
                <td><?php echo$data['kondisi']?></td>
                <td>
                 <!-- berpindah halaman ketika klik edit berdasarkan id -->
                    <a href="pinjam.php?hal=edit&id=<?php echo $data['id_pinjaman']?>" class="btn btn-warning"> Edit</a> 
                   <!-- ketika klik tombol hapus -->
                    <a href="pinjam.php?hal=hapus&id=<?php echo $data['id_pinjaman']?>" onclick="return confirm('Apakah yakin menghapus data ini?')" 
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