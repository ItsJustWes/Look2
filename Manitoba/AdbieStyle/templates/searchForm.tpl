<table cellspacing="0" cellpadding="0" class="maintable" style="margin-top:20px">
<?php If ( $this->ebay_enabled || $this->amazon_enabled || $this->clickbank_enabled ) { ?>
<tr>
 <td align="center" valign="bottom">
  <table cellspacing="0" cellpadding="0"><tr>
  <td id="web_left" class="bookmarkLeft<?=( $this->searchMode=='WEB' ? 'Sel' : '');?>"></td>
  <td id="web_center" class="bookmarkCenter<?=( $this->searchMode=='WEB' ? 'Sel' : '');?>" <?=$this->web_click;?>>
	<a href="<?=$this->search_in_web;?>" class="searchin">Web pages</a>
  </td>
  <td id="web_right"  class="bookmarkRight<?=( $this->searchMode=='WEB' ? 'Sel' : '');?>"></td>	

  <td style="width:1px;"></td>	

	<?php If ( $this->ebay_enabled ) { ?>	
	<td id="ebay_left" class="bookmarkLeft<?=( $this->searchMode=='EBAY' ? 'Sel' : '');?>"></td>
	<td id="ebay_center" class="bookmarkCenter<?=( $this->searchMode=='EBAY' ? 'Sel' : '');?>" <?=$this->ebay_click;?>>
	<a href="<?=$this->search_in_auctions;?>" class="searchin">Auctions</a>
	</td>
	<td id="ebay_right" class="bookmarkRight<?=( $this->searchMode=='EBAY' ? 'Sel' : '');?>"></td>
	<?php } ?>
	
	<td style="width:1px;"></td>
	
	<?php If ( $this->amazon_enabled ) { ?>
  	<td id="amazon_left" class="bookmarkLeft<?=( $this->searchMode=='AMAZON' ? 'Sel' : '');?>"></td>
  	<td id="amazon_center" class="bookmarkCenter<?=( $this->searchMode=='AMAZON' ? 'Sel' : '');?>"<?=$this->amazon_click;?>>
	<a href="<?=$this->search_in_shopping;?>" class="searchin">Shopping</a>
  	</td>
  	<td id="amazon_right" class="bookmarkRight<?=( $this->searchMode=='AMAZON' ? 'Sel' : '');?>"></td>
	<?php } ?>
	
  	<td style="width:1px;"></td>		
	
	<?php If ( $this->clickbank_enabled ) { ?>
  	<td id="clickbank_left" class="bookmarkLeft<?=( $this->searchMode=='CLICKBANK' ? 'Sel' : '');?>"></td>
  	<td id="clickbank_center" class="bookmarkCenter<?=( $this->searchMode=='CLICKBANK' ? 'Sel' : '');?>"<?=$this->clickbank_click;?>>
	<a href="<?=$this->search_in_eproducts;?>" class="searchin">Software</a>
  	</td>
  	<td id="clickbank_right" class="bookmarkRight<?=( $this->searchMode=='CLICKBANK' ? 'Sel' : '');?>"></td>
	<?php } ?>
	
  </tr></table>
 </td>
</tr>
<?php } ?>

<tr>
<form action="search.php" method="post" enctype="multipart/form-data" target="_self">
 <td valign="top">
  <table cellspacing="0" cellpadding="0" class="searchForm">

	<tr>
	 <td align="center">
	  <input type="text" id="q" name="q" value="<?=$this->q;?>" size="68" maxlength="68" class="querytext">
	  <input type="hidden" id="mode" name="mode" value="<?=$this->searchMode;?>">	
	  <input type="submit" value="Search" class="querysubmit">
	 </td>
	</tr>
	</table> 
 </td>
	</form>
</tr>
</table>
