<?php
  
include '../config/koneksi.php';
session_start();
  
  if($_POST) 
  {
	$name     = strip_tags($_POST['name']);
	$password = md5($name);
  	$login=mysqli_query($con,"select * from pegawai where password='$password' and userid='".$_SESSION['userid']."' ");
  	$ketemu=mysqli_num_rows($login);	  
	  if($ketemu>0)
	  {
		  echo "<span style='color:green;'>password benar</span>";
	  }
	  else
	  {
		  echo "<span style='color:red;'>Sorry password salah !!!</span>";
	  }
  }
?>