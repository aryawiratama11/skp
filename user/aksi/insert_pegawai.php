<?php
include '../../config/koneksi.php';
	$nip=$_POST['nip'];
	$nama=$_POST['nama'];
  $password=$_POST['password'];
	$kota=$_POST['kota'];
	$tgl=$_POST['tgl'];
  $tugas=$_POST['tugas'];
  $jk=$_POST['jk'];
  $agama=$_POST['agama'];
  $pangkat=$_POST['pangkat'];
  $jabatan=$_POST['jabatan'];
  $date=date('Ymdhis');
  $tmt=date('Y-m-d');
  $alamat=$_POST['alamat'];
  $hp=$_POST['hp'];

$lahir = date("Y-m-d",strtotime($tgl));
$tgs = date("Y-m-d",strtotime($tugas));
$num=mysqli_num_rows (mysqli_query($con,"SELECT nip FROM pegawai"));
  $userid=$num + 1;
	//cek username di database
	$cek=mysqli_num_rows (mysqli_query($con,"SELECT nip FROM pegawai WHERE nip='$nip'") );
	if ($cek > 0) {
	?>
			<script language="JavaScript">
			alert('nip sudah ada');
			document.location='../pegawai.php';
			</script>
	<?php
	}
	 else 
	{
//Masukan data ke Table data member
//insertfile

	 $filename = $_FILES["file"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
  $file_ext = substr($filename, strripos($filename, '.')); // get file name
  $filesize = $_FILES["file"]["size"];
  $allowed_file_types = array('.jpg','.jpeg','.bmp','.png');
  $date=date('Ymdhis');  
  $newfilename1 = $date."-".$nip . $file_ext;

  if (in_array($file_ext,$allowed_file_types) && ($filesize < 1000000))
  { 
    // Rename file
    $newfilename = $date."-".$nip . $file_ext;
    if (file_exists("../../upload/" . $newfilename))
    {
      // file already exists error
      echo "You have already uploaded this file.";
    }
    else
    {   
      move_uploaded_file($_FILES["file"]["tmp_name"], "../../upload/" . $newfilename);
      $qq="INSERT INTO `pegawai` (`USERID`, `NIP`, `KODE_KOTA`, `NAMA_PEGAWAI`, `JENIS_KELAMIN`, `AGAMA`, `KEWARGANEGARAAN`, `ALAMAT`, `NO_TELP`, `PASSWORD`, `ALASAN`, `TANGGAL_KELUAR`, `GAMBAR`, `TANGGAL_TUGAS`, `UNIT_KERJA`,`TGLLAHIR`) VALUES ('$userid', '$nip', '$kota', '$nama', '$jk', '$agama', 'Indonesia', '$alamat', '$hp', MD5('$password'),'', '', '$newfilename1', '$tgs', 'SMP Negeri 1 Rejoso','$lahir')";
      $query_input1 =mysqli_query($con,$qq);

      $login=mysqli_query($con," SELECT p.userid
   FROM pegawai p 
   WHERE p.nip='$nip' ");

  
  $useridnya=mysqli_fetch_array($login);
      
     $a = mysqli_query($con," INSERT INTO `history_pangkat` (`ID_PANGKAT`, `TANGGALMULAI`, `USERID`, `ID_H_PANGKAT`, `STATUSPANGKAT`) VALUES ('$pangkat', '$tmt', '$useridnya[0]', NULL, '1')");
     $b = mysqli_query($con," INSERT INTO `riwayat_jabatan` (`ID_JABATAN`, `USERID`, `ID_RW_JABATAN`, `TGLMULAI`, `STATUSJABATAN`) VALUES ('$jabatan', '$useridnya[0]', NULL, '$tmt', '1')");

    // echo $qq."pangkat".$a."jabatan".$b;

     
      if ($query_input1 ) {
  //Jika Sukses
?>

        <script language="JavaScript">
      alert('data berhasil di input ');
      document.location='../pegawai.php';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

        <script language="JavaScript">
      alert('error');
      document.location='../pegawai.php';
      </script>
<?php
  }  
    }
  }
  elseif (empty($file_basename))
  { 
    // file selection error
   ?>

        <script language="JavaScript">
      alert('Please select a file to upload. ');
      document.location='../pegawai.php';
      </script>
<?php
  } 
  elseif ($filesize > 1000000)
  { 
    // file size error
    ?>

        <script language="JavaScript">
      alert('ukuran foto melebihi 1Mb. ');
      document.location='../pegawai.php';
      </script>
<?php
  }
  else
  {
    // file type error
    ?>
<script language="JavaScript">
      alert('Only these file typs are allowed for upload: (,.jpg,.jpeg,.bmp,.png) <?php implode(', ',$allowed_file_types); unlink($_FILES["file"]["tmp_name"]); ?> ');
      document.location='../pegawai.php';
      </script>
    <?php
    //echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
    //unlink($_FILES["file"]["tmp_name"]);
  }



    //mysqli_query($con," INSERT INTO `detailjabatan` (`ID_JABATAN`,`NIP`, `STATUSJABATAN`,`tmt_jabatan`) VALUES ('$jabatan','$NIP','1','$tmtj');");
 //mysqli_query($con," INSERT INTO `detailpangkat` (`IDPANGKAT`,`NIP`, `STATUSPANGKAT`,`tmt_pangkat`) VALUES ('$PANGKAT','$NIP', '1','$tmtp');");
  //mysqli_query($con," INSERT INTO `detailpendidikan` (`IDPEND`,`NIP`, `STATUSPEND`) VALUES ('$Pendidikan', '$NIP','1');");
 }
//Masukan data ke Table login
	
//Tutup koneksi engine MySQL

	

?>
