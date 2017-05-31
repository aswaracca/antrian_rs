<?php if ( ! defined('BASEPATH')) exit('Tidak ada akses langsung script diperbolehkan');
 
if ( ! function_exists('getMonthNames')){
    function getMonthNames(){
        $namaBulan = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember');
        return $namaBulan;
    }
}
if( ! function_exists('getNameOfMonth')){ ///('getDayName / 
    function getNameOfMonth($bln){
        $namaBulan = getMonthNames();
        return $namaBulan[(int)$bln];
    }
}
if( ! function_exists('getg5LastYears')){    
    function get5LastYears(){
        $listTahun = array();
        $thnNow = intval(date('Y'));
        for($i=$thnNow-4; $i<=$thnNow; $i++){
            $listTahun[(string)$i] = (string)$i;
        }
        return $listTahun;
    }
}    
/*     End of file common_helper.php
    Location ./application/helpers/common_helper.php */