<?php /* Smarty version 2.6.26, created on 2010-04-21 12:07:23
         compiled from skin.html */ ?>
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
        <?php echo $this->_tpl_vars['cont']; ?>

      </div>
  </body>
</html>