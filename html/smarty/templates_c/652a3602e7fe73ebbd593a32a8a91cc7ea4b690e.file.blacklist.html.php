<?php /* Smarty version Smarty-3.0.4, created on 2010-12-06 16:19:49
         compiled from "../application/users/layouts/blacklist.html" */ ?>
<?php /*%%SmartyHeaderCode:17278453974cfcff157913c9-42612962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '652a3602e7fe73ebbd593a32a8a91cc7ea4b690e' => 
    array (
      0 => '../application/users/layouts/blacklist.html',
      1 => 1265382348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17278453974cfcff157913c9-42612962',
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
            <td><img src="/images/add.png" alt="ajouter" title="ajouter" class="buttonAdd" id="addblist"/></td>
        </tr>
    </table>
</div>


<div id="blist">
<?php }?>
    <table>
        <tr class="entete">
            <td width="200px">Adresses en BlackList</td>
            <td width="200px">Retirer de la liste</td>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['adresse'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tbliste')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['adresse']->key => $_smarty_tpl->tpl_vars['adresse']->value){
?>
        <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['adresse']->value['email']) ? $_smarty_tpl->tpl_vars['adresse']->value['email'] : null);?>
</td>
            <td><div class="delete" onclick="delete_wb_mail(<?php echo (isset($_smarty_tpl->tpl_vars['adresse']->value['sid']) ? $_smarty_tpl->tpl_vars['adresse']->value['sid'] : null);?>
,'bl')"></div></td>
        </tr>
        <?php }} ?>

    </table>
<?php if ($_smarty_tpl->getVariable('noform')->value==false){?>
</div>
<?php }?>

<script type="text/javascript">

    Event.observe('addblist', 'click', AjouteEnBlackListe );

</script>