<?php /* Smarty version 2.6.26, created on 2010-04-22 12:46:42
         compiled from params.html */ ?>
<link rel="stylesheet"  href="/styles/users/params.css" media="Screen"/>
<script type="text/javascript" src="/scripts/users/params.js" />

<h2>Vos paramétres personnels</h2>

<table>
    <tr>
        <td>Ne pas afficher les mails en blackliste : </td>
        <td>
            <div id="bt_onoff" class="bt-onoff-<?php echo $this->_tpl_vars['exclude']; ?>
" onclick="update_exclude(<?php echo $this->_tpl_vars['accountId']; ?>
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