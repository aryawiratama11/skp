<?php
include '../config/koneksi.php';
$butir = $_GET['butir'];
$sat = mysqli_query($con,"SELECT id_keg,satuan_hasil FROM kegiatan WHERE id_keg='$butir' ");
while($k = mysqli_fetch_array($sat)){
    echo "<option value=\"".$k['id_keg']."\">".$k['satuan_hasil']."</option>\n";
}
?>