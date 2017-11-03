<?php
session_start();
include '../../config/koneksi.php';
$skp  = $_GET['id'];
$isi  = $_POST['summernote'];
$date  = date('Y-m-d');

 if ($_SESSION['jabatan']=='J00' ){
$qq="UPDATE `sasaran_kinerja_pegawai` SET `TANGGAPANKEBERATAN` = '$isi', `TGLTANGGAPANKEBERATAN` = '$date' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$skp';";
$query_input1 =mysqli_query($con,$qq);
} 
elseif ($_SESSION['jabatan']=='J09' ) {
$qq="UPDATE `sasaran_kinerja_pegawai` SET `KEPUTUSANKEBERATAN` = '$isi', `TGLKEPUTUSAN` = '$date' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$skp';";
$query_input1 =mysqli_query($con,$qq);
 $qq2="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '6' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$skp';";
$query_input2 =mysqli_query($con,$qq2);

 }
 else {
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `KEBERATAN` = '$isi', `TGLKEBERATAN` = '$date' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$skp';";
$query_input1 =mysqli_query($con,$qq);
 } 

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('sukses ');
      document.location='../keberatan.php';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../keberatan.php';
      </script>
<?php
  }
//Tutup koneksi engine MySQL

  

?>
