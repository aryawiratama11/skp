<?php
session_start();

if (empty($_SESSION['userid']) AND empty($_SESSION['password']) AND empty($_SESSION['jabatan'])){
 echo '<script>
    alert(\'LOGIN DULU\');
    window.location="../index.php";
    </script> ';
} 
else
{


include '../config/koneksi.php';
$login=mysqli_query($con," SELECT *
   FROM pegawai p , riwayat_jabatan rw
   WHERE p.userid=rw.userid AND rw.statusjabatan='1' and p.userid='".$_SESSION['userid']."' and p.password='".$_SESSION['password']."' ");

  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);

if ($ketemu==0){
    echo '<script>
    alert(\'LOGIN DULU\');
    window.location="../index.php";
    </script> '; 
} 


    else { 
    ?>

<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> Sasaran Kinerja Pegawai </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for buttons extension demos" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
       <?php include"header.php"; ?>
        <?php }} ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php include"sider.php"; ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <!--  -->
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.php">Hom</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        
                        <li>
                            <span class="active">Laporan</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                   
                    <div class="row">
                    <div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                
                                <div class="portlet-body">
                                    <h4>Tahun</h4>
                                    <form class="form-inline margin-bottom-40" role="form" method="POST">
                                      <div class="form-body">
                                        <div class="form-group form-md-line-input">
                                                
                                                   
                                              
                                                        <?php
                                                          echo "<select class=\"form-control\" name=\"tahun\" id=\"tahun\" required>";
                                                                
                                                              $pkt3=mysqli_query($con,"select DISTINCT(JANGKAWAKTU_PENILAIAN) from sasaran_kinerja_pegawai ");
                                                                  echo "<option value=\"\">   --Pilih Salah Satu --   </option>";

                                                                  while ($pk3=mysqli_fetch_array($pkt3))
                                                                  {
                                                                  echo "<option value=\"".$pk3[0]."\">".$pk3[0]."</option>";
                                                                  }
                                                                  
                                                          echo "</select>";
                                                       ?>
                                                     
                                             </div>
                                       </div> 
                                       <br>                                      
                                        
                                       <button type="submit"  class="btn green">Pilih Tahun</button>
                                    </form>
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Laporan SKP PERIODE <?php if (@$_POST['tahun']){
                                            echo $_POST['tahun'];
                                            } else {echo date('Y'); }  ?></span>
                                    </div>
                                                                    </div>
                                <div class="portlet-body">
                                   
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-globe"></i> Laporan </div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                                    <tr>

                                                                        <th> NIP </th>
                                                                        <th> Nama Pegawai </th>
                                                                         <?php if ($_SESSION['jabatan']=='J00') { ?>
                                                                        <th> Nama Atasan Pejabat Penilai</th>
                                                                        <?php } else { ?>
                                                                        <th> Nama Pejabat Penilai</th>
                                                                         <?php }  ?>
                                                                        <th> Periode </th>
                                                                        <th> Nilai Prestasi </th>
                                                                       

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <!-- data kne-->

                                                                 <?php
                                                                 if (@$_POST['tahun']){
                                                                    $th=$_POST['tahun'];
                                                                    } else { $th=date('Y'); } 
                                                                if ($_SESSION['jabatan']=='J03'){
                                                                $sql = mysqli_query($con," SELECT skp.`USERID` , skp.`PEG_USERID` ,skp.`PEG2_USERID` , skp.`JANGKAWAKTU_PENILAIAN` , skp.`STATUS_AJUAN` , skp.`KODE_SKP`, p1.NAMA_PEGAWAI ,p1.nip,skp.STATUSNILAI
                                                                        FROM sasaran_kinerja_pegawai skp , pegawai p1 
                                                                        WHERE skp.`USERID`=p1.`USERID` and skp.STATUSNILAI = '6' and skp.`STATUS_AJUAN`='4' and skp.JANGKAWAKTU_PENILAIAN='$th' "); //statuspeg apa ?
                                                                } elseif ($_SESSION['jabatan']=='J00') {
                                                                    # code...
                                                                     $sql = mysqli_query($con," SELECT skp.`USERID` , skp.`PEG_USERID` ,skp.`PEG2_USERID` , skp.`JANGKAWAKTU_PENILAIAN` , skp.`STATUS_AJUAN` , skp.`KODE_SKP`, p1.NAMA_PEGAWAI ,p1.nip,skp.STATUSNILAI
                                                                        FROM sasaran_kinerja_pegawai skp , pegawai p1 
                                                                        WHERE skp.`USERID`=p1.`USERID` and skp.STATUSNILAI = '6' and skp.peg_userid='".$_SESSION['userid']."' and skp.`STATUS_AJUAN`='4' and skp.JANGKAWAKTU_PENILAIAN='$th' ");
                                                                } elseif ($_SESSION['jabatan']=='J09') {
                                                                    # code...
                                                                     $sql = mysqli_query($con," SELECT skp.`USERID` , skp.`PEG_USERID` ,skp.`PEG2_USERID` , skp.`JANGKAWAKTU_PENILAIAN` , skp.`STATUS_AJUAN` , skp.`KODE_SKP`, p1.NAMA_PEGAWAI ,p1.nip,skp.STATUSNILAI
                                                                        FROM sasaran_kinerja_pegawai skp , pegawai p1 
                                                                        WHERE skp.`USERID`=p1.`USERID` and skp.STATUSNILAI = '6' and skp.peg2_userid='".$_SESSION['userid']."' and skp.`STATUS_AJUAN`='4' and skp.JANGKAWAKTU_PENILAIAN='$th' ");
                                                                }
                                                                else {
                                                                    $sql = mysqli_query($con," SELECT skp.`USERID` , skp.`PEG_USERID` ,skp.`PEG2_USERID` , skp.`JANGKAWAKTU_PENILAIAN` , skp.`STATUS_AJUAN` , skp.`KODE_SKP`, p1.NAMA_PEGAWAI ,p1.nip,skp.STATUSNILAI
                                                                        FROM sasaran_kinerja_pegawai skp , pegawai p1 
                                                                        WHERE skp.`USERID`=p1.`USERID` and skp.STATUSNILAI = '6' and skp.userid='".$_SESSION['userid']."' and skp.`STATUS_AJUAN`='4' and skp.JANGKAWAKTU_PENILAIAN='$th' ");
                                                                }
                                                                 
                                                                 $no = 1;
                                                                 while ($rr1 = mysqli_fetch_array($sql)) {
                                                                    $id = $rr1[0];
                                                                    ?>

                                                                    <tr align='left'>

                                                                     
                                                                        <td><a href="profil.php?id=<?php echo $rr['userid']; ?>"><span class="fa fa-user"></span> <?php echo  $rr1['nip']; ?></a></td>
                                                                        <td><?php echo  $rr1['NAMA_PEGAWAI']; ?></td>

                                                                      <?php if ($_SESSION['jabatan']=='J00') { ?>

                                                                       <td>
                                                                       <?php 
                                                                        $k3=mysqli_query($con," select * from pegawai where userid='$rr1[2]' ");
                                                                        $kt3=mysqli_fetch_array($k3);
                                                                        ?> <a href="profil.php?id=<?php echo $kt3[14]; ?>"><span class="fa fa-user"></span> <?php echo  $kt3[2]; ?></a>
                                                                        
                                                                        </td> 
                                                                        <?php } else { ?>
                                                                         <td>
                                                                       <?php 
                                                                        $k3=mysqli_query($con," select * from pegawai where userid='$rr1[1]' ");
                                                                        $kt3=mysqli_fetch_array($k3);
                                                                        ?> <a href="profil.php?id=<?php echo $kt3[14]; ?>"><span class="fa fa-user"></span> <?php echo  $kt3[2]; ?></a>
                                                                        
                                                                        </td>
                                                                        <?php } ?>

                                                                        <td><?php echo  $rr1['JANGKAWAKTU_PENILAIAN']; ?></td>
                                                                                                                                           
                                                                       
                                                                        <td> <?php

                                                                        $sql1 = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG
           FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
           WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$rr1[5]' "); //statuspeg apa ?
           //$no = 1;
           $perilaku=mysqli_fetch_array(mysqli_query($con,"select * from penilaian_perilaku_pegawai where KODE_SKP='$rr1[5]' "));
           $counter = 0;
           $total=0; 
           while ($rr = mysqli_fetch_array($sql1)) {
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
                                                                      $jml2=($perilaku[2]+$perilaku[3]+$perilaku[4]+$perilaku[5]+$perilaku[6]+$perilaku[7])/6*40/100;
                                                                      $jumlah = $total/$counter;
                                                                      $j= $jumlah*60/100 ;
                                                                      $plus=$j+$jml2;
                                                                        echo round($plus,2);
                                                                        
                                                                        if($plus<=100 && $plus>90){echo "(Sangat Baik)";}
  elseif($plus<91 && $plus>75  ){echo "(Baik)";}
    elseif($plus<76 && $plus>60 ){echo "(Cukup)";}
      elseif($plus<61 && $plus>50 ){echo "(Kurang)";}
        elseif($plus<51 && $plus>0 ){echo "(Buruk)";}
                                                                        ?>



                                                                         </td>
                                                                        

                                                                        
                                                                    
                                                                </tr>
                                                                <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
                       
            <!-- END QUICK SIDEBAR -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php include"footer.php";?>
        <!-- END FOOTER -->
        <!-- BEGIN QUICK NAV -->
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
       <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <script src="../assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL SCRIPTS -->
         <script>
            jQuery(document).ready(function($){
                $('.delete-link').on('click',function(){
                    var getLink = $(this).attr('href');
                    swal({
                            title: 'Peringatan',
                            text: 'Hapus Data?',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                            },function(){
                            window.location.href = getLink
                        });
                    return false;
                });
            });
        </script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
            
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
    </body>

</html>