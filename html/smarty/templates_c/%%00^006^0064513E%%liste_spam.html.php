<?php /* Smarty version 2.6.26, created on 2010-02-04 11:23:43
         compiled from liste_spam.html */ ?>
<script type="text/javascript"  src="/scripts/users/liste_spams.js" ></script>
<table>

    <tr class="entete">
        <td><b>Time</b></td>
        <td><b>Note</b></td>
        <td><b>De</b></td>
        <td><b>Sujet</b></td>
        <td><b>Libérer</b></td>
    </tr>

    <?php $_from = $this->_tpl_vars['spam']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sp']):
?>
    <tr>
        <td width="160px"><?php echo $this->_tpl_vars['sp']['time_iso']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sp']['spam_level']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sp']['from_addr']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sp']['subject']; ?>
</td>
        <td><div id="<?php echo $this->_tpl_vars['sp']['mail_id']; ?>
" class="release" onclick="release_email('<?php echo $this->_tpl_vars['sp']['mail_id']; ?>
')"></div></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>

</table>
