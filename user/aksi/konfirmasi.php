 <?php
 session_start();
 include '../../config/koneksi.php';
 if ($_GET['hal']=='ajuan') {
  $id=$_GET['id'];

  $skp=mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM sasaran_kinerja_pegawai WHERE KODE_SKP='$id' "));
if ($skp[3]==0){
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '1' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  
} elseif ($skp[3]==3) {
  # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '6' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  
}

elseif ($skp[3]==5) {
  # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '7' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  
}
else {
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../detail_rw_pengajuanskp.php?id=<?php echo $id; ?>';
      </script>
<?php
}

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('Sukses ');
      document.location='../riwayat_pengajuanskp.php';
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

}
 elseif ($_GET['hal']=='setuju') {
  $id=$_GET['id'];
if($_SESSION['jabatan']=='J00'){  
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '2' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
}
elseif ($_SESSION['jabatan']=='J09') {
    # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '4' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
  }
  else {
    ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../index.php';
      </script>
<?php
  }  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('Sukses ');
      document.location='../riwayat_persetujuanskp.php';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../lihat_pengajuanskp.php?id=<?php echo $id; ?>&hal=persetujuan';
      </script>
<?php
  }

}  elseif ($_GET['hal']=='tidaksetuju') {
  $id=$_GET['id'];
  $isi=$_POST['isi'];
  $skp=mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM sasaran_kinerja_pegawai WHERE KODE_SKP='$id' "));
if($_SESSION['jabatan']=='J00'){  
  $komen=$skp[4]." PEJABAT PENILAI: ".$isi."<br>";
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '3' , KET_AJUAN='$komen' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
}
elseif ($_SESSION['jabatan']=='J09') {
  $komen=$skp[4]." ATASAN PEJABAT PENILAI: ".$isi."<br>";
    # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUS_AJUAN` = '5' ,KET_AJUAN='$komen' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
  }

  else {
    ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../index.php';
      </script>
<?php
  }  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('Sukses ');
      document.location='../riwayat_persetujuanskp.php';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../lihat_pengajuanskp.php?id=<?php echo $id; ?>&hal=persetujuan';
      </script>
<?php
  }

}
 elseif ($_GET['hal']=='capaian') {
  $id=$_GET['id'];

  
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '1' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('Sukses ');
      document.location='../penilaian_capaian.php';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../input_nilaicapaian.php?id=<?php echo $id; ?>';
      </script>
<?php
  }

} elseif ($_GET['hal']=='yesskp') {
  $id=$_GET['id'];
if($_SESSION['jabatan']=='J00'){  
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '4' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
}
elseif ($_SESSION['jabatan']=='J09') {
    # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '6' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
  }
  elseif ($_SESSION['jabatan']!='J03' && $_SESSION['jabatan']!='J00' && $_SESSION['jabatan']!='J09') {
    # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '2' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
  }

  else {
    ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../index.php';
      </script>
<?php
  }  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('Sukses ');
      document.location='../keputusan_skp.php?id=<?php echo $id; ?>&hal=persetujuan';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../keputusan_skp.php?id=<?php echo $id; ?>&hal=persetujuan';
      </script>
<?php
  }

} elseif ($_GET['hal']=='noskp') {
  $id=$_GET['id'];
if($_SESSION['jabatan']=='J00'){  
$qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '5' , `KEBERATAN` = '-'WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
}
elseif ($_SESSION['jabatan']=='J09') {
    # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '7', `KEBERATAN` = '-' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
  }
  elseif ($_SESSION['jabatan']!='J03' && $_SESSION['jabatan']!='J00' && $_SESSION['jabatan']!='J09') {
    # code...
  $qq="UPDATE `sasaran_kinerja_pegawai` SET `STATUSNILAI` = '3',`KEBERATAN` = '-' WHERE `sasaran_kinerja_pegawai`.`KODE_SKP` = '$id';";
$query_input1 =mysqli_query($con,$qq);
  }

  else {
    ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../index.php';
      </script>
<?php
  }  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('Sukses ');
      document.location='../keputusan_skp.php?id=<?php echo $id; ?>&hal=persetujuan';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../keputusan_skp.php?id=<?php echo $id; ?>&hal=persetujuan';
      </script>
<?php
  }

}
else{
   ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../index.php';
      </script>
<?php

}

?>