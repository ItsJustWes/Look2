<?php Include($this->loadTemplate('headerMeta.tpl')); ?>
<link href="res/install.css" type="text/css" rel="StyleSheet">
<body>

<table style="width:100%;height:100%;"><tr><td align="center" valign="middle">

<table cellspacing="0" cellpadding="0" style="width:800px;height:400px;font-family:arial;font-size:12px;">
<tr>
 <td style="height:30px; background: url('res/header.gif') repeat-x; color:#FFFCED;padding-left:10px;"><b>Welcome in <?=APPLICATION_NAME.' '.APPLICATION_VERSION.'.'.APPLICATION_SUBVERSION;?> install setup.</b></td>
 
 <td style="width:100px; background: url('res/header.gif') repeat-x; color:#FFFCED;" align="center"> </td>
</tr>
<tr>
 <td colspan="2" valign="moiddle" align="center" style="height:320px;border-left:1px solid #008FEA; border-right:1px solid #008FEA; padding:5px;"><?=$this->content;?></td>
</tr>

<tr>
 <td colspan="2" align="right" style="padding:5px;padding-right:20px;background:#F4F4F4;border-left:1px solid #008FEA;border-right:1px solid #008FEA;border-top:1px solid #D6D6D6">
  <input type="button" value="Go install" class="button"<?=(!$this->checkOk?' disabled':'');?> onclick="location.href='?step=1'">
 </td>
</tr>

<tr><td colspan="2" style="height:14px;font-family:verdana;font-size:10px;text-align:center;color:#FFFCED;background:#008FEA;"><?=APPLICATION_NAME.' '.APPLICATION_VERSION.'.'.APPLICATION_SUBVERSION;?></td></tr>
</table>

</td></tr></table>

<?php Include($this->loadTemplate('footer.tpl')); ?>