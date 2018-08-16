<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">MSN Search Api settings</td></tr>

<tr>
 <td align="right" class="left"><b>MSN application id :</b></td>
 <td align="left" class="right">
 	<input type="text" name="msn_application_id" class="text" value="<?=$_SESSION['msn_application_id'];?>">
	<br><b class="err"><?=$this->err_msn_application_id;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Msn language :</b></td>
 <td align="left" class="right">
  <select name="msn_lang" class="select">
  	<option value="us"<?=($_SESSION['msn_lang']=='us'?' selected':'');?>>USA</option>
	<option value="de"<?=($_SESSION['msn_lang']=='de'?' selected':'');?>>Germany</option>
	<option value="fr"<?=($_SESSION['msn_lang']=='fr'?' selected':'');?>>France</option>
	<option value="it"<?=($_SESSION['msn_lang']=='it'?' selected':'');?>>Italy</option>
	<option value="no"<?=($_SESSION['msn_lang']=='no'?' selected':'');?>>Norway</option>
	<option value="es"<?=($_SESSION['msn_lang']=='es'?' selected':'');?>>Spain</option>
	<option value="be"<?=($_SESSION['msn_lang']=='be'?' selected':'');?>>Belgium</option>
  </select>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Items on page :</b></td>
 <td align="left" class="right">
  <select name="msn_items_on_page" class="select">
  	<option value="5"<?=($_SESSION['msn_items_on_page']==5?' selected':'');?>>5</option>
	<option value="10"<?=($_SESSION['msn_items_on_page']==10?' selected':'');?>>10</option>
	<option value="15"<?=($_SESSION['msn_items_on_page']==15?' selected':'');?>>15</option>
	<option value="20"<?=($_SESSION['msn_items_on_page']==20?' selected':'');?>>20</option>
	<option value="25"<?=($_SESSION['msn_items_on_page']==25?' selected':'');?>>25</option>
	<option value="30"<?=($_SESSION['msn_items_on_page']==30?' selected':'');?>>30</option>
	<option value="35"<?=($_SESSION['msn_items_on_page']==35?' selected':'');?>>35</option>
  </select>
 </td>
</tr>

<tr>
 <td colspan="2" class="left">
 	<b>Instruction :</b><br><br>
	Enter to <a href="http://search.msn.com/developer" target="_blank" class="blank"><b>http://search.msn.com/developer</b></a>, and click on "Create and Manage Application IDs" (You must be registered user).<br />
	For more info please go to <a href="http://www.adbie.com/faq.php" target="_blank" class="blank">Adbie Faq</a>
 </td>
</tr>

</table>