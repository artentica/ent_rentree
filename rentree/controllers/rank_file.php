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

function file_update(){

        //UPDATE `document` SET `promo`=,`fichier`= WHERE `fichier`=[value-5];

    $sql ='';

   //
        $sql .= 'UPDATE `document` SET `promo`="';

        $sql .= $_POST['select'];

        $sql .= '", `fichier`="';

        $sql .= $_POST['value'];

        $sql .= '" WHERE `id`="' . $_POST['id'] .'"';

        $sql .= ';';

    DbOperation($sql);
    return $sql;

}


?>
