<?php
session_start();
	include "koneksi.php";
	$username= mysqli_real_escape_string($con,stripslashes(strip_tags(htmlspecialchars($_POST['username'],ENT_QUOTES))));
	$password	 = mysqli_real_escape_string($con,stripslashes(strip_tags(htmlspecialchars(md5($_POST['password']),ENT_QUOTES))));
	//$password=md5($pass);
	
	$login=mysqli_query($con," SELECT p.nip,p.password,rw.id_jabatan,p.userid
   FROM pegawai p , riwayat_jabatan rw
   WHERE p.userid=rw.userid and rw.statusjabatan='1' and p.nip='$username' and p.password='$password' ");
  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);
		if (empty($ketemu))
		{
		?>
			<script>
	alert('username dan password salah');
	window.location.href='../index.php';
</script>
<?php
		
		}
		else
		{
      $_SESSION['nip']    = $r['nip']; 
      $_SESSION['userid']    = $r['userid']; 
      $_SESSION['password']     = $r['password'];
      $_SESSION['jabatan']        = $r['id_jabatan'];
     
        if($r['nip']>0){
            echo "<script>
                        
                        window.location.href='../user/'; 
                    </script>";
        }
        
        else  {
          echo $_SESSION['userid']."-".$_SESSION['password']."-".$_SESSION['jabatan'];
          ?>

     <!--  <script>
  alert('error   ');
  window.location.href='../index.php';
</script> -->
<?php
        }
             

   
    }
			
		
?>