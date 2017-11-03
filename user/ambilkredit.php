<?php
include '../config/koneksi.php';
$butir = $_GET['butir'];
$sat = mysqli_query($con,"SELECT id_keg,angka_kredit FROM kegiatan WHERE id_keg='$butir' ");
while($k = mysqli_fetch_array($sat)){
    echo "<option value=\"".$k['id_keg']."\">".$k['angka_kredit']."</option>\n";
}
?>