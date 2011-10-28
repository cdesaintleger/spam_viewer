<?php /* Smarty version Smarty-3.0.4, created on 2010-11-18 15:02:32
         compiled from "../application/users/layouts/liste_spam.html" */ ?>
<?php /*%%SmartyHeaderCode:17974752014ce531f81b2641-99695890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60286a32009af976511733a6fe05211166dff0e0' => 
    array (
      0 => '../application/users/layouts/liste_spam.html',
      1 => 1265278636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17974752014ce531f81b2641-99695890',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript"  src="/scripts/users/liste_spams.js" ></script>
<table>

    <tr class="entete">
        <td><b>Time</b></td>
        <td><b>Note</b></td>
        <td><b>De</b></td>
        <td><b>Sujet</b></td>
        <td><b>Libérer</b></td>
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
        <td><div id="<?php echo (isset($_smarty_tpl->tpl_vars['sp']->value['mail_id']) ? $_smarty_tpl->tpl_vars['sp']->value['mail_id'] : null);?>
" class="release" onclick="release_email('<?php echo (isset($_smarty_tpl->tpl_vars['sp']->value['mail_id']) ? $_smarty_tpl->tpl_vars['sp']->value['mail_id'] : null);?>
')"></div></td>
    </tr>
    <?php }} ?>

</table>

