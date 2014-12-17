<?php

function MAJ_BDD(){

    $sql ='';
    foreach(json_decode($_POST['list'],true) as $key => $value){
        $sql .= 'UPDATE `data` SET ';
        if(!empty($value['identifiant'])){
            $sql .= '`identifiant`="'. $value['identifiant'] .'" ';
        }
        if(!empty($value['nom_fils'])){
            $sql .= '`nom_fils`="'. $value['nom_fils'] .'" ';
        }
        if(!empty($value['prenom_fils'])){
            $sql .= '`prenom_fils`="'. $value['prenom_fils'] .'" ';
        }
        if(!empty($value['ddn_fils'])){
            $sql .= '`ddn_fils`="'. $value['ddn_fils'] .'" ';
        }
        if(!empty($value['tel_mobile'])){
            $sql .= '`tel_mobile`="'. $value['tel_mobile'] .'" ';
        }
        if(!empty($value['courriel'])){
            $sql .= '`courriel`="'. $value['courriel'] .'" ';
        }
        if(!empty($value['date'])){
            $sql .= '`date`="'. $value['date'] .'" ';
        }
        if(!empty($value['ip'])){
            $sql .= '`ip`="'. $value['ip'] .'" ';
        }

        $sql .= 'WHERE `id`="' . $value['id'].'"';


        $sql .= ';';
    }
    DbOperation($sql);
    //var_dump(json_decode($_POST["list"],true))
    return $sql;

}

?>
