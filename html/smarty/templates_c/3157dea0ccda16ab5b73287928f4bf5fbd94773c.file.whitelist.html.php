<?php /* Smarty version Smarty-3.0.4, created on 2010-12-06 16:19:48
         compiled from "../application/users/layouts/whitelist.html" */ ?>
<?php /*%%SmartyHeaderCode:2295193414cfcff143f88f7-71583194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3157dea0ccda16ab5b73287928f4bf5fbd94773c' => 
    array (
      0 => '../application/users/layouts/whitelist.html',
      1 => 1265382329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2295193414cfcff143f88f7-71583194',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="stylesheet"  href="/styles/users/wblist.css" media="Screen"/>
<script type="text/javascript" src="/scripts/users/wblist.js" ></script>

<?php if ($_smarty_tpl->getVariable('noform')->value==false){?>
<div id="formajout">
    <table>
        <tr>
            <td><input type="text" name="email" id="email" size="55"/></td>
            <td><img src="/images/add.png" alt="ajouter" title="ajouter" id="addwlist" class="buttonAdd"/></td>
        </tr>
    </table>
</div>


<div id="wlist">
<?php }?>
    <table>
        <tr class="entete">
            <td width="200px">Adresses en WhiteList</td>
            <td width="200px">Retirer de la liste</td>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['adresse'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('twliste')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['adresse']->key => $_smarty_tpl->tpl_vars['adresse']->value){
?>
        <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['adresse']->value['email']) ? $_smarty_tpl->tpl_vars['adresse']->value['email'] : null);?>
</td>
            <td><div class="delete" onclick="delete_wb_mail(<?php echo (isset($_smarty_tpl->tpl_vars['adresse']->value['sid']) ? $_smarty_tpl->tpl_vars['adresse']->value['sid'] : null);?>
,'wl')"></div></td>
        </tr>
        <?php }} ?>

    </table>
<?php if ($_smarty_tpl->getVariable('noform')->value==false){?>
</div>
<?php }?>

<script type="text/javascript">

    Event.observe('addwlist', 'click', AjouteEnWhiteListe );

</script>