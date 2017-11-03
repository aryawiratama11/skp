<?php
include '../../config/koneksi.php';
	$nip=$_POST['nip'];
	$pangkat=$_POST['pangkat'];
	$tmt=$_POST['tmt'];
	$tgs = date("Y-m-d",strtotime($tmt));


	//cek username di database
//Masukan data ke Table data member
//insertfile
	$cekpangkat=mysqli_fetch_array(mysqli_query($con,"SELECT a.id_pangkat, b.nama_pangkat FROM history_pangkat a, pangkat b WHERE a.`id_pangkat`=b.`id_pangkat` AND a.userid='$nip' and a.id_pangkat='$pangkat'"));

	if ($pangkat!=$cekpangkat[0]) {  

  mysqli_query($con," UPDATE history_pangkat set statuspangkat='0' where userid='$nip' ");
 
  }
   else { 
  	?>

       <script language="JavaScript">
			alert('pangkat sudah ada ');
			document.location='../riwayat_pangkat.php';
			</script>
<?php
	}
  if ($pangkat!=$cekpangkat[0]) {  
 
  

$qq="INSERT INTO `history_pangkat` (`ID_PANGKAT`, `TANGGALMULAI`, `USERID`, `ID_H_PANGKAT`, `STATUSPANGKAT`) VALUES ('$pangkat', '$tgs', '$nip', NULL, '1')";
$query_input1 =mysqli_query($con,$qq);
   
//Masukan data ke Table login
	if ($query_input1) {
	//Jika Sukses
?>

       <script language="JavaScript">
			alert('berhasil di input ');
			document.location='../riwayat_pangkat.php';
			</script>
<?php
	}
	else {?>

       <script language="JavaScript">
			alert('gagal, error 404 ');
			document.location='../riwayat_pangkat.php';
			</script>
<?php
	}
//Tutup koneksi engine MySQL


	}

else { ?>

       <script language="JavaScript">
			alert('jabatan sudah ada ');
			document.location='../riwayat_pangkat.php';
			</script>
<?php
	} ?>
