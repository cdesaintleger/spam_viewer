<?php /* Smarty version 2.6.26, created on 2010-02-05 16:08:00
         compiled from whitelist.html */ ?>
<link rel="stylesheet"  href="/styles/users/wblist.css" media="Screen"/>
<script type="text/javascript" src="/scripts/users/wblist.js" ></script>

<?php if ($this->_tpl_vars['noform'] == FALSE): ?>
<div id="formajout">
    <table>
        <tr>
            <td><input type="text" name="email" id="email" size="55"/></td>
            <td><img src="/images/add.png" alt="ajouter" title="ajouter" id="addwlist" class="buttonAdd"/></td>
        </tr>
    </table>
</div>


<div id="wlist">
<?php endif; ?>
    <table>
        <tr class="entete">
            <td width="200px">Adresses en WhiteList</td>
            <td width="200px">Retirer de la liste</td>
        </tr>

        <?php $_from = $this->_tpl_vars['twliste']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['adresse']):
?>
        <tr>
            <td><?php echo $this->_tpl_vars['adresse']['email']; ?>
</td>
            <td><div class="delete" onclick="delete_wb_mail(<?php echo $this->_tpl_vars['adresse']['sid']; ?>
,'wl')"></div></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>

    </table>
<?php if ($this->_tpl_vars['noform'] == FALSE): ?>
</div>
<?php endif; ?>

<script type="text/javascript">

    Event.observe('addwlist', 'click', AjouteEnWhiteListe );

</script>