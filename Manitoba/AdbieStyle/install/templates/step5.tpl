<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">Amazon Search Api settings</td></tr>

<tr>
 <td align="right" class="left"><b>Enable this module :</b></td>
 <td align="left" class="right"><input type="checkbox" name="amazon_enable"<?=($_SESSION['amazon_enable']==true?' checked':'');?>></td>
</tr>

<tr>
 <td align="right" class="left"><b>Amazon access key :</b></td>
 <td align="left" class="right">
 	<input type="text" name="amazon_access_key" class="text" value="<?=$_SESSION['amazon_access_key'];?>">
	<br><b class="err"><?=$this->err_amazon_access_key;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Amazon referer id :</b></td>
 <td align="left" class="right">
 	<input type="text" name="amazon_referer_id" class="text" value="<?=$_SESSION['amazon_referer_id'];?>">
	<br><b class="err"><?=$this->err_amazon_referer_id;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Amazon country :</b></td>
 <td align="left" class="right">
 	<select name="amazon_country" class="select">
		<option value="us"<?=($_SESSION['amazon_country']=='us'?' selected':'');?>>United States</option>
		<option value="de"<?=($_SESSION['amazon_country']=='de'?' selected':'');?>>Austria</option>
		<option value="fr"<?=($_SESSION['amazon_country']=='fr'?' selected':'');?>>France</option>
		<option value="ca"<?=($_SESSION['amazon_country']=='ca'?' selected':'');?>>Canada</option>
		<option value="de"<?=($_SESSION['amazon_country']=='de'?' selected':'');?>>Germany</option>
		<option value="uk"<?=($_SESSION['amazon_country']=='uk'?' selected':'');?>>United Kingdom</option>
  	</select>
 </td>
</tr>

<tr>
 <td colspan="2" class="left">
 	<b>Instruction :</b><br><br>
	Enter to <a href="http://associates.amazon.com/gp/associates/join/" target="_blank" class="blank">http://associates.amazon.com/gp/associates/join/</a>, and click "Join now".<br />
	For more info please go to <a href="http://www.adbie.com/faq.php" target="_blank" class="blank">Adbie Faq</a>
 </td>
</tr>

</table>