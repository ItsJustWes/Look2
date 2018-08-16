<table cellspacing="0" cellpadding="0" style="margin-top:20px;margin-left:10px;border-right:1px solid #D9D8BE;border-bottom:1px solid #D9D8BE">
<tr><td class="rightBoxHead">Sponsored links :</td></tr>
<tr><td style="background:#F3FEFA;"><?=ADS_LEFT_BOX;?></td></tr>
<tr><td style="height:10px;background:#F3FEFA;"></td></tr>
<tr><td class="rightBoxHead">Related result :</td></tr>
<?php If ( Is_Array($this->tabSuggest) && Count($this->tabSuggest)>0 ) Foreach ( $this->tabSuggest As $val ) { echo '<tr><td class="related"><a href="'.SITE_ADRESS.$val['file'].'.html" class="related">'.$val['word'].'</a></td></tr>'; } ?>
</table>