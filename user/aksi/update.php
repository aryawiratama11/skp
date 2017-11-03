<?php
include '../../config/koneksi.php';

if ($_GET['hal']=='jabatan') {
	# code...
	$id=$_GET['id'];
	$jabatan=$_POST['jabatan'];
	$tmt=$_POST['tmt'];
	$status=$_POST['status'];
	$tgs = date("Y-m-d",strtotime($tmt)); 

$qq="UPDATE `riwayat_jabatan` SET `ID_JABATAN` = '$jabatan', `TGLMULAI` = '$tgs', `STATUSJABATAN` = '$status' WHERE  `riwayat_jabatan`.`ID_RW_JABATAN` = '$id';";
$query_input1 =mysqli_query($con,$qq);
   
//Masukan data ke Table login
	if ($query_input1) {
	//Jika Sukses
?>

       <script language="JavaScript">
			alert('berhasil di UPDATE ');
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


	}
elseif ($_GET['hal']=='pangkat') {
	$id=$_GET['id'];
	$pangkat=$_POST['pangkat'];
	$status=$_POST['status'];
	$tmt=$_POST['tmt'];
	$tgs = date("Y-m-d",strtotime($tmt));


	//cek username di database
//Masukan data ke Table data member
//insertfile
	$cekpangkat=mysqli_fetch_array(mysqli_query($con,"SELECT a.id_pangkat, b.nama_pangkat FROM history_pangkat a, pangkat b WHERE a.`id_pangkat`=b.`id_pangkat` AND a.userid='$id' and a.id_pangkat='$pangkat'"));



  if ($pangkat!=$cekpangkat[0]) {  
  

$qq="UPDATE `history_pangkat` SET `ID_PANGKAT` = '$pangkat', `TANGGALMULAI` = '$tgs', `STATUSPANGKAT` = '$status' WHERE  `history_pangkat`.`ID_H_PANGKAT` = '$id';";
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
	} 
		# code...
	}	
 elseif ($_GET['hal']=='identitas') {
  $id=$_GET['id'];
  $nipa=$_POST['nipa'];
  $nip=$_POST['nip'];
  $periode=$_POST['periode'];
  
$qq="UPDATE `sasaran_kinerja_pegawai` SET `JANGKAWAKTU_PENILAIAN` = '$periode', `PEG_USERID` = '$nip', `PEG2_USERID` = '$nipa' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
      document.location='../detail_rw_pengajuanskp.php?id=<?php echo $id; ?>';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../detail_rw_pengajuanskp.php?id=<?php echo $id; ?>';
      </script>
<?php
  }
//Tutup koneksi engine MySQL

}
elseif ($_GET['hal']=='ajuan') {
	# code...
	$skp	= $_GET['kd'];
	$id	= $_GET['id'];
$butir = $_POST['butir'];
$tku	= $_POST['tku'];
$tkw	= $_POST['tkw'];
$tw	= $_POST['tw'];
$tb	= $_POST['tb'];
//$d=date('Y-m-d');

//cek username di database
	
echo $input1	="UPDATE `detil_kegiatan` SET `ID_KEG` = '$butir', `T_KUANTITAS` = '$tku', `T_KUALITAS` = '$tkw', `T_WAKTU` = '$tw', `T_BIAYA` = '$tb' WHERE `detil_kegiatan`.`ID_KEG` = '$id' AND `detil_kegiatan`.`KODE_SKP` = '$skp';";
$query_input1 =mysqli_query($con,$input1); 
//Masukan data ke Table login
	if ($query_input1)  {
	//Jika Sukses
?>

       <script language="JavaScript">
			alert('data berhasil di input ');

			document.location='../detail_rw_pengajuanskp.php?id=<?php echo $skp; ?>';
			</script>
<?php
	}
	else {
	//Jika Gagal
	?>

       <script language="JavaScript">
      alert('error ');
      document.location='../detail_rw_pengajuanskp.php?id=<?php echo $skp; ?>';
      </script>
<?php
	}
//Tutup koneksi engine MySQL

}

elseif ($_GET['hal']=='perilaku') {

  $id	= $_GET['id'];
  $kd	= $_GET['kd'];
  $op=$_POST['op'];
  $int=$_POST['int'];
  $kom=$_POST['kom'];
  $disp=$_POST['disp'];
  $kerja=$_POST['kerja'];
  $pimpin=$_POST['pimpin'];
 
  
$qq="UPDATE `penilaian_perilaku_pegawai` SET `ORIENTASIPELAYANAN` = '$op', `INTEGRITAS` = '$int', `KOMITMEN` = '$kom', `DISIPLIN` = '$disp', `KERJASAMA` = '$kerja', `KEPEMIMPINAN` = '$pimpin' WHERE `penilaian_perilaku_pegawai`.`KODENILAI` = '$id';";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
      document.location='../input_nilaicapaian.php?id=<?php echo $kd; ?>';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../input_nilaicapaian.php?id=<?php echo $kd; ?>';
      </script>
<?php
  }
//Tutup koneksi engine MySQL

}
elseif ($_GET['hal']=='kegiatan') {
	# code...
	
$id	= $_GET['id'];
$butir = $_POST['butir'];
$angka	= $_POST['angka'];
$satuan	= $_POST['satuan'];
$subunsur	= $_POST['subunsur'];
//$unsur	= $_POST['unsur'];

//$d=date('Y-m-d');

//cek username di database
	
$input1	="UPDATE `kegiatan` SET `ID_SUBUNSUR` = '$subunsur', `BUTIR_KEGIATAN` = '$butir', `SATUAN_HASIL` = '$satuan', `ANGKA_KREDIT` = '$angka' WHERE `kegiatan`.`ID_KEG` = '$id';";
$query_input1 =mysqli_query($con,$input1); 
//Masukan data ke Table login
	if ($query_input1)  {
	//Jika Sukses
?>

       <script language="JavaScript">
			alert('data berhasil di input ');

			document.location='../kegiatan.php';
			</script>
<?php
	}
	else {
	//Jika Gagal
	?>

       <script language="JavaScript">
      alert('error ');
      document.location='../kegiatan.php';
      </script>
<?php
	}
//Tutup koneksi engine MySQL

}
 else { 
?>

       <script language="JavaScript">
			alert('gagal, error 404 ');
			document.location='../index.php';
			</script>
<?php
 	}
 	?>

