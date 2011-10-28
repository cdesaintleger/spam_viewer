<?php /* Smarty version Smarty-3.0.4, created on 2010-11-18 15:02:27
         compiled from "smarty/templates/skin.html" */ ?>
<?php /*%%SmartyHeaderCode:12296717414ce531f33cf3f9-35015887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1a933bde1fca14dea5446ad8a7522764574fe3c' => 
    array (
      0 => 'smarty/templates/skin.html',
      1 => 1271842862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12296717414ce531f33cf3f9-35015887',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="/styles/skin/skin.css" type="text/css" media="Screen" />
    <script type="text/javascript" src="/scripts/skin/scriptaculous-js-1.8.3/lib/prototype.js"></script>
    <script type="text/javascript" src="/scripts/skin/scriptaculous-js-1.8.3/src/scriptaculous.js"></script>
    <script type="text/javascript" src="/scripts/skin/prototip1.3.5.1/js/prototip.js"></script>
    
  </head>
  <body>
      <div id="commandes">
          V b0.1
          <div id="menu">
              <table>
                  <tr>
                      <td>|</td>
                      <td><a href="/Index">Mes spams<a></td>
                      <td>|</td>
                      <td><a href="/Wbliste/wliste">Ma liste blanche</a></td>
                      <td>|</td>
                      <td><a href="/Wbliste/bliste">Ma liste noire</a></td>
                      <td>|</td>
                      <td><a href="/Index/account">Mes paramétres</a></td>
                      <td>|</td>
                  </tr>
              </table>
          </div>
          <a href="/Index/unlock" ><div class="quit"></div></a>
      </div>
      <div id="contenu">
        <?php echo $_smarty_tpl->getVariable('cont')->value;?>

      </div>
  </body>
</html>
