<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">ClickBank Api settings</td></tr>

<tr>
 <td align="right" class="left"><b>Enable this module :</b></td>
 <td align="left" class="right"><input type="checkbox" name="clickbank_enable"<?=($_SESSION['clickbank_enable']===true?' checked':'');?>></td>
</tr>

<tr>
 <td align="right" class="left"><b>ClickBank affiliate id :</b></td>
 <td align="left" class="right">
 	<input type="text" name="clickbank_id" class="text" value="<?=$_SESSION['clickbank_id'];?>">
	<br><b class="err"><?=$this->err_clickbank_id;?></b>
 </td>
</tr>

<tr>
 <td colspan="2" class="left">
 	<b>Instruction :</b><br><br>
	Enter to <a href="https://login.clickbank.net/signup/?" target="_blank" class="blank">https://login.clickbank.net/signup/?</a>, and perform registration form.<br />
	For more info please go to <a href="http://www.adbie.com/faq.php" target="_blank" class="blank">Adbie Faq</a>
 </td>
</tr>

</table>