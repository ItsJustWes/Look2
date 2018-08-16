<?php

class ApiYahoo {
var $limit = 0;
var $titleDecoration=False;
var $textDecoration=False;
var $applicationId;
var $numresults = 10;
var $charset = 'iso-8859-1';

var $_baseurl = 'http://api.search.yahoo.com/WebSearchService/V1/webSearch';

 Function ApiYahoo($applicationId)
 {
 	$this->applicationId = $applicationId;
 }
 
 
 Function search($keyword)
 {
 	$tabKeyWord = Explode(' ', $keyword);
  // Creating keyword preg
	If ( Is_Array($tabKeyWord) && Count($tabKeyWord)>1 )
	{
		$pregKeyWord = Array();
		Foreach ( $tabKeyWord As $key=>$val )
		{
			If ( $val != '' ) { $pregKeyWord[] = '/('.$val.')/i'; }
		}//Foreach
	}
		else
	{
		$pregKeyWord = '/('.$keyword.')/i';
	}

 
 	$url = $this->_baseurl;
	$url .= '?appid='.$this->applicationId;
	$url .= '&query='.UrlEncode($keyword);
	$url .= '&results='.$this->numresults;

 	$tmp=parse_url($url);
 	$domain=$tmp['host'];
 	$resourcePath=str_replace('http://','',$url);
 	$resourcePath=str_replace($domain,'',$resourcePath);
  
 	$socketConnection = @fsockopen($domain, 80, $errno, $errstr, 30);
 	$responseXml = '';
 	@fputs($socketConnection, "GET $resourcePath HTTP/1.0\r\nHost: $domain\r\n\r\n");
 	while (!@feof($socketConnection)) { $responseXml .= @fgets($socketConnection, 1024); }	
 	@fclose ($socketConnection);

		// Parse XML
	$responseXml = Preg_replace('/\n/', '', $responseXml);
	$responseXml = Preg_replace('/^(.*?)<\?xm/', '<?xm', $responseXml);

	If ( !$responseDoc = domxml_open_mem($responseXml) ) { Return False; }
	
	// Parsujemy rezultat...
	$itemNodes = $responseDoc->get_elements_by_tagname('Result');
	$arrResult = Array();
	If(count($itemNodes) > 0)
	{
  		Foreach($itemNodes as $item)
		{
			$Title = $item->get_elements_by_tagname('Title');
			$Title = $Title[0]->get_content();
			
			$Description = $item->get_elements_by_tagname('Summary');
			$Description = $Description[0]->get_content();
			
			$Url = $item->get_elements_by_tagname('Url');
			$Url = $Url[0]->get_content();
			
			If ( $this->titleDecoration )
			{
			 	$Title = Preg_Replace($pregKeyWord, '<b>\\0</b>', $Title);
			}

			If ( $this->textDecoration )
			{
				$Description = Preg_Replace($pregKeyWord, '<b>\\0</b>', $Description);
			}
			
			$resItem = Array(
				'Title' => IconV('utf-8', $this->charset, $Title),
				'Description' => IconV('utf-8', $this->charset, $Description),
				'Url' => IconV('utf-8', $this->charset, $Url)
			);
			
			$arrResult[] = $resItem;
		}// Foreach
	}
	Return $arrResult;
 }
 
}// cKeyWordSuggest


Class MainSearch Extends ApiYahoo
{
	Function MainSearch($applicationId)
	{
		$this->ApiYahoo($applicationId);
	}
}
?>