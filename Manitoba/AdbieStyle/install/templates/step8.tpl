<table cellspacing="0" cellpadding="0" style="width:100%;margin-top:10px;">

<tr><td colspan="2" align="center" class="center">Filter settings</td></tr>

<tr>
	<td colspan="2" class="left">
		<b>Filter words</b> (only single words):
	</td>
</tr>

<tr>
	<td colspan="2" align="center">
		<textarea name="filter_words" class="textarea" style="font-family:verdana; width:80%; margin-top:10px;"><?php
		If ( Is_Array($this->filterData) && Count($this->filterData) ) Foreach ( $this->filterData As $val ) {
			echo $val."\n";
		}
		?></textarea>
	</td>
</tr>

</table>