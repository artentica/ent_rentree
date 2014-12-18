<?php
function upload_file(){


    $ds          = DIRECTORY_SEPARATOR;

    $storeFolder = '..'. $ds .'pdf';

    if (!empty($_FILES)) {

        $pass ='';
        $name ='';
        if(strstr($_FILES['file']['name'], "-_-")){
            list($pass, $name) = split('-_-', $_FILES['file']['name']);
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds . $pass . $ds;
            $targetFile =  $targetPath. $name;
        }
        else{
            $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
            $targetFile =  $targetPath. $_FILES['file']['name'];
        }
        $tempFile = $_FILES['file']['tmp_name'];

        move_uploaded_file($tempFile,$targetFile);

        if($pass!='') $targetFile = $pass .'/' . $name;
        else  $targetFile = $_FILES['file']['name'];

        $sql='INSERT INTO `document`( `rang`, `promo`, `libelle`, `fichier`) VALUES ("-1","no_promo","Pas_de_libelle","'.$targetFile.'" )';

        DbOperation($sql);


    }
}
?>
