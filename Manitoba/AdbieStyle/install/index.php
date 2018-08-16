<?php
 // Install...
 Session_Start();
 @Error_Reporting(E_ALL & ~E_NOTICE);
 Define('CONFIG', '../config/');
 Define('LIB', '../lib/');
 Define('TPL_PATH', 'templates/');
 Require_Once('../application.inc.php');
 Require_Once(LIB.'Savant2.php');
 Require_Once('install.lib.php');
 
 $tpl = New Savant2();
 $tpl->addPath('template', TPL_PATH);

 
 // Jesli jest konfig to go ladujemy.
 If ( file_exists(CONFIG.'main.config.php') )
 {
 	require_once(CONFIG.'main.config.php');
 	// Logowanie uzytkownika.
 	If ( !user_auth() && $_POST['login'] && $_POST['password'] )
 	{
 		If ( $_POST['login'] == ADMIN_LOGIN && $_POST['password'] == ADMIN_PASSWORD )
 		{
			$_SESSION['auth_admin_login'] = ADMIN_LOGIN;
			$_SESSION['auth_admin_password'] = ADMIN_PASSWORD;
			readConfig();
 		}
 	}
 	
 	If ( $_GET['logout'] )
 	{
 		Unset($_SESSION);
 		session_destroy();
 	}
 	
 	If ( user_auth() === false )
 	{
 		$tpl->display('user_login.tpl');
 		exit;
 		
 	}
 }
 
 
 $show = 'install.tpl';
 $step = BaseName(( !Empty($_GET['step']) ? (int)$_GET['step'] : 0 ));
  
 If ( $step == 0 )
 {
	$configDir = '../config/';
	$cacheDir = '../cache/';
	$cacheRelatedDir = '../cache/related/';
	$configFile = 'main.config.php';
	Require('check.inc.php');
 	$show = 'check.tpl';
 }
 
 If ( $step == 1 )
 {
 	$prevBtnClick = ' disabled';
 	If ( !IsSet($_SESSION['site_address']) )
	{
		$uri = $_SERVER['SCRIPT_URI'];
		$uri = Preg_replace('/install\/$/', '', $uri);
		$_SESSION['site_address'] = $uri;
	}
	
	If ( !$_SESSION['cache_enable'] && !$_SESSION['cache_time'] )
	{
		$_SESSION['cache_enable'] = True;
		$_SESSION['cache_time'] = 86400;
	}
	
	require_once(LIB.'suggest.lib.php');
	$suggest = New KeyWordSuggest(false, null);
	$tpl->assign('suggestVer', $suggest->majorVersion);
 }

 If ( $step > 1 )
 {
 	$step = validateData($step, $tpl);
	$prevBtnClick = ' onclick="location.href=\'?step='.($step-1).'\'"';
 }

 If ( $step == 7 )
 {
 	require_once(LIB.'api_ebay.lib.php');
 	$ebay = New rest_eBaySearch(null, null, null, null);
 	$tpl->assign('ebay_country', $ebay->country);
 }
 
 If ( $step == 8 )
 {
 	require_once(LIB.'searchEngine.lib.php');
 	$filterData = SearchEngine::readFilter('../filter.txt');
 	$tpl->assign('filterData', $filterData);
 }
 
 
 If ( $step == 9 )
 {
 	$str = getConfigContent($_SESSION);
	$configDir = '../config/';
	$configFile = 'main.config.php';
	If ( Is_writable($configDir) )
	{
		If ( !$handle = FOpen($configDir.$configFile, 'w') )
		{
			$content = '<table style="width:400px;height:60px;color:#FFFCED;background:#D40000;font-family:arial;font-size:12px;font-weight:bold;"><tr><td align="center">Error on create configuration file.</td></tr></table>';
		}
			else
		{
			FWrite($handle, $str);
			$content = '<table style="width:400px;height:60px;font-size:12px"><tr><td align="center">Configuration proccess has been ended, please <b>remove Install dir.</b></td></tr>
			<tr><td align="center"><input type="button" value="Logout" class="button" onclick="location.href=\'?logout=now\';" style="margin-left:10px;"></td></tr>
			</table>
			';
		}
		@FClose($handle);
	}
		else
	{
		$content = '<table style="width:400px;height:60px;color:#FFFCED;background:#D40000;font-family:arial;font-size:12px;font-weight:bold;"><tr><td align="center">The configuration dir is not writable.</td></tr></table>';
	}
	
	$show = 'end.tpl';
 }
 
 $stepFile = 'step'.$step.'.tpl';

 If ( !File_Exists('templates/'.$stepFile) )
 {
 	$step = 1;
 	$stepFile = 'step1.tpl';
 }

// print_r($_SESSION);
// echo '<br><br><br>';
// print_r($_POST);
// echo var_dump($_SESSION['amazon_enable']);
 
 $tpl->assign('stepFile', $stepFile);
 $tpl->assign('prevBtnClick', $prevBtnClick);
 $tpl->assign('formAction', '?step='.($step+1));
 $tpl->assign('step', $step);
 $tpl->assign('content', $content);
 $tpl->display($show);
?>