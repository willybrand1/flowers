<?php
include 'classes/Banco.php';
include 'config/defines.php';

$abl_nome      = isset($_REQUEST['abl_nome'])      ? $_REQUEST['abl_nome']      : "";
$abl_especie   = isset($_REQUEST['abl_especie'])   ? $_REQUEST['abl_especie']   : "";
$flw_nome      = isset($_REQUEST['flw_nome'])      ? $_REQUEST['flw_nome']      : "";
$flw_especie   = isset($_REQUEST['flw_especie'])   ? $_REQUEST['flw_especie']   : "";  
$flw_descricao = isset($_REQUEST['flw_descricao']) ? $_REQUEST['flw_descricao'] : "";
$txt_meses     = isset($_REQUEST['meses'])         ? $_REQUEST['meses']         : ""; 
$txt_abelhas   = isset($_REQUEST['slcAbelha'])     ? $_REQUEST['slcAbelha']     : "";
$file          = isset($_REQUEST['file'])          ? $_REQUEST['file']          : ""; 
$op            = isset($_REQUEST['op'])            ? $_REQUEST['op']            : ""; 
var_dump($_FILES);die;
$exp = explode("/",$op);

if($exp[0] == "flor"){
    foreach($_FILES['fileUpload']['tmp_name'] as $key => $value){
        $targetPath = "config/img/".basename($_FILES['fileUpload']['name'][$key]);
        move_uploaded_file($value,$targetPath);
    }

    $db = new Banco(BANCO);
    
    if($exp[1] == 0){
        $sql = "INSERT INTO public.flores(flw_nome,flw_especie,flw_descricao,flw_meses,flw_abelhas,flw_imagem) 
        VALUES('$flw_nome','$flw_especie','$flw_descricao','$txt_meses','$txt_abelhas','$file');";
        $rs  = $db->query($sql);
        
        if($rs){
            $arr = ["cod" => 1,"msg" => "Inserido com sucesso !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr = ["cod" => 0,"msg" => "Erro ao inserir registro !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }else{
        $sql = "UPDATE public.flores SET flw_nome = '$flw_nome', flw_especie = '$flw_especie', 
        flw_descricao = '$flw_descricao', flw_meses = '$txt_meses', flw_abelhas = '$txt_abelhas', 
        flw_imagem = '$file' WHERE id_mes = ".$exp[3];
        $rs  = $db->query($sql);
        
        if($rs){
            $arr = ["cod" => 1,"msg" => "Inserido com sucesso !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr = ["cod" => 0,"msg" => "Erro ao inserir registro !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    $db->close();
}else if($exp[0] == "abelha"){
    $db = new Banco(BANCO);

    if($exp[1] == 0){
        $sql = "INSERT INTO public.abelhas(abl_nome,abl_especie) 
        VALUES('$abl_nome','$abl_especie');";
        $rs  = $db->query($sql);
        
        if($rs){
            $arr = ["cod" => 1,"msg" => "Inserido com sucesso !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr = ["cod" => 0,"msg" => "Erro ao inserir registro !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }else{
        $sql = "UPDATE public.abelhas SET abl_nome = '$abl_nome', abl_especie = '$abl_especie' WHERE id_abelha = ".$exp[3];
        $rs  = $db->query($sql);
        
        if($rs){
            $arr = ["cod" => 1,"msg" => "Inserido com sucesso !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr = ["cod" => 0,"msg" => "Erro ao inserir registro !"];
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    $db->close();
}
