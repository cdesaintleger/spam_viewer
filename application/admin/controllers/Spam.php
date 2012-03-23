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
            //if(!$M_toRelease->alreadyLoaded( $idspam )){
            //
            //    $M_toRelease->mail_id   =   $Tinfos['mail_id'];
            //    $M_toRelease->quar_loc  =  $Tinfos['quar_loc'];
            //    $M_toRelease->released  =   0;
            //    $M_toRelease->createRecord();
            //    unset($M_toRelease);
            //    
            //}
            //unset($M_spam);
            
    }
    
}
?>