<?php

class rest_eBaySearch {

var $userId = '';
var $restToken = '';
var $cj_accountId = '';
var $cj_pid = '';
var $limit = 17;

var $siteID = '212'; // 0 - United states
var $_baseurl = 'http://rest.api.ebay.com/';
var $error='';

var $country = Array(
0=>Array('code'=>0, 'name'=>'United States', 'cur'=>'USD'),
3=>Array('code'=>3, 'name'=>'United Kingdom', 'cur'=>'GBP'),
15=>Array('code'=>15, 'name'=>'Australia', 'cur'=>'AUD'),
16=>Array('code'=>16, 'name'=>'Austria', 'cur'=>'EUR'),
123=>Array('code'=>123, 'name'=>'Belgium (Deutch)', 'cur'=>'EUR'),
23=>Array('code'=>23, 'name'=>'Belgium (French)', 'cur'=>'EUR'),
2=>Array('code'=>2, 'name'=>'Canada', 'cur'=>'CAD'),
223=>Array('code'=>223, 'name'=>'China', 'cur'=>'RMB'),
71=>Array('code'=>71, 'name'=>'France', 'cur'=>'EUR'),
77=>Array('code'=>77, 'name'=>'Germany', 'cur'=>'EUR'),
201=>Array('code'=>201, 'name'=>'Hong Kong', 'cur'=>'HKD'),
205=>Array('code'=>205, 'name'=>'Ireland', 'cur'=>'EUR'),
203=>Array('code'=>203, 'name'=>'India', 'cur'=>'INR'),
101=>Array('code'=>101, 'name'=>'Italy', 'cur'=>'EUR'),
146=>Array('code'=>146, 'name'=>'Netherlands', 'cur'=>'EUR'),
211=>Array('code'=>211, 'name'=>'Philippines', 'cur'=>''),
212=>Array('code'=>212, 'name'=>'Poland', 'cur'=>'PLN'),
216=>Array('code'=>216, 'name'=>'Singapore', 'cur'=>'SGD'),
218=>Array('code'=>218, 'name'=>'Sweden', 'cur'=>'SEK'),
186=>Array('code'=>186, 'name'=>'Spain', 'cur'=>'EUR'),
193=>Array('code'=>193, 'name'=>'Switzerland', 'cur'=>'CHF'),
196=>Array('code'=>196, 'name'=>'Taiwan', 'cur'=>'NTD')
);

 Function rest_eBaySearch($userId, $restToken, $cj_accountId, $cj_pid)
 {
  $this->userId = $userId;
  $this->restToken = $restToken;
  $this->cj_accountId = $cj_accountId;	
  $this->cj_pid = $cj_pid;
 }

 
 Function search($keyWord)
 {
 	$currency = New Currency();
	
	$url = $this->_baseurl.'restapi?CallName=GetSearchResults';
	$url .= '&RequestToken='.$this->restToken;
	$url .= '&RequestUserId='.$this->userId;
	$url .= '&SiteId='.$this->siteID;
	$url .= '&Currency=0';
	$url .= '&ErrorLevel=1';
	$url .= '&DetailLevel=3';
	$url .= '&MaxResults='.$this->limit;
	$url .= '&Query='.UrlEncode($keyWord);
	$url .= '&Schema=1';
	
	// Affiliate, set to CJ
	$url .= '&TrackingProvider=1';
	$url .= '&TrackingId='.$this->cj_pid;
	$url .= '&CJSID='.$this->cj_accountId;
	
	$tmp=parse_url($url);
	$domain=$tmp['host'];
	$resourcePath=str_replace('http://','',$url);
	$resourcePath=str_replace($domain,'',$resourcePath);

	$socketConnection = @fsockopen($domain, 80, $errno, $errstr, 30);
	$responseXml = '';
	@fputs($socketConnection, "GET $resourcePath HTTP/1.0\r\nHost: $domain\r\n\r\n");
	while ( !@feof($socketConnection) ) { $responseXml .= @fgets($socketConnection, 1024); }	
	@fclose ($socketConnection);
	
	//echo htmlentities($responseXml);

	// Parse XML
	$responseXml = Preg_replace('/\n/', '', $responseXml);
	$responseXml = Preg_replace('/^(.*?)<\?xm/', '<?xm', $responseXml);

	If ( !$responseDoc = domxml_open_mem($responseXml) ) { Return False; }	
	$tabRequestError = $responseDoc->get_elements_by_tagname('Errors');
	
	// Parsujemy rezultat...
	$itemNodes = $responseDoc->get_elements_by_tagname('Item');
	$arrResult = Array();
	If(count($itemNodes) > 0)
	{
  		$index=0;
  		Foreach($itemNodes as $item)
		{
			$title = $item->get_elements_by_tagname('Title');
			$startTime = $item->get_elements_by_tagname('StartTime');
			$endTime = $item->get_elements_by_tagname('EndTime');
			$endTime = Strip_Tags($endTime[0]->get_content());
			$tabTime = Explode('T', $endTime);
			$tabTime[1] = Str_Replace('.000Z', '', $tabTime[1]);
			$date = Explode('-', $tabTime[0]);
			$time = Explode(':', $tabTime[1]);
			$endTime = date("d-M-y H:i:s", mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0])).' PDT';
			
			$price = $item->get_elements_by_tagname('CurrentPrice');
			$price = Strip_Tags($price[0]->get_content());
			$price = $currency->convert($price, CUR_US);
			
			$link = $item->get_elements_by_tagname('ViewItemURL');
			$image = $item->get_elements_by_tagname('GalleryURL');
			
			$buyNow = $item->get_elements_by_tagname('BuyItNowPrice');
			If ( Is_Object($buyNow[0]) )
			{
				$buyNow = $buyNow[0]->get_content();
				$buyNow = Strip_Tags($buyNow);
				$buyNow = $currency->convert($buyNow, CUR_US);
			}
			
 		    $index++;
 		    $resItem = Array(
  			  'title' => Strip_Tags($title[0]->get_content()),
			  'price' => $price,
			  'currency' => $this->country[$this->siteID]['cur'],
			  'endTime' => $endTime,
			  'link' => Strip_Tags($link[0]->get_content()),
			  'image' => ( Is_Object($image[0]) ? $image[0]->get_content() : '' ),
			  'buynow' => $buyNow
			 );
			 $arrResult[] = $resItem;
		}
	}
	
	Return $arrResult;
 }// search
 
}// class rest_eBaySearch

?>