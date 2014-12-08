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

    $zip->close();


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

}
?>
