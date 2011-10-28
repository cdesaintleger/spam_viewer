<?php /* Smarty version Smarty-3.0.4, created on 2010-11-18 15:02:27
         compiled from "../application/users/layouts/auth.html" */ ?>
<?php /*%%SmartyHeaderCode:17378221464ce531f33a1cb7-22786839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b753b79b18f28e54f24d99abd15f62944604be26' => 
    array (
      0 => '../application/users/layouts/auth.html',
      1 => 1265293360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17378221464ce531f33a1cb7-22786839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="auth">

    <h3>Gestion de vos mails bloqués</h3>

<form name="auth" method="POST" action="/Index/auth/">

    <div id="form_auth">

        <table>

            <tr>
                <td>
                    Adresse mail
                </td>
                <td>
                    <input type="text" name="adresse">
                </td>
                <td rowspan="2">
                    <input type="submit" name="submit" value="Ok !">
                </td>
            </tr>

            <tr>
                <td>
                    Mot de passe
                </td>
                <td>
                    <input type="password" name="pwd">
                </td>
            </tr>

        </table>
    </div>

</form>
</div>