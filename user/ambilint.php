<?php
include '../config/koneksi.php';
$nip = $_GET['nip'];
$skr=date('Y');
$sbm=$skr-1;
$sat = mysqli_query($con,"SELECT p.`INTEGRITAS`
FROM sasaran_kinerja_pegawai skp ,penilaian_perilaku_pegawai p
WHERE skp.`KODE_SKP`=p.`KODE_SKP` AND skp.`USERID`='$nip' AND skp.`JANGKAWAKTU_PENILAIAN`='$sbm' ");
while($k = mysqli_fetch_array($sat)){
    echo "<option value=\"".$k['INTEGRITAS']."\">".$k['INTEGRITAS']."</option>\n";
}
?>