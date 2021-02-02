<?php
foreach($_FILES['fileUpload']['tmp_name'] as $key => $value){
    $targetPath = "config/img/".basename($_FILES['fileUpload']['name'][$key]);
    
    if(move_uploaded_file($value,$targetPath)){
        $response["cod"] = 1;
        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }else{
        $response["cod"] = 0;
        echo json_encode($response,JSON_UNESCAPED_UNICODE);
    }
}
