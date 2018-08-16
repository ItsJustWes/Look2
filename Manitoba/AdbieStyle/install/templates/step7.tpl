<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">eBay API settings</td></tr>

<tr>
 <td align="right" class="left"><b>Enable this module :</b></td>
 <td align="left" class="right"><input type="checkbox" name="ebay_enable"<?=($_SESSION['ebay_enable']===true?' checked':'');?>></td>
</tr>

<tr>
 <td align="right" class="left"><b>eBay user id :</b></td>
 <td align="left" class="right">
 	<input type="text" name="ebay_user_id" class="text" value="<?=$_SESSION['ebay_user_id'];?>">
	<br><b class="err"><?=$this->err_ebay_user_id;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>eBay REST token :</b></td>
 <td align="left" class="right">
 	<input type="text" name="ebay_token" class="text" value="<?=$_SESSION['ebay_token'];?>">
	<br><b class="err"><?=$this->err_ebay_token;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>CJ account id :</b></td>
 <td align="left" class="right">
 	<input type="text" name="cj_account_id" class="text" value="<?=$_SESSION['cj_account_id'];?>">
	<br><b class="err"><?=$this->err_cj_account_id;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>CJ PID :</b></td>
 <td align="left" class="right">
 	<input type="text" name="cj_pid" class="text" value="<?=$_SESSION['cj_pid'];?>">
	<br><b class="err"><?=$this->err_cj_pid;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left"><b>Ebay country :</b></td>
 <td align="left" class="right">
 	<select name="ebay_country" class="select">
	<?php 
	If ( Is_Array($this->ebay_country) && Count($this->ebay_country) ) Foreach ( $this->ebay_country As $val ) { 
		echo '<option value="'.$val['code'].'"'.($_SESSION['ebay_country']==$val['code']?' selected':'').'>'.$val['name'].'</option>';
	}
	?>
  	</select>
 </td>
</tr>


<tr>
 <td colspan="2" class="left">
 	<b>Instruction :</b><br><br>
	<ol>
	 <li>First, <a href="http://cgi1.ebay.com/aw-cgi/eBayISAPI.dll?RegisterShow" target="_blank" class="blank">sign up in the eBay</a></li>
	 <li><a href="http://developer.ebay.com/join" target="_blank" class="blank">Sign up for the eBay Developers Program</a></li>
	 <li>If the sign in the eBay Developers Program, find "<a href="http://developer.ebay.com/DevZone/account/keys.asp" target="_blank" class="blank">Get Keys</a>" button.</li>
	 <li>Get Your DevId, AppId and CertId (Production mode)</li>
	 <li><a href="http://developer.ebay.com/tokentool/" target="_blank" class="blank">Generate REST Token.</a></li>
	 <li>Sign up in the <a href="http://affiliates.ebay.com/" target="_blank" class="blank">eBay affiliates program</a> - get Your PID and Account Id from CJ.</li>
	</ol>
	For more info please go to <a href="http://www.adbie.com/faq.php" target="_blank" class="blank">Adbie Faq</a>
 </td>
</tr>

</table>