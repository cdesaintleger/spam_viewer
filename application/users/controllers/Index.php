<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author cdsl
 */
class Index extends Oscar_Front_Controller{



    function testAuth(){
        
        if( $this->get_url_controller != 'Spam' && $this->get_url_action() != "release" ){

            if( !$this->is_auth() && $this->get_url_action() != "auth"  &&  $this->get_url_action() != "infos_spam" ){
    
                $this->_skipTo(array("Index","form_auth",null), TRUE);
    
            }
            
        }
        
    }




    function defaut(){

        if( $this->is_auth() ){

            
            //Asignation
            $viewVars = array(
                "liste_spam"    =>  $this->_get_spam( $_SESSION['mail'], $this->get_param( '_joursavoir' ),FALSE, $_SESSION['OPT_EXCLUDE'] )
            );

            $this->display("form_liste_spam.html",$viewVars);

        }else{

            $this->form_auth();

        }

    }



    /*
     * Récupére les spam de j-1 du compte spécifié
     */
    public function _get_spam($email,$nbday=1,$tomail=false,$exclude=FALSE){

        $time   =   mktime(date('G'),date('m'),date('i'),date('n'),date('j')-$nbday,date('Y'));

        $M_spam =   new M_msgs();
        $res    =   $M_spam->get_last_spam($email,$time,$exclude);

        if(!empty($res)){

            foreach($res AS &$resu){
                $resu['from_addr']   =   htmlentities($resu['from_addr'], ENT_QUOTES, "utf-8");
            }


                        
            //Asignation
            $viewVars   =   array( "spam"   =>  $res);
            
            if( $tomail ){
                //options
                $options = array(
                    "templates_dir"    =>    "../application/users/layouts/"
                );

                return $this->fetch("liste_spam_tomail.html",$viewVars,$options);
            }else{
                return $this->fetch("liste_spam.html",$viewVars);
            }

            

        }elseif(!$tomail){

           
            //Asignation
            $viewVars   =   array( "spam"   =>  $res);

            return $this->fetch("pas_de_spam.html",$viewVars);

        }

    }









    /***********************************
     *
     *
     *  AUTHENTIFICATION & DELOG
     *
     */







    /*
     * Permet de délogguer l'utilisateur
     */
    function unlock(){

        unset($_SESSION['spam_viewer_ia']);
        unset($_SESSION['mail']);

        $this->_forward(array("Index","defaut"));

    }


    /*
     * affiche le formulaire d'authentification
     */
    function form_auth(){

        
        //Asignation
        $this->display("auth.html");

    }



    function is_auth(){

        if( $_SESSION['spam_viewer_ia'] == sha1('is_authentified-'.$_SESSION['mail']) ){
            return true;
        }else{

            unset($_SESSION['spam_viewer_ia']);
            unset($_SESSION['mail']);

            return false;

        }

    }



    function auth(){

        if(!$this->is_auth()){

            if( $this->CPOST_pwd != null && $this->CPOST_adresse != null ){

                $mbox = imap_open ("{".$this->get_param('_mailsrvaddr').":".$this->get_param('_mailsrvport')."/".$this->get_param('_mailsrvflag')."}", $this->CPOST_adresse, $this->CPOST_pwd);

                if(!$mbox){
                    imap_close($mbox);
                    $this->form_auth();
                }else{
                    imap_close($mbox);
                    $_SESSION['mail']   =   $this->CPOST_adresse;
                    $_SESSION['spam_viewer_ia'] =   sha1('is_authentified-'.$this->CPOST_adresse);

                    //Chargement des paramétres utilisateur en session
                    $M_users    =   new M_users();

                    //Si c'est la premiere connexion ,
                    if( !$M_users->user_exist($_SESSION['mail']) ){
                        $M_users->cleanRecord();
                        $M_users->priority  = 1;
                        $M_users->policy_id = 1;
                        $M_users->email     = $_SESSION['mail'];
                        $M_users->local     = 'Y';
                        $M_users->exclude    =   0;
                        $M_users->createRecord();
                    }
                    
                    $M_users->load_params($_SESSION['mail']);

                    //liste les spams du compte
                    $this->defaut();
                }

            }else{

                $this->_forward(array("Index","is_auth"));

            }
        }else{
            $this->defaut();
        }

    }



    



    /*
     *
     *  ACTION RELEASE
     *
     *
     */

    function release_spam(){

        $this->stop_layout();

        if( $this->CPOST_id_mail != null ){

            //Récupére les infos du mail à débloquer
            //$M_spam =   new M_msgs();

            $Tinfos =   $M_spam->get_infos( $_POST['id_mail'] );
            
            
            
            $fp = fsockopen('10.0.0.3', 9998, $errno, $errstr, 30);
            if (!$fp) {
                echo "$errstr ($errno)<br />\n";
            } else {
                    $in = "request=release\r\n";
                    $in .= "mail_id=".$Tinfos['mail_id']."\r\n";
                    $in .= "secret_id=".$Tinfos['secret_id']."\r\n";
                    $in .= "quar_type=".$Tinfos['quar_type']."\r\n";
                    $in .= "mail_file=".$Tinfos['quar_loc']."\r\n";
                    //$in .= "recipient=<$recipient>\r\n";
                    $in .= "\r\n";
            
                fwrite($fp, $in);
                fclose($fp);
            }
            
            
            //$M_toRelease    =   new M_toRelease();
            //
            //if(!$M_toRelease->alreadyLoaded($_POST['id_mail'])){
            //
            //    $M_toRelease->mail_id   =   $Tinfos['mail_id'];
            //    $M_toRelease->quar_loc  =  $Tinfos['quar_loc'];
            //    $M_toRelease->released  =   0;
            //
            //    $M_toRelease->createRecord();
            //    unset($M_toRelease);
            //
            //}
            //unset($M_spam);


        }

    }


    /*
     * Permet la gestion des paramétres du compte de filtrage anti-spam
     */
    function account(){

        $viewVars   =   array(
            "exclude"   =>  $_SESSION['OPT_EXCLUDE'],
            "accountId" =>  $_SESSION['ACCOUNT_ID']
        );
        
        $this->display("params.html",$viewVars);

    }


}
?>
