<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_msgs
 *
 * @author cdsl
 */
class M_msgs extends Oscar_Orm{


    //nom de la table à gérer
    protected $_table   =   "msgs";
    //nom du champ index souvent id
    protected $_pkey    =   "mail_id";

    

    public function get_last_spam($adresse,$time=null,$exclude=FALSE){

        if( $time == null ){
            //Timestamp de J-1
            $time   =   mktime(date('G'),date('m'),date('i'),date('n'),date('j')-1,date('Y'));

        }

        //si l'on active l'exclusion ( le spam dont la note est égal à 0 ne sont pas pris en compte dans le mail de notification car c'est un blacklistage )
        $ex = "";
        if( $exclude ){
            $ex = ' AND msgs.spam_level > 0';
        }

        
        $sql    =   '
        SELECT
            msgs.mail_id,
            msgs.secret_id,
            msgs.quar_type,
            msgs.time_iso,
            msgs.quar_loc,
            msgs.spam_level,
            msgs.from_addr,
            msgs.subject
        FROM
            msgs,
            msgrcpt,
            maddr
        WHERE
            maddr.email =   :email
        AND
            msgrcpt.rid = maddr.id
        AND
            msgs.mail_id   =   msgrcpt.mail_id
        AND
            msgs.time_num   >   :time
        AND
            msgs.content IN ('.Oscar_Front_Controller::getInstance()->get_param('_typeAlister').')
        '.$ex.'
        ORDER BY msgs.time_iso
        ';

        
        $data   =   array(
            ":email"    =>  $adresse,
            ":time"     =>  $time
        );

        $Res    =   $this->execute($sql,$data);

        return $Res;
    }




    function get_infos($id_mail){

        $sql    =   '
        SELECT * FROM msgs
        WHERE mail_id = \''.$id_mail.'\'
        LIMIT 1
        ';

        $res = $this->execute($sql,null);
        return $res[0];

    }

}
?>
