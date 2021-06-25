<?php
    include 'koneksi.php';

    if(isset($_POST['bsimpan']))
    {
        //apakah data diedit atau dimpan baru
        if($_GET['hal'] =="edit")
        {
            //data akan di edit
            $edit = mysqli_query($koneksi,"UPDATE tb_anggota set
                                        nama_anggota = '$_POST[tnama_anggota]',
                                        jenis_kelamin ='$_POST[tjk_kelamin]',
                                        alamat ='$_POST[talamat]',
                                        kota ='$_POST[tkota]',
                                        telepon ='$_POST[ttelepon]',
                                        email ='$_POST[temail]',
                                        pengurus ='$_POST[tpengurus],'
                                        WHERE id_anggota ='$_GET[id]'
                                        ");

         if ($edit)//edit jika sukses
         {
             echo "<script>
                 alert('edit data SUKSES');
                 document.location='anggota.php';
                 </script>";
         }
         else
         {
             echo "<script>
                 alert('edit data GAGAL');
                 document.location='anggota.php';
                </script>";
         }
        }
        else
        //data disimpan baru
        {
            $simpan=mysqli_query($koneksi,"INSERT INTO tb_anggota(nama_anggota,jenis_kelamin,alamat,kota,telepon,email,pengurus) VALUES 
                                            ('$_POST[tnama_anggota]', '$_POST[tjk_kelamin]','$_POST[talamat]', '$_POST[tkota]', '$_POST[ttelepon]', '$_POST[temail]','$_POST[tpengurus]')");

         if ($simpan)//simpan jika sukses
        {
             echo "<script>
                 alert('simpan data SUKSES');
                 document.location='anggota.php';
                 </script>";
         }
        else
         {
             echo "<script>
                 alert('simpan data GAGAL');
                 document.location='anggota.php';
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
            $tampil=mysqli_query($koneksi, "SELECT*FROM tb_anggota WHERE id_anggota='$_GET[id]' "); //id dari url edit&id
            $data=mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan akan ditampung dulu ke variabel
                $vnm_angg=$data ['nama_anggota'];
                $vjk_kl=$data   ['jk_kelamin'];
                $valt=$data     ['alamat'];
                $vkt=$data      ['kota'];
                $vtlp=$data     ['telepon'];
                $veml=$data     ['email'];
                $vpgrs=$data    ['pengurus'];

            }


        }
        else if($_GET['hal'] =="hapus")
        {
            //persiapan hapus data
            $tampil=mysqli_query($koneksi,"DELETE FROM tb_anggota WHERE id_anggota='$_GET[id]'");
            if($hapus)
            {
                echo "<script>
                 alert('Hapus data BERHASIL!');
                 document.location='anggota.php';
                </script>";
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anggota</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<?php
include 'header.php';
?>

<div class="container">
    <h3 class="text mt-3"> Keanggotan Koperasi Simpan Pinjam</h3>
      <!-- halaman form -->
    <div class="card">
        <div class="card-header bg-success text-white">
        Input Data Anggota
    </div>
    <div class="card-body">
    <form method="post" action="">
        <div class="form-grup">
            <label>Nama</label>
            <input type="text" name="tnama_anggota" value="<?php echo ($vnm_angg)?>" class="form-control" placeholder="Inputkan nama " required>
        </div>
        <div class="form-grup">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="tjk_kelamin">
                <option value="<?php echo($vjk_kl)?>"><?php echo($vjk_kl)?></option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-grup">
            <label>Alamat</label>
            <textarea name="talamat" class="form-control" placeholder="Inputkan alamat "><?php echo($valt)?>
            </textarea>
        </div>
        <div class="form-grup">
            <label>Kota</label>
            <input type="text" name="tkota" value="<?php echo($vkt)?>" class="form-control" placeholder="Inputkan kota">
        </div>
        <div class="form-grup">
            <label>No telepon</label>
            <input type="text" name="ttelepon" value="<?php echo($vtlp)?>" class="form-control" placeholder="Inputkan no telepon">
        </div>
        <div class="form-grup">
            <label>Email</label>
            <input type="text" name="temail" value="<?php echo($veml)?>" class="form-control" placeholder="Inputkan email">
        </div>
        <div class="form-grup">
        <label>Pengurus</label>
        <select class="form-control" name="tpengurus" >
                <option value="<?php echo($vpgrs)?>"><?php echo($vpgrs)?></option>
                <option value="Iya">Iya</option>
                <option value="Tidk">Tidak</option>
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
        Daftar Anggota
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Pengurus</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 1; /*ketika data di inputkan ototmatis akan mulai dari 1*/
                $tampil= mysqli_query($koneksi, "SELECT*FROM tb_anggota order by id_anggota desc ");
                while($data=mysqli_fetch_array($tampil)):
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo$data['nama_anggota']?></td>
                <td><?php echo$data['jenis_kelamin']?></td>
                <td><?php echo$data['alamat']?></td>
                <td><?php echo$data['kota']?></td>
                <td><?php echo$data['telepon']?></td>
                <td><?php echo$data['email']?></td>
                <td><?php echo$data['pengurus']?></td>
                <td>
                 <!-- berpindah halaman ketika klik edit berdasarkan id -->
                    <a href="anggota.php?hal=edit&id=<?php echo $data['id_anggota']?>" class="btn btn-warning"> Edit</a> 
                   <!-- ketika klik tombol hapus -->
                    <a href="anggota.php?hal=hapus&id=<?php echo $data['id_anggota']?>" onclick="return confirm('Apakah yakin menghapus data ini?')" 
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