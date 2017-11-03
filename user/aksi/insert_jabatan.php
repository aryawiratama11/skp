<?php
include '../../config/koneksi.php';
	$nip=$_POST['nip'];
	$jabatan=$_POST['jabatan'];
	$tmt=$_POST['tmt'];
	$tgs = date("Y-m-d",strtotime($tmt));

	//cek username di database
//Masukan data ke Table data member
//insertfile
	$cekjabatan=mysqli_fetch_array(mysqli_query($con,"SELECT a.id_jabatan, b.nama_jabatan FROM riwayat_jabatan a, jabatan b WHERE a.`id_jabatan`=b.`id_jabatan` AND a.userid='$nip' and a.id_jabatan='$jabatan'"));

	 if ($jabatan!=$cekjabatan[0] || $jabatan==$cekjabatan[0] ):  

  mysqli_query($con," UPDATE riwayat_jabatan set statusjabatan='0' where userid='$nip' ");
  
 endif;
  
  
   // if ($pendidikan!=$cekpendidikan[0]) {  

$qq="INSERT INTO `riwayat_jabatan` (`ID_JABATAN`, `USERID`, `ID_RW_JABATAN`, `TGLMULAI`, `STATUSJABATAN`) VALUES ('$jabatan', '$nip', NULL, '$tgs', '1')";
$query_input1 =mysqli_query($con,$qq);
   
//Masukan data ke Table login
	if ($query_input1) {
	//Jika Sukses
?>

       <script language="JavaScript">
			alert('berhasil di input ');
			document.location='../riwayat_jabatan.php';
			</script>
<?php
	}
	else {?>

       <script language="JavaScript">
			alert('gagal, error 404 ');
			document.location='../riwayat_jabatan.php';
			</script>
<?php
	}
//Tutup koneksi engine MySQL


	//}

// else { ?>

      <!--  <script language="JavaScript">
			alert('jabatan sudah ada ');
			document.location='../riwayat_pendidikan.php';
			</script> -->
<?php
	//} ?>
