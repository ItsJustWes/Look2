<?php
 Define('SITE_TITLE', '');
 Define('SITE_ADRESS', '');
 Define('META_DESCRIPTION', '');
 Define('META_KEYWORDS', '');
 
/// Admin data ///
 Define('ADMIN_LOGIN', 'admin');
 Define('ADMIN_PASSWORD', 'admin');

/// Related results ///
 Define('RELATED_CACHE', false);
 Define('RELATED_MODE', 'msn');
 Define('RELATED_CACHE_TIME', '2592000');
 Define('RELATED_LIMIT', 0);
 Define('RELATED_DECORATION', true);

/// Page cache ///
 Define('CACHE_ENABLE', false);
 Define('CACHE_TIME', '86400'); //In seconds (3600 is one hour)
 
// MSN
 Define('MAIN_SEARCH_API_KEY', '');
 Define('MAIN_SEARCH_MODE', 'API');
 Define('MAIN_SEARCH_COUNTRY', 'us');
 Define('MAIN_SEARCH_ITEMS_PAGE', '10');
 Define('MAIN_SEARCH_TITLE_DECORATION', true);
 Define('MAIN_SEARCH_TEXT_DECORATION', true);
 Define('MAIN_SEARCH_MODULE', 'api_msn.lib.php');
 
/// Ebay Configuration ///
 Define('EBAY_ENABLED', true);
 Define('CJ_ACCOUNTID', '');
 Define('CJ_PID', '');
 Define('EBAY_LIMIT', '10');
 Define('EBAY_USERID', '');
 Define('EBAY_TOKEN', '');
 Define('EBAY_SITEID', '0');

/// Amazon ///
 Define('AMAZON_ENABLED', true);
 Define('AMAZON_REF_ID', '');
 Define('AMAZON_ACCESS_KEY', '');
 Define('AMAZON_LIMIT', 13);
 Define('AMAZON_COUNTRY', 'us');
 
/// ClickBank /// 
 Define('CLICKBANK_ENABLED', true);
 Define('CLICKBANK_AFFILIATE', '');
 Define('CLICKBANK_DBPATH', 'clickbank_db/marketplace_feed_v1.xml');
 
/// ADS ///
 Define('ADS_LEFT_BOX', '');
 Define('ADS_SEARCH_BOX', '');
 Define('ADS_RIGHT_BOX', '');
 
 $searchPrefix = Array(
 'EBAY' => 'EB',
 'AMAZON' => 'AM',
 'AMAZON_BOOKS' => 'AM1',
 'AMAZON_MUSIC' => 'AM2',
 'AMAZON_ELECTRONICS' => 'AM3',
 'CLICKBANK' => 'CB'
 );
?>