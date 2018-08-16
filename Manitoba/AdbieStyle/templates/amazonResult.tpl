<?php Include($this->loadTemplate('sr_headerMeta.tpl')); ?>
<script type="text/javascript" language="JavaScript" src="<?=RES_PATH;?>jscript.js"></script>
</head>
<body onload="onMainPageLoad();">

<table cellspacing="0" cellpadding="0" class="maintable">
<tr>
 <td align="center" style="height:80px;" colspan="2"><?php Include($this->loadTemplate('searchForm.tpl')); ?></td>
</tr>
<tr>
 <td class="sr_headerText">Search result for: <b><?=$this->titleKeyWords;?></b></td>
 <td class="sr_headerText" align="right">
  <a href="http://www.amazon.com/s/ref=<?=AMAZON_REF_ID;?>/102-8677656-3600943?platform=gurupa&url=index%3Dblended&keywords=<?=urlEncode($this->titleKeyWords);?>&Go.x=0&Go.y=0&Go=Go" class="searchin">See all results >></a>
 </td>

</tr>

<tr>
 <td align="left" valign="top" colspan="2">
  <table cellspacing="0" cellpadding="0" style="width:100%"><tr>
	<td valign="top" style="width:200px">
	 <?php Include($this->loadTemplate('left_box.tpl')); ?>
	</td>
	<td valign="top">
	<div class="msnresult"><?=ADS_SEARCH_BOX;?></div>
	<?php If ( Is_Array($this->amazonRes) && Count($this->amazonRes)>0 ) Foreach ( $this->amazonRes As $val ) { ?>
	<div class="amazonresult">
	<a href="<?=$val['link'];?>" class="amazonresult"><?=$val['title'];?></a><br>
	 <table style="width:100%;"><tr>
	  <td align="center" class="amazonImg">
	   <img src="<?=($val['imgSmall']?$val['imgSmall']:RES_PATH.'images/no_image.jpg');?>" alt="<?=($val['imgSmall']?$val['imgSmall']:RES_PATH.'images/no_image.jpg');?>">
	  </td>

	  <td class="amazonContent">
		Our price: <b><?=$val['ourPrice'];?></b><br>
		<?=$val['availability'];?><br>
		<a href="<?=$val['link'];?>"><img src="<?=RES_PATH;?>images/buy_amazon.gif" alt="<?=RES_PATH;?>images/buy_amazon.jpg"></a>
	  </td>
	 </tr></table>
	</div>
<?php } ?>
	 <div class="allResults">
	 	<a href="http://www.amazon.com/s/ref=<?=AMAZON_REF_ID;?>/102-8677656-3600943?platform=gurupa&url=index%3Dblended&keywords=<?=urlEncode($this->titleKeyWords);?>&Go.x=0&Go.y=0&Go=Go" class="amazonresult">See all results >></a>
	 </div>
	</td>
	<td valign="top" style="width:200px"><?php Include($this->loadTemplate('right_box.tpl')); ?></td>
  </tr></table>
 </td>
</tr>
</table>
<?php Include($this->loadTemplate('footer.tpl')); ?>
</body></html>