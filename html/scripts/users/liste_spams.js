/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
release_email   =   function(mail_id){

    var myHash  =   new Hash();

    myHash.set('id_mail',mail_id);

    new Ajax.Updater('infos', '/Index/release_spam/',{evalScripts:true,
        method:'post',
        postBody:myHash.toQueryString(),
        onSuccess:function(){

            $(mail_id).style.backgroundImage="url(../../images/next.png)";
            
        }
    });

}

