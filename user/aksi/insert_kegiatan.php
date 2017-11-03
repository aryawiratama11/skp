<?php
session_start();
include '../../config/koneksi.php';
  //$userid=$_POST['nip'];
  $unsur=$_POST['unsur'];
  $subunsur=$_POST['subunsur'];
  $butir=$_POST['butir'];
  $satuan=$_POST['satuan'];
  $angka=$_POST['angka'];

  $date= date('Y');
  $sat = mysqli_query($con,"SELECT *
FROM sub_unsur
WHERE ID_SUBUNSUR='$subunsur' ");
$kd = mysqli_fetch_array($sat);

  $num=mysqli_num_rows (mysqli_query($con,"SELECT ID_KEG FROM kegiatan where ID_SUBUNSUR='$subunsur'"));
  
  $no=$num + 1;
  $kode=$kd[0]."0".$no;
  
$qq="INSERT INTO `kegiatan` (`ID_KEG`, `ID_SUBUNSUR`, `BUTIR_KEGIATAN`, `SATUAN_HASIL`, `ANGKA_KREDIT`) VALUES ('$kode', '$subunsur', '$butir', '$satuan', '$angka')";
$query_input1 =mysqli_query($con,$qq);  

 
 
//Masukan data ke Table login
  if ($query_input1) {
  //Jika Sukses
?>

       <script language="JavaScript">
      alert('data berhasil di update ');
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

  

?>
