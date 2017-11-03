<?php
session_start();
include '../../config/koneksi.php';
$skp  = $_GET['id'];
$keg  = $_POST['idkeg'];
$tku  = $_POST['kua'];
$tkw  = $_POST['kwa'];
$tw = $_POST['waktu'];
$tb = $_POST['biaya'];
$qq="UPDATE `detil_kegiatan` SET `R_KUANTITAS` = '$tku', `R_KUALITAS` = '$tkw', `R_WAKTU` = '$tw', `R_BIAYA` = '$tb' WHERE `detil_kegiatan`.`ID_KEG` = '$keg' AND `detil_kegiatan`.`KODE_SKP` = '$skp';";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('sukses ');
      document.location='../input_nilaicapaian.php?id=<?php echo $skp; ?>';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../riwayat_pengajuanskp.php';
      </script>
<?php
  }
//Tutup koneksi engine MySQL

  

?>
