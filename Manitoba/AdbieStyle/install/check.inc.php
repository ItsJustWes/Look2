<?php

$checkOk = True;

Function checkStr($bool)
{
	global $checkOk;
	If ( $checkOk == True && $bool == False ) { $checkOk = False; }
	Return ( $bool == True ? '<b style="color:green">Ok</b>' : '<b style="color:red">Passed</b>' );
}

//$arr = get_loaded_extensions();
//Foreach ( $arr as $val ) { echo $val.'<br>'; }

Ob_Start();

echo '<center><table cellspacing="0" cellpadding="5" width="80%">';

If ( File_exists($configDir.'main.config.php') )
{
echo '
<tr>
 <td style="width:50%;text-align:right">Configuration file writable : </td>
 <td style="width:50%;text-align:left">'.checkStr(Is_writable($configDir.'main.config.php')).'</td>
</tr>';
}
	else
{
echo '
<tr>
 <td style="width:50%;text-align:right">Configuration dir writable : </td>
 <td style="width:50%;text-align:left">'.checkStr(Is_writable($configDir)).'</td>
</tr>';
}

echo '
<tr>
 <td style="width:50%;text-align:right">Cache dir writable : </td>
 <td style="width:50%;text-align:left">'.checkStr(Is_writable($cacheDir)).'</td>
</tr>

<tr>
 <td style="width:50%;text-align:right">Cache related dir writable : </td>
 <td style="width:50%;text-align:left">'.checkStr(Is_writable($cacheRelatedDir)).'</td>
</tr>

<tr>
 <td style="width:50%;text-align:right">Sock extension : </td>
 <td style="width:50%;text-align:left">'.checkStr( Function_Exists('fsockopen') ).'</td>
</tr>

<tr>
 <td style="width:50%;text-align:right">Dom Xml : </td>
 <td style="width:50%;text-align:left">'.checkStr( extension_loaded('domxml') ).'</td>
</tr>
';

echo '</table></center>';

$content = ob_get_clean();

$tpl->assign('checkOk', $checkOk);
?>