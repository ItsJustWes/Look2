<?php Include($this->loadTemplate('sr_headerMeta.tpl')); ?>
<script type="text/javascript" language="JavaScript" src="<?=RES_PATH;?>jscript.js"></script>
</head>
<body onload="onMainPageLoad();">
<table width="100%" cellpadding=0 cellspacing=0 border=0>
<tr>
<td align="left" style="background:#000099;"><a href="/"><img src="/images/searchHeader.png"></a>
</td>
</tr></table>
<table cellspacing="0" cellpadding="0" class="maintable">
<tr>
 <td align="center"><?php Include($this->loadTemplate('searchForm.tpl')); ?></td>
</tr>

<tr>
 <td class="sr_headerText">Sponsored result for: <b><?=$this->titleKeyWords;?></b></td>
</tr>

<tr>
 <td align="left" valign="top">
  <table cellspacing="0" cellpadding="0" class="borderMiddle">
	
  <tr>
		<td valign="top" style="width:200px">
		 <?php Include($this->loadTemplate('left_box.tpl')); ?>
		</td>
		<td valign="top">
		
		<div class="msnresult"><?=ADS_SEARCH_BOX;?></div>
		<?php If ( Is_Array($this->cbankRes) && Count($this->cbankRes) ) Foreach ( $this->cbankRes As $val ) { ?>
		<div class="clickbankresult">
		<a href="<?=$val['Url'];?>" class="clickbankresult"><?=$val['Title'];?></a><br>
		<?=$val['Description'];?><br>
		<span class="clickbankresulturl"><?=$val['Url'];?></span>
		</div>
		<?php } ?>
		</td>
		
		<td valign="top" style="width:200px"><?php Include($this->loadTemplate('right_box.tpl')); ?></td>
  </tr>	
  </table>

</td>
</tr>
</table>
<?php Include($this->loadTemplate('footer.tpl')); ?>
</body></html>