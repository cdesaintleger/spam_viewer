/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


AjouteEnBlackListe  =   function( event ){

    var myHash = new Hash();

    myHash.set("email",$('email').value);
    myHash.set("in","bl");

    new Ajax.Updater('blist','/Wbliste/addAddr/',{
        evalScripts:true,
        method:'post',
        postBody:myHash.toQueryString()
    });

}


AjouteEnWhiteListe  =   function( event ){

    var myHash = new Hash();

    myHash.set("email",$('email').value);
    myHash.set("in","wl");

    new Ajax.Updater('wlist','/Wbliste/addAddr/',{
        evalScripts:true,
        method:'post',
        postBody:myHash.toQueryString()
    });

}



delete_wb_mail  =   function( sid, inListe ){

    var myHash = new Hash();

    myHash.set("sid",sid);
    myHash.set("in",inListe);

    if( inListe == 'bl' ){

        new Ajax.Updater('blist','/Wbliste/removeAddr/',{
            evalScripts:true,
            method:'post',
            postBody:myHash.toQueryString()
        });

    }

    if( inListe == 'wl' ){

        new Ajax.Updater('wlist','/Wbliste/removeAddr/',{
            evalScripts:true,
            method:'post',
            postBody:myHash.toQueryString()
        });

    }
}