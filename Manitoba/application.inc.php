<?php
 Define('APPLICATION_NAME', 'AdBie');
 Define('APPLICATION_VERSION', '3');
 Define('APPLICATION_SUBVERSION', '01 Pro');

 Function checkSecurity()
 {
	If ( Is_Writable(CONFIG.'main.config.php') )
	{
		echo '<!--<table cellspacing="0" cellpadding="0" style="font-family:arial;font-size:12px;font-weight:bold;color:#FFFCED;background:#D40000;width:100%;height:30px;border-bottom:1px solid #FFFCED">
		<tr>
		 <td align="center">Warning!!! Configuration file is writable. For safety, please set chmod to read only.</td>
		</tr>
		</table> -->';
	}
 }
?>