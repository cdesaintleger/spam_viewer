<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * CREATE TABLE  `amavis`.`toRelease` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `mail_id` VARCHAR( 100 ) NOT NULL ,
    `quar_loc` VARCHAR( 100 ) NOT NULL ,
    `released` INT NOT NULL ,
    `dateToRelease` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    INDEX (  `mail_id` ,  `released` ,  `dateToRelease` )
    ) ENGINE = MYISAM ;
 */


/**
 * Description of M_toRelease
 *
 * @author cdsl
 */
class M_toRelease extends Oscar_Orm{


    //nom de la table à gérer
    protected $_table   =   "toRelease";
    //nom du champ index souvent id
    protected $_pkey    =   "id";


    /*
     * Liste les mails à releaser
     */
    function toRelease(){

        $sql    =   '
            SELECT * FROM toRelease
            WHERE released = 0 LIMIT 50
        ';

        $res =  $this->execute($sql);

        return $res;

    }


    /*
     * Vérifie la présence ou non d'un mail à renvoyer
     */
    function alreadyLoaded($id_mail){

        $sql = 'SELECT count(id) AS nbloaded
                FROM toRelease
                WHERE mail_id = \''.$id_mail.'\'
                AND released = 0
                LIMIT 1';

        $res    =   $this->execute($sql, null);

        if( $res[0]['nbloaded'] > 0 ){

            return true;

        }else{

            return false;

        }


    }

}
?>
