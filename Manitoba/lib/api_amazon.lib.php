<?php

$amazonTabModes = array (
	'baby' => 'Baby',
	'books' => 'Books',
	'classical' => 'Classical Music',
	'dvd' => 'DVD',
	'electronics' => 'Electronics',
	'garden' => 'Garden',
	'kitchen' => 'Kitchen & Housewares',
	'magazines' => 'Magazines',
	'music' => 'Music',
	'pc-hardware' => 'Computers',
	'photo' => 'Camera & Photo',
	'software' => 'Software',
	'toys' => 'Toys & Games',
	'universal' => 'Universal',
	'vhs' => 'Video',
	'videogames' => 'Video Games'
);

$amazonSortModes = array (
	0 => '+salesrank',
	1 => '+titlerank',
	2 => '-titlerank',
);


class rest_amazonSearch {

var $coutries = Array(
	'us'=>'http://webservices.amazon.com/onca/xml',		// United states
	'de'=>'http://webservices.amazon.de/onca/xml',		// austra
	'fr'=>'http://webservices.amazon.fr/onca/xml',		// france
	'ca'=>'http://webservices.amazon.ca/onca/xml',		// canada
	'de'=>'http://webservices.amazon.de/onca/xml',		// germany
	'uk'=>'http://webservices.amazon.co.uk/onca/xml'	// united kingdom
);
	
var $mode = '';
var $sortType = '+salesrank';
var $_timeout = 30;
var $_refId = '';
var $_accessKey = '';
var $country = 'us';
var $limit = 15;
var $_baseurl = 'http://webservices.amazon.com/onca/xml';

 Function rest_amazonSearch($accessKey, $refId)
 {
  $this->_accessKey = $accessKey;
  $this->_refId = $refId;
 }
 
 Function search($wordKey)
 {
 	$this->_baseurl = $this->coutries[$this->country];
	$url = $this->_baseurl;
	$url .= '?Service=AWSECommerceService';
	$url .= '&AWSAccessKeyId='.AMAZON_ACCESS_KEY;
	$url .= '&Operation=ItemSearch';
	$url .= '&SearchIndex=Blended';
	$url .= '&Keywords='.UrlEncode($wordKey);
	$url .= '&AssociateTag='.AMAZON_REF_ID;
	$url .= '&ResponseGroup=SalesRank,Request,Medium,Images';
	$url .= '&sort=salesrank';
	$url .= '&ItemPage=10';
	
  $tmp=parse_url($url);
  $domain=$tmp['host'];
  $resourcePath=str_replace('http://','',$url);
  $resourcePath=str_replace($domain,'',$resourcePath);

  $socketConnection = @fsockopen($domain, 80, $errno, $errstr, $this->_timeout);
  If ( !is_resource($socketConnection) ) { Return False; }
	
	@fputs($socketConnection, "GET $resourcePath HTTP/1.0\r\nHost: $domain\r\n\r\n");
	
	// Dla windows
	If ( Function_Exists('socket_set_timeout') ) { @socket_set_timeout($socketConnection, $this->_timeout); }
	socket_set_blocking($socketConnection, true);
	
	$xmlRes = '';
	While (!@feof($socketConnection))
	{
		$xmlRes .= @fgets($socketConnection , 1024);
	}
  
  @fclose ($socketConnection);
  
//  var_dump(htmlentities($xmlRes));
	
  // Parse XML
  $xmlRes = Preg_replace('/\n/', '', $xmlRes);	
  $xmlRes = Preg_replace('/^(.*?)<\?xm/', '<?xm', $xmlRes);

  $responseDoc = domxml_open_mem($xmlRes);
  $productInfo = $responseDoc->child_nodes();

	$itemNodes = $responseDoc->get_elements_by_tagname('Item');
	$index = -1;
	Foreach($itemNodes as $item)
  	{
		$index++;
		$title = $item->get_elements_by_tagname('Title');
		$link = $item->get_elements_by_tagname('DetailPageURL');
		$ourPrice = $item->get_elements_by_tagname('FormattedPrice');
		$image = $item->get_elements_by_tagname('SmallImage');
		If ( $image )
		{
			$urlImage = $image[0]->get_elements_by_tagname('URL');
			$urlImage = (method_exists($urlImage[0], 'get_content')?$urlImage[0]->get_content():'');
		}
		
		$arrResult[] = Array(
		'title' => $title[0]->get_content(),
		'link' => $link[0]->get_content(),
		'ourPrice' => (method_exists($ourPrice[0], 'get_content')?$ourPrice[0]->get_content():''),
  		'imgSmall' => $urlImage
		);
		If ( $index >= $this->limit ) { Break; }
	}
  Return $arrResult;
 }
}// rest_amazonSearch

?>