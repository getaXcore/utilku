<?php
function getDateOf($tglJthTemp,$tglTrx,$tenor){
    $splitTglTrx = substr($tglTrx,8,2);
    $splitMonthTrx = substr($tglTrx,5,2);
    $splitYearTrx = substr($tglTrx,0,4);

    if($splitTglTrx > $tglJthTemp){
        $splitMonthTrx = $splitMonthTrx+1;
        if(strlen($splitMonthTrx) == 1){
            $splitMonthTrx = '0'.$splitMonthTrx;
        }
    }else{
        $splitMonthTrx = $splitMonthTrx;
    }

    $live = $splitYearTrx.'-'.$splitMonthTrx.'-'.$tglJthTemp;
    $angsuranPertama = date('Ymd', strtotime('+1 month', strtotime($live)));
    $angsuranTerkahir = date('Ymd', strtotime('+'.($tenor-1).' month', strtotime($angsuranPertama)));

    $result = array(
        "TanggalJatuhTempo "=>$tglJthTemp,
        "TanggalTransaksi "=>$tglTrx,
        "Tenor"=>$tenor,
        "Live"=>$live,
        "AngsuranPertama"=>$angsuranPertama,
        "AngsuranTerakhir"=>$angsuranTerkahir
    );

    return $result;
}
?>
