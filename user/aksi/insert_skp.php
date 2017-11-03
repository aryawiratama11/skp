<?php
session_start();
include '../../config/koneksi.php';
  $userid=$_SESSION['userid'];
  $nipa=$_POST['nipa'];
  $nip=$_POST['nip'];
  $periode=$_POST['periode'];
  $num=mysqli_num_rows (mysqli_query($con,"SELECT KODE_SKP FROM sasaran_kinerja_pegawai"));
  $id=$periode."SKP";
  $no=$num + 1;
  $skp=$id."".$no;
  $date=date('Y-m-d');
    $cek=mysqli_num_rows (mysqli_query($con,"SELECT KODE_SKP FROM sasaran_kinerja_pegawai WHERE userid='".$_SESSION['userid']."' and JANGKAWAKTU_PENILAIAN='$periode'"));
  if ($cek > 0) {
  ?>
      <script language="JavaScript">
      alert('SKP sudah ada ');
      document.location='../index.php';
      </script>
  <?php
  } else {
$qq="INSERT INTO `sasaran_kinerja_pegawai` (`KODE_SKP`, `TANGGAL_DIUSULKAN`, `JANGKAWAKTU_PENILAIAN`, `STATUS_AJUAN`,`KET_AJUAN`, `REKOMENDASI`, `KEBERATAN`, `TGLKEBERATAN`, `TANGGAPANKEBERATAN`, `TGLTANGGAPANKEBERATAN`, `KEPUTUSANKEBERATAN`, `TGLKEPUTUSAN`, `TANGGAL_DITERIMA`, `NILAIPRESTASI`, `STATUSNILAI`,`KET_NILAI`, `USERID`, `PEG_USERID`, `PEG2_USERID`) VALUES ('$skp', '$date', '$periode', '0','', '', '', '', '', '', '', '', '', '', '0','','$userid' , '$nip', '$nipa');";
$query_input1 =mysqli_query($con,$qq);  
}
 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
      document.location='../detail_rw_pengajuanskp.php?id=<?php echo $skp; ?>';
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
