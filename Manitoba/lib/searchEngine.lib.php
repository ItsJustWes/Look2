<?php

Class SearchEngine {
	var $filterFileName = null;
	
	
	Function SearchEngine($config = Array())
	{
		If ( $config['filterFileName'] ) { $this->filterFileName = $config['filterFileName']; }
	}
	
	
	
	Function filterKey($keyWord)
	{
		$arrayPreg = Array(
			'/[^\-a-zA-Z0-9ąâàâäăăáåãćçčęéèêëüùûúóöôżźžîïíšśłńýĎĄÂÀÄĂÁÅÃĆÇČĘÉÈÊËÜÙÚÛÓÖÔŻŹŽÎÏÍŠŚŁŃÝ]/',
			'/^[^\-a-zA-Z0-9ąâàâäăăáåãćçčęéèêëüùûúóöôżźžîïíšśłńýĎĄÂÀÄĂÁÅÃĆÇČĘÉÈÊËÜÙÚÛÓÖÔŻŹŽÎÏÍŠŚŁŃÝ]/', 
			'/ {1,}/',
			'/( $)|(^ )/',
		);
 		$arrayReplace = Array(' ', '', ' ', '');
 		return preg_replace($arrayPreg, $arrayReplace, $keyWord);
	}



	Function filterHtml($keyWord)
	{
		return preg_replace('/ /', '_', $keyWord);
	}



	Function filter($query, $fileName='filter.txt')
	{
		If ( $this->filterFileName ) { $fileName = $this->filterFileName; }
		// Ladujemy plik z filtrem.
		If ( is_readable($fileName) )
		{
			$buf = @file($fileName);
			If ( $buf === false ) { return false; }
			
			If ( is_array($buf) && Count($buf) )
			{
				Foreach ( $buf As $val )
				{
					$val = preg_replace('/\s/', '', $val);
					$query = preg_replace('/'.$val.'/', '', $query);
				}
			}
			return $query;
		}
		return false;
	}
	
	
	
	Function doRedirectSearch($query)
	{
		$query = StrToLower(UrlDecode($query));
		$filterResult = SearchEngine::filter($query);
		If ( $filterResult !== false ) { $query = $filterResult; }
		$query = SearchEngine::filterHtml(SearchEngine::filterKey($query));
		
		return $query;
	}
	
	
	
	Function readFilter($fileName='filter.txt')
	{
		If ( is_readable($fileName) )
		{
			$buf = @file($fileName);
			If ( $buf === false ) { return false; }
			$data = array();
			Foreach ( $buf As $val )
			{
				$val = preg_replace('/\s/', '', $val);
				If ( $val != '' ) { $data[] = $val; }
			}
			return $data;
		}
		return false;
	}
	
	
	
	Function writeFilter($fileName='filter.txt', $str)
	{
		If ( is_writable($fileName) )
		{
			$tabFilter = Preg_Split('/\n/', $str, -1, PREG_SPLIT_NO_EMPTY);
			if (!$fHandle = fopen($fileName, 'w')) { return false; }
			foreach ( $tabFilter As $val )
			{
				$val = preg_replace('/\s/', '', $val);
				If ( $val != '' )
				{
					fWrite($fHandle, $val."\n");
				}
			}
			fclose($fHandle);
		}
		return false;
	}
	
	
	
	Function redirectNow($url)
	{
		If ( !headers_sent() ) {
  			Header('Location: '.$url);
  			exit();
		}
		
	  	echo '
  		<html>
	   	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv=refresh content="1; url='.$url.'">
		<script type="text/javascript" language="JavaScript">location.href=\''.$url.'\';</script>
		</head>	
		<body></body></html>	
		';
  	}

}

?>