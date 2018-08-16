<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">Meta settings</td></tr>

<tr>
 <td align="right" class="left" valign="top"><b>Meta Keywords :</b><br><?=htmlentities('<meta name="keywords" content="" />')?></td>
 <td align="left" class="right">
 	<textarea name="meta_keywords" class="textarea"><?=$_SESSION['meta_keywords'];?></textarea>
	<br><b class="err"><?=$this->err_meta_keywords;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left" valign="top"><b>Meta Description :</b><br><?=htmlentities('<meta name="Description" content="" />')?></td>
 <td align="left" class="right">
 	<textarea name="meta_description" class="textarea"><?=$_SESSION['meta_description'];?></textarea>
	<br><b class="err"><?=$this->err_meta_description;?></b>
 </td>
</tr>

</table>