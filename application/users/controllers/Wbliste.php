<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Wbliste
 *
 * @author cdsl
 */
class Wbliste extends Oscar_Front_Controller{


    function init(){

        //recupere l'id du compte 
        $M_users    =   new M_users();
        $this->id_user  =   $M_users->get_id($_SESSION['mail']);
        

    }

    
    function defaut(){

        //affiche la liste blanche
        $this->wliste();

    }



    /*
     * Edition de la liste blanche
     */
    function wliste(){

        //récupére la liste blanche de l'utilisateur
        $M_wblist   =   new M_wblist();
        $TlisteW =   $M_wblist->get_wlist($this->id_user);

        
        //Définition des variables de la vue
        $viewVar    =   array(
            "noform"  => FALSE,
            "twliste"   => $TlisteW);

        //Asignation
        $this->display("whitelist.html");

    }



     /*
     * Edition de la liste noir
     */
    function bliste(){

        //récupére la liste blanche de l'utilisateur
        $M_wblist   =   new M_wblist();
        $TlisteB =   $M_wblist->get_blist($this->id_user);

        //Définition des variables de la vue
        $viewVar    =   array(
            "noform"  => FALSE,
            "tbliste"   => $TlisteB);

        //Asignation
        $this->display("blacklist.html",$viewVar);

    }



    /*
     * Ajoute une adresse soit en blacklist soit en liste blanche
     */
    function addAddr(){

        $this->stop_layout();

        if( $this->CPOST_email !=null && $this->CPOST_in != null ){

            //if( filter_var($this->CPOST_email, FILTER_VALIDATE_EMAIL)){


                $M_mailaddr = new M_mailaddr();

                if( !$M_mailaddr->sid_exist_for_user($this->CPOST_email , $this->id_user ) ){

                    //si l'adresse existe on la rattache à l'utilisateur
                    $id_sid = $M_mailaddr->sid_exist($this->CPOST_email);

                    if( $id_sid == false){

                        $M_mailaddr->priority	=   1;
                        $M_mailaddr->email	=   $this->CPOST_email;
                        $sid    =   $M_mailaddr->createRecord();
                        unset($M_mailaddr);

                    }else{

                        $sid    =   $id_sid;

                    }

                    $M_wblist   =   new M_wblist();
                    $M_wblist->rid = $this->id_user;
                    $M_wblist->sid = $sid;
                    if( $this->CPOST_in == 'bl' ){
                        $M_wblist->wb   =   'B';
                    }else{
                        $M_wblist->wb   =   'W';
                    }
                    $M_wblist->createRecord();
                    unset($M_wblist);
                }else{
                    return "L'adresse donnée existe déjà en base !";
                }
            //}

        }

        //mise à jour de la liste
        
        //récupére la liste blanche de l'utilisateur
        $M_wblist   =   new M_wblist();

        if( $this->CPOST_in == 'bl' ){
            $Tliste =   $M_wblist->get_blist($this->id_user);
        }else{
            $Tliste =   $M_wblist->get_wlist($this->id_user);
        }

        unset($M_wblist);

        $viewVar    =   array(
            //pas de formulaire -> rq ajax
            "noform"    =>  TRUE
        );

        
        if( $this->CPOST_in == 'bl' ){

            $viewVar["tbliste"] =   $Tliste;
            //Asignation
            $this->display("blacklist.html",$viewVar);

        }else{

            $viewVar["twliste"] =   $Tliste;
            //Asignation
            $this->display("whitelist.html",$viewVar);
        }


    }




    function removeAddr(){

        $this->stop_layout();

        if( $this->CPOST_sid != null ){

            $M_wb = new M_wblist();
            $M_wb->delete_row($this->CPOST_sid , $this->id_user );
         
        }


        if( $this->CPOST_in == 'bl' ){
            $Tliste =   $M_wb->get_blist($this->id_user);
        }else{
            $Tliste =   $M_wb->get_wlist($this->id_user);
        }

        $viewVar    =   array("noform"  =>  TRUE);

        

        if( $this->CPOST_in == 'bl' ){

            $viewVar["tbliste"] =   $Tliste;
            //Asignation
            $this->display("blacklist.html",$viewVar);
        }else{

            $viewVar["twliste"] =   $Tliste;
            //Asignation
            $this->display("whitelist.html",$viewVar);
        }

    }

}
?>
