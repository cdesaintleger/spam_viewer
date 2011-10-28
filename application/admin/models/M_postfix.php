<?php

/**
 * Description of postfix
 *
 * @author cdsl
 */
class M_postfix extends Oscar_Orm{


    //nom de la table à gérer
    protected $_table   =   "postfix";
    //nom du champ index souvent id
    protected $_pkey    =   "id";


    /*
     * Récupére les utilisateurs du serveur mail
     */
    function get_user(){

        $sql = '
            SELECT username,showBlacklisted FROM mailbox WHERE active=1
        ';

        $Tuser = $this->execute($sql,null);

        return $Tuser;

    }

}
?>
