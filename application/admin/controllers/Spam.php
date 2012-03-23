<?php
class Spam extends Oscar_Front_Controller{
    
    
    public function release(){
        
        $this->stop_layout();
        
        if( $this->isRegistered('id') ){
            
            if( $this->id != "" ){
                
                $this->release_spam($this->id);
                
            }
            
        }
        
        echo $this->display('release_ok.html',array());
        
    }
    
    
    
    
    
    function release_spam($idspam){


            //Récupére les infos du mail à débloquer
            $M_spam =   new M_msgs();

            $Tinfos =   $M_spam->get_infos( $idspam );

            $M_toRelease    =   new M_toRelease();

            if(!$M_toRelease->alreadyLoaded( $idspam )){

                $M_toRelease->mail_id   =   $Tinfos['mail_id'];
                $M_toRelease->quar_loc  =  $Tinfos['quar_loc'];
                $M_toRelease->released  =   0;
                $M_toRelease->createRecord();
                unset($M_toRelease);
                
            }
            unset($M_spam);
            
    }
    
}
?>