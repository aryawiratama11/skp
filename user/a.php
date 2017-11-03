
<?php 


$nama_dokumen='PDF'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../config/mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Tentukan folder dimana anda menyimpan folder mpdf

$mpdf=new mPDF('utf-8', "A4", 9 ,'Arial','L'); // Membuat file mpdf baru


//Memulai proses untuk menyimpan variabel php dan html
ob_start();
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
                                                                        ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head lang="en">
        <title>SKP</title>
        <!-- ../assets/global/plugins/bootstrap/css/bootstrap.min.css -->
        <!-- <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
 -->         <!-- <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
    </head>
    <body>

 
                      <div class="row">
                     <!-- <pagebreak sheet-size="A4-L" /> -->
                        <div class="col-md-6 " >
                          <table border="1" width="300">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <table border="0" width="300">
                                          <tbody>
                                            <tr>
                                              <td colspan="2" height="60">
                                                <table border="0" width="300">
                                                  <tbody>
                                                    <tr>
                                                      <td width="19" height="20"><strong>8.</strong></td>
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
                                              <td colspan="2" height="100">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="300">&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td width="400">
                                        <table border="1" width="500">
                                          <tbody>
                                            <tr>
                                              <td height="200">
                                                <table border="1" width="500">
                                                  <tbody>
                                                    <tr>
                                                      <td width="150">&nbsp;</td>
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
                                                      <td width="50">&nbsp;</td>
                                                      <td width="200" height="50">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                      <td>&nbsp;</td>
                                                      <td height="20">
                                                        <div style="text-align: center;"><span style="text-decoration: underline;"><strong><?php echo $penilai[1]; ?></strong></span></div>
                                                      </td>
                                                    </tr>
                                                   <!--  <tr>
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
                                           <!--  <tr>
                                              <td height="10">&nbsp;</td>
                                            </tr> -->
                                            <tr>
                                              <td height="100">
                                                <table border="1" width="366">
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
                                                      <td width="50">&nbsp;</td>
                                                      <td width="200" height="50">&nbsp;</td>
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
                                            <!-- <tr>
                                              <td>&nbsp;</td>
                                            </tr> -->
                                            <tr>
                                              <td height="100">
                                                <table border="0" width="400">
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
                                                      <td width="200" height="50">&nbsp;</td>
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
                        <div class="col-md-6 " >
                          <table border="0" width="400" align="left">
                          <tbody>
                            <tr>
                              <td align="center" width="10">&nbsp;</td>
                              <td align="center" width="100">&nbsp;</td>
                              <td align="center" width="145"><img src="pancasila.png" alt="" /></td>
                              <td align="center" width="100">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" width="10">&nbsp;</td>
                              <td align="center" width="100">&nbsp;</td>
                              <td align="center" width="145">
                                <h4>PENILAIAN PRESTASI KERJA</h4>
                              </td>
                              <td align="center" width="100">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" width="10">&nbsp;</td>
                              <td align="center" width="100">&nbsp;</td>
                              <td align="center" width="145">
                                <h4>PEGAWAI NEGERI SIPIL</h4>
                              </td>
                              <td align="center" width="100">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" width="10">&nbsp;</td>
                              <td align="center" width="100">&nbsp;</td>
                              <td align="center" width="145">&nbsp;</td>
                              <td align="center" width="100">&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>
                        <table border="0" width="400" align="left">
                          <tbody>
                            <tr>
                              <td align="left" width="300">PEMERINTAH DAERAH KABUPATEN NGANJUK</td>
                              <!-- <td width="100">&nbsp;</td> -->
                              <td align="left" width="300">JANGKA WAKTU PENILAIAN</td>
                            </tr>
                            <tr>
                              <td align="left">DINAS DIKPORADA KABUPATEN NGANJUK</td>
                  <!-- <td>&nbsp;</td>
                  -->
                  <td align="left">BULAN, Januari s/d 31 Desember <?php echo $skp[2]; ?> </td>
                  </tr>
                  </tbody>
                  </table>
                  <table border="1" width="400" align="left">
                    <tbody>
                      <tr>
                        <td align="right" ><strong>1</strong>.</td>
                        <td colspan="2"><strong>YANG DINILAI </strong></td>
                      </tr>
                      <tr>
                        <td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
                        <td width="170" >a.N a m a</td>
                        <td width="170" ><?php echo $pegawai[1] ?></td>
                      </tr>
                      <tr>
                        <td width="150" >b.N I P</td>
                        <td width="150" ><?php echo $pegawai[0] ?></td>
                      </tr>
                      <tr>
                        <td width="150" >c.Pangkat, Golongan ruang, TMT</td>
                        <td width="150" ><?php echo $pegawai[2]." / ". $pegawai[3]?></td>
                      </tr>
                      <tr>
                        <td width="150" >d.Jabatan/Pekerjaan</td>
                        <td width="150" ><?php echo $pegawai[4]?></td>
                      </tr>
                      <tr>
                        <td width="150" >e.Unit Organisasi</td>
                        <td width="150" >SMP Negeri 1 Rejoso</td>
                      </tr>
                      <tr>
                        <td align="right" ><strong>2</strong>.</td>
                        <td colspan="2" ><strong>PEJABAT PENILAI</strong></td>
                      </tr>
                      <tr>
                        <td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
                        <td width="170" >a.N a m a</td>
                        <td width="170" ><?php echo $penilai[1] ?></td>
                      </tr>
                      <tr>
                        <td width="150" >b.N I P</td>
                        <td width="150" ><?php echo $penilai[0] ?></td>
                      </tr>
                      <tr>
                        <td width="150" >c.Pangkat, Golongan ruang, TMT</td>
                        <td width="150" ><?php echo $penilai[2]." / ". $penilai[3]?></td>
                      </tr>
                      <tr>
                        <td width="150" >d.Jabatan/Pekerjaan</td>
                        <td width="150" ><?php echo $penilai[4]?></td>
                      </tr>
                      <tr>
                        <td width="150" >e.Unit Organisasi</td>
                        <td width="150" >SMP Negeri 1 Rejoso</td>
                      </tr>
                      <tr>
                        <td align="right" ><strong>3</strong>.</td>
                        <td colspan="2" ><strong>ATASAN PEJABAT PENILAI</strong></td>
                      </tr>
                      <tr>
                        <td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
                        <td width="170" >a.&nbsp;N a m a</td>
                        <td width="170" ><?php echo $atasan[1];?></td>
                      </tr>
                      <tr>
                        <td width="150" >b.N I P</td>
                        <td width="150" ><?php echo $atasan[0];?></td>
                      </tr>
                      <tr>
                        <td width="150" >c.Pangkat, Golongan ruang, TMT</td>
                        <td width="150" ><?php echo $atasan[2]." / ". $atasan[3]?></td>
                      </tr>
                      <tr>
                        <td width="150" >d.Jabatan/Pekerjaan</td>
                        <td width="150" >Kepala Bidang pendidikan SMP, SMA & SMK</td>
                      </tr>
                      <tr>
                        <td width="150" >e.Unit Organisasi</td>
                        <td width="150" >Dinas Dikpora Daerah Kabupaten Nganjuk</td>
                      </tr>
                    </tbody>
                  </table>
                        </div>

                      </div>
                        


<!-- <pagebreak orientation=L /> -->

<!--               <div class="row">
              <pagebreak sheet-size="A4-L" />
                <div class="col-md-6">
                  <table style="width: 500px;" border="1">
                  <tbody>
                    <tr>
                      <td style="width: 20px;"><strong>4.</strong></td>
                      <td style="width: 480px;" colspan="4" height="41"><strong>UNSUR YANG DINILAI </strong></td>
                      <td style="width: 47px;" height="41">
                        <div align="center"><strong>Jumlah</strong></div>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 33px;" height="40">&nbsp;</td>
                      <td style="width: 393px;" colspan="2" height="40"><strong>a.Sasaran Kinerja Pegawai (SKP)</strong></td>
                      <td style="text-align: center; width: 64px;" ><?php $jumlah = $total/$counter;
                        echo round($jumlah,2); ?></td>
                        <td style="text-align: center; width: 83px;" height="40">60%</td>
                        <td style="width: 87px;text-align: center;" ><?php echo $j= $jumlah*60/100 ; ?></td>
                      </tr>
                      <tr>
                        <td style="width: 33px;" rowspan="9" height="280">&nbsp;</td>
                        <td style="width: 221px;" rowspan="9" height="280"><strong>b. Perilaku Kerja </strong></td>
                        <td style="width: 172px;" height="30">1. Orientasi Pelayanan</td>
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
                          <td style="width: 172px;" height="30">2. Integritas</td>
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
                            <td style="width: 172px;" height="30">3. Komitmen</td>
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
                              <td style="width: 172px;" height="30">4. Disiplin</td>
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
                                <td style="width: 172px;" height="30">5. Kerjasama</td>
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
                                  <td style="width: 172px;" height="30">6. Kepemimpinan</td>
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
                                    <td style="width: 172px;" height="30">7. Jumlah</td>
                                    <td style="width: 64px;text-align: center;"><?php echo $jml=$perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7]; ?></td>
                                    <td style="width: 83px;" height="16">&nbsp;</td>
                                    <td style="width: 87px;" height="16">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="width: 172px;" height="30">8. Nilai rata-rata</td>
                                    <td style="width: 64px;text-align: center;"><?php echo round(($jml=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/6),2); ?></td>
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
                                      <td style="width: 319px;" colspan="3"><strong>9. Nilai Perilaku Kerja <?php $jml=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/6;
                                        echo round($jml,2) ;  ?> x 40%</strong></td>
                                        <td style="width: 87px;" align="center" height="39"><?php 
                                          $jml2=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/6*40/100;
                                          echo round($jml2,2) ;  ?></td>
                                        </tr>
                                        <tr>
                                          <td style="text-align: center; width: 573px;" colspan="5" rowspan="2"><strong>NILAI PRESTASI KERJA</strong></td>
                                          <td style="width: 87px;" align="center" height="30"><strong><?php 
                                            $plus=$j+$jml2;
                                            echo  round($plus,2); ?></strong></td>
                                          </tr>
                                          <tr>
                                            <td style="width: 87px;" align="center" height="30"><strong><?php 
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
                                              <td colspan="6" height="400">

                                                <table border="0" width="500px">
                                                  <tbody>
                                                    <tr>
                                                      <td colspan="2" height="60">
                                                        <table border="0" width="500px">
                                                          <tbody>
                                                            <tr>
                                                              <td width="19" height="20"><strong>5.</strong></td>
                                                              <td width="315" height="20"><strong>KEBERATAN DARI PEGAWAI NEGERI </strong></td>
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
                                                      <td colspan="2" height="250">&nbsp;</td>
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

                <div class="col-md-6">
                  <table border="1" width="500px">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table border="0" width="500">
                                            <tbody>
                                              <tr>
                                                <td colspan="2" height="60">
                                                  <table border="0" width="350">
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
                                                <td colspan="2" height="300">&nbsp;</td>
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
                                        <td width="700">
                                          <table border="0" width="500">
                                            <tbody>
                                              <tr>
                                                <td colspan="2" height="60">
                                                  <table border="1" width="350">
                                                    <tbody>
                                                      <tr>
                                                        <td width="19" height="20"><strong>7.</strong></td>
                                                        <td width="315" height="20"><strong>KEPUTUSAN ATASAN PEJABAT </strong></td>
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
                                                <td colspan="2" height="310">&nbsp;</td>
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
                
              </div> -->
                
<!-- <pagebreak orientation=P /> -->
                                  
             


    </body>
</html>
<?php
// penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$stylesheet = file_get_contents('../assets/global/plugins/bootstrap/css/bootstrap.css');
$mpdf->WriteHTML($stylesheet,1);
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf-&gt;WriteHTML($html);
$mpdf->WriteHTML($html,2);
$mpdf->Output($modal_id.".pdf" ,'I');
exit;
?>