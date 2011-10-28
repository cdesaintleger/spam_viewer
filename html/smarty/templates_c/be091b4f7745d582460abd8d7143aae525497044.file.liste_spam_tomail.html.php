<?php /* Smarty version Smarty-3.0.4, created on 2010-11-19 07:03:02
         compiled from "../application/users/layouts/liste_spam_tomail.html" */ ?>
<?php /*%%SmartyHeaderCode:10293158154ce6131613ab55-41708324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be091b4f7745d582460abd8d7143aae525497044' => 
    array (
      0 => '../application/users/layouts/liste_spam_tomail.html',
      1 => 1265291536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10293158154ce6131613ab55-41708324',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h2>Mail(s) bloqués sur votre compte : </h2>

<h3>Note : </h3>
<p><i>Visitez <a href="http://spamviewer.creavi.fr">SpamViewer</a> pour libérer un e-mail</i></p>
<br>

<table>

    <tr class="entete">
        <td><b>Time</b></td>
        <td><b>Note</b></td>
        <td><b>De</b></td>
        <td><b>Sujet</b></td>
    </tr>

    <?php  $_smarty_tpl->tpl_vars['sp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('spam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sp']->key => $_smarty_tpl->tpl_vars['sp']->value){
?>
    <tr>
        <td width="160px"><?php echo (isset($_smarty_tpl->tpl_vars['sp']->value['time_iso']) ? $_smarty_tpl->tpl_vars['sp']->value['time_iso'] : null);?>
</td>
        <td><?php echo (isset($_smarty_tpl->tpl_vars['sp']->value['spam_level']) ? $_smarty_tpl->tpl_vars['sp']->value['spam_level'] : null);?>
</td>
        <td><?php echo (isset($_smarty_tpl->tpl_vars['sp']->value['from_addr']) ? $_smarty_tpl->tpl_vars['sp']->value['from_addr'] : null);?>
</td>
        <td><?php echo (isset($_smarty_tpl->tpl_vars['sp']->value['subject']) ? $_smarty_tpl->tpl_vars['sp']->value['subject'] : null);?>
</td>
    </tr>
    <?php }} ?>

</table>

