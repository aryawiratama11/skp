<?php
include '../config/koneksi.php';
$subunsur = $_GET['subunsur'];
$kec = mysqli_query($con,"SELECT id_keg,butir_kegiatan FROM kegiatan WHERE id_subunsur='$subunsur' ");
echo "<option>-- Pilih Butir kegiatan --</option>";
while($k = mysqli_fetch_array($kec)){
    echo "<option value=\"".$k['id_keg']."\">".nl2br($k['butir_kegiatan'])."</option>\n";
}
?>