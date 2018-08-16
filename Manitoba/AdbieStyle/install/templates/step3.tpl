<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">
General ADS Settings<br><br>
</td></tr>

<tr>
 <td align="right" class="left" valign="top">
 	<b>ADS left box :</b><br>Paste code from Your ads system, for left box.<br>
	For main template we advice box style (using Google Ads):<br>
	<table cellspacing="0" cellpadding="0"><tr><td align="left">
	<ul>
	 <li>google_ad_width = 160;</li>
	 <li>google_ad_height = 90;</li>
	 <li>google_ad_format = "160x90_0ads_al_s";</li>
	 <li style="background:#F3FEFA">google_color_border = "F3FEFA";</li>
	 <li style="background:#F3FEFA">google_color_bg = "F3FEFA";</li>
	 <li style="color:#006BBC">google_color_link = "006BBC";</li>
	 <li style="color:#006BBC">google_color_url = "006BBC";</li>
	 <li>google_color_text = "000000";</li>
	</ul>
	</td></tr></table>
 </td>
 <td align="left" class="right">
 	<textarea name="ads_left" class="textarea"><?=stripslashes($_SESSION['ads_left']);?></textarea>
	<br><b class="err"><?=$this->err_ads_left;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left" valign="top">
  <b>ADS center box :</b><br>Paste code from Your ads system, for center box.<br>
	For main template we advice box style (using Google Ads):<br>
	<table cellspacing="0" cellpadding="0"><tr><td align="left">
	<ul>
	 <li>google_ad_width = 250;</li>
	 <li>google_ad_height = 250;</li>
	 <li>google_ad_format = "250x250_as";</li>
	 <li>google_color_border = "ffffff";</li>
	 <li>google_color_bg = "ffffff";</li>
	 <li style="color:#006BBC">google_color_link = "006BBC";</li>
	 <li style="color:#006BBC">google_color_url = "006BBC";</li>
	 <li>google_color_text = "000000";</li>
	</ul>
	</td></tr></table>
 </td>
 <td align="left" class="right">
 	<textarea name="ads_center" class="textarea"><?=stripslashes($_SESSION['ads_center']);?></textarea>
	<br><b class="err"><?=$this->err_ads_center;?></b>
 </td>
</tr>

<tr>
 <td align="right" class="left" valign="top">
  <b>ADS right box :</b><br>Paste code from Your ads system, for right box.<br>
	For main template we advice box style (using Google Ads):<br>
	<table cellspacing="0" cellpadding="0"><tr><td align="left">
	<ul>
	 <li>google_ad_width = 160;</li>
	 <li>google_ad_height = 600;</li>
	 <li>google_ad_format = "160x600_as";</li>
	 <li style="background:#F3FEFA">google_color_border = "F3FEFA";</li>
	 <li style="background:#F3FEFA">google_color_bg = "F3FEFA";</li>
	 <li style="color:#006BBC">google_color_link = "006BBC";</li>
	 <li style="color:#006BBC">google_color_url = "006BBC";</li>
	 <li>google_color_text = "000000";</li>
	</ul>
	</td></tr></table>
 </td>
 <td align="left" class="right">
 	<textarea name="ads_right" class="textarea"><?=stripslashes($_SESSION['ads_right']);?></textarea>
	<br><b class="err"><?=$this->err_ads_right;?></b>
 </td>
</tr>

<tr>
 <td colspan="2" align="left" class="left" valign="top"><b>Example for left "Google ADS" left box:</b><br>
 <?=HtmlEntities('<script type="text/javascript"><!--
 google_ad_client = "pub-').'<b style="color:red">YOUR PUB NUMBER</b>'.HtmlEntities('";
 google_ad_width = 160;
 google_ad_height = 90;
 google_ad_format = "160x90_0ads_al_s";
 google_ad_type = "";
 google_ad_channel = "";
 google_color_border = "ffffff";
 google_color_bg = "ffffff";
 google_color_link = "0000ff";
 google_color_url = "008000";
 google_color_text = "000000";
 //--></script>
 <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>');?>
 </td>
</tr>

</table>