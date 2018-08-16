<?php

Define('CUR_US', 0);

Class Currency {

 Function convert($var, $type=CUR_US)
 {
 	If ( Is_Numeric($var) )
	{
		$var = floatval($var);
		Switch ( $type )
		{
			Case CUR_US:
				$uh = Floor($var);
				$ul = $var-Floor($var);
				$str = $uh;
				If ( !$ul ) { $str .= '.00'; }
					else
				{
					$ul = SubStr($ul, 2);
					$str .= '.'.SubStr($ul, 0, 2).( StrLen($ul) == 1 ? '0' : '' );
				}
				Return $str;
			Break;
		}
	}
 }

}// Class Currency

?>