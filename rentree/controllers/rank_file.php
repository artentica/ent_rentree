<?php

    function rank_file(){

        //[value-2] WHERE [value-5]

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


?>
