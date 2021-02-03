<?php
include 'classes/Banco.php';
include 'config/defines.php';

$meses   = isset($_REQUEST['meses'])   ? $_REQUEST['meses']   : "";
$abelhas = isset($_REQUEST['abelhas']) ? $_REQUEST['abelhas'] : "";
$x       = 0;
$y       = 0;
$filtro  = "1=1";

if($meses !== ""){
    $meses = explode(",",$meses);
    foreach($meses as $m){
        if($x < 1){
            $filtro .= " AND (flw_meses like '%$m%')";
        }else{
            $filtro .= " OR (flw_meses like '%$m%')";
        }
        $x++;
    }
}

if($abelhas !== ""){
    foreach($abelhas as $a){
        if($y < 1){
            $filtro .= " AND (flw_abelhas like '%$a%')";
        }else{
            $filtro .= " OR (flw_abelhas like '%$a%')";
        }
        $y++;
    }
}

$db  = new Banco(BANCO);
$sql = "SELECT * FROM flores WHERE ".$filtro." ORDER BY flw_nome ASC";
$rs  = $db->query($sql);

echo json_encode($rs,JSON_UNESCAPED_UNICODE);
?>