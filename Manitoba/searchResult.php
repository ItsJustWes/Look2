<?php
 ob_start();
 @Error_Reporting(E_ALL & ~E_NOTICE);
 Header("Content-Type: text/html; charset=utf-8");
 
 Define('CONFIG', 'config/');
 Define('LIB', 'lib/');
 Define('TPL_PATH', 'templates/');
 Define('RES_PATH', 'res/');
 Require_Once('application.inc.php');
 Require_Once(CONFIG.'main.config.php');
 Require_Once(LIB.'Savant2.php');
 Require_Once(LIB.'suggest.lib.php');
 Require_Once(LIB.'searchEngine.lib.php');
 

 $searchMode = 'WEB';
 
 $tmp = Preg_Split('/,/', $_GET['dat'], -1, PREG_SPLIT_NO_EMPTY);
 $inputData = Array();
 Foreach ( $tmp As $val )
 {
 	$val = Preg_Split('/=/', $val, -1, PREG_SPLIT_NO_EMPTY);
	If ( Count($val)==2 )
	{
		$inputData[$val[0]] = $val[1];
	}
 }

 $htmlFile = BaseName(urldecode($_GET['q']), '.html');
 $htmlFile = SearchEngine::filterKey($htmlFile);
 $htmlFile = SearchEngine::filter($htmlFile);
 If ( preg_replace('/\s/', '', $htmlFile) == '' ) { SearchEngine::redirectNow(SITE_ADRESS); }
 $orgKeywords = SearchEngine::filterHtml($htmlFile);
 
 Foreach ( $searchPrefix As $key=>$val )
 {
 	If ( preg_match('/^'.$val.'_/', $orgKeywords) )
 	{ 
 		$searchMode = $key;
 		$htmlFile = preg_replace('/^'.$val.' /', '', $htmlFile);
 	}
 }
 $tabKeyWords = Explode(' ', $htmlFile);
 
 

 $titleKeyWords = '';
 $keyWords = '';
 Foreach ( $tabKeyWords As $key=>$val ) {
    $tabKeyWords[$key] = UcFirst($val);
    $titleKeyWords .= $tabKeyWords[$key].' ';
	 $keyWords .= $val.' ';
 }
 If ( Count($tabKeyWords) > 0 ) { 
    $titleKeyWords = SubStr($titleKeyWords, 0, -1);
	 $keyWords = SubStr($keyWords, 0, -1);
 }

 $cacheFileName = 'cache/'.BaseName($_SERVER['REQUEST_URI']);
 If ( (CACHE_ENABLE == True && !$inputData['p']) || $inputData['p'] == 1 )
 {
	 If ( File_Exists($cacheFileName) && Is_readable($cacheFileName) )
	 {
	 	 $createCache = @filectime($cacheFileName);

		  If ( $createCache )
		  {
		  		If ( ($createCache+CACHE_TIME) > time() )
				{
				// Read cache
					$content = @File_get_contents($cacheFileName);
					If ( $content ) 
					{
						echo $content;
						@Include(CONFIG.'app_name.inc.php');
						exit();
					}
				}
		  }	
	 }
 }
 
 $tpl = New Savant2();
 $tpl->addPath('template', TPL_PATH);

 Switch ($searchMode) {
 
 	Case 'EBAY':
		Require_Once(LIB.'currency.lib.php');
		Require_Once(LIB.'api_ebay.lib.php');
		$ebay = New rest_eBaySearch(EBAY_USERID, EBAY_TOKEN, CJ_ACCOUNTID, CJ_PID);
		$ebay->limit = EBAY_LIMIT;
		$ebay->siteID = EBAY_SITEID;
		$ebayRes = $ebay->search($keyWords);
		If ( Is_Array($ebayRes) )
		{
		 $tpl->assign('ebayResult', $ebayRes);
		 $showPage = 'ebayResult.tpl';
		}
		 elseIf( $ebay->error != '' )
		{
		 echo $ebay->error;
		}
	Break;

	Case 'AMAZON':
		Require_Once(LIB.'api_amazon.lib.php');
		$amazon = New rest_amazonSearch(AMAZON_ACCESS_KEY, AMAZON_REF_ID);
		$amazon->limit = AMAZON_LIMIT;
		$amazon->mode = '';
		$amazon->sortType = $amazonSortModes[0]; // by rank
		$amazon->country = AMAZON_COUNTRY;
		$amazonRes = $amazon->search($keyWords);
		$tpl->assignRef('amazonRes', $amazonRes);
		$showPage = 'amazonResult.tpl';
	Break;
	
	Case 'CLICKBANK':
		Require_Once(LIB.'api_clickbank.lib.php');
		$cbank = New clickBank_search(CLICKBANK_AFFILIATE, CLICKBANK_DBPATH);
		$cbank->titleDecoration = True;
		$cbank->textDecoration = True;
	   $cbankRes = $cbank->search($keyWords);
		$tpl->assign('cbankRes', $cbankRes);
		$showPage = 'eproductsResult.tpl';
	Break;
	
 	Default: 
	// Yahoo or msn
		If ( Defined('MAIN_SEARCH_MODULE') && Defined('MAIN_SEARCH_API_KEY') && File_Exists(LIB.MAIN_SEARCH_MODULE) )
		{
		 	Require_Once(LIB.MAIN_SEARCH_MODULE);
		 	$class_vars = get_class_vars('MainSearch');
		 	If ( Array_key_exists('_soapClient', $class_vars) ) { Require_Once(LIB.'NuSOAP/nusoap.php'); }
	
		 	$search = New MainSearch(MAIN_SEARCH_API_KEY);
	
		 	$search->titleDecoration = ( Defined('MAIN_SEARCH_TITLE_DECORATION') ? MAIN_SEARCH_TITLE_BOLD : True );
		 	$search->textDecoration = ( Defined('MAIN_SEARCH_TEXT_DECORATION') ? MAIN_SEARCH_TEXT_DECORATION : True );
			$search->searchMode = ( Defined('MAIN_SEARCH_MODE') ? MAIN_SEARCH_MODE : 'API' );
			$search->itemsPerPage = ( Defined('MAIN_SEARCH_ITEMS_PAGE') ? MAIN_SEARCH_ITEMS_PAGE : -1 );
	
			If ( $search->itemsPerPage > 0 )
			{
				$pageIndex = (int)$inputData['p'];
				If ( !$pageIndex ) { $pageIndex = 1; }
				$search->pageIndex = $pageIndex-1;
				If ( $search->pageIndex < 0 ) { $search->pageIndex = 0; }
			}
				else
			{
				$search->pageIndex = 0;
			}

		 	$searchRes = $search->search($keyWords);
		 	
			$tpl->assign('pIndex', $pageIndex);
			$tpl->assign('pCount', (ceil($search->totalCount / ($search->itemsPerPage<1?1:$search->itemsPerPage))-1));
			$tpl->assign('main_search_mode', $search->searchMode);
		 	$tpl->assignRef('msnResult', $searchRes);
		}
			else
		{
	// MSN - Default
	  		Require_Once(LIB.'api_msn.lib.php');
			Require_Once(LIB.'NuSOAP/nusoap.php');
			$msn_client = New ApiMsn(MSN_APPLICATION_ID);
			$msn_client->titleDecoration = True;
			$msn_client->textDecoration = True;
			$msnRes = $msn_client->search($keyWords);
			$tpl->assignRef('msnResult', $msnRes);
		}
		$showPage = 'searchResult.tpl';
 }// Switch searchMode
 
 
 
 // Suggest links
 $suggest = New KeyWordSuggest(false);
 $suggest->textDecoration = Defined('RELATED_DECORATION') ? RELATED_DECORATION : true;
 $suggest->limit = Defined('RELATED_LIMIT') ? RELATED_LIMIT : 0;
 $suggest->cache = Defined('RELATED_CACHE') ? RELATED_CACHE : false;
 $suggest->cacheTime = Defined('RELATED_CACHE_TIME') ? RELATED_CACHE_TIME : 2592000;
 $suggest->mode = Defined('RELATED_MODE') ? RELATED_MODE : 'go';
 $filter = SearchEngine::readFilter();
 If ( is_array($filter) && count($filter) )
 {
 	$suggest->filterItems = SearchEngine::readFilter();
 	$suggest->filter = true;
 }
 If ( strtolower($suggest->mode) == 'msn' )
 {
 	If ( $searchMode != 'WEB' )
 	{
 		Require_Once(LIB.MAIN_SEARCH_MODULE);
 		Require_Once(LIB.'NuSOAP/nusoap.php');
 		$search = New MainSearch(MAIN_SEARCH_API_KEY);
	 	$search->titleDecoration = false;
	 	$search->textDecoration = false;
		$search->searchMode = 'API';
		$search->itemsPerPage = 10;
		$searchRes = $search->search($keyWords);
 	}
 	
 	$suggest->msnItems = $searchRes;
 }
 $suggest->search($keyWords);
 $tabSuggest = $suggest->items;
 
 
 
 
 // Creating keywords from related.
 $metaKeyWords = '';

 For ( $i=0; $i<=7; $i++ )
 {
   If ( $tabSuggest[$i]['word'] )
	{
		$val = preg_replace('/\s/', ' ', $tabSuggest[$i]['word']);
		$val = preg_replace('/ {2,}/', ' ', $val);
		$metaKeyWords .= ','.Strip_Tags($val);
	}
 }

 $tpl->assign('tabKeyWords', $tabKeyWords);
 $tpl->assign('titleKeyWords', $titleKeyWords);
 $tpl->assign('orgKeywords', $orgKeywords);
 $tpl->assign('metaKeyWords', $metaKeyWords);
 
 $tpl->assign('tabSuggest', $tabSuggest);
 
 $tpl->assign('searchMode', $searchMode);
 $tpl->assign('searchModeExt', $searchPrefix[$searchMode]);
 
 $tpl->assign('ebay_enabled', EBAY_ENABLED);
 $tpl->assign('amazon_enabled', AMAZON_ENABLED);
 $tpl->assign('clickbank_enabled', CLICKBANK_ENABLED);
 $tpl->assign('search_in_web', $htmlFile.'.html');
 $tpl->assign('search_in_auctions', $searchPrefix['EBAY'].'_'.$htmlFile.'.html');
 $tpl->assign('search_in_shopping', $searchPrefix['AMAZON'].'_'.$htmlFile.'.html');
 $tpl->assign('search_in_eproducts', $searchPrefix['CLICKBANK'].'_'.$htmlFile.'.html');

 $tpl->assign('web_click', '');
 $tpl->assign('ebay_click', '');
 $tpl->assign('amazon_click', '');
 $tpl->assign('clickbank_click', '');
 
 $tpl->assign('q', $keyWords);
 $content = $tpl->fetch($showPage);
 
 If ( (CACHE_ENABLE == True && !$inputData['p']) || $inputData['p'] == 1 )
 {
	 @Unlink($cacheFileName);
	 $fHandle = FOpen($cacheFileName, 'w+');

	 If ( Is_Resource($fHandle) )
	 {
	 	If ( FWrite($fHandle, $content) === FALSE ) { @Unlink($cacheFileName); }
	 }
	 FClose($fHandle);
 }
 
 $debugStr = ob_get_clean();
 If ( $_SERVER['REMOTE_ADDR'] == '000.000.000.000' )
 {
 	If ( $debugStr != '' ) { echo '<table border="1" width="100%"><tr><td>'.$debugStr.'</td></tr></table>'; }
 }
 
 checkSecurity();
 echo $content;
 echo '
 <!-- '.APPLICATION_NAME.' '.APPLICATION_VERSION.'.'.APPLICATION_SUBVERSION.' -->
 ';
?>