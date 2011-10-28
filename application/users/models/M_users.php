<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_users
 *
 * @author cdsl
 */
class M_users extends Oscar_Orm{


    //nom de la table à gérer
    protected $_table   =   "users";
    //nom du champ index souvent id
    protected $_pkey    =   "id";


    /*
     * Test l'existance d'un compte
     */
   function user_exist( $email ){

       $sql = ' SELECT COUNT( id ) AS nbcpt
                FROM users
                WHERE users.email = :email
                LIMIT 1';

       $res = $this->execute($sql, array(":email"=>$email));

       if( $res[0]['nbcpt'] > 0 ){
           return true;
       }else{
           return false;
       }


   }


   /*
    * Récupére l'id d'un compte
    */
   function get_id($email){

       $sql = ' SELECT id
                FROM users
                WHERE users.email = :email
                LIMIT 1';

       $res = $this->execute($sql, array(":email"=>$email));

       return $res[0]['id'];

   }


   /*
    * Chargement des paramétres utilisateur en session
    */
   function load_params($email){

    $sql = ' SELECT
                id,
                exclude
             FROM users
             WHERE users.email = :email
             LIMIT 1';

       $res = $this->execute($sql, array(":email"=>$email));

       /*
        * Mise en session des paramétres
        */
       $_SESSION['ACCOUNT_ID']  =   $res[0]['id'];
       $_SESSION['OPT_EXCLUDE'] =   $res[0]['exclude'];
       

   }



   

}
?>
