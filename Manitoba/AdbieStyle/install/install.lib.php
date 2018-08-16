<?php

Function getConfigContent(&$data)
{
 	$str = "<?php
 Define('SITE_TITLE', '".$data['site_title']."');
 Define('SITE_ADRESS', '".$data['site_address']."');
 Define('META_DESCRIPTION', '".$data['meta_description']."');
 Define('META_KEYWORDS', '".$data['meta_keywords']."');
 
/// Admin data ///
 Define('ADMIN_LOGIN', '".$data['admin_login']."');
 Define('ADMIN_PASSWORD', '".$data['admin_password']."');

/// Related results ///
 Define('RELATED_CACHE', ".($data['related_cache']==true?'true':'false').");
 Define('RELATED_MODE', '".$data['related_mode']."');
 Define('RELATED_CACHE_TIME', '2592000');
 Define('RELATED_LIMIT', 0);
 Define('RELATED_DECORATION', true);

/// Page cache ///
 Define('CACHE_ENABLE', ".($data['cache_enable']==True?'true':'false').");
 Define('CACHE_TIME', '".$data['cache_time']."'); //In seconds (3600 is one hour)
 
// MSN
 Define('MAIN_SEARCH_API_KEY', '".$data['msn_application_id']."');
 Define('MAIN_SEARCH_MODE', 'API');
 Define('MAIN_SEARCH_COUNTRY', '".$data['msn_lang']."');
 Define('MAIN_SEARCH_ITEMS_PAGE', '".$data['msn_items_on_page']."');
 Define('MAIN_SEARCH_TITLE_DECORATION', true);
 Define('MAIN_SEARCH_TEXT_DECORATION', true);
 Define('MAIN_SEARCH_MODULE', 'api_msn.lib.php');
 
/// Ebay Configuration ///
 Define('EBAY_ENABLED', ".($data['ebay_enable']?"true":"false").");
 Define('CJ_ACCOUNTID', '".$data['cj_account_id']."');
 Define('CJ_PID', '".$data['cj_pid']."');
 Define('EBAY_LIMIT', '10');
 Define('EBAY_USERID', '".$data['ebay_user_id']."');
 Define('EBAY_TOKEN', '".$data['ebay_token']."');
 Define('EBAY_SITEID', '".$data['ebay_country']."');

/// Amazon ///
 Define('AMAZON_ENABLED', ".($data['amazon_enable']?"true":"false").");
 Define('AMAZON_REF_ID', '".$data['amazon_referer_id']."');
 Define('AMAZON_ACCESS_KEY', '".$data['amazon_access_key']."');
 Define('AMAZON_LIMIT', 13);
 Define('AMAZON_COUNTRY', '".$data['amazon_country']."');
 
/// ClickBank /// 
 Define('CLICKBANK_ENABLED', ".($data['clickbank_enable']?"true":"false").");
 Define('CLICKBANK_AFFILIATE', '".$data['clickbank_id']."');
 Define('CLICKBANK_DBPATH', 'clickbank_db/marketplace_feed_v1.xml');
 
/// ADS ///
 Define('ADS_LEFT_BOX', '".$data['ads_left']."');
 Define('ADS_SEARCH_BOX', '".$data['ads_center']."');
 Define('ADS_RIGHT_BOX', '".$data['ads_right']."');
 
 ".'$searchPrefix'." = Array(
 'EBAY' => 'EB',
 'AMAZON' => 'AM',
 'AMAZON_BOOKS' => 'AM1',
 'AMAZON_MUSIC' => 'AM2',
 'AMAZON_ELECTRONICS' => 'AM3',
 'CLICKBANK' => 'CB'
 );
?>";
 	Return $str;
}



Function readConfig()
{
	$_SESSION['site_title'] = SITE_TITLE;
	$_SESSION['site_address'] = SITE_ADRESS;
	$_SESSION['meta_description'] = META_DESCRIPTION;
	$_SESSION['meta_keywords'] = META_KEYWORDS;
	$_SESSION['admin_login'] = ADMIN_LOGIN;
	$_SESSION['admin_password'] = ADMIN_PASSWORD;
	
	$_SESSION['related_cache'] = RELATED_CACHE;
	$_SESSION['related_mode'] = RELATED_MODE;
	$_SESSION['related_cache_time'] = RELATED_CACHE_TIME;
	$_SESSION['related_limit'] = RELATED_LIMIT;
	
	$_SESSION['cache_enable'] = CACHE_ENABLE;
	$_SESSION['cache_time'] = CACHE_TIME;

	$_SESSION['msn_application_id'] = MAIN_SEARCH_API_KEY;
	$_SESSION['msn_lang'] = MAIN_SEARCH_COUNTRY;
	$_SESSION['msn_items_on_page'] = MAIN_SEARCH_ITEMS_PAGE;
	
	$_SESSION['ebay_enable'] = EBAY_ENABLED;
	$_SESSION['cj_account_id'] = CJ_ACCOUNTID;
	$_SESSION['cj_pid'] = CJ_PID;
	$_SESSION['ebay_user_id'] = EBAY_USERID;
	$_SESSION['ebay_token'] = EBAY_TOKEN;
	$_SESSION['ebay_country'] = EBAY_SITEID;

	$_SESSION['amazon_enable'] = AMAZON_ENABLED;
	$_SESSION['amazon_referer_id'] = AMAZON_REF_ID;
	$_SESSION['amazon_access_key'] = AMAZON_ACCESS_KEY;
	$_SESSION['amazon_country'] = AMAZON_COUNTRY;
	
	$_SESSION['clickbank_enable'] = CLICKBANK_ENABLED;
	$_SESSION['clickbank_id'] = CLICKBANK_AFFILIATE;
	
	$_SESSION['ads_left'] = ADS_LEFT_BOX;
	$_SESSION['ads_center'] = ADS_SEARCH_BOX;
	$_SESSION['ads_right'] = ADS_RIGHT_BOX;
}



Function step1($orderStep, &$tpl)
{
	If ( $_POST && $orderStep == 2 )
	{
		If (IsSet($_POST['site_title'])) { $_SESSION['site_title'] = Stripslashes($_POST['site_title']); }
		If (IsSet($_POST['site_address'])) { $_SESSION['site_address'] = Stripslashes($_POST['site_address']); }
		If (IsSet($_POST['admin_login'])) { $_SESSION['admin_login'] = Stripslashes($_POST['admin_login']); }
		If (IsSet($_POST['admin_password'])) { $_SESSION['admin_password'] = Stripslashes($_POST['admin_password']); }
		If (IsSet($_POST['related_mode'])) { $_SESSION['related_mode'] = Stripslashes($_POST['related_mode']); }
		If (IsSet($_POST['cache_time'])) { $_SESSION['cache_time'] = Stripslashes($_POST['cache_time']); }
		
		$_SESSION['related_cache'] = ($_POST['related_cache']?True:False);
		$_SESSION['cache_enable'] = ($_POST['cache_enable']?True:False);
	}
	
	$error = False;
	
	If ( Empty($_SESSION['site_title']) ) { $tpl->assign('err_site_title', 'Enter site tittle.'); $error = True; }
	If ( Empty($_SESSION['site_address']) ) { $tpl->assign('err_site_address', 'Enter site address.'); $error = True; }
	If ( Empty($_SESSION['admin_login']) ) { $tpl->assign('err_admin_login', 'Enter admin login.'); $error = True; }
	If ( Empty($_SESSION['admin_password']) ) { $tpl->assign('err_admin_password', 'Enter admin password.'); $error = True; }
	If ( $_SESSION['cache_enable'] && !$_SESSION['cache_time'] ) { $tpl->assign('err_cache_time', 'Enter cache live time.');	$error = True;	}
	
	If ( $error ) { Return 1; }
	Return $orderStep;
}

Function step2($orderStep, &$tpl)
{
	If (IsSet($_POST['meta_author'])) { $_SESSION['meta_author'] = Stripslashes($_POST['meta_author']); }
	If (IsSet($_POST['meta_email'])) { $_SESSION['meta_email'] = Stripslashes($_POST['meta_email']); }
	If (IsSet($_POST['meta_keywords'])) { $_SESSION['meta_keywords'] = Stripslashes($_POST['meta_keywords']); }
	If (IsSet($_POST['meta_description'])) { $_SESSION['meta_description'] = Stripslashes($_POST['meta_description']); }
	$error = False;
	If ( $error ) { Return 2; }
	Return $orderStep;
}

Function step3($orderStep, &$tpl)
{
	If (IsSet($_POST['ads_left'])) { $_SESSION['ads_left'] = Stripslashes($_POST['ads_left']); }
	If (IsSet($_POST['ads_center'])) { $_SESSION['ads_center'] = Stripslashes($_POST['ads_center']); }
	If (IsSet($_POST['ads_right'])) { $_SESSION['ads_right'] = Stripslashes($_POST['ads_right']); }
	$error = False;
	
	If ( Empty($_SESSION['ads_left']) ) { $tpl->assign('err_ads_left', 'Enter ADS code for left box.'); $error = True; }

	If ( Empty($_SESSION['ads_center']) ) { $tpl->assign('err_ads_center', 'Enter ADS code for center box.'); $error = True; }

	If ( Empty($_SESSION['ads_right']) ) { $tpl->assign('err_ads_right', 'Enter ADS code for right box.'); $error = True; }
	
	If ( $error ) { Return 3; }
	Return $orderStep;
}

