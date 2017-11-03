<?php
$T_KUANTITAS=2;
$T_KUALITAS=100;
$T_WAKTU=12;
$T_BIAYA=0;
$R_KUANTITAS=2;
$R_KUALITAS=100;
$R_WAKTU=12;
$R_BIAYA=0;

if ($R_BIAYA>0 && $T_BIAYA>0) {
    $persenbiaya= 100-($R_BIAYA/$rrT_BIAYA*100);
    echo "persenbiaya = ".$persenbiaya;
    echo "<br>";
} else 
{
 $persenbiaya=0; 
 echo "persenbiaya = ".$persenbiaya;
    echo "<br>";
}


$persenwaktu= 100-($R_WAKTU/$T_WAKTU*100);
 echo "persenwaktu = ".$persenwaktu;
    echo "<br>";

$kuantitas= $R_KUANTITAS/$T_KUANTITAS*100;
 echo "kuantitas = ".$kuantitas;
    echo "<br>";
$kualitas= $R_KUALITAS/$T_KUALITAS*100;
 echo "kualitas = ".$kualitas;
    echo "<br>";
if ($persenwaktu < 25 ){
    $RW24 = ((1.76*$T_WAKTU-$R_WAKTU)/$T_WAKTU)*100 ;
    //=((1,76*G10-N10)/G10)*100
     echo "RW24 = ".$RW24;
    echo "<br>";
}
else
 {
    $RW24 = 76-((((1.76*($T_WAKTU-$R_WAKTU))/$T_WAKTU)*100)-100);
     echo "RW24else = ".$RW24;
    echo "<br>";
}
if ( $persenbiaya > 0 && $persenbiaya < 25 ){
    $RB24 = ((1.76*($T_BIAYA-$R_BIAYA))/$T_BIAYA)*100 ;

     echo "RB24 = ".$RB24;
    echo "<br>";
}
else {
        //$RB24 = 76-((((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100)-100);
    $RB24 = 0;
     echo "RB24else = ".$RB24;
    echo "<br>";
}
if ($RB24 == 0) {
    $perhitungan=$kuantitas+$kualitas+$RW24;
    echo $perhitungan;

}
else {
    $perhitungan=$kuantitas+$kualitas+$RW24+$RB24;
    echo $perhitungan;
}


?> 