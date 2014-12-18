<?php

    function rank_file(){



    $sql ='';
   foreach(json_decode($_POST['list'],true) as $key => $value){
        $sql .= 'UPDATE `document` SET `rang`="';

        $sql .= $value['rank'];

        $sql .= '" WHERE `fichier`="' . $value['name'].'"';

        $sql .= ';';
    }
    DbOperation($sql);
    return $sql;

}

function file_suppr(){
    //1'
    $sql ='';

   //
        $sql .= "DELETE FROM `document` WHERE `id`='";

        $sql .= $_POST['id'];

        $sql .= "';";
    $ds          = DIRECTORY_SEPARATOR;
    $storeFolder = '..'. $ds .'pdf';

    DbOperation($sql);

    $name = str_replace("/",$ds,$_POST['value']);

    unlink(dirname( __FILE__ ) . $ds. $storeFolder. $ds . $name);
}



function file_update(){

        //UPDATE `document` SET `promo`=,`fichier`= WHERE `fichier`=[value-5];

    $sql ='';

   //
        $sql .= 'UPDATE `document` SET `promo`="';

        $sql .= $_POST['select'];

        $sql .= '", `fichier`="';

        $sql .= $_POST['value'];

        $sql .= '", `libelle`=""';

        $sql .= ' WHERE `id`="' . $_POST['id'] .'"';

        $sql .= ';';


    $namefile = "SELECT `fichier` FROM `document` WHERE `id`='". $_POST['id'] ."'";

    $ds          = DIRECTORY_SEPARATOR;

    $storeFolder = '..'. $ds .'pdf';
    $namefile2 = "SELECT `fichier` FROM `document` WHERE `id`='". $_POST['id'] ."'";
    $namefile=DbOperation($namefile2);

    $name = str_replace("/",$ds,$_POST['value']);
    rename(dirname( __FILE__ ) . $ds. $storeFolder. $ds . $namefile[0]['fichier'], dirname( __FILE__ ) . $ds. $storeFolder. $ds.$name);





    DbOperation($sql);

    return $sql;

}


?>
