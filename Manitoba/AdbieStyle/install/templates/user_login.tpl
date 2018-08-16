<?php Include($this->loadTemplate('headerMeta.tpl')); ?>
<link href="res/install.css" type="text/css" rel="StyleSheet">
<script type="text/javascript" language="JavaScript" src="res/jscript.js"></script>
<body onload="login_loaded()">
<table class="logintable">
<form action="?step=0" id="frm_login" name="frm_login" enctype="multipart/form-data" target="_self" method="post">
 <tr>
  <td align="center">
  <? 
   If ( $logRes == True )
   {
    echo '<div class="auth"><div style="padding-top: 100px; color: #00A41B; font-weight: bold; font-size:12px; text-align:center">You are logged, please wait to redirect<meta http-equiv=refresh content="2; url=index.php"></div></div>';
   }
    else
   {
  ?>
   <div class="auth">
    <div class="authtext">Please sign in</div>
    <table class="authrow">
     <tr>
      <td class="authcol1">Login:</td>
      <td class="authcol2"><input type="text" id="login" name="login" class="auth_text"></td>
     </tr>
     <tr>
      <td class="authcol1">Password:</td>
      <td class="authcol2"><input type="password" id="password" name="password" class="auth_text"></td>
     </tr>
    </table>
    <div class="authrow">
     <input type="submit" name="sb" value="Sign in now" class="button">
    </div>
   </div>
   <? } ?>
  </td>
 </tr>
 </form>
</table>
<?php Include($this->loadTemplate('footer.tpl')); ?>