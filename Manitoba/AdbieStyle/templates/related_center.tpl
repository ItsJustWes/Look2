 <table cellspacing="0" cellpadding="0" style="width:100%;margin-left:20px;"><tr><td valign="top">
 <?php
  $count = Count($this->tabSuggest);
  $row_span = Round($count / 3);
  For ( $i=0; $i<=$row_span; $i++ )
  {
   echo '<div class="related"><a href="'.SITE_ADRESS.$this->tabSuggest[$i]['file'].'.html" class="related">'.$this->tabSuggest[$i]['word'].'</a></div>';
  }	
  echo '</td><td valign="top">';
  For ( $i=$row_span+1; $i<=($row_span*2); $i++ )
  {
	echo '<div class="related"><a href="'.SITE_ADRESS.$this->tabSuggest[$i]['file'].'.html" class="related">'.$this->tabSuggest[$i]['word'].'</a></div>';
  }
  echo '</td><td valign="top">';
  For ( $i=($row_span*2)+1; $i<=$count-1; $i++ )
  {
	echo '<div class="related"><a href="'.SITE_ADRESS.$this->tabSuggest[$i]['file'].'.html" class="related">'.$this->tabSuggest[$i]['word'].'</a></div>';
  }
 ?>
 </td></tr></table>
