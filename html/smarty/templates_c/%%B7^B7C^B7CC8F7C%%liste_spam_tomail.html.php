<?php /* Smarty version 2.6.26, created on 2010-04-21 15:42:23
         compiled from liste_spam_tomail.html */ ?>

<h2>Mail(s) bloqués sur votre compte : </h2>

<h3>Note : </h3>
<p><i>Visitez <a href="http://spamviewer.creavi.fr">SpamViewer</a> pour libérer un e-mail</i></p>
<br>

<table>

    <tr class="entete">
        <td><b>Time</b></td>
        <td><b>Note</b></td>
        <td><b>De</b></td>
        <td><b>Sujet</b></td>
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
    </tr>
    <?php endforeach; endif; unset($_from); ?>

</table>