Function step4($orderStep, &$tpl)
{
	If (IsSet($_POST['msn_application_id'])) { $_SESSION['msn_application_id'] = Stripslashes($_POST['msn_application_id']); }
	If ( IsSet($_POST['msn_items_on_page']) ){$_SESSION['msn_items_on_page'] = stripslashes($_POST['msn_items_on_page']);}
	If ( IsSet($_POST['msn_lang']) ) { $_SESSION['msn_lang'] = stripslashes($_POST['msn_lang']); }
	$error = False;

	If ( Empty($_SESSION['msn_application_id']) ) { $tpl->assign('err_msn_application_id', 'Enter MSN Application id.'); $error = True; }

	If ( $error ) { Return 4; }
	Return $orderStep;
}

Function step5($orderStep, &$tpl)
{
	If ( IsSet($_POST['amazon_access_key']) )
	{
		$_SESSION['amazon_enable'] = ($_POST['amazon_enable']?True:False);
		$_SESSION['amazon_access_key'] = Stripslashes($_POST['amazon_access_key']);
	}
	If (IsSet($_POST['amazon_referer_id'])) { $_SESSION['amazon_referer_id'] = Stripslashes($_POST['amazon_referer_id']); }
	If (IsSet($_POST['amazon_country'])) { $_SESSION['amazon_country'] = stripslashes($_POST['amazon_country']); }
	
	$error = False;

	If ( $_SESSION['amazon_enable'] || $_POST['amazon_enable'] )
	{
		If ( Empty($_SESSION['amazon_access_key']) ) { $tpl->assign('err_amazon_access_key', 'Enter Amazon access key.'); $error = True; }
		If ( Empty($_SESSION['amazon_referer_id']) ) { $tpl->assign('err_amazon_referer_id', 'Enter Amazon referer id.'); $error = True; }
	}

	If ( $error ) { Return 5; }
	Return $orderStep;
}

Function step6($orderStep, &$tpl)
{
	If (IsSet($_POST['clickbank_id'])) 
	{
		$_SESSION['clickbank_enable'] = ($_POST['clickbank_enable']?True:False);
		$_SESSION['clickbank_id'] = Stripslashes($_POST['clickbank_id']);
	}
	$error = False;

	If ( $_SESSION['clickbank_enable'] || $_POST['clickbank_enable'] )
	{
		If ( Empty($_SESSION['clickbank_id']) ) { $tpl->assign('err_clickbank_id', 'Enter ClickBank affiliate id.'); $error = True; }
	}
	
	If ( $error ) { Return 6; }
	Return $orderStep;
}

Function step7($orderStep, &$tpl)
{
	If (IsSet($_POST['ebay_user_id']))
	{
		$_SESSION['ebay_enable'] = ($_POST['ebay_enable']?True:False);
		$_SESSION['ebay_user_id'] = Stripslashes($_POST['ebay_user_id']);
	}
	If(IsSet($_POST['ebay_token'])) { $_SESSION['ebay_token'] = Stripslashes($_POST['ebay_token']); }
	If(IsSet($_POST['cj_account_id'])) { $_SESSION['cj_account_id'] = Stripslashes($_POST['cj_account_id']); }
	If(IsSet($_POST['cj_pid'])){$_SESSION['cj_pid']=Stripslashes($_POST['cj_pid']);}
	If(IsSet($_POST['ebay_country'])){$_SESSION['ebay_country']=stripslashes($_POST['ebay_country']);}
	$error = False;

	If ( $_SESSION['ebay_enable'] || $_POST['ebay_enable'] )
	{
		If(Empty($_SESSION['ebay_user_id'])){$tpl->assign('err_ebay_user_id','Enter ClickBank affiliate id.');$error=True;}
		If(Empty($_SESSION['ebay_token'])){$tpl->assign('err_ebay_token', 'Enter ClickBank affiliate id.');$error=True;}
		If(Empty($_SESSION['cj_account_id'])){$tpl->assign('err_cj_account_id', 'Enter CJ Account id');$error=True;}
		If(Empty($_SESSION['cj_pid'])){$tpl->assign('err_cj_pid', 'Enter CJ PID');$error=True;}
	}
	If ( $error ) { Return 7; }
	Return $orderStep;
}


Function step8($orderStep, &$tpl)
{
	If ( $_POST['filter_words'] )
	{
		require_once(LIB.'searchEngine.lib.php');
		SearchEngine::writeFilter('../filter.txt', $_POST['filter_words']);
	}
	return $orderStep;
}


Function validateData($orderStep, &$tpl)
{
	For ( $i=1; $i<=$orderStep; $i++ )
	{
		If ( Function_Exists('step'.$i) )
		{
			$res = call_user_func('step'.$i, $orderStep, &$tpl);
			If ( $res < $orderStep ) { Return $res; }
		}
	}
	Return $orderStep;
}



Function user_auth()
{
	If ( ADMIN_LOGIN == $_SESSION['auth_admin_login'] &&
		 ADMIN_PASSWORD == $_SESSION['auth_admin_password'] ) 
	{
		return true; 
	}
	return false;
}

?>