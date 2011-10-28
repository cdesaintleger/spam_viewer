<?php /* Smarty version Smarty-3.0.4, created on 2010-12-06 16:19:50
         compiled from "../application/users/layouts/params.html" */ ?>
<?php /*%%SmartyHeaderCode:19177401754cfcff163b7501-90477561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3101bc3b17262a04feee116f577319239686902' => 
    array (
      0 => '../application/users/layouts/params.html',
      1 => 1271933186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19177401754cfcff163b7501-90477561',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<link rel="stylesheet"  href="/styles/users/params.css" media="Screen"/>
<script type="text/javascript" src="/scripts/users/params.js" />

<h2>Vos paramétres personnels</h2>

<table>
    <tr>
        <td>Ne pas afficher les mails en blackliste : </td>
        <td>
            <div id="bt_onoff" class="bt-onoff-<?php echo $_smarty_tpl->getVariable('exclude')->value;?>
" onclick="update_exclude(<?php echo $_smarty_tpl->getVariable('accountId')->value;?>
)"></div>
        </td>
    </tr>
</table>


<div id="square_slider" class="slider">
  <div id="square_slider_handle_min" class="handle left"></div>
  <div id="square_slider_span" class="span"></div>
</div>


<script type="text/javascript">
    load_script();
    </script>