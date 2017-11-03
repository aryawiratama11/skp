<?php

include '../../config/koneksi.php';
  $id=$_GET['id'];
  $hal=$_GET['hal'];
  $date=date('Y-m-d');
if ($hal=='setujupenilai') {
  # code...
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '2' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
      document.location='../riwayat_pengajuanskp.php';
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
  }
elseif ($hal=='tidaksetujupenilai') {
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '3' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
      document.location='../riwayat_pengajuanskp.php';
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
  # code...
}

?>
