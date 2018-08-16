<?php

Class clickBank_search {

var $_dbPath = '';
var $_affiliate = '';
var $titleDecoration=False;
var $textDecoration=False;


 Function clickBank_search($affiliate, $dbPath)
 {
  $this->_affiliate = $affiliate;
  $this->_dbPath = $dbPath;
 }// clickBank_search
 
 
 Function search($wordKey)
 {
 	$wordKey = StrToLower($wordKey);
 	$tabWordKeys = preg_split('/\s/', $wordKey, -1, PREG_SPLIT_NO_EMPTY);
	
	Foreach ( $tabWordKeys As $key=>$val )
	{
		If ( $val != '' ) { $pregKeyWord[] = '/('.$val.')/i'; }
	}//Foreach
	
 	If ( !$dom = domxml_open_file($this->_dbPath) ) { Return False; }
 	$itemNodes = $dom->get_elements_by_tagname('Site');
 	$index = 0;	
 	Foreach ( $itemNodes As $item )
 	{
  		$title = $item->get_elements_by_tagname('Title');
		$title = (method_exists($title[0], 'get_content')?$title[0]->get_content():'');
		If ( Count($arrResult)>0 ) Foreach ( $arrResult As $uniqueKey=>$uniqueItem )
		{
			If ( $uniqueItem['Title'] == $title ) 
			{
 			 $rank = $item->get_elements_by_tagname('PopularityRank');
			 $rank = $rank[0]->get_content();
			 If ( $rank > $arrResult[$uniqueKey]['Rank'] ) { $arrResult[$uniqueKey]['Rank'] = $rank; }
			 Continue(2);
			}
		}

		$description = $item->get_elements_by_tagname('Description');
		$description = (method_exists($description[0], 'get_content')?$description[0]->get_content():'');
		
		$searchText = StrToLower($title.' '.$description);
		If ( Count($tabWordKeys) > 1 )
		{
		 Foreach ( $tabWordKeys As $word )
		 {
		     $findResult = Preg_Match('/'.$word.'/', $searchText);
		 }
		}
		 else 
		{
 		     $findResult = Preg_Match('/'.$wordKey.'/', $searchText);
		}

		
		If ( $findResult == False ) { Continue; }
		
		$id = $item->get_elements_by_tagname('Id');
	   $tmp = $item->get_elements_by_tagname('PercentPerSale');
		$rank = $item->get_elements_by_tagname('PopularityRank');
		
		$title = htmlspecialchars(strip_tags($title),ENT_QUOTES);
		If ( $this->titleDecoration )
		{
		 	$title = Preg_Replace($pregKeyWord, '<b>\\0</b>', $title);
		}

		$description = htmlspecialchars(strip_tags($description),ENT_QUOTES);
		If ( $this->textDecoration )
		{
			$description = Preg_Replace($pregKeyWord, '<b>\\0</b>', $description);
 		}
		
		$arrResult[] = Array(
		'Title' => $title,
		'Description' => $description,
		'Id' => $id[0]->get_content(),
		'Rank' => $rank[0]->get_content(),
		'Url' => 'http://'.$this->_affiliate.'.'.$id[0]->get_content().'.hop.clickbank.net',
		
		'tmp' => (method_exists($tmp[0], 'get_content')?$tmp[0]->get_content():'')
		);
		
		$index++;
		If ( $index >= 10 ) { Break; }
		
  }

/* 
Popularity - Gravity - $ Earned/Sale - % Earned/Sale - % Referred - Commission % Definitions

<Gravity>402.03</Gravity>
<EarnedPerSale>29.62</EarnedPerSale>
<PercentPerSale>75.0</PercentPerSale>
<Referred>80.0</Referred>
<Commission>75.0</Commission>
*/
  
  //Sort array by rank.
  If ( Count($arrResult) )
  {
  	Foreach ( $arrResult As $key=>$val ) { $arrRank[$key] = $val['Rank']; }
  	array_multisort($arrRank, SORT_ASC, SORT_NUMERIC , $arrResult);
  }	
  Return $arrResult;
 }
 
}// Class clickBank_search

?>