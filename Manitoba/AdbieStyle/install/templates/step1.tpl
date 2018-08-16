<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">General settings</td></tr>

<tr>
 <td align="right" class="left"><b>Site title :</b></td>
 <td align="left" class="right">
 	<input type="text" name="site_title" class="text" value="<?=$_SESSION['site_title'];?>">
	<br><b class="err"><?=$this->err_site_title;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Site address :</b></td>
 <td align="left" class="right">
 	<input type="text" name="site_address" class="text" value="<?=$_SESSION['site_address'];?>">
	<br><b class="err"><?=$this->err_site_address;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Admin login :</b></td>
 <td align="left" class="right">
 	<input type="text" name="admin_login" class="text" value="<?=$_SESSION['admin_login'];?>">
	<br><b class="err"><?=$this->err_admin_login;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Admin password :</b></td>
 <td align="left" class="right">
 	<input type="text" name="admin_password" class="text" value="<?=$_SESSION['admin_password'];?>">
	<br><b class="err"><?=$this->err_admin_password;?></b>
 </td>
</tr>

<?php If ( $this->suggestVer == 'full' ) { ?>
<tr>
 <td align="right" class="left"><b>Related links mode :</b></td>
 <td align="left" class="right">
  <select name="related_mode" class="select">
  	<option value="msn"<?=($_SESSION['related_mode']=='msn'?' selected':'');?>>Default</option>	
  	<option value="go"<?=($_SESSION['related_mode']=='go'?' selected':'');?>>Google</option>
	<option value="ovt"<?=($_SESSION['related_mode']=='ovt'?' selected':'');?>>Overture</option>
  </select>
 </td>
</tr>
<?php } else { ?>
<input type="hidden" name="related_mode" value="<?=$this->suggestVer;?>" />
<?php } ?>


<tr>
 <td align="right" class="left"><b>Enable related cache :</b></td>
 <td align="left" class="right"><input type="checkbox" name="related_cache"<?=($_SESSION['related_cache']===true?' checked':'');?>></td>
</tr>


<tr>
 <td align="right" class="left"><b>Enable page cache :</b></td>
 <td align="left" class="right"><input type="checkbox" name="cache_enable"<?=($_SESSION['cache_enable']===true?' checked':'');?>></td>
</tr>

<tr>
 <td align="right" class="left"><b>Cache time in seconds :</b><br>3600 is one hour, 86400 is one day</td>
 <td align="left" class="right">
 	<input type="text" name="cache_time" class="text" value="<?=$_SESSION['cache_time'];?>">
	<br><b class="err"><?=$this->err_cache_time;?></b>
 </td>
</tr>


</table>