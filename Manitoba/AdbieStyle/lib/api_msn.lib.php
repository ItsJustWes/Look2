<?php

Class ApiMsn {
	var $titleDecoration=False;
	var $textDecoration=False;
	var $searchMode = 'API';
	var $cultureIndex = 'us';
	
	var $itemsPerPage = -1;
	var $pageIndex = -1;
	var $totalCount = 0;

	// Fields for MSN API
	var $_licenseKey = '';
	var $_baseurl = 'http://soap.search.msn.com/webservices.asmx';

	var $_soapClient = NULL;
	var $_cultureInfoApi = array(
		'us' => Array('name'=>'en-US', 'charset'=>'ISO-8859-1'),
		'de' => Array('name'=>'de-DE'),
		'fr' => Array('name'=>'fr-FR'),
		'it' => Array('name'=>'it-IT'),
		'no' => Array('name'=>'nb-NO'),
		'es' => Array('name'=>'es-ES'),
		'be' => Array('name'=>'nl-BE'),
	);
	
	// Fields for MSN RSS
	var $_rssUrl = '';
	var $_cultureRssUrl = array(
		'us' => 'http://beta.search.msn.com/',
		'de' => 'http://beta.search.msn.de/',
		'fr' => 'http://beta.search.msn.fr/',
		'it' => 'http://beta.search.msn.it/',
		'no' => 'http://beta.search.msn.no/',
		'es' => 'http://beta.search.msn.es/',
		'be' => 'http://beta.search.msn.be/',
	);
 	var $_xml = null;
	var $_rootDoc = null;


	
	
	Function ApiMsn($licenseKey)
 	{
  		$this->_licenseKey = $licenseKey;
  		$this->_soapClient = New soapclient($this->_baseurl);
 	}

	
	function _getRssFromDom($keyWord)
	{
 		$tabKeyWord = Explode(' ', $keyWord);
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
			$pregKeyWord = '/('.$keyWord.')/i';
		}


		$domElement = $this->_rootDoc;
		If ( $domElement )
		{
			$result = Array();
			$items = $domElement->get_elements_by_tagname('item');

			foreach ( $items As $key=>$val )
			{
				$tmpItem = array();

				$domTitle = @$val->get_elements_by_tagname('title');
				$domTitle = $domTitle[0];
				If ( $domTitle ) 
				{ 
					$tmpItem['Title'] = strip_tags($domTitle->get_content());
					$tmpItem['cleanTitle'] = $tmpItem['Title'];
				}

				$domLink = @$val->get_elements_by_tagname('link');
				$domLink = $domLink[0];
				If ( $domLink ) { $tmpItem['Url'] = strip_tags($domLink->get_content()); }

				$domDescription = @$val->get_elements_by_tagname('description');
				$domDescription = $domDescription[0];
				If ( $domDescription ) { $tmpItem['Description'] = strip_tags($domDescription->get_content()); }
				
				If ( $this->titleDecoration )
				{
				 	$tmpItem['Title'] = Preg_Replace($pregKeyWord, '<b>\\0</b>', $tmpItem['Title']);
				}

				If ( $this->textDecoration )
				{
					$tmpItem['Description'] = Preg_Replace($pregKeyWord, '<b>\\0</b>', $tmpItem['Description']);
				}

				
				If ( $tmpItem['Title'] && $tmpItem['Description'] ) { $result[] = $tmpItem; }
			}
		}
		return $result;
	}

	
 	
	
 	Function _setParams($keyWord)
	{
		$pIndex = $this->itemsPerPage > 0 && $this->pageIndex > 0 ? ($this->pageIndex * $this->itemsPerPage ) : 0;
  		$params = array(
  		// Details for all of these can be found in the developer's kit,
  		// in the help file.
			'AppID' => $this->_licenseKey,
			'Query' => $keyWord,
			'CultureInfo' => $this->_cultureInfoApi[$this->cultureIndex]['name'],
			'SafeSearch' => 'Off',
			'Requests' => array (
				'SourceRequest' => array (
				'Source' => 'Web',
				'Offset' => $pIndex,
				'Count' => ( $this->itemsPerPage < 1 ? 20 : $this->itemsPerPage ),
				'ResultFields' => 'All'
				)
			)
  		);
  		
  		return $params;
 	}

 	Function _soapSearch($keyWord)
 	{
 		$tabKeyWord = Explode(' ', $keyWord);
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
			$pregKeyWord = '/('.$keyWord.')/i';
		}

 		$result = $this->_soapClient->call("Search", array("Request"=>$this->_setParams($keyWord)));
 		$this->totalCount = $result['Responses']['SourceResponse']['Total'];
 		
		$result = $result['Responses']['SourceResponse']['Results']['Result'];
		$charset = $this->_cultureInfoApi[$this->cultureIndex]['charset'];
		
		If ( Is_Array($result) && Count($result)>0 )
		{
			Foreach ( $result As $key=>$val )
			{
				$result[$key]['Title'] = htmlspecialchars(strip_tags($val['Title']), ENT_QUOTES);
				$result[$key]['cleanTitle'] = $result[$key]['Title'];
				If ( $this->titleDecoration )
				{
				 	$result[$key]['Title'] = Preg_Replace($pregKeyWord, '<b>\\0</b>', $result[$key]['Title']);
				}

				$result[$key]['Description'] = htmlspecialchars(strip_tags($val['Description']),ENT_QUOTES);
				$result[$key]['cleanDesc'] = $result[$key]['Description'];
				
				If ( $this->textDecoration )
				{
					$result[$key]['Description'] = Preg_Replace($pregKeyWord, '<b>\\0</b>', $result[$key]['Description']);
				}
			
				$result[$key]['Url'] = htmlspecialchars(strip_tags($val['Url']),ENT_QUOTES);
				
				If ( $charset )
				{
					$result[$key]['Title'] = iconv($charset, 'utf-8', $result[$key]['Title']);
					$result[$key]['cleanTitle'] = iconv($charset, 'utf-8', $result[$key]['cleanTitle']);
					$result[$key]['cleanDesc'] = iconv($charset, 'utf-8', $result[$key]['cleanDesc']);
					$result[$key]['Description'] = iconv($charset, 'utf-8', $result[$key]['Description']);
				}
			}
		}
		return $result;
 	}// soapSearch

 	
 	
 	Function _rssSearch($keyWord)
 	{
 		$url = $this->_cultureRssUrl[$this->cultureIndex];
 		$url .= 'results.aspx?q='.urlencode($keyWord).'&format=rss';
 		$url .= ( $this->itemsPerPage > -1 ? '&count='.$this->itemsPerPage : '' );
 		$url .= ( $this->pageIndex > -1 ? '&first='.$this->pageIndex : '' );
 		
		If ( !$this->_xml = domxml_open_file($url) ) { return false; }
		$this->_rootDoc = $this->_xml->document_element();
		$result = $this->_getRssFromDom($keyWord);
		Return $result;
 	}
 	
 	
 	
 	Function search($keyWord)
 	{
		If ( strtolower($this->searchMode) == 'rss' ) { return $this->_rssSearch($keyWord); }
			else { return $this->_soapSearch($keyWord); }
		
  		Return false;
	 }
 
}// ApiMsn




Class MainSearch Extends ApiMsn {
	Function MainSearch($applicationId)
	{
		$this->ApiMsn($applicationId);
	}
}



?>