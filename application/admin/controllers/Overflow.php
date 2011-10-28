<?php
/**
 * Description of Overflow
 *
 * @author christophe de saint leger
 */
class Overflow extends Oscar_Front_Controller{

    /*
     * Connexion à la base des comptes ,
     * regarde s'il y a des spams
     * envoie un rapport 
     */
    function infos_spam(){

        $this->stop_layout();

        /*
         * DDB
         */
        $dsn            =	"mysql:host=".$this->get_param('_mailsrvaddr').";dbname=".$this->get_param('_postfixDbName');
        $options	=	array();

        $Orm_db	=	new Oscar_db_manager($dsn, $this->get_param('_postfixUser'), $this->get_param('_postfixPwd'), $options);

        $M_postfix  =   new M_postfix();
        $Tuser  =   $M_postfix->get_user();


        if(!empty($Tuser)){
            /*
             * On repasse sur l'autre base
             */
            $dsn	=	"mysql:host=".$this->get_param('_host').";dbname=".$this->get_param('_ddb');

            $Orm_db	=	new Oscar_db_manager($dsn, $this->get_param('_user'), $this->get_param('_pwd'), $options);

            require_once $this->get_param('oscar_base').'/application/users/controllers/Index.php';
            $CtrlUser   =   new Index();

            foreach( $Tuser AS &$user ){
                //on notifie uniquement les bloquages qui ne sont pas blacklistés ( bloquage naturel )
                $Tspam  =   $CtrlUser->_get_spam($user['username'],1,TRUE,$user['showBlacklisted']);

                //compte le nombre de spam
                $nbspam =   count($Tspam);

                if($nbspam>0){
                    $this->_sendReportByMail($user['username'],$nbspam,$Tspam);
                }

            }
        }
     
    }



    /*
     * Envoie du rapport de spam par mail 
     */
    private function _sendReportByMail($email,$nbspam,$Tspam){

                       
          require_once('oscar/mail/htmlMimeMail5.php');

          $mail = new htmlMimeMail5();

          /*
           * Définition des paramétres du serveur SMTP ( si l'on envoie de cette méthode )
           */
          $mail->setSMTPParams($host = $this->get_param('_mailsrvaddr'), $port = $this->get_param('_repportsrvport'), $helo = null, $auth = null, $user = null, $pass = null);

          /**
          * Définition de l'adresse de l'éxpéditeur
          */
          $mail->setFrom( $this->get_param('_repportsrvfrom') );

          /**
          * Définition du sujet
          */
          $mail->setSubject( $this->get_param('_repportsrvsujet') );

          /**
          * Définition de la priorité
          */
          $mail->setPriority('high');

          /**
          * Définition du charset du mail version HTML
          */
          $mail->setHTMLCharset('UTF-8');

          /**
          * Définition du mail au format HTML
          */
          $mail->setHTML( $Tspam );
         
          /**
          * Et envoie du mail au(x) destinataire(s)
          * Façon SMTP , mais il peut être envoyé via bien d'autre méthodes
          */
          $mail->send(array($email),'smtp');

    }

}
?>
