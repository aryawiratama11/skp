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
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head lang="en">
        <title>SKP</title>
    </head>
    <body>
<p style="text-align: center;"><strong>PENILAIAN CAPAIAN SASARAN KINERJA&nbsp;</strong></p>
<p style="text-align: center;"><strong>PEGAWAI NEGERI SIPIL</strong></p>
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
                                                                            $RW24 = ((1.76*($rr['T_WAKTU']-$rr['R_WAKTU']))/$rr['T_WAKTU'])*100 ;
                                                                        }
                                                                        else {
                                                                            $RW24 = 76-((((1.76*($rr['T_WAKTU']-$rr['R_WAKTU']))/$rr['T_WAKTU'])*100)-100);
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
                                                                        if ($rr['T_BIAYA'] < 0) {
                                                                            if ($rr['R_BIAYA'] < 0) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                 echo $nilai;
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 echo $nilai;
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
                                                                            $RW24 = ((1.76*($rr['T_WAKTU']-$rr['R_WAKTU']))/$rr['T_WAKTU'])*100 ;
                                                                        }
                                                                        else {
                                                                            $RW24 = 76-((((1.76*($rr['T_WAKTU']-$rr['R_WAKTU']))/$rr['T_WAKTU'])*100)-100);
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
                                                                        if ($rr['T_BIAYA'] < 0) {
                                                                            if ($rr['R_BIAYA'] < 0) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                 echo $nilai;
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 echo $nilai;
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

<td>Kredit</td>
<td>&nbsp;</td>
<td colspan="3">&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2">&nbsp;</td>
<td>Kredit</td>
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
             $RW24 = ((1.76*($rr['T_WAKTU']-$rr['R_WAKTU']))/$rr['T_WAKTU'])*100 ;
           }
               else {
                     $RW24 = 76-((((1.76*($rr['T_WAKTU']-$rr['R_WAKTU']))/$rr['T_WAKTU'])*100)-100);
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
                                                                        if ($rr['T_BIAYA'] < 0) {
                                                                            if ($rr['R_BIAYA'] < 0) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo $nilai;

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
                                                                        
$jumlah = $total/$counter;
          echo round($jumlah,2); ?></td>
</tr>
<tr>
<td colspan="2"><?php 
$plus=$jumlah;
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
<td >Nganjuk, <?php echo indonesian_date(date('Y-m-d')) ?></td>
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
</body>
</html>