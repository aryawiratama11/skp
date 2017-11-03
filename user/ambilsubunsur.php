<?php
include '../config/koneksi.php';
$unsur = $_GET['unsur'];
$kota = mysqli_query($con,"SELECT id_subunsur,nama_subunsur FROM sub_unsur WHERE id_unsur='$unsur' ");
echo "<option>-- Pilih Subunsur --</option>";
while($k = mysqli_fetch_array($kota)){
    echo "<option value=\"".$k['id_subunsur']."\">".nl2br($k['nama_subunsur'])."</option>\n";
}
?>
