<?php
include '../../config/koneksi.php';
@$id=$_GET['id'];
@$kode=$_GET['kd'];
@$nip=$_GET['nip'];
@$hal=$_GET['hal'];


if ($hal=='ajuan') {
	# code...

$modal2=mysqli_query($con,"DELETE FROM `detil_kegiatan` WHERE `detil_kegiatan`.`ID_KEG` = '$id' AND `detil_kegiatan`.`KODE_SKP` = '$kode'");
 echo "<script>
                        
                        window.location.href='../detail_rw_pengajuanskp.php?id=$kode'; 
                    </script>";

}
elseif ($hal=='struktur') {
	$modal2=mysqli_query($con,"Delete FROM rw_struktural WHERE id_riwayat_struktural='$modal_id'");
 echo "<script>
                        
                        window.location.href='../riwayat_jabatanstruktur.php'; 
                    </script>";
	
}

else {

	?>

       <script language="JavaScript">
      alert('ERROR , Telah Terjadi Kesalahan ');
      document.location='../index.php';
      </script>
<?php
}

?>