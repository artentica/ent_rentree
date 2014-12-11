<?php
function generate_zip(){
    $promo = params('promo');
    $zip = new ZipArchive();
    $generic = DbOperation("SELECT * FROM document");
    $name_file = 'zip/' . $_SESSION['studentname'] . '_' .  $_SESSION['studentfirstname'] . '.zip';
    if(file_exists($name_file)) unlink($name_file);

    if(($zip->open($name_file, ZipArchive::CREATE))!==TRUE){
        echo "La création du fichier n'a pas aboutie";
    }
    else {
        foreach ($generic as $key => $value) {
            if($value['promo']=='') $zip->addFile('pdf/' . $value['fichier'],$value['fichier']);
        }
       if($promo!='') foreach ($generic as $key => $value) {
            if($value['promo']==$promo){
                $token = explode("/", $value['fichier']);
                $name = $token[1];
                $zip->addFile('pdf/' . $value['fichier'],$name);
            }
        }
    }

    $zip->close($zip);

    send_archive($name_file);
}

function send_archive($name){
    if (file_exists($name)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: binary");
        header('Content-Disposition: attachment; filename='.basename($name));
        header('Expires: 0');
        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Content-Length: ' . filesize($name));
        readfile($name);
        exit;
    }
}



function generate_zip_select(){
    $list = params('list');
    $list =  str_replace("-_-", "/", $list);
    $token = explode("*!*", $list);
    $zip = new ZipArchive();
    $name_file = 'zip/' . $_SESSION['studentname'] . '_' .  $_SESSION['studentfirstname'] . '.zip';
    if(file_exists($name_file)) unlink($name_file);
    if(($zip->open($name_file , ZipArchive::CREATE))!==TRUE){
        echo "La création du fichier n'a pas aboutie";
    }
    else {
        foreach ($token as $value) {
            if(strstr($value, '/')!=false){
                $token = explode("/", $value);
                $name = $token[1];
                $zip->addFile('pdf/' . $value,$name);
            }
            else $zip->addFile('pdf/' . $value,$value);
        }
    }

    $zip->close();

    send_archive($name_file);
}
?>
