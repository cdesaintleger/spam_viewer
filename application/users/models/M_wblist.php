<?php

/**
 * Description of M_wblist
 *
 * @author cdsl
 */
class M_wblist extends Oscar_Orm{


    //nom de la table à gérer
    protected $_table   =   "wblist";
    //nom du champ index souvent id
    protected $_pkey    =   "id";



    /*
     * Récupére la liste blanche
     */
    function get_wlist($user_id){

        $sql    =   '
        SELECT
            mailaddr.email,
            mailaddr.id AS sid
        FROM
            mailaddr,
            wblist
        WHERE
            wblist.rid = :userid
        AND
            mailaddr.id = wblist.sid
        AND
            wblist.wb = \'W\'
        ORDER BY mailaddr.email
        ';

        $res = $this->execute($sql, array(":userid"=>$user_id));

        return $res;

    }



    /*
     * Récupére la liste noir
     */
    function get_blist($user_id){

        $sql    =   '
        SELECT
            mailaddr.email,
            mailaddr.id AS sid
        FROM
            mailaddr,
            wblist
        WHERE
            wblist.rid = :userid
        AND
            mailaddr.id = wblist.sid
        AND
            wblist.wb = \'B\'
        ORDER BY mailaddr.email
        ';

        $res = $this->execute($sql, array(":userid"=>$user_id));

        return $res;

    }



    /*
     * Supprime un champ d'une liste B ou W
     */
    function delete_row( $sid , $rid ){

        $sql = '
        DELETE FROM wblist
        WHERE sid = :sid
        AND
            rid = :rid
        LIMIT 1
        ';

        if($statement = parent::getPDOInstance()->prepare($sql)){

            $statement->bindParam(':sid', $sid);
            $statement->bindParam(':rid', $rid);
                //Execute la requete
                if($statement->execute()){
                        $retour	=	TRUE;
                }
	}


        

    }


    

}
?>
