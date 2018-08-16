<?php
 ob_start();
 @Error_Reporting(E_ALL & ~E_NOTICE);

 Define('CONFIG', 'config/');
 Define('LIB', 'lib/');
 Define('TPL_PATH', 'templates/');
 Define('RES_PATH', 'res/');
 Require_Once('application.inc.php');
 Require_Once(LIB.'Savant2.php');

 If ( File_exists(CONFIG.'main.config.php') ) { Require_Once(CONFIG.'main.config.php'); }
 	else
 {
 	$tab = Explode('/', $_SERVER['SCRIPT_URI']);
	$count = Count($tab)-1;
	$redirectUrl = '';
	For ( $i=0; $i<$count; $i++ ) { $redirectUrl .= $tab[$i].'/'; }
 	Header('Location: '.$redirectUrl.'install');
 }
  
 $tpl = New Savant2();
 
 $tpl->assign('ebay_enabled', EBAY_ENABLED);
 $tpl->assign('amazon_enabled', AMAZON_ENABLED);
 $tpl->assign('clickbank_enabled', CLICKBANK_ENABLED);
 $tpl->assign('search_in_web', 'javascript:void(null);');
 $tpl->assign('search_in_auctions', 'javascript:void(null);');
 $tpl->assign('search_in_shopping', 'javascript:void(null);');
 $tpl->assign('search_in_eproducts', 'javascript:void(null);');

 $tpl->assign('web_click', ' onclick="pageSheetClick(this);"');
 $tpl->assign('ebay_click', ' onclick="pageSheetClick(this);"');
 $tpl->assign('amazon_click', ' onclick="pageSheetClick(this);"');
 $tpl->assign('clickbank_click', ' onclick="pageSheetClick(this);"');

 $tpl->assign('searchMode', 'WEB');
 $tpl->addPath('template', TPL_PATH);
 
 $debugStr = ob_get_clean();
 If ( $_SERVER['REMOTE_ADDR'] == '000.000.000.000' )
 {
 	If ( $debugStr != '' ) { echo '<table border="1" width="100%"><tr><td>'.$debugStr.'</td></tr></table>'; }
 }
 checkSecurity();
 $tpl->display('index.tpl');
 echo '
 <!-- '.APPLICATION_NAME.' '.APPLICATION_VERSION.'.'.APPLICATION_SUBVERSION.' -->
 ';
?>