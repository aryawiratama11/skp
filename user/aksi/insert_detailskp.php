<?php
include '../../config/koneksi.php';

$skp	= $_GET['id'];
$butir = $_POST['butir'];
$tku	= $_POST['tku'];
$tkw	= $_POST['tkw'];
$tw	= $_POST['tw'];
$tb	= $_POST['tb'];
//$d=date('Y-m-d');

//cek username di database
	$cek=mysqli_num_rows (mysqli_query($con,"SELECT id_keg FROM detil_kegiatan WHERE id_keg='$butir' and kode_skp='$skp'"));
	if ($cek > 0) {
	?>
			<script language="JavaScript">
			alert('butir kegiatan sudah ada ');
			document.location='../detail_rw_pengajuanskp.php?id=<?php echo $skp; ?>';
			</script>
	<?php
	} else {
$input1	="INSERT INTO `detil_kegiatan` (`ID_KEG`, `KODE_SKP`, `T_KUANTITAS`, `T_KUALITAS`, `T_WAKTU`, `T_BIAYA`, `R_KUANTITAS`, `R_KUALITAS`, `R_WAKTU`, `R_BIAYA`, `NILAICAPAIAN`) VALUES ('$butir', '$skp', '$tku', '$tkw', '$tw', '$tb', '', '', '', '', '')";
$query_input1 =mysqli_query($con,$input1); }
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

	

?>
