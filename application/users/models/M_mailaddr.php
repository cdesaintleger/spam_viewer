<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_mailaddr
 *
 * @author cdsl
 */
class M_mailaddr extends Oscar_Orm{


    //nom de la table à gérer
    protected $_table   =   "mailaddr";
    //nom du champ index souvent id
    protected $_pkey    =   "id";



    /*
     * Test si une adresse est déjà présente en B ou W liste
     */
    function sid_exist_for_user( $sender, $rid ){

        $sql    =   '
            SELECT COUNT( id ) AS nbaddr
            FROM
                mailaddr,
                wblist
            WHERE
                wblist.rid = :rid
            AND
                mailaddr.id    =   wblist.sid
            AND
                mailaddr.email   =   :email
            LIMIT 1
        ';

        $res = $this->execute($sql, array(":email"=>$sender,":rid"=>$rid));

        if( $res[0]['nbaddr'] > 0 ){
            return true;
        }else{
            return false;
        }

    }



    function sid_exist( $sender ){

         $sql    =   '
            SELECT id
            FROM
                mailaddr
            WHERE
                mailaddr.email   =   :email
            LIMIT 1
        ';

        $res = $this->execute($sql, array(":email"=>$sender));

        if( count($res) > 0 ){
            return $res[0]['id'];
        }else{
            return false;
        }

    }

    

}
?>
