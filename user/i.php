
<?php 


// $nama_dokumen='PDF'; //Beri nama file PDF hasil.
// define('_MPDF_PATH','../config/mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
// include(_MPDF_PATH . "mpdf.php"); // Tentukan folder dimana anda menyimpan folder mpdf

// $mpdf=new mPDF('utf-8', "A4", 9 ,'Arial', 5, 5, 20, 5, 5, 4); // Membuat file mpdf baru


// //Memulai proses untuk menyimpan variabel php dan html
// ob_start();
include '../config/koneksi.php';
include '../config/library.php';
//error_reporting(0);

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
         <!-- <link rel="stylesheet" type="text/css" media="print,handheld" href="apes.css"/> -->
         <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <style>

* {
    box-sizing: border-box;
}
.header {
    border: 1px solid white;
    padding: 15px;
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
    border: 1px solid white;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
</style>
         <style type="text/css">
           body {
  background: rgb(204,204,204); 
}
page[size="A4"] {
  background: white;
  height: 21cm;
  width: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  margin-top: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
@media print {
  body, page[size="A4"] {
    margin: 0;
    box-shadow: 0;
  }
}
         </style>
    </head>
    <body>
    <page size="A4" >
    <div class="row" >
      
      <div class="col-12 ">

  <h2 align="center"> Sasaran Kinerja Pegawai </h2>

<table width="1100" border="1" align="center">
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
  <tr>
  <td colspan="8" > UNSUR UTAMA </td>
</tr>
  <?php 

$data="
 SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur ,dk.KODE_SKP,k.ID_KEG,k.angka_kredit,k.satuan_hasil
   FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' and u.id_unsur!='4'
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
  </tr>

  <?php 
$no++;
} 
?>
<tr>
  <td colspan="8" > UNSUR PENUNJANG </td>
</tr>
<?php
$data1="
 SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur ,dk.KODE_SKP,k.ID_KEG,k.angka_kredit,k.satuan_hasil
   FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' and u.id_unsur='4'
";
$result1 = mysqli_query($con,$data1) or die(mysqli_error());
$no1=$no+0;
while($baris1=mysqli_fetch_array($result1)) 
{

    ?>
    <tr>        
    <td height="20" align="center"><?php echo $no1?></td>
    <td width="250" colspan="2"><?php echo $baris1[2]?></td>
    <td align="center"><?php echo $baris1[10]?></td>
    <td align="center"><?php echo $baris1[3]."/". $baris[11]?></td>
    <td align="center"><?php echo $baris1[4]?></td>
    <td align="center"><?php echo $baris1[5]?> bulan</td>
    <td align="center"><?php echo $baris1[6]?></td>
  </tr><?php 
$no1++;
} ?>
</table>
    <br>
    <br>
<table width="700" align="center" border="0" style="text-align: center;">
    <tr>
     <td width="10" align="center"></td>
    <td width="200" align="center"></td>
        <td width="290" align="center"></td>
            <td width="200" align="center">Nganjuk, 2 Januari <?php echo date('Y')?> </td>  
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
    <td width="200" align="center"><span style="text-decoration: underline;"><?php echo $penilai[1]; ?></span></td>
        <td width="290" align="center"></td>
            <td width="200" align="center"><span style="text-decoration: underline;"><?php echo $pegawai[1]; ?></span></td>
  </tr>

<!-- <tr>
     <td width="10" height="2" align="center"></td>
    <td width="200" height="2" align="center"><hr> </td>
        <td width="290" height="2" align="center"></td>
            <td width="200" height="2" align="center"><hr></td>
  </tr> -->

    <tr>
     <td width="10" align="center"></td>
    <td width="200" align="center">NIP. <?php echo $penilai[0]?></td>
        <td width="290" align="center"></td>
            <td width="200" align="center">NIP. <?php echo $pegawai[0]?> </td>
  </tr>
    
  
</table>
                                
      </div>
      
      
    </div>
    </page>

<page size="A4" >
    <div class="row" >
      
      <div class="col-12 ">
      <h4 style="text-align: center;"><strong>&nbsp;</strong> </h4>
<h4 style="text-align: center;"><strong>PENILAIAN CAPAIAN SASARAN KINERJA<br>PEGAWAI NEGERI SIPIL</strong></h4>
<p>Jangka waktu penilaian 2 januari s.d 31 Desember 2014</p>
<table border="1"  width="1100">
<tbody>
<tr style="text-align: center;">
<td rowspan="2"> <p>NO</p> </td>
<td rowspan="2"> <p>I. Kegiatan Tugas<br>Jabatan</p> </td>
<td rowspan="2"> <p>AK</p> </td>
<td colspan="7"> <p>TARGET</p> </td>
<td rowspan="2"> <p>AK</p> </td>
<td colspan="9"> <p>REALISASI</p> </td>
<td colspan="3" rowspan="2"> <p>PENGHITUNGAN</p> </td>
<td colspan="2" rowspan="2"> <p>NILAI CAPAIAN SKP</p> </td>
</tr>
<tr>
<td> <p>Kuantitas/<br>Output</p> </td>
<td colspan="3"> <p>Kualitas/<br>Mutu</p> </td>
<td> <p>Waktu</p> </td>
<td colspan="2"> <p>Biaya</p> </td>
<td colspan="3"> <p>Kuantitas/<br>Output</p> </td>
<td colspan="3"> <p>Kualitas/<br>Mutu</p> </td>
<td> <p>Waktu</p> </td>
<td colspan="2"> <p>Biaya</p> </td>

</tr>
<tr style="text-align: center;">
<td> <p>1</p> </td>
<td> <p>2</p> </td>
<td> <p>3</p> </td>
<td> <p>4</p> </td>
<td colspan="3"> <p>5</p> </td>
<td> <p>6</p> </td>
<td colspan="2"> <p>7</p> </td>
<td> <p>8</p> </td>
<td colspan="3"> <p>9</p> </td> 
<td colspan="3"> <p>10</p> </td>
<td> <p>11</p> </td>
<td colspan="2"> <p>12</p> </td>
<td colspan="3"> <p>13</p> </td>
<td colspan="2"> <p>14</p> </td>
</tr>

</tbody>
<tbody>
<tr> 
<td colspan="25"> <p>UNSUR UTAMA</p> </td>
</tr>
<?php
 $sql = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG , k.angka_kredit
                                                                    FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
                                                                    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' and u.id_unsur!='4' "); //statuspeg apa ?
                                                                 $no = 1;
                                                                 $counter = 0;
                                                                 $total=0; 
                                                                 while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    $counter++;

?>
<tr>
<td> <?= $no ?> </td>
<td> <?php echo  nl2br($rr['BUTIR_KEGIATAN']); ?> </td>
<td> <?php echo $rr['angka_kredit']; ?> </td>
<td> <?php echo $rr['T_KUANTITAS']."/".$rr['satuan_hasil']; ?> </td>
<td colspan="3"> <?php echo $rr['T_KUALITAS']; ?> </td>
<td> <?php echo $rr['T_WAKTU']; ?> </td>
<td colspan="2"> <?php echo $rr['T_BIAYA']; ?> </td>
<td> <?php echo $rr['angka_kredit']; ?> </td>
<td colspan="3"> <?php echo $rr['R_KUANTITAS']."/".$rr['satuan_hasil']; ?> </td>
<td colspan="3"> <?php echo $rr['R_KUALITAS']; ?> </td>
<td> <?php echo $rr['R_BIAYA']; ?> </td>
<td colspan="2"> <?php echo $rr['R_WAKTU']; ?> </td>
<td colspan="3"> <?php
if ($rr['R_BIAYA']>0 && $rr['T_BIAYA']>0) {
                                                                        $persenbiaya= 100-($rr['R_BIAYA']/$rr['T_BIAYA']*100);
                                                                        } else { $persenbiaya=0; }


                                                                        $persenwaktu= 100-($rr['R_WAKTU']/$rr['T_WAKTU']*100);

                                                                        $kuantitas= $rr['R_KUANTITAS']/$rr['T_KUANTITAS']*100;
                                                                        $kualitas= $rr['R_KUALITAS']/$rr['T_KUALITAS']*100;
                                                                        if ($persenwaktu < 25 ){
                                                                            $RW24 = ((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100 ;
                                                                        }
                                                                        else {
                                                                            $RW24 = 76-((((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100)-100);
                                                                        }
                                                                         if ( $persenbiaya > 0 && $persenbiaya < 25 ){
                                                                            $RB24 = ((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100 ;
                                                                        }
                                                                        else {
                                                                            //$RB24 = 76-((((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100)-100);
                                                                            $RB24 = 0;
                                                                        }
                                                                        if ($RB24 == 0) {
                                                                            $perhitungan=$kuantitas+$kualitas+$RW24;
                                                                            echo $perhitungan;
                                                                            
                                                                        }
                                                                        else {
                                                                            $perhitungan=$kuantitas+$kualitas+$RW24+$RB24;
                                                                            echo $perhitungan;
                                                                        }


                                                                        
?> </td>
<td colspan="2"> <?php
                                                                        if ($rr['T_BIAYA'] < 1) {
                                                                            if ($rr['R_BIAYA'] < 1) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo round($nilai,2);
                                                                                $total += $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                 echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                                 //$ttl=$total;

                                                                        }
                                                                        ?> </td>

</tr>
<?php
                                                                $no++;
                                                            }
                                                            ?>

<tr>
<td colspan="25"> <p>UNSUR PENUNJANG</p> </td>
</tr>
<?php
 $sql = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG , k.angka_kredit
                                                                    FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
                                                                    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' and u.id_unsur='4' "); //statuspeg apa ?
                                                                 $no1 = $no + 0;
                                                                 $counter = 0;
                                                                 $total=0; 
                                                                 while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    $counter++;

?>
<tr>
<td> <?= $no1 ?> </td>
<td> <?php echo  nl2br($rr['BUTIR_KEGIATAN']); ?> </td>
<td> <?php echo $rr['angka_kredit']; ?> </td>
<td> <?php echo $rr['T_KUANTITAS']."/".$rr['satuan_hasil']; ?> </td>
<td colspan="3"> <?php echo $rr['T_KUALITAS']; ?> </td>
<td> <?php echo $rr['T_WAKTU']; ?> </td>
<td colspan="2"> <?php echo $rr['T_BIAYA']; ?> </td>
<td> <?php echo $rr['angka_kredit']; ?> </td>
<td colspan="3"> <?php echo $rr['R_KUANTITAS']."/".$rr['satuan_hasil']; ?> </td>
<td colspan="3"> <?php echo $rr['R_KUALITAS']; ?> </td>
<td> <?php echo $rr['R_BIAYA']; ?> </td>
<td colspan="2"> <?php echo $rr['R_WAKTU']; ?> </td>
<td colspan="3"> <?php
if ($rr['R_BIAYA']>0 && $rr['T_BIAYA']>0) {
                                                                        $persenbiaya= 100-($rr['R_BIAYA']/$rr['T_BIAYA']*100);
                                                                        } else { $persenbiaya=0; }


                                                                        $persenwaktu= 100-($rr['R_WAKTU']/$rr['T_WAKTU']*100);

                                                                        $kuantitas= $rr['R_KUANTITAS']/$rr['T_KUANTITAS']*100;
                                                                        $kualitas= $rr['R_KUALITAS']/$rr['T_KUALITAS']*100;
                                                                        if ($persenwaktu < 25 ){
                                                                            $RW24 = ((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100 ;
                                                                        }
                                                                        else {
                                                                            $RW24 = 76-((((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100)-100);
                                                                        }
                                                                         if ( $persenbiaya > 0 && $persenbiaya < 25 ){
                                                                            $RB24 = ((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100 ;
                                                                        }
                                                                        else {
                                                                            //$RB24 = 76-((((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100)-100);
                                                                            $RB24 = 0;
                                                                        }
                                                                        if ($RB24 == 0) {
                                                                            $perhitungan=$kuantitas+$kualitas+$RW24;
                                                                            echo $perhitungan;
                                                                            
                                                                        }
                                                                        else {
                                                                            $perhitungan=$kuantitas+$kualitas+$RW24+$RB24;
                                                                            echo $perhitungan;
                                                                        }


                                                                        
?> </td>
<td colspan="2"> <?php
                                                                        if ($rr['T_BIAYA'] < 1) {
                                                                            if ($rr['R_BIAYA'] < 1) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo round($nilai,2);
                                                                                $total += $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                 echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                                 //$ttl=$total;

                                                                        }
                                                                        ?> </td>

</tr>
<?php
                                                                $no1++;
                                                            }
                                                            ?>

<tr>
<td>&nbsp;</td>
<td>II. TUGAS TAMBAHAN DAN KREATIFITAS/UNSUR PENUNJANG</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>1</td>
<td>(TUGAS TAMBAHAN)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td>2</td>
<td>(KREATIFITAS)</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="center">Jumlah</td>

<td><!-- Kredit --></td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td><!-- Kredit --></td>
<td colspan="3">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="23" rowspan="2">&nbsp;</td>
<td colspan="2"><?php 
$sql = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG
           FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
           WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' "); //statuspeg apa ?
           //$no = 1;
           $counter = 0;
           $total=0; 
           while ($rr = mysqli_fetch_array($sql)) {
           $counter++;
           if ($rr['R_BIAYA']>0 && $rr['T_BIAYA']>0) {
           $persenbiaya= 100-($rr['R_BIAYA']/$rr['T_BIAYA']*100);
           } else { $persenbiaya=0; }
            $persenwaktu= 100-($rr['R_WAKTU']/$rr['T_WAKTU']*100);
            $kuantitas= $rr['R_KUANTITAS']/$rr['T_KUANTITAS']*100;
            $kualitas= $rr['R_KUALITAS']/$rr['T_KUALITAS']*100;
            if ($persenwaktu < 25 ){
             $RW24 = ((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100 ;
           }
               else {
                     $RW24 = 76-((((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100)-100);
                        }
                          if ( $persenbiaya > 0 && $persenbiaya < 25 ){
                               $RB24 = ((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100 ;
                              }
                                  else {
                                                                            //$RB24 = 76-((((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100)-100);
                                        $RB24 = 0;
                                         }
                                            if ($RB24 == 0) {
                                             $perhitungan=$kuantitas+$kualitas+$RW24;
                                                // echo $perhitungan;
                                                }
                                                    else {
                                                       $perhitungan=$kuantitas+$kualitas+$RW24+$RB24;
                                                                            echo $perhitungan;
                                                                        }


                                                                        ?> 
                                                                       <?php
                                                                        if ($rr['T_BIAYA'] < 1) {
                                                                            if ($rr['R_BIAYA'] < 1) {
                                                                                $nilai=$perhitungan/3;
                                                                                //echo round($nilai,2);
                                                                                $total += $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                //echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 // echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                                 //$ttl=$total;

                                                                        }
                                                                      }
                                                                        
$jumlah1 = $total/$counter;
// echo $total;
// echo "<br>";
// echo $counter;
// echo "<br>";

          echo round($jumlah1,2); ?></td>
</tr>
<tr>
<td colspan="2"><?php 
$plus=$jumlah1;
                                              if($plus<=100 && $plus>90 ){echo "Sangat Baik";}
                                              elseif($plus<91 && $plus>75 ){echo "Baik";}
                                              elseif($plus<76 && $plus>60 ){echo "Cukup";}
                                              elseif($plus<61 && $plus>50 ){echo "Kurang";}
                                              elseif($plus<51 && $plus>0 ){echo "Buruk";}
                                              ?></td>
</tr>
</tbody>
</table >
<table style="text-align: center;float: right;" >
<tbody>
<tr style="height: 13px;">
<!-- <td style="height: 26px; width: 900px;" colspan="23" rowspan="20">&nbsp;</td> -->
<td >Nganjuk, 31 Desember <?php echo date('Y') ?></td>
<!-- <td style=" width: 21px;" colspan="2" rowspan="5">&nbsp;</td> -->
</tr>
<tr >
<td style=" width: 105px;">pejabat penilai</td>
</tr>
<tr >
<td style=" width: 75px;">&nbsp;</td>
</tr>
<tr >
<td style=" width: 75px;"><span style="text-decoration: underline;"><?= $penilai[1] ?></span></td>
</tr>
<tr >
<td style=" width: 75px;">NIP. <?= $penilai[0] ?></td>
</tr>
</tbody>
</table>
      </div>
    </div>
  </page>



    <page size="A4" >
    <div class="row" >
      
      <div class="col-6 ">
                                <table border="1" width="500px">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table border="0" width="500px">
                                          <tbody>
                                            <tr>
                                              <td colspan="2" height="60">
                                                <table border="0" width="350px">
                                                  <tbody>
                                                    <tr>
                                                      <td width="19px" height="20"><strong>8.</strong></td>
                                                      <td height="20"><strong>REKOMENDASI</strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td height="20">&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p>&nbsp;</p>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td colspan="2" height="150">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="300px">&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td width="500px">
                                        <table border="0" width="500px">
                                          <tbody>
                                            <tr>
                                              <td height="200">
                                                <table border="0" width="500px">
                                                  <tbody>
                                                    <tr>
                                                      <td width="150px">&nbsp;</td>
                                                      <td colspan="2" height="20"><strong>9. DIBUAT TANGGAL,........ </strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                        <div align="center"><strong>PEJABAT PENILAI </strong></div>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td width="50px">&nbsp;</td>
                                                      <td width="200px" height="50">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                         <div style="text-align: center;"><span style="text-decoration: underline;"><strong><?php echo $penilai[1]; ?></strong></span></div>
                                                      </td>
                                                    </tr>
                                                    <!-- <tr>
                                                      <td>&nbsp;</td>
                                                      <td height="5">&nbsp;</td>
                                                      <td height="5"><hr size="2" /></td>
                                                    </tr> -->
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                        <div style="text-align: center;">NIP : <?php echo $penilai[0]; ?></div>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <!-- <tr>
                                              <td height="10">&nbsp;</td>
                                            </tr> -->
                                            <tr>
                                              <td height="100">
                                                <table border="0" width="366px">
                                                  <tbody>
                                                    <tr>
                                                      <td colspan="2" height="20"><strong>10. DITERIMA TANGGAL,........ </strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2" height="20">
                                                        <div align="center"><strong>PEGAWAI NEGERI SIPIL YANG DINILAI </strong></div>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td width="50px">&nbsp;</td>
                                                      <td width="200px" height="50">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                         <div style="text-align: center;"><span style="text-decoration: underline;"><strong><?php echo $pegawai[1]; ?></strong></span></div>
                                                      </td>
                                                    </tr>
                                                    <!-- <tr>
                                                      <td height="5">&nbsp;</td>
                                                      <td height="5"><hr size="2" /></td>
                                                    </tr> -->
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                        <div style="text-align: center;">NIP : <?php echo $pegawai[0]; ?></div>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                           <!--  <tr>
                                              <td>&nbsp;</td>
                                            </tr> -->
                                            <tr>
                                              <td height="100">
                                                <table border="0" width="500px">
                                                  <tbody>
                                                    <tr>
                                                      <td width="150">&nbsp;</td>
                                                      <td colspan="2" height="20"><strong>11. DITERIMA TANGGAL,........ </strong></td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                        <div align="center"><strong>ATASAN PEJABAT PENILAI </strong></div>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td width="50">&nbsp;</td>
                                                      <td width="200px" height="50">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                         <div style="text-align: center;"><span style="text-decoration: underline;"><strong><?php echo $atasan[1]; ?></strong></span></div>
                                                      </td>
                                                    </tr>
                                                    <!-- <tr>
                                                      <td>&nbsp;</td>
                                                      <td height="5">&nbsp;</td>
                                                      <td height="5"><hr size="2" /></td>
                                                    </tr> -->
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                        <div style="text-align: center;">NIP : <?php echo $atasan[0]; ?> </div>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
      </div>
      <div class="col-6 ">
        <table border="0" width="500px" align="left">
                          <tbody>
                            <tr>
                              <td align="center" width="10px">&nbsp;</td>
                              <td align="center" width="150px">&nbsp;</td>
                              <td align="center" width="1450px"><img src="pancasila.png" alt="" /></td>
                              <td align="center" width="100px">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" width="10px">&nbsp;</td>
                              <td align="center" width="200px">&nbsp;</td>
                              <td align="center" width="290px">
                                <h4>PENILAIAN PRESTASI KERJA</h4>
                              </td>
                              <td align="center" width="200">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" width="10px">&nbsp;</td>
                              <td align="center" width="200px">&nbsp;</td>
                              <td align="center" width="290px">
                                <h4>PEGAWAI NEGERI SIPIL</h4>
                              </td>
                              <td align="center" width="200px">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" width="10px">&nbsp;</td>
                              <td align="center" width="200px">&nbsp;</td>
                              <td align="center" width="290px">&nbsp;</td>
                              <td align="center" width="200px">&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" width="500px" align="left">
                          <tbody>
                            <tr>
                              <td align="left" width="300px">PEMERINTAH DAERAH KABUPATEN NGANJUK</td>
                              <!-- <td width="100">&nbsp;</td> -->
                              <td align="left" width="300px">JANGKA WAKTU PENILAIAN</td>
                            </tr>
                            <tr>
                              <td align="left">DINAS DIKPORADA KABUPATEN NGANJUK</td>
                  <!-- <td>&nbsp;</td>
                  -->
                  <td align="left">BULAN, Januari s/d 31 Desember <?php echo $skp[2]; ?> </td>
                  </tr>
                  </tbody>
                  </table>
                  <table border="1" width="500px" align="left">
                    <tbody>
                      <tr>
                        <td align="right" ><strong>1</strong>.</td>
                        <td colspan="2"><strong>YANG DINILAI </strong></td>
                      </tr>
                      <tr>
                        <td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
                        <td width="340px" >a.N a m a</td>
                        <td width="340px" ><?php echo $pegawai[1] ?></td>
                      </tr>
                      <tr>
                        <td width="300px" >b.N I P</td>
                        <td width="300px" ><?php echo $pegawai[0] ?></td>
                      </tr>
                      <tr>
                        <td width="300px" >c.Pangkat, Golongan ruang, TMT</td>
                        <td width="300px" ><?php echo $pegawai[2]." / ". $pegawai[3]?></td>
                      </tr>
                      <tr>
                        <td width="300px" >d.Jabatan/Pekerjaan</td>
                        <td width="300px" ><?php echo $pegawai[4]?></td>
                      </tr>
                      <tr>
                        <td width="300px" >e.Unit Organisasi</td>
                        <td width="300px" >SMP Negeri 1 Rejoso</td>
                      </tr>
                      <tr>
                        <td align="right" ><strong>2</strong>.</td>
                        <td colspan="2" ><strong>PEJABAT PENILAI</strong></td>
                      </tr>
                      <tr>
                        <td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
                        <td width="340px" >a.N a m a</td>
                        <td width="340px" ><?php echo $penilai[1] ?></td>
                      </tr>
                      <tr>
                        <td width="300px" >b.N I P</td>
                        <td width="300px" ><?php echo $penilai[0] ?></td>
                      </tr>
                      <tr>
                        <td width="300px" >c.Pangkat, Golongan ruang, TMT</td>
                        <td width="300px" ><?php echo $penilai[2]." / ". $penilai[3]?></td>
                      </tr>
                      <tr>
                        <td width="300px" >d.Jabatan/Pekerjaan</td>
                        <td width="300px" ><?php echo $penilai[4]?></td>
                      </tr>
                      <tr>
                        <td width="300px" >e.Unit Organisasi</td>
                        <td width="300px" >SMP Negeri 1 Rejoso</td>
                      </tr>
                      <tr>
                        <td align="right" ><strong>3</strong>.</td>
                        <td colspan="2" ><strong>ATASAN PEJABAT PENILAI</strong></td>
                      </tr>
                      <tr>
                        <td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
                        <td width="340px" >a.&nbsp;N a m a</td>
                        <td width="340px" ><?php echo $atasan[1];?></td>
                      </tr>
                      <tr>
                        <td width="300px" >b.N I P</td>
                        <td width="300px" ><?php echo $atasan[0];?></td>
                      </tr>
                      <tr>
                        <td width="300px" >c.Pangkat, Golongan ruang, TMT</td>
                        <td width="300px" ><?php echo $atasan[2]." / ". $atasan[3]?></td>
                      </tr>
                      <tr>
                        <td width="300px" >d.Jabatan/Pekerjaan</td>
                        <td width="300px" >Kepala Bidang pendidikan SMP, SMA & SMK</td>
                      </tr>
                      <tr>
                        <td width="300px" >e.Unit Organisasi</td>
                        <td width="300px" >Dinas Dikpora Daerah Kabupaten Nganjuk</td>
                      </tr>
                    </tbody>
                  </table>
      </div>
      
    </div>
    </page>
     <!-- <pagebreak sheet-size="A4-L" /> -->
     <?php
     $sql = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG
           FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
           WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' "); //statuspeg apa ?
           //$no = 1;
           $counter = 0;
           $total=0; 
           while ($rr = mysqli_fetch_array($sql)) {
           $counter++;
           if ($rr['R_BIAYA']>0 && $rr['T_BIAYA']>0) {
           $persenbiaya= 100-($rr['R_BIAYA']/$rr['T_BIAYA']*100);
           } else { $persenbiaya=0; }
            $persenwaktu= 100-($rr['R_WAKTU']/$rr['T_WAKTU']*100);
            $kuantitas= $rr['R_KUANTITAS']/$rr['T_KUANTITAS']*100;
            $kualitas= $rr['R_KUALITAS']/$rr['T_KUALITAS']*100;
            if ($persenwaktu < 25 ){
             $RW24 = ((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100 ;
           }
               else {
                     $RW24 = 76-((((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100)-100);
                        }
                          if ( $persenbiaya > 0 && $persenbiaya < 25 ){
                               $RB24 = ((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100 ;
                              }
                                  else {
                                                                            //$RB24 = 76-((((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100)-100);
                                        $RB24 = 0;
                                         }
                                            if ($RB24 == 0) {
                                             $perhitungan=$kuantitas+$kualitas+$RW24;
                                                // echo $perhitungan;
                                                }
                                                    else {
                                                       $perhitungan=$kuantitas+$kualitas+$RW24+$RB24;
                                                                            echo $perhitungan;
                                                                        }


                                                                        ?> 
                                                                       <?php
                                                                        if ($rr['T_BIAYA'] < 1) {
                                                                            if ($rr['R_BIAYA'] < 1) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo $nilai;
                                                                                $total += $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                 // echo $nilai;
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 // echo $nilai;
                                                                                 $total += $nilai;
                                                                                 //$ttl=$total;

                                                                        }
                                                                      }
     ?>
     <page size="A4" >
    <div class="row" >
   
      <div class="col-6 ">
        <table style="width: 500px;" border="1">
                  <tbody>
                    <tr>
                      <td style="width: 15px;"><strong>4.</strong></td>
                      <td style="width: 440px;" colspan="4" ><strong>UNSUR YANG DINILAI </strong></td>
                      <td style="width: 47px;" >
                        <div align="center"><strong>Jumlah</strong></div>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 33px;" >&nbsp;</td>
                      <td style="width: 393px;" colspan="2" ><strong>a.Sasaran Kinerja Pegawai (SKP)</strong></td>
                      <td style="text-align: center; width: 64px;" ><?php $jumlah = $total/$counter;
                        echo round($jumlah,2); ?></td>
                        <td style="text-align: center; width: 83px;" >60%</td>
                        <td style="width: 87px;text-align: center;" ><?php echo $j= $jumlah*60/100 ; ?></td>
                      </tr>
                      <tr>
                        <td style="width: 33px;" rowspan="9" height="280">&nbsp;</td>
                        <td style="width: 221px;" rowspan="9" height="280"><strong>b. Perilaku Kerja </strong></td>
                        <td style="width: 172px;" >1. Orientasi Pelayanan</td>
                        <td style="width: 64px;" align="center"><?php echo $perilaku[2] ?></td>
                        <td style="width: 83px;text-align: center;" ><?php 
                          if($perilaku[2]<=100 && $perilaku[2]>=91 ){echo "Sangat Baik";}
                          elseif($perilaku[2]<=90 && $perilaku[2]>=76 ){echo "Baik";}
                          elseif($perilaku[2]<=75 && $perilaku[2]>=61 ){echo "Cukup";}
                          elseif($perilaku[2]<=60 && $perilaku[2]>=51 ){echo "Kurang";}
                          elseif($perilaku[2]<=50 && $perilaku[2]>=0 ){echo "Buruk";}
                          ?></td>
                          <td style="width: 87px;" height="16">&nbsp;</td>
                        </tr>
                        <tr>
                          <td style="width: 172px;" >2. Integritas</td>
                          <td style="width: 64px;text-align: center;"><?php echo $perilaku[3] ?></td>
                          <td style="width: 83px;text-align: center;"><?php 
                            if($perilaku[3]<=100 && $perilaku[3]>=91 ){echo "Sangat Baik";}
                            elseif($perilaku[3]<=90 && $perilaku[3]>=76 ){echo "Baik";}
                            elseif($perilaku[3]<=75 && $perilaku[3]>=61 ){echo "Cukup";}
                            elseif($perilaku[3]<=60 && $perilaku[3]>=51 ){echo "Kurang";}
                            elseif($perilaku[3]<=50 && $perilaku[3]>=0 ){echo "Buruk";}
                            ?></td>
                            <td style="width: 87px;" height="16">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 172px;" >3. Komitmen</td>
                            <td style="width: 64px;text-align: center;"><?php echo $perilaku[4] ?></td>
                            <td style="width: 83px;text-align: center;"><?php 
                              if($perilaku[4]<=100 && $perilaku[4]>=91 ){echo "Sangat Baik";}
                              elseif($perilaku[4]<=90 && $perilaku[4]>=76 ){echo "Baik";}
                              elseif($perilaku[4]<=75 && $perilaku[4]>=61 ){echo "Cukup";}
                              elseif($perilaku[4]<=60 && $perilaku[4]>=51 ){echo "Kurang";}
                              elseif($perilaku[4]<=50 && $perilaku[4]>=0 ){echo "Buruk";}
                              ?></td>
                              <td style="width: 87px;" height="16">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="width: 172px;" >4. Disiplin</td>
                              <td style="width: 64px;text-align: center;"><?php echo $perilaku[5] ?></td>
                              <td style="width: 83px;text-align: center;"><?php 
                                if($perilaku[5]<=100 && $perilaku[5]>=91 ){echo "Sangat Baik";}
                                elseif($perilaku[5]<=90 && $perilaku[5]>=76 ){echo "Baik";}
                                elseif($perilaku[5]<=75 && $perilaku[5]>=61 ){echo "Cukup";}
                                elseif($perilaku[5]<=60 && $perilaku[5]>=51 ){echo "Kurang";}
                                elseif($perilaku[5]<=50 && $perilaku[5]>=0 ){echo "Buruk";}
                                ?></td>
                                <td style="width: 87px;" height="16">&nbsp;</td>
                              </tr>
                              <tr>
                                <td style="width: 172px;" >5. Kerjasama</td>
                                <td style="width: 64px;text-align: center;"><?php echo $perilaku[6] ?></td>
                                <td style="width: 83px;text-align: center;"><?php 
                                  if($perilaku[6]<=100 && $perilaku[6]>=91 ){echo "Sangat Baik";}
                                  elseif($perilaku[6]<=90 && $perilaku[6]>=76 ){echo "Baik";}
                                  elseif($perilaku[6]<=75 && $perilaku[6]>=61 ){echo "Cukup";}
                                  elseif($perilaku[6]<=60 && $perilaku[6]>=51 ){echo "Kurang";}
                                  elseif($perilaku[6]<=50 && $perilaku[6]>=0 ){echo "Buruk";}
                                  ?></td>
                                  <td style="width: 87px;" height="16">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td style="width: 172px;" >6. Kepemimpinan</td>
                                  <td style="width: 64px;text-align: center;"><?php echo $perilaku[7] ?></td>
                                  <td style="width: 83px;text-align: center;"><?php 
                                    if($perilaku[7]<=100 && $perilaku[7]>=91 ){echo "Sangat Baik";}
                                    elseif($perilaku[7]<=90 && $perilaku[7]>=76 ){echo "Baik";}
                                    elseif($perilaku[7]<=75 && $perilaku[7]>=61 ){echo "Cukup";}
                                    elseif($perilaku[7]<=60 && $perilaku[7]>=51 ){echo "Kurang";}
                                    elseif($perilaku[7]<=50 && $perilaku[7]>=0 ){echo "Buruk";}
                                    ?></td>
                                    <td style="width: 87px;" height="16">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 172px;" >7. Jumlah</td>
                                    <td style="width: 64px;text-align: center;"><?php echo $jml=$perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7]; ?></td>
                                    <td style="width: 83px;" height="16">&nbsp;</td>
                                    <td style="width: 87px;" height="16">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 172px;" >8. Nilai rata-rata</td>
                                    <td style="width: 64px;text-align: center;"><?php 
                                    if ($perilaku[2]>0) { $a=1; }
                                                                             else {$a=0;}
                                                                                if ($perilaku[3]>0) { $b=1; }
                                                                             else {$b=0;}
                                                                                if ($perilaku[4]>0) { $c=1; }
                                                                             else {$c=0;}
                                                                                if ($perilaku[5]>0) { $d=1; }
                                                                             else {$d=0;}
                                                                                if ($perilaku[6]>0) { $e=1; }
                                                                             else {$e=0;}
                                                                                if ($perilaku[7]>0) { $f=1; }
                                                                             else {$f=0;}
                                    echo round(($jml=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/($a+$b+$c+$d+$e+$f)),2); ?></td>
                                    <td style="width: 83px;text-align: center;"><?php 
                                      if($jml<=100 && $jml>=91 ){echo "Sangat Baik";}
                                      elseif($jml<=90 && $jml>=76 ){echo "Baik";}
                                      elseif($jml<=75 && $jml>=61 ){echo "Cukup";}
                                      elseif($jml<=60 && $jml>=51 ){echo "Kurang";}
                                      elseif($jml<=50 && $jml>=0 ){echo "Buruk";}
                                      ?></td>
                                      <td style="width: 87px;" height="16">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td  colspan="3"><strong>9. Nilai Perilaku Kerja <?php $jml=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/($a+$b+$c+$d+$e+$f);
                                        echo round($jml,2) ;  ?> x 40%</strong></td>
                                        <td  align="center" ><?php 
                                        if ($perilaku[2]>0) { $a=1; }
                                                                             else {$a=0;}
                                                                                if ($perilaku[3]>0) { $b=1; }
                                                                             else {$b=0;}
                                                                                if ($perilaku[4]>0) { $c=1; }
                                                                             else {$c=0;}
                                                                                if ($perilaku[5]>0) { $d=1; }
                                                                             else {$d=0;}
                                                                                if ($perilaku[6]>0) { $e=1; }
                                                                             else {$e=0;}
                                                                                if ($perilaku[7]>0) { $f=1; }
                                                                             else {$f=0;}
                                          $jml2=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/
                                                                                ($a+$b+$c+$d+$e+$f)*40/100;
                                          echo round($jml2,2) ;  ?></td>
                                        </tr>
                                        <tr>
                                          <td style="text-align: center; width: 573px;" colspan="5" rowspan="2"><strong>NILAI PRESTASI KERJA</strong></td>
                                          <td style="width: 87px;" align="center" ><strong><?php 
                                            $plus=$j+$jml2;
                                            echo  round($plus,2); ?></strong></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 87px;" align="center" ><strong><?php 
                                              if($plus<=100 && $plus>90 ){echo "Sangat Baik";}
                                              elseif($plus<91 && $plus>75 ){echo "Baik";}
                                              elseif($plus<76 && $plus>60 ){echo "Cukup";}
                                              elseif($plus<61 && $plus>50 ){echo "Kurang";}
                                              elseif($plus<51 && $plus>0 ){echo "Buruk";}
                                              ?></strong></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table border="1" width="500px">
                                          <tbody>
                                            <tr>
                                              <td colspan="6" height="200px">

                                                <table border="0" width="500px">
                                                  <tbody>
                                                    <tr>
                                                      <td colspan="2" height="60">
                                                        <table border="0" width="500px">
                                                          <tbody>
                                                            <tr>
                                                              <td width="19px" height="20"><strong>5.</strong></td>
                                                              <td width="315px" height="20"><strong>KEBERATAN DARI PEGAWAI NEGERI </strong></td>
                                                            </tr>
                                                            <tr>
                                                              <td height="20">&nbsp;</td>
                                                              <td><strong>SIPIL YANG DINILAI (APABILA ADA) </strong></td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <p>&nbsp;</p>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2" height="150">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td width="300">&nbsp;</td>
                                                      <td><strong>Tanggal, ...................................... </strong></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
      </div>
      <div class="col-6 ">
         <table border="1" width="500px">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table border="0" width="500px">
                                            <tbody>
                                              <tr>
                                                <td colspan="2" height="60">
                                                  <table border="0" width="350px">
                                                    <tbody>
                                                      <tr>
                                                        <td width="19" height="20"><strong>6.</strong></td>
                                                        <td width="315" height="20"><strong>TANGGAPAN PEJABAT PENILAI </strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="20">&nbsp;</td>
                                                        <td><strong>ATAS KEBERATAN </strong></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <p>&nbsp;</p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" height="160">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td width="300">&nbsp;</td>
                                                <td><strong>Tanggal, ...................................... </strong></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="500px">
                                          <table border="0" width="500px">
                                            <tbody>
                                              <tr>
                                                <td colspan="2" height="60">
                                                  <table border="0" width="350px">
                                                    <tbody>
                                                      <tr>
                                                        <td width="19px" height="20"><strong>7.</strong></td>
                                                        <td width="315px" height="20"><strong>KEPUTUSAN ATASAN PEJABAT </strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td height="20">&nbsp;</td>
                                                        <td><strong>PENILAI ATAS KEBERATAN </strong></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <p>&nbsp;</p>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" height="240">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td width="300px">&nbsp;</td>
                                                <td><strong>Tanggal, ...................................... </strong></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
      </div>
      
    </div>
    </page>

    </body>
</html>
<script>

    window.print();
</script>
<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf

// $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
// ob_end_clean();
// //Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf-&gt;WriteHTML($html);
// $stylesheet = file_get_contents('../assets/global/plugins/bootstrap/css/bootstrap.css');
// $mpdf->WriteHTML($stylesheet,1);
// $mpdf->WriteHTML(utf8_encode($html));
// $mpdf->Output($modal_id.".pdf" ,'I');
// exit;
?>