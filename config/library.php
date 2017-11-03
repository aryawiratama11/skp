<?php
function indonesian_date ($timestamp = '', $date_format = 'l, j F Y ') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} ";
    return $date;
} ?>
<?php
function  tgl_indo($tgl){
$tanggal  =  getTanggal(substr($tgl,8,2));
$bulan  =  getBulan(substr($tgl,5,2));
$tahun  =  substr($tgl,0,4);
return  $tanggal.' '.$bulan.' '.$tahun;
}
  
function  getBulan($bln){
switch  ($bln){
case  1:
return  "Januari";
break;
case  2:
return  "Februari";
break;
case  3:
return  "Maret";
break;
case  4:
return  "Maret";
break;
case  5:
return  "Mei";
break;
case  6:
return  "Juni";
break;
case  7:
return  "Juli";
break;
case  8:
return  "Agustus";
break;
case  9:
return  "September";
break;
case  10:
return  "Oktober";
break;
case  11:
return  "November";
break;
case  12:
return  "Desember";
break;
}
}
function  getTanggal($tglan){
switch  ($tglan){
case  01:return  "1";break; case  02:return  "2";break; case  03:return  "3";break;
case  04:return  "4";break; case  05:return  "5";break; case  06:return  "6";break;
case  07:return  "7";break; case  08:return  "8";break; case  09:return  "9";break;
case  10:return  "10";break; case  11:return  "11";break; case  12:return  "12";break;
case  13:return  "13";break; case  14:return  "14";break; case  15:return  "15";break; 
case  16:return  "16";break; case  17:return  "17";break; case  18:return  "18";break; 
case  19:return  "19";break; case  20:return  "20";break; case  21:return  "21";break; 
case  22:return  "22";break; case  23:return  "23";break; case  24:return  "24";break; 
case  25:return  "25";break; case  26:return  "26";break; case  27:return  "27";break; 
case  28:return  "28";break; case  29:return  "29";break; case  30:return  "30";break; 
case  31:return  "31";break; 
}
}
?>