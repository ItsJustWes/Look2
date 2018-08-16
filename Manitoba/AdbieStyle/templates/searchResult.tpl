<?php Include($this->loadTemplate('sr_headerMeta.tpl')); ?>
<script type="text/javascript" language="JavaScript" src="<?=RES_PATH;?>jscript.js"></script>
</head>
<body onload="onMainPageLoad();">

<table cellspacing="0" cellpadding="0" class="maintable">
<tr>
 <td align="center" style="height:80px;"><?php Include($this->loadTemplate('searchForm.tpl')); ?></td>
</tr>
<tr>
 <td class="sr_headerText">Search result for: <b><?=$this->titleKeyWords;?></b></td>
</tr>

<tr>
 <td align="left" valign="top">
 	<table cellspacing="0" cellpadding="0" style="width:100%"><tr>
		<td valign="top" style="width:200px">
		 <?php Include($this->loadTemplate('left_box.tpl')); ?>
		</td>
		<td valign="top">
		
		<div class="msnresult"><?=ADS_SEARCH_BOX;?></div>
		<?php If ( Is_Array($this->msnResult) && Count($this->msnResult)>0 ) Foreach ( $this->msnResult As $val ) { ?>
	 	<div class="msnresult"><div style="margin-bottom:5px;"><a href="<?=$val['Url'];?>" class="msneresult"><?=$val['Title'];?></a></div><div class="msnresultcnt"><?=$val['Description'];?></div><span class="msnresulturl"><?=$val['Url'];?></span></div>
		<?php } ?>

		<div class="pagination">
		<?php 
		$start = $this->pIndex - 5;
		If ( $start < 1 ) { $start = 1; }
		$end = $start + 8;
		If ( $end > $this->pCount ) { $end = $this->pCount; }

		If ( $this->pIndex>1 ) { echo '<a href="'.SITE_ADRESS.'p='.($this->pIndex-1).','.$this->orgKeywords.'.html">Previous</a>'; }
		If ( $start > 1 ) { echo ' ... '; }

		For ( $i=$start; $i<=($end+1); $i++ )
		{
			If ( $i == $this->pIndex ) { echo '<span>'.$i.'</span>'; }
				else { echo '<a href="'.SITE_ADRESS.'p='.$i.','.$this->orgKeywords.'.html">'.$i.'</a>'; }
		}

		If ( $end < $this->pCount ) { echo ' ... '; }
		If ( $this->pIndex<$this->pCount ) { echo '<a href="'.SITE_ADRESS.'p='.($this->pIndex+1).','.$this->orgKeywords.'.html">Next</a>'; }
		?>
		</div>

		</td>
		<td valign="top" style="width:200px"><?php Include($this->loadTemplate('right_box.tpl')); ?></td>
	</tr></table>
</td>
</tr>
</table>
<?php Include($this->loadTemplate('footer.tpl')); ?>
</body></html>