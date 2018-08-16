<?php
Ob_Start();
 
Define('CONFIG', 'config/');
Define('LIB_PATH', 'lib/');
Require_Once('application.inc.php');
Require_Once(CONFIG.'main.config.php');
Require_Once(LIB_PATH.'searchEngine.lib.php');

$q = ( $_POST['q'] ? $_POST['q'] : '_' );
 
If ( $q )
{
	$htmlFile = SearchEngine::doRedirectSearch($q);
	If ( !Empty($searchPrefix[StrToUpper($_POST['mode'])]) ) 
	{ 
		$htmlFile = $searchPrefix[StrToUpper($_POST['mode'])].'_'.$htmlFile;
	}
	
	If ( $htmlFile == '' ) { 
  		Header('Location: '.SITE_ADRESS);
  		exit();
	}
	
	If ( !headers_sent() ) {
  		Header('Location: '.SITE_ADRESS.$htmlFile.'.html');
  		exit();
  	}

  	echo '
  	<html>
   	<head>
	<meta http-equiv="content-type" content="text/html; charset='.PAGE_CHARSET.'">
	<meta http-equiv=refresh content="1; url='.SITE_ADRESS.$htmlFile.'.html">
	<script type="text/javascript" language="JavaScript">location.href=\''.SITE_ADRESS.$htmlFile.'.html\';</script>
	</head>	
	<body></body></html>	
	';
}

echo ob_get_clean();
?>