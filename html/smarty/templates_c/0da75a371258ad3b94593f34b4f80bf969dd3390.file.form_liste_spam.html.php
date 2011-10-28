<?php /* Smarty version Smarty-3.0.4, created on 2010-11-18 15:02:32
         compiled from "../application/users/layouts/form_liste_spam.html" */ ?>
<?php /*%%SmartyHeaderCode:21043376504ce531f81ff1f3-64775070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0da75a371258ad3b94593f34b4f80bf969dd3390' => 
    array (
      0 => '../application/users/layouts/form_liste_spam.html',
      1 => 1265288778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21043376504ce531f81ff1f3-64775070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="stylesheet" href="/styles/users/liste_spams.css" type="text/css" media="Screen" />

<div id="liste_spam">

    <div id="resultats_liste_spam">
        <?php echo $_smarty_tpl->getVariable('liste_spam')->value;?>

    </div>

    <div id="infos"></div>


</div>