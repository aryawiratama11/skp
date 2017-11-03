<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
// $nama_dokumen='PDF'; //Beri nama file PDF hasil.
// define('_MPDF_PATH','../config/mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
// include(_MPDF_PATH . "mpdf.php"); // Tentukan folder dimana anda menyimpan folder mpdf
// //include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
// //$mpdf=new mPDF('utf-8', 'A4', 12, 'arial'); // Membuat file mpdf baru
// $mpdf=new mPDF('utf-8', "A4", 12 ,'Arial', 5, 5, 20, 5, 5, 4); // Membuat file mpdf baru


// //Memulai proses untuk menyimpan variabel php dan html
// ob_start();
require"../config/koneksi.php";
$modal_id=$_GET['id'];
$skp=mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM sasaran_kinerja_pegawai WHERE KODE_SKP='$modal_id' "));

?>
<DOCTYPE html>
<html>
        <head>
                <title>PHPBeGO :: Simple KRS with mPDF</title>
                <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        </head>
        <body>
 <!--  <pagebreak orientation=L /> -->
<h2 style="text-align: center;">SASARAN KINERJA PEGAWAI</h2>
<h2 style="text-align: center;">PEGAWAI NEGERI SIPIL</h2>
<table border="1" width="1000" align="center">
<tbody>
<tr>
<td align="center" width="37">No.</td>
<td colspan="2" align="center">I. PEJABAT PENILAI</td>
<td align="center" width="24">No.</td>
<td colspan="4" align="center">II. PNS YANG DINILAI</td>
</tr>
<tr>
<td align="center">1.</td>
<td width="40">Nama</td>
<td width="150">&nbsp;</td>
<td align="center">1.</td>
<td colspan="2">Nama</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="center">2.</td>
<td>NIP</td>
<td>&nbsp;</td>
<td align="center">2.</td>
<td colspan="2">NIP</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="center">3.</td>
<td>Pangkat/Gol.Ruang</td>
<td>&nbsp;</td>
<td align="center">3.</td>
<td colspan="2">Pangkat/Gol.Ruang</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="center">4.</td>
<td>Jabatan</td>
<td>&nbsp;</td>
<td align="center">4.</td>
<td colspan="2">Jabatan</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="center">5.</td>
<td>Unit Kerja</td>
<td>SMP Negeri 2 Rejoso</td>
<td align="center">5.</td>
<td colspan="2">Unit Kerja</td>
<td colspan="2">SMP Negeri 2 Rejoso</td>
</tr>
<tr>
<td rowspan="2" align="center">No.</td>
<td colspan="2" rowspan="2" align="center">III. KEGIATAN TUGAS JABATAN</td>
<td rowspan="2" align="center">AK</td>
<td colspan="4" align="center">TARGET</td>
</tr>
<tr>
<td align="center" width="80">KUANTITAS/ OUTPUT</td>
<td align="center" width="80">KUALITAS / MUTU</td>
<td align="center" width="80">WAKTU</td>
<td align="center" width="80">BIAYA (Rp)</td>
</tr>
<?php

 $sql = mysqli_query($con,"
SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG , k.angka_kredit
FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk
WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' "); //statuspeg apa ?
$no = 1;
$counter = 0;
$total=0;
while ($rr = mysqli_fetch_array($sql)) { ?>
<tr>
<td align="center" height="20"><?php echo $no; ?></td>
<td colspan="2" width="250"><?php echo $rr[2] ;?></td>
<td align="center"><?php echo $rr[14] ;?></td>
<td align="center"><?php echo $rr[3] ;?></td>
<td align="center"><?php echo $rr[4] ;?></td>
<td align="center"><?php echo $rr[5] ;?> bulan</td>
<td align="center"<?php echo $rr[6] ;?></td>
</tr>
<?php
$no++;
} ?>
</tbody>
</table>
<p><br /> </p>
<table border="0" width="700" align="center">
<tbody>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290">&nbsp;</td>
<td align="center" width="200">Nganjuk, <!--?php echo $tanggalan?--></td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">Pejabat Penilai,</td>
<td align="center" width="290">&nbsp;</td>
<td align="center" width="200">PNS yang dinilai,</td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290" height="50">&nbsp;</td>
<td align="center" width="200" height="50">&nbsp;</td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
</tr>
<tr>
<td align="center" width="10" height="2">&nbsp;</td>
<td align="center" width="200" height="2"><hr /></td>
<td align="center" width="290" height="2">&nbsp;</td>
<td align="center" width="200" height="2"><hr /></td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">NIP. <!--?php echo $hasil1[0]?--></td>
<td align="center" width="290">&nbsp;</td>
<td align="center" width="200">NIP. <!--?php echo $peg[0]?--></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

<pagebreak orientation=L />
<p style="text-align: center;"><strong>PENILAIAN CAPAIAN SASARAN KINERJA&nbsp;</strong></p>
<p style="text-align: center;"><strong>PEGAWAI NEGERI SIPIL</strong></p>
<p>Jangka waktu penilaian 2 januari s.d 31 Desember 2014</p>
<table border="1">
<tbody>
<tr>
<td rowspan="2"> <p>NO</p> </td>
<td rowspan="2"> <p>I. Kegiatan Tugas Jabatan</p> </td>
<td rowspan="2"> <p>AK</p> </td>
<td colspan="7"> <p>TARGET</p> </td>
<td rowspan="2"> <p>AK</p> </td>
<td colspan="9"> <p>REALISASI</p> </td>
<td colspan="3" rowspan="2"> <p>PENGHITUNGAN</p> </td>
<td colspan="2"> <p>NILAI CAPAIAN SKP</p> </td>
</tr>
<tr>
<td> <p>Kuantitas/Output</p> </td>
<td colspan="3"> <p>Kualitas/Mutu</p> </td>
<td> <p>Waktu</p> </td>
<td colspan="2"> <p>Biaya</p> </td>
<td colspan="3"> <p>Kuantitas/Output</p> </td>
<td colspan="3"> <p>Kualitas/Mutu</p> </td>
<td> <p>Waktu</p> </td>
<td colspan="2"> <p>Biaya</p> </td>
<td colspan="2"> APA YA</td>
</tr>
<tr>
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
<tr>
<td colspan="25"> <p>UNSUR UTAMA</p> </td>
</tr>
</tbody>
<tbody>
<tr>
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
<tr>
<td> <p>2</p> </td>
<td> <p>2</p> </td>
<td> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="2"> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="2"> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td colspan="2"> <p>2</p> </td>
</tr>
<tr>
<td colspan="25"> <p>UNSUR PENUNJANG</p> </td>
</tr>
<tr>
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
<td colspan="2"> <p>12</p></td>
<td colspan="3"> <p>13</p> </td>
<td colspan="2"> <p>14</p>
</td>
</tr>
<tr>
<td> <p>12</p> </td>
<td> <p>2</p> </td>
<td> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="2"> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td> <p>2</p> </td>
<td colspan="2"> <p>2</p> </td>
<td colspan="3"> <p>2</p> </td>
<td colspan="2"> <p>2</p> </td>
</tr>
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
<td colspan="23" rowspan="2">&nbsp;</td>
<td colspan="2">83</td>
</tr>
<tr>
<td colspan="2">BAIK</td>
</tr>
</tbody>
</table >
<table style="text-align: center;" >
<tbody>
<tr style="height: 13px;">
<td style="height: 26px; width: 1100px;" colspan="23" rowspan="25">&nbsp;</td>
<td style=" width: 75px;">tgl</td>
<td style=" width: 21px;" colspan="2" rowspan="5">&nbsp;</td>
</tr>
<tr >
<td style=" width: 105px;">pejabat penilai</td>
</tr>
<tr style="height: 13px;">
<td style="height: 26px; width: 75px;">&nbsp;</td>
</tr>
<tr style="height: 13px;">
<td style="height: 26px; width: 75px;"><span style="text-decoration: underline;"><strong>sutrisno</strong></span></td>
</tr>
<tr style="height: 13px;">
<td style="height: 26px; width: 75px;">nip</td>
</tr>
</tbody>
</table>
    <pagebreak orientation=P />

<table border="0" width="700" align="left">
<tbody>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290"><img src="pancasila.png" alt="" /></td>
<td align="center" width="200">&nbsp;</td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290">
<h4>PENILAIAN PRESTASI KERJA</h4>
</td>
<td align="center" width="200">&nbsp;</td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290">
<h4>PEGAWAI NEGERI SIPIL</h4>
</td>
<td align="center" width="200">&nbsp;</td>
</tr>
<tr>
<td align="center" width="10">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
<td align="center" width="290">&nbsp;</td>
<td align="center" width="200">&nbsp;</td>
</tr>
</tbody>
</table>
<table border="0" width="700" align="left">
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
<td align="left">Bulan, Januari s/d 31 Desember</td>
</tr>
</tbody>
</table>
<table border="1" width="700" align="left">
<tbody>
<tr>
<td align="right" height="30"><strong>1</strong>.</td>
<td colspan="2" height="30"><strong>YANG DINILAI </strong></td>
</tr>
<tr>
<td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
<td width="340" height="20">a.N a m a</td>
<td width="340" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">b.N I P</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">c.Pangkat, Golongan ruang, TMT</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">d.Jabatan/Pekerjaan</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">e.Unit Organisasi</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td align="right" height="30"><strong>2</strong>.</td>
<td colspan="2" height="30"><strong>PEJABAT PENILAI</strong></td>
</tr>
<tr>
<td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
<td width="340" height="20">a.N a m a</td>
<td width="340" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">b.N I P</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">c.Pangkat, Golongan ruang, TMT</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">d.Jabatan/Pekerjaan</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">e.Unit Organisasi</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td align="right" height="30"><strong>3</strong>.</td>
<td colspan="2" height="30"><strong>ATASAN PEJABAT PENILAI</strong></td>
</tr>
<tr>
<td style="width: 40px; height: 100px;" rowspan="5">&nbsp;</td>
<td width="340" height="20">a.&nbsp;N a m a</td>
<td width="340" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">b.N I P</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">c.Pangkat, Golongan ruang, TMT</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">d.Jabatan/Pekerjaan</td>
<td width="300" height="20">&nbsp;</td>
</tr>
<tr>
<td width="300" height="20">e.Unit Organisasi</td>
<td width="300" height="20">&nbsp;</td>
</tr>
</tbody>
</table>

<pagebreak orientation=P />
<table border="1" width="700">
<tbody>
<tr>
<td width="29"><strong>4.</strong></td>
<td colspan="4" height="41"><strong>UNSUR YANG DINILAI </strong></td>
<td width="95" height="41">
<div align="center"><strong>Jumlah</strong></div>
</td>
</tr>
<tr>
<td height="40">&nbsp;</td>
<td colspan="2" height="40"><strong>a.Sasaran Kinerja Pegawai (SKP)</strong></td>
<td style="text-align: center;" height="40">89.9</td>
<td style="text-align: center;" height="40">60%</td>
<td align="center" width="95" height="40">'.$peg.'</td>
</tr>
<tr>
<td rowspan="9" width="159" height="280">&nbsp;</td>
<td rowspan="9" width="159" height="280"><strong>b. Perilaku Kerja </strong></td>
<td width="200" height="30">1. Orientasi Pelayanan</td>
<td align="center">'.$peg.'</td>
<td align="center" width="95" height="31">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">2. Integritas</td>
<td align="center">'.$peg.'</td>
<td align="center" width="95" height="31">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">3. Komitmen</td>
<td align="center">'.$peg.'</td>
<td align="center" width="95" height="31">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">4. Disiplin</td>
<td align="center">&nbsp;</td>
<td align="center" width="95" height="31">&nbsp;</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">5. Kerjasama</td>
<td align="center">'.$peg.'</td>
<td align="center" width="95" height="31">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">6. Kepemimpinan</td>
<td align="center" width="70">'.$peg.'</td>
<td align="center" width="95" height="31">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">7. Jumlah</td>
<td align="center" width="70">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td height="30">8. Nilai rata-rata</td>
<td align="center" width="70">'.$peg.'</td>
<td align="center">'.$peg.'</td>
<td width="95" height="16">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><strong>9. Nilai Perilaku Kerja 82 x 40%</strong></td>
<td align="center" width="95" height="39">'.$peg.'</td>
</tr>
<tr>
<td style="text-align: center;" colspan="5" rowspan="2"><strong>NILAI PRESTASI KERJA</strong></td>
<td align="center" width="95" height="30"><strong>'.$peg.'</strong></td>
</tr>
<tr>
<td align="center" height="30"><strong>('.$peg.')</strong></td>
</tr>
</tbody>
</table>
<table border="1" width="700">
<tbody>
<tr>
<td colspan="6" height="400">

<table border="0" width="700">
<tbody>
<tr>
<td colspan="2" height="60">
<table border="0" width="600">
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
<pagebreak orientation=P />
<table border="1" width="700">
<tbody>
<tr>
<td>
<table border="0" width="600">
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
<table border="0" width="600">
<tbody>
<tr>
<td colspan="2" height="60">
<table border="0" width="350">
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
<td colspan="2" height="470">&nbsp;</td>
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
<p align="center"><!-- <table width="700" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table> --></p>
<table border="1" width="700">
<tbody>
<tr>
<td>
<table border="0" width="600">
<tbody>
<tr>
<td colspan="2" height="60">
<table border="0" width="350">
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
<td colspan="2" height="150">&nbsp;</td>
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
<td width="700">
<table border="0" width="600">
<tbody>
<tr>
<td height="200">
<table border="0" width="500">
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
<div align="center"><strong>'.$peg.'</strong></div>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td height="5">&nbsp;</td>
<td height="5"><hr size="2" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td height="20">
<div align="center">'.$peg.'</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td height="10">&nbsp;</td>
</tr>
<tr>
<td height="100">
<table border="0" width="366">
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
<div align="center"><strong>'.$peg.'</strong></div>
</td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5"><hr size="2" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td height="20">
<div align="center">'.$peg.'</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td height="100">
<table border="0" width="500">
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
<div align="center"><strong>NAMA</strong></div>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td height="5">&nbsp;</td>
<td height="5"><hr size="2" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td height="20">
<div align="center">NIP</div>
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
</body>
</html>
<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf

// $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
// ob_end_clean();
// //Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf-&gt;WriteHTML($html);
// $mpdf->WriteHTML(utf8_encode($html));
// $mpdf->Output($nama_dokumen.".pdf" ,'I');
// exit;
?>
