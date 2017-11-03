<?php
include '../config/koneksi.php';
include '../config/library.php';

 $modal_id=$_GET['id'];

        $skp=mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM sasaran_kinerja_pegawai WHERE KODE_SKP='$modal_id' "));

        $pegawai=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$skp[16]' "));
        $penilai=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$skp[17]' "));
        $atasan=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$skp[18]' "));
        $perilaku=mysqli_fetch_array(mysqli_query($con,"select * from penilaian_perilaku_pegawai where KODE_SKP='$modal_id' "));
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head lang="en">
        <title>SKP</title>
    </head>
    <body>
<p align="center">
  <h2> Sasaran Kinerja Pegawai </h2>
</p>
<table width="800" border="0.5" align="center">
  <tr>
    <td width="37" align="center">No.</td>
    <td colspan="2" align="center">I. PEJABAT PENILAI</td>
    <td width="24" align="center">No.</td>
    <td colspan="4" align="center">II. PNS YANG DINILAI </td>
  </tr>
  <tr>
    <td align="center" >1.</td>
    <td width="40">Nama</td>
    <td width="150"><?php echo $penilai[1]?></td>
    <td align="center" >1.</td>
    <td colspan="2">Nama</td>
    <td colspan="2"><?php echo $pegawai[1]?></td>
  </tr>
  <tr>
    <td align="center" >2.</td>
    <td>NIP</td>
    <td><?php echo $penilai[0]?></td>
    <td align="center" >2.</td>
    <td colspan="2">NIP</td>
    <td colspan="2"><?php echo $pegawai[0]?></td>
  </tr>
  <tr>
    <td align="center"> 3.</td>
    <td>Pangkat/Gol.Ruang</td>
    <td><?php echo $penilai[2]." / ". $penilai[3]?></td>
    <td align="center" > 3.</td>
    <td colspan="2">Pangkat/Gol.Ruang</td>
    <td colspan="2"><?php echo $pegawai[2]." / ". $pegawai[1]?></td>
  </tr>
  <tr>
    <td align="center" >4.</td>
    <td>Jabatan</td>
    <td><?php echo $penilai[4]?></td>
    <td align="center" >4.</td>
    <td colspan="2">Jabatan</td>
    <td colspan="2"><?php echo $penilai[4]?></td>
  </tr>
  <tr>
    <td align="center"  >5.</td>
    <td>Unit Kerja</td>
    <td><?php echo "SMP Negeri 1 Rejoso";?></td>
    <td align="center" >5.</td>
    <td colspan="2">Unit Kerja</td>
    <td colspan="2"><?php echo "SMP Negeri 1 Rejoso";?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" >No.</td>
    <td colspan="2" rowspan="2" align="center" >III. KEGIATAN TUGAS JABATAN </td>
    <td rowspan="2" align="center" >AK</td>
    <td colspan="4" align="center" >TARGET</td>
  </tr>
  <tr>

    <td width="80" align="center">KUANTITAS/ OUTPUT </td>
    <td width="80" align="center">KUALITAS / MUTU</td>
    <td width="80" align="center">WAKTU</td>
    <td width="80" align="center">BIAYA (Rp) </td>
  </tr>
  <?php 

$data="
 SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur ,dk.KODE_SKP,k.ID_KEG,k.angka_kredit,k.satuan_hasil
   FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id'
";
$result = mysqli_query($con,$data) or die(mysqli_error());
$no=1;
while($baris=mysqli_fetch_array($result)) 
{

    ?>
    <tr>        
    <td height="20" align="center"><?php echo $no?></td>
    <td width="250" colspan="2"><?php echo $baris[2]?></td>
    <td align="center"><?php echo $baris[10]?></td>
    <td align="center"><?php echo $baris[3]."/". $baris[11]?></td>
    <td align="center"><?php echo $baris[4]?></td>
    <td align="center"><?php echo $baris[5]?> bulan</td>
    <td align="center"><?php echo $baris[6]?></td>
  </tr><?php 
$no++;
} ?>
</table>
    <br>
    <br>
<table width="700" align="left" border="0">
    <tr>
     <td width="10" align="center"></td>
    <td width="200" align="center"></td>
        <td width="290" align="center"></td>
            <td width="200" align="center">Nganjuk, <?php echo indonesian_date(date('Y-m-d'))?> </td>  
  </tr>
  
    <tr>
     <td width="10" align="center"></td>
    <td width="200" align="center">Pejabat Penilai,</td>
        <td width="290" align="center"></td>
            <td width="200" align="center">PNS yang dinilai, </td>
  </tr>
<tr>
     <td width="10" align="center"></td>
    <td width="200" align="center"> </td>
        <td width="290" height="50" align="center"></td>
            <td width="200" height="50" align="center"></td>
  </tr>
    <tr>
     <td width="10" align="center"></td>
    <td width="200" align="center"><?php echo $penilai[1]?></td>
        <td width="290" align="center"></td>
            <td width="200" align="center"><?php echo $pegawai[1]?></td>
  </tr>

<tr>
     <td width="10" height="2" align="center"></td>
    <td width="200" height="2" align="center"><hr> </td>
        <td width="290" height="2" align="center"></td>
            <td width="200" height="2" align="center"><hr></td>
  </tr>

    <tr>
     <td width="10" align="center"></td>
    <td width="200" align="center">NIP. <?php echo $penilai[0]?></td>
        <td width="290" align="center"></td>
            <td width="200" align="center">NIP. <?php echo $pegawai[0]?> </td>
  </tr>
    
  
</table>
    <p>&nbsp;</p>
<p>&nbsp;</p>

    </body>
</html>