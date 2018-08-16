<?php Include($this->loadTemplate('sr_headerMeta.tpl.php')); ?>
<script type="text/javascript" language="JavaScript" src="<?=TPL_PATH;?>jscript.js"></script>
</head>
<body onload="onPageLoad();">

<table cellspacing="0" cellpadding="0" class="maintable">
<tr>
 <td align="center" style="height:80px;"><?php Include($this->loadTemplate('searchForm.tpl.php')); ?></td>
</tr>
<tr>
 <td align="center" valign="top">
  <table cellspacing="0" cellpadding="0" style="width:800px;">
  <tr>
   <td></td>	
   <td style="font-family:Arial;font-size:15px;font-weight:bold;padding:5px;"><?=$this->titleKeyWords;?> - Search result</td>	
   <td></td>	
  </tr>	
  <tr>
	<td style="width:160px;" valign="top" align="left"><?=ADS_LEFT_BOX;?><br><br>
Related results<br>
<?php If ( Is_Array($this->tabSuggest) && Count($this->tabSuggest)>0 ) Foreach ( $this->tabSuggest As $val ) { echo '<div class="related"><a href="'.SITE_ADRESS.($this->searchModeExt?$this->searchModeExt.'_':'').$val['file'].'.html" class="related">'.$val['word'].'</a></div>'; } ?>
</td>
	

<td valign="top" align="left">
<?=ADS_SEARCH_BOX;?>
<br>
<?php If ( Is_Array($this->amazonRes) && Count($this->amazonRes)>0 ) Foreach ( $this->amazonRes As $val ) { ?>

<div class="result">

<a href="<?=$val['link'];?>" class="resultheader"><?=$val['title'];?></a><br>

<table style="width:100%;"><tr>
<td align="center" class="resultImg">
 <img src="<?=($val['imgSmall']?$val['imgSmall']:TPL_PATH.'images/no_image.jpg');?>" alt="">
</td>

<td class="resultContent">
Our price: <b><?=$val['ourPrice'];?></b><br>
<?=$val['availability'];?><br>
<a href="<?=$val['link'];?>"><img src="<?=TPL_PATH;?>images/buy_amazon.gif" alt="<?=TPL_PATH;?>images/buy_amazon.jpg"></a>
</td>
</tr></table>

</div>

<?php } ?>


	</td>
	
<td style="width:160px;" valign="top" align="left">Sponsored links: <?=ADS_RIGHT_BOX;?></td>
  </tr></table>
 </td>
</tr>
</table>
<?php Include($this->loadTemplate('footer.tpl.php')); ?>
</body></html>