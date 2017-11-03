<?php
session_start();
include '../../config/koneksi.php';
  $userid=$_GET['id'];
  $op=$_POST['op'];
  $int=$_POST['int'];
  $kom=$_POST['kom'];
  $disp=$_POST['disp'];
  $kerja=$_POST['kerja'];
  $pimpin=$_POST['pimpin'];
  $date= date('Y');

  $sat = mysqli_query($con,"SELECT skp.`KODE_SKP`
FROM sasaran_kinerja_pegawai skp 
WHERE skp.`KODE_SKP`='$userid'  ");
$id = mysqli_fetch_array($sat);

  $num=mysqli_num_rows (mysqli_query($con,"SELECT KODENILAI FROM penilaian_perilaku_pegawai"));
  
  $no=$num + 1;
  $kode="SKP".$no;
  
$qq="INSERT INTO `penilaian_perilaku_pegawai` (`KODENILAI`, `KODE_SKP`, `ORIENTASIPELAYANAN`, `INTEGRITAS`, `KOMITMEN`, `DISIPLIN`, `KERJASAMA`, `KEPEMIMPINAN`, `NILAIPERILAKU`) VALUES ('$kode', '$id[0]', '$op', '$int', '$kom', '$disp', '$kerja', '$pimpin', '0');";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
      document.location='../input_nilaicapaian.php?id=<?php echo $userid; ?>';
      </script>
<?php
  }
  else {
  //Jika Gagal
  ?>

       <script language="JavaScript">
      alert('error ');
      document.location='../input_nilaicapaian.php?id=<?php echo $userid; ?>';
      </script>
<?php
  }
//Tutup koneksi engine MySQL

  

?>
