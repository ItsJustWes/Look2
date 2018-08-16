<?php
 Define('SITE_TITLE', 'Manitoba Search');
 Define('SITE_ADRESS', 'http://www.look2manitoba.com/');
 Define('META_DESCRIPTION', 'Manitoba search, Manitoba find, Manitoba seek');
 Define('META_KEYWORDS', 'Manitoba Search, manitoba, manitoba map, manitoba vacation, manitoba canada, winnipeg manitoba, churchill manitoba, university of manitoba, brandon manitoba, manitoba moose, manitoba tourism, lake manitoba, manitoba hydro, map of manitoba, flin flon manitoba, thompson manitoba, winnipeg manitoba canada, winnepeg manitoba, manitoba weather, manitoba flag, manitoba fishing, manitoba facts, manitoba harvest, manitoba ca, manitoba telecom, university manitoba, capital of manitoba, manitoba government, manitoba history, facts about manitoba, manitoba junior hockey league, manitoba hunting, winkler manitoba, manitoba health, manitoba maps, steinbach manitoba, manitoba public insurance, about manitoba, churchill manitoba canada, dauphin manitoba, manitoba population, manitoba telephone, dick manitoba, cbc manitoba, u of manitoba, government of manitoba, the pas manitoba, gimli manitoba, selkirk manitoba, manitoba capital, manitoba moose hockey, history of manitoba, manitoba bigfoot, province of manitoba, manitoba news, manitoba lyrics, manitoba postal code, manitoba junior hockey, manitoba hockey, manitoba school, population of manitoba, manitoba road conditions, handsome dick manitoba, manitoba canada map, manitoba province, brandon manitoba canada, manitoba real estate, morden manitoba, manitoba sports, manitoba climate, cities in manitoba, manitoba up in flames, churchhill manitoba, manitoba zip code, manitoba jobs, map of manitoba canada, pictures of manitoba, manitoba abbreviation, swan river manitoba, maps of manitoba, manitoba lakes, manitoba pictures, manitoba museum, manitoba highways, manitoba deer, flag of manitoba, manitoba music, cbc manitoba news, manitoba bear hunting, manitoba deer hunting, manitoba time, manitoba curling, northern manitoba, lynn lake manitoba, where is manitoba, manitoba food, manitoba telecom services, gillam manitoba, hunting in manitoba, manitoba telephone system, manitoba hotels, manitoba culture, manitoba theatre, emerson manitoba, my manitoba, manitoba time zone, manitoba natural resources, manitoba liquor, manitoba attractions, manitoba vital statistics, manitoba agriculture, caribou manitoba, manitoba land, manitoba lotteries, manitoba newspaper, manitoba band, russell manitoba, manitoba white pages, attractions in manitoba, manitoba industry, altona manitoba, facts on manitoba, abbreviation for manitoba, university of manitoba winnipeg, manitoba bisons, roblin manitoba, manitoba wildlife, winnipeg manitoba map, manitoba maple, portage la prairie manitoba, manitoba cities, manitoba whitetail, time in manitoba, churchill manitoba map, manitoba court, travel manitoba, manitoba polar bears, manitoba bear hunts, manitoba education, manitoba conservation, manitoba highway conditions, manitoba law, manitoba airport, manitoba outfitters, the university of manitoba, manitoba bison, jobs in manitoba, manitoba information, manitoba immigration, manitoba com, manitoba people, ');

/// Admin data ///
//*** this doesn't appear to exist

 Define('ADMIN_LOGIN', 'admin');
 Define('ADMIN_PASSWORD', 'yourpass');

/// Related results ///
 Define('RELATED_CACHE', true);
 Define('RELATED_MODE', 'msn');
 Define('RELATED_CACHE_TIME', '2592000');
 Define('RELATED_LIMIT', 0);
 Define('RELATED_DECORATION', true);

/// Page cache ///
 Define('CACHE_ENABLE', true);
 Define('CACHE_TIME', '86400'); //In seconds (3600 is one hour)

// MSN
//******** WES - you will need to get your own MSN API code ***********
 Define('MAIN_SEARCH_API_KEY', 'D74AFE703D9FCA7500DBACF6DA10C9924B5DAA4C');
 Define('MAIN_SEARCH_MODE', 'API');
 Define('MAIN_SEARCH_COUNTRY', 'us');
 Define('MAIN_SEARCH_ITEMS_PAGE', '10');
 Define('MAIN_SEARCH_TITLE_DECORATION', true);
 Define('MAIN_SEARCH_TEXT_DECORATION', true);
 Define('MAIN_SEARCH_MODULE', 'api_msn.lib.php');

/// Ebay Configuration ///
//****** haven't gotten this to work

 Define('EBAY_ENABLED', false);
 Define('CJ_ACCOUNTID', '1877614');
 Define('CJ_PID', '2515316');
 Define('EBAY_LIMIT', '10');
 Define('EBAY_USERID', 'rden17');
 Define('EBAY_TOKEN', 'AgAAAA**AQAAAA**aAAAAA**J7ycRg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wJlYKoCpmHpwidj6x9nY+seQ**XTkAAA**AAMAAA**CEcYGz1RkXmytp7ePnUkhQTCSqQ47dFOcnnj4wz3hoD34x/WDL9LgsC4CepjnCLlDpwRPdOu5Sl7RrcXmf/so0vHzrI1W+AbGhEo5XPQhQNAO43oMhThJ7MkmDd4mohx9MwNTJUNCujTVzAq7at4gZt2n1aKur118eXc1Ww4N0w+F9F1VmeRZplyVL7QOnhqz1KZiEwu8c/SvYNH+ctIRiyl352ZdfT6/aBAnC61pr/WK45gbfujx2azlbXBo775a8zDlv338fDsOEwFvAqYYY+oAhxL4QSa1KRUha0Amn1PSmJ4hUB0yBo2z+i1869vPAFHvLMBRxsaf1aFrSiPC6llAJQgVEdBvxjmQzXEmrTO5j3AUORZE0nOFTr4xMOTU0SFxHbU+Sspt8H7LXkNO1IAhL5o1GOHKK9sY+Ijiqrxrql/01tiNakH4Q4KzznntF0g5Au+7E/3nOGdFGLNTFDvNhjNtk1+LGuoa26rSyVPmbLF3E2IjTg1hLmIiPNgsh6iSPgFdCDXISGOXP0/pSqx0h5mIJ2t+2Dia/sKVmF1rm8MFV5rfOIoz05A8dVAsVxEBgkgcVrpKr3QSi3Yg/4zFD/UcxoPGKfnB7RCuUqW8rPwn+yM9HH0npuos7cYelr8yH2NcW3w1k2H1ydeIcTdeixJbhAKPtTR92fLaxKszkyz8Zl3vhuHNmBUI1vp9xEv3oVz5Tt+5hW7SgOnKBAQRRPLmQewTX79dUjq2gAy5eV9ZgohPjz5RD/DVgLw');
 Define('EBAY_SITEID', '0');

/// Amazon ///
 Define('AMAZON_ENABLED', true);
 Define('AMAZON_REF_ID', 'manitoba-20');
 Define('AMAZON_ACCESS_KEY', '1S54VN6EZBVP7Y206JR2');
 Define('AMAZON_LIMIT', 13);
 Define('AMAZON_COUNTRY', 'us');

/// ClickBank ///
 Define('CLICKBANK_ENABLED', true);
 Define('CLICKBANK_AFFILIATE', 'wesamber');
 Define('CLICKBANK_DBPATH', 'clickbank_db/marketplace_feed_v1.xml');

/// ADS ///
 Define('ADS_LEFT_BOX', '<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 160;
google_ad_height = 90;
google_ad_format = "160x90_0ads_al";
google_ad_channel = "";
google_color_border = "f3fefa";
google_color_bg = "f3fefa";
google_color_link = "0000FF";
google_color_text = "000000";
google_color_url = "B3B3B3";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>');
 Define('ADS_SEARCH_BOX', '<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_alternate_ad_url = "";
google_ad_width = 336;
google_ad_height = 280;
google_ad_format = "336x280_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "f3fefa";
google_color_bg = "f3fefa";
google_color_link = "0000FF";
google_color_text = "000000";
google_color_url = "B3B3B3";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>');
 Define('ADS_RIGHT_BOX', '<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_alternate_ad_url = "";
google_ad_width = 160;
google_ad_height = 600;
google_ad_format = "160x600_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "f3fefa";
google_color_bg = "f3fefa";
google_color_link = "0000FF";
google_color_text = "000000";
google_color_url = "B3B3B3";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>');

 $searchPrefix = Array(
 'EBAY' => 'EB',
 'AMAZON' => 'AM',
 'AMAZON_BOOKS' => 'AM1',
 'AMAZON_MUSIC' => 'AM2',
 'AMAZON_ELECTRONICS' => 'AM3',
 'CLICKBANK' => 'CB'
 );
?>