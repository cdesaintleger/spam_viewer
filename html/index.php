<?php
session_start();
//inclusion du front controller
require_once 'oscar/Oscar_Front_Controller.php';

//recupére l'instance du controller frontal
$controller	=	Oscar_Front_Controller::getInstance();


//définition des chemins des controllers
$dirController	=	array(
	'../application/admin/controllers/',
        '../application/users/controllers/',
        '../application/services/controllers/'
);

//Definition des repertoires de controllers , active l'autoload pour les models .
$controller->set_controller_directory($dirController, TRUE, array("models/") );








//definition des paramétres pour la vue du layout
$Layout	=	array(
	'dir_tpls'=>'smarty/templates/',
	'template'=>'skin.html',
	'binding'=>
		array(
			"precont"	=>"_pre_content",
			"init"		=>"_init_content",
			"cont"		=>"_content",
			"post"		=>"_post_content"
		),
	'cache'=>FALSE
);

//Activation du layout
$controller->set_layout($Layout);


//Petit plus pour toujours avoir la base directory
$controller->set_param("oscar_base",realpath('../'));


/*
 * Récupération de la configuration
 * de l'appli
 */
require_once '../application/config/my_config.php';


/*
 * DDB
 */

require_once('oscar/orm/Oscar_db_manager.php');

$dsn	=	"mysql:host=".$controller->get_param('_host').";dbname=".$controller->get_param('_ddb');
$options	=	array();

$Orm_db	=	new Oscar_db_manager($dsn, $controller->get_param('_user'), $controller->get_param('_pwd'), $options);



/*
* Service avant controllers
*/
$controller->add_service(
    array("Index","testAuth")
);




//lancemant du fw
$controller->run();


?>