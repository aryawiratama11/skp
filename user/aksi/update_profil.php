<?php
session_start();
include '../../config/koneksi.php';
if ($_GET['hal']=='info') {
	# code...
	$id=$_GET['id'];
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
  	
	$kota=$_POST['kota'];
	$tgl=$_POST['tgl'];
  	$tugas=$_POST['tugas'];
  $jk=$_POST['jk'];
  $agama=$_POST['agama'];
  $alamat=$_POST['alamat'];
  $hp=$_POST['hp'];
  $keluar=$_POST['keluar'];
  $alasan=$_POST['alasan'];
  $lahir = date("Y-m-d",strtotime($tgl));
  $tgs = date("Y-m-d",strtotime($tugas));
  $luar = date("Y-m-d",strtotime($keluar));

   $qq="UPDATE `pegawai` SET `NIP` = '$nip', `KODE_KOTA` = '$kota', `NAMA_PEGAWAI` = '$nama', `JENIS_KELAMIN` = '$jk', `AGAMA` = '$agama', `ALAMAT` = '$alamat', `NO_TELP` = '$hp', `ALASAN` = '$alasan', `TANGGAL_KELUAR` = '$lahir', `TANGGAL_TUGAS` = '$tgs', `TGLLAHIR` = '$lahir' WHERE `pegawai`.`USERID` = '$id';";

   $query_input1 =mysqli_query($con,$qq);

     
         
      //echo "File uploaded successfully."; 
      if ($query_input1 ) {
  //Jika Sukses
?>

        <script language="JavaScript">
      alert('data berhasil di UPDATE ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

        <script language="JavaScript">
      alert('error ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
<?php
  }  
    
}
elseif ($_GET['hal']=='foto') {
	$id=$_GET['id'];
 

  $filename = $_FILES["file"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
  $file_ext = substr($filename, strripos($filename, '.')); // get file name
  $filesize = $_FILES["file"]["size"];
  $allowed_file_types = array('.jpg','.jpeg','.bmp','.png');
  $date=date('Ymdhis');  
  $newfilename1 = $date."-".$id . $file_ext;

  if (in_array($file_ext,$allowed_file_types) && ($filesize < 1000000))
  { 
    // Rename file
    $newfilename = $date."-".$id . $file_ext;
    if (file_exists("../../upload/" . $newfilename))
    {
      // file already exists error
      echo "You have already uploaded this file.";
    }
    else
    {   
      move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $newfilename);
      $qq="UPDATE `pegawai` SET `GAMBAR` = '$newfilename1' WHERE `pegawai`.`USERID` = '$id' ";
      $query_input1 =mysqli_query($con,$qq);
     
      //echo "File uploaded successfully."; 
      if ($query_input1) {
  //Jika Sukses
?>

        <script language="JavaScript">
      alert('data berhasil di input ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

        <script language="JavaScript">
      alert('error ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
<?php
  }  
    }
  }
  elseif (empty($file_basename))
  
 {
  //Jika Gagal
  ?>

        <script language="JavaScript">
      alert('error ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
<?php
  }

  elseif ($filesize > 1000000)
  { 
    ?>

        <script language="JavaScript">
      alert('ukuran foto di atas 1mb');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
<?php
  }
  else
  {
    // file type error
    ?>

        <script language="JavaScript">
      alert('Only these file typs are allowed for upload: (,.jpg,.jpeg,.bmp,.png) <?php implode(', ',$allowed_file_types); unlink($_FILES["file"]["tmp_name"]); ?> ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
    <?php
    
  }
}
elseif ($_GET['hal']=='pass') {
	# code...
	 $id        = $_GET['id'];
    @$password_lama    = $_POST['name'];
    $password_baru    = $_POST['password1'];
    $konf_password    = $_POST['password2'];
    //cek password lama
    if ($_SESSION['jabatan']!='J03') {
    $query = "SELECT * FROM pegawai WHERE userid='$id' AND password=md5('$password_lama')";
    $sql = mysqli_query ($con,$query);
    $hasil = mysqli_num_rows ($sql);
    if ( $hasil == 0) {
        ?>
            <script language="JavaScript">
            alert('Password lama tidak sesuai!, silahkan ulang kembali!');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php
            
    	} 


 
//validasi input konfirm password
    else if (($password_baru) != ($konf_password)) {
             ?>
            <script language="JavaScript">
            alert('Password baru tidak sesuai dengan konfirmasi password baru !, silahkan ulang kembali!');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php
    }
    else {
    //update data
    $query = "UPDATE pegawai SET password=md5('$password_baru') WHERE userid='$id'";
    $sql = mysqli_query ($con,$query);
    //setelah berhasil update
    if ($sql) {
    	if ($_SESSION['jabatan']=='J03') {
    		$password_baru=$_SESSION['password'];
    		# code...
    	

         ?>
            <script language="JavaScript">
            alert('Password berhasil di ganti !');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php 
    }
    else { 
    	?>
            <script language="JavaScript">
            alert('Password berhasil di ganti. Silahkan Login Kembali !');
            document.location='../../config/logout.php';
            </script>
        <?php 

    }

    } else {
        ?>
            <script language="JavaScript">
            alert('password gagal di ganti silahkan ulangi lagi');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php
    }
    }
}

else  {


  //validasi input konfirm password
    if (($password_baru) != ($konf_password)) {
             ?>
            <script language="JavaScript">
            alert('Password baru tidak sesuai dengan konfirmasi password baru !, silahkan ulang kembali!');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php
    }
    else {
    //update data
    $query = "UPDATE pegawai SET password=md5('$password_baru') WHERE userid='$id'";
    $sql = mysqli_query ($con,$query);
    //setelah berhasil update
    if ($sql) {
      if ($_SESSION['jabatan']=='J03') {
        $password_baru=$_SESSION['password'];
        # code...
      

         ?>
            <script language="JavaScript">
            alert('Password berhasil di ganti !');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php 
    }
    else { 
      ?>
            <script language="JavaScript">
            alert('Password berhasil di ganti. Silahkan Login Kembali !');
            document.location='../../config/logout.php';
            </script>
        <?php 

    }

    } else {
        ?>
            <script language="JavaScript">
            alert('password gagal di ganti silahkan ulangi lagi');
            document.location='../profil.php?id=<?php echo $id; ?>';
            </script>
        <?php
    }
    }


}

}

else {
	?>

	<script language="JavaScript">
      alert('error ');
      document.location='../profil.php?id=<?php echo $id; ?>';
      </script>
	<?php
}


?>