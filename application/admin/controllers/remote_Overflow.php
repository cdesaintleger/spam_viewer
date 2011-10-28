<?php

/*
 * DDB
 */

require_once('oscar/orm/Oscar_db_manager.php');

require_once '../../config/cronjeob_config.php';

$dsn	=	"mysql:host=$_host;dbname=$_ddb";

$options	=	array();

$Orm_db	=	new Oscar_db_manager($dsn, $_user, $_pwd, $options);

//recupére les mails à releaser
$sql    =   '
            SELECT * FROM toRelease
            WHERE released = 0 LIMIT 50
        ';
$statement = $Orm_db->prepare($sql);
$statement->execute();
$Tmails = $statement->fetchAll(PDO::FETCH_ASSOC);





//les mails delivré doivent êter mis à jour
$tabToUpdate    =   array();

foreach( $Tmails AS &$email ){

    system('amavisd-release '.$email['quar_loc']);

    
    $tabToUpdate[]  =   $Orm_db->quote($email['mail_id']);

}

if(!empty($tabToUpdate)){

    $sql    =   'UPDATE toRelease SET released = 1 WHERE mail_id IN ('.implode(',',$tabToUpdate).')';


    $statement2 = $Orm_db->prepare($sql);
    $statement2->execute();

}


?>
