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
  <a href="http://www.anrdoezrs.net/click-<?=CJ_PID;?>-5463217?loc=http%3A//search.ebay.com/search/search.dll%3Ffsop%3D1%26fsoo%3D1%26keyword%3Don%26from%3DR34%26strKw%3D+<?=urlEncode($this->titleKeyWords);?>%26siteid%3D0%26satitle%3D<?=urlEncode($this->titleKeyWords);?>%26sacat%3D-1%2526catref%253DC6" class="searchin">See all result >></a>
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
		<?php If ( Is_Array($this->ebayResult) && Count($this->ebayResult)>0 ) Foreach ( $this->ebayResult As $val ) { ?>
		
		<div class="ebayresult">
		 <a href="<?=$val['link'];?>" class="ebayeresult"><?=$val['title'];?></a>
		 <br>
		 
		 <table style="width:100%;"><tr>
		 <td width="100">
		  <img src="<?=($val['image']?$val['image']:RES_PATH.'images/no_image.jpg');?>" alt="No image">
		 </td>
		 <td>
		  Price: <b><?=$val['currency'].' '.$val['price'];?></b><br>
		  Date to end: <?=$val['endTime'];?><br>
		  <?php If ( !Empty($val['buynow']) ) { echo 'Buy it now: <b>'.$val['buynow'].'</b><br>'; } ?>
		 </td></tr></table>
		</div>
		
		<?php } ?>
		 <div class="allResults">
		  <a href="http://www.anrdoezrs.net/click-<?=CJ_PID;?>-5463217?loc=http%3A//search.ebay.com/search/search.dll%3Ffsop%3D1%26fsoo%3D1%26keyword%3Don%26from%3DR34%26strKw%3D+<?=urlEncode($this->titleKeyWords);?>%26siteid%3D0%26satitle%3D<?=urlEncode($this->titleKeyWords);?>%26sacat%3D-1%2526catref%253DC6" class="amazonresult">See all results >></a>
		 </div>
		</td>
		<td valign="top" style="width:200px"><?php Include($this->loadTemplate('right_box.tpl')); ?></td>
	</tr></table>
</td>
</tr>
</table>
<?php Include($this->loadTemplate('footer.tpl')); ?>
</body></html>