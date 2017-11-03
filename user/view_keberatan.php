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
include '../config/library.php';
$login=mysqli_query($con," SELECT *
   FROM pegawai p , riwayat_jabatan rw
   WHERE p.userid=rw.userid AND rw.statusjabatan='1' and p.userid='".$_SESSION['userid']."' and p.password='".$_SESSION['password']."' ");
$id=$_GET['id'];
  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);
  $keb=mysqli_query($con," SELECT keberatan, tglkeberatan , tanggapankeberatan,tgltanggapankeberatan , keputusankeberatan , tglkeputusan
   FROM sasaran_kinerja_pegawai
   WHERE kode_skp='$id' ");
  $keberatan=mysqli_fetch_array($keb);

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
        <link href="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
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
                            <span class="active">Detail Keberatan Penilaian</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                   
                    <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Keberatan Penilaian</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                             <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Detail Keberatan Penilaian</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/insert_keberatan.php?id=<?php echo $_GET['id'] ?>" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                           
                                             
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Keberatan Yang Dinilai
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-10">
                                                <!-- <textarea rows="11%" cols="100%" required readonly="true"><?php //echo $keberatan['keberatan']; ?> </textarea> -->
                                                <div contenteditable="true" oncut="return false" onpaste="return false" onkeydown="if(event.metaKey) return true; return false;"><?php echo $keberatan['keberatan']; ?>
                                                </div>
                                                    <div class="form-control-focus"> </div>
                                                    
                                                </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Keberatan Yang Dinilai
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-10">
                                                
                                               <input type="text" class="form-control" readonly="true" name="nama" value="<?php echo indonesian_date($keberatan['tglkeberatan']); ?>">
                                                    <div class="form-control-focus"> </div>
                                                    
                                                </div>
                                             </div>
                                             
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Tanggapan Keberatan Penilai
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-10">
                                                
                                                <div contenteditable="true" oncut="return false" onpaste="return false" onkeydown="if(event.metaKey) return true; return false;"><?php echo $keberatan['tanggapankeberatan']; ?> </div>
                                                    <div class="form-control-focus"> </div>
                                                    
                                                </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Keberatan Yang Dinilai
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-10">
                                                
                                               <input type="text" class="form-control" readonly="true" name="nama" value="<?php echo indonesian_date($keberatan['tgltanggapankeberatan']); ?>">
                                                    <div class="form-control-focus"> </div>
                                                    
                                                </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Keputusan Keberatan Atasan Penilai
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-10">
                                                
                                                <div contenteditable="true"  oncut="return false" onpaste="return false" onkeydown="if(event.metaKey) return true; return false;"><?php echo $keberatan['keputusankeberatan']; ?> </div>
                                                    <div class="form-control-focus"> </div>
                                                    
                                                </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-2 control-label" for="form_control_1">Keberatan Yang Dinilai
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-10">
                                                
                                               <input type="text" class="form-control" readonly="true" name="nama" value="<?php echo indonesian_date($keberatan['tglkeputusan']); ?>">
                                                    <div class="form-control-focus"> </div>
                                                    
                                                </div>
                                             </div>
                                            
                                            
                                       
                                        </div>
                                        <!-- <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit"  class="btn green">Simpan</button>
                                                    <input type=reset class="btn blue" value=Kembali onclick=self.history.back()>
                                                </div>
                                            </div>
                                        </div> -->
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
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
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="./../assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script>
            $('.textarea').wysihtml5({
                "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false //Button to change color of font  
            });
        </script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
    </body>

</html>