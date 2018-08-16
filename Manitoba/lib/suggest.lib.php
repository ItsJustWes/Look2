<?php

class KeyWordSuggest {
	var $version='2.0';
	var $majorVersion = 'msn';
	
	var $keyWord = '';
	var $mode = 'go';
	var $items = array();
	var $limit = 0;
	var $textDecoration = False;
	var $multiLanguage = True;
	var $cache = True;
	var $cacheDir = 'cache/related/';
	var $cacheTime = 0;
	var $limitWord = 0;
	var $wordWrap = 25;

	var $arrayPreg, $arrayReplace;
	
	var $pregKeyWord = array();
	var $tabKeyWord = array();
	
	var $msnItems = null;
	
	var $filter = false;
	var $filterItems = array();

	Function __construct($multiLanguage=True, $mode=null)
	{
		$this->multiLanguage = $multiLanguage;
		If ( $mode ) { $this->mode = $mode; }
				
		If ( $this->multiLanguage )
  		{
  			$this->arrayPreg = Array(
			'/[^\-a-zA-Z0-9ąâàâäăăáåãćçčęéèêëüùûúóöôżźžîïíšśłńýĎĄÂÀÄĂÁÅÃĆÇČĘÉÈÊËÜÙÚÛÓÖÔŻŹŽÎÏÍŠŚŁŃÝ]/',
			'/^[^\-a-zA-Z0-9ąâàâäăăáåãćçčęéèêëüùûúóöôżźžîïíšśłńýĎĄÂÀÄĂÁÅÃĆÇČĘÉÈÊËÜÙÚÛÓÖÔŻŹŽÎÏÍŠŚŁŃÝ]/', 
			'/ {1,}/'
  			);
  			$this->arrayReplace = Array('_', '', '_');
  		}
  			else
  		{
			$this->arrayPreg = Array(
			'/(ą)|(â)|(à)|(â)|(ä)|(ă)|(ă)|(á)|(å)|(ã)/',
			'/(ć)|(ç)|(č)/',
			'/(ę)|(é)|(è)|(ê)|(ë)/',
			'/(ü)|(ù)|(û)|(ú)/',
			'/(ó)|(ö)|(ô)/',
			'/(ż)|(ź)|(ž)/',
			'/(î)|(ï)|(í)/',
			'/(š)|(ś)/',
			'/ł/',
			'/ń/',
			'/ý/',
			'/Ď/',
			'/[^a-z0-9_]/',
			'/^[^a-z0-9]/',
			'/_{,}/'
			);
			$this->arrayReplace = Array('a', 'c', 'e', 'u', 'o', 'z', 'i', 's', 'l', 'n', 'y', 'd', '_', '', '_');
  		}
	}
	
	function KeyWordSuggest($multiLanguage=True, $mode=null)
	{
		$this->__construct($multiLanguage, $mode);
	}
	
	
	Function setKeyWord($keyWord)
	{
		$this->keyWord = urldecode($keyWord);
		$this->keyWord = preg_replace('/ {1,}$/', '', $this->keyWord);
		
 		$this->tabKeyWord = Explode(' ', $this->keyWord);
		If ( Is_Array($this->tabKeyWord) && Count($this->tabKeyWord)>1 )
		{
			$this->pregKeyWord = Array();
			Foreach ( $this->tabKeyWord As $key=>$val )
			{
				If ( $val != '' ) { $this->pregKeyWord[] = '/('.$val.')/i'; }
			}//Foreach
		}
			else
		{
			$this->pregKeyWord = '/('.$this->keyWord.')/i';
		}
	}
	
	
	
	Function createItem($word)
	{
		If ( $this->filter === true ) { $word = str_replace($this->filterItems, '', $word); }
		$word = $this->filterKey($word);
		return Array(
			'word' => $word,
			'clean' => $word,
			'file' => $this->filterHtml($word)
		);
	}
	
	
	
	Function search($keyWord = Null)
	{
		If ( $keyWord && $keyWord != $this->keyWord ) { $this->setKeyWord($keyWord); }
		
		// Sprawdzamy czy podane slowo nie znajduje sie w cache.
		If ( $this->cache === true ) 
		{
			$cacheRes = $this->loadFromCache();
			If ( $cacheRes === True ) { Return True; }
		}
		
		$searchRes = $this->_getFromMsn();		
		If ( $searchRes === True && $this->cache === true ) { $searchRes = $this->saveToCache(); } 
		
		Return $searchRes;
	}

	

	Function _addWordFromLeft($keyWord, $tabWord, $offset=null)
	{
		If ( is_array($tabWord) && count($tabWord) )
		{
			If ( $offset < -2 ) { return false; }
			
			$startIndex = count($tabWord)+$offset;
			$word = $tabWord[$startIndex];

			If ( preg_match('/^[^a-z0-9]/', $word) ) 
			{ 
				$word =  $this->_addWordFromLeft($keyWord, $tabWord, ($offset-1));
				If ( $word === false || strlen($word)<=3 ) { return false; }
				$word = $this->createItem($word['clean']);
				return ( $word['clean'] ? $word : false );
			}

			If ( strlen($tabWord[$startIndex]) <= 3 ) { return false; }
			$word = $tabWord[$startIndex].' '.$keyWord;
			$word = $this->createItem($word);
			return ( $word['clean'] != '' ? $word : false);
		}
		return false;
	}
	
	
	
	Function _addWordFromRight($keyWord, $tabWord, $offset=null)
	{
		If ( is_array($tabWord) && count($tabWord) )
		{
			If ( $offset > 2 ) { return false; }
			
			$startIndex = ($offset-1);
			$word = $tabWord[$startIndex];

			If ( preg_match('/^[^a-z0-9]/', $word) ) 
			{ 
				If ( ($offset+1) <= count($tabWord) )
				{
					$word =  $this->_addWordFromRight($keyWord, $tabWord, ($offset+1));
				}
					else { return false; } 
				If ( $word === false || strlen($word)<=3 ) { return false; }
				$word = $this->createItem($word['clean']);
				return ( $word['clean'] ? $word : false );
			}

			If ( strlen($tabWord[$startIndex]) <= 3 ) { return false; }
			$word = $keyWord.' '.$tabWord[$startIndex];
			$word = $this->createItem($word);
			return ( $word['clean'] != '' ? $word : false);
		}
		return false;
	}
	
	
	
	Function _getSingleFromMsn($keyWord)
	{
		If ( is_array($this->msnItems) && count($this->msnItems) )
		{
			$searchResult = array();
			$pregKeyWord = '/'.$keyWord.'/';
			
			foreach ( $this->msnItems As $msnItem )
			{
			// Pobieramy slowa z lewej od slowa kluczowego w title i desc.
				$msnItem['cleanTitle'] = strtolower($msnItem['cleanTitle']);
				$msnItem['cleanDesc'] = strtolower($msnItem['cleanDesc']);				
				

				preg_match('/^(.*?)'.$keyWord.'/', $msnItem['cleanTitle'], $res);
				$tabWordLeft = preg_split('/ /', $res[1], -1, PREG_SPLIT_NO_EMPTY);
				$res = $this->_addWordFromLeft($keyWord, $tabWordLeft, -1);
				If ( $res !== false ) { $searchResult[] = $res; }
				
				
				preg_match('/^(.*?)'.$keyWord.'/', $msnItem['cleanDesc'], $res);
				$tabWordLeft = preg_split('/ /', $res[1], -1, PREG_SPLIT_NO_EMPTY);
				$res = $this->_addWordFromLeft($keyWord, $tabWordLeft, -1);
				If ( $res !== false ) { $searchResult[] = $res; }
				
			// Pobieramy slowa z prawej od slowa kluczowego.
				preg_match('/'.$keyWord.'(.*?)$/', $msnItem['cleanTitle'], $res);
				$tabWordRight = preg_split('/ /', $res[1], -1, PREG_SPLIT_NO_EMPTY);
				$res = $this->_addWordFromRight($keyWord, $tabWordRight, 1);
				If ( $res !== false ) { $searchResult[] = $res; }

				preg_match('/'.$keyWord.'(.*?)$/', $msnItem['cleanDesc'], $res);
				$tabWordLeft = preg_split('/ /', $res[1], -1, PREG_SPLIT_NO_EMPTY);
				$res = $this->_addWordFromRight($keyWord, $tabWordLeft, 1);
				If ( $res !== false ) { $searchResult[] = $res; }
			}
		}
		
		
		// Usuwamy powtarzajace sie elementy.
		If ( is_array($searchResult) && count($searchResult) )
		{
			$data = array();
			foreach ( $searchResult As $key=>$val )
			{
				$exist = false;
				foreach ( $data As $dval )
				{
					If ( $val['clean'] == $dval['clean'] || $val['clean'] == $keyWord ) { $exist = true; }
				}
				If ( !$exist )
				{ 
		  			If ( $this->textDecoration )
		  			{
		  				If ( StrLen($val['word']) > $this->wordWrap )
		  					{ $val['word'] = wordwrap($val['word'], $this->wordWrap, "<br />", 1); }
		  				$val['word'] = Preg_Replace($this->pregKeyWord, '<b>\\0</b>', $val['word']);
		  			}
					$data[] = $val;
				}
			}
		}
		return $data;
	}
	
	
	
	Function _getFromMsn()
	{
	// Jesli nie ma rezultatow z msn to pobieramy je...
		If ( !is_array($this->msnItems) && !Count($this->msnItems) ) {  }
		
		$searchResult = array();
		$this->items = $this->_getSingleFromMsn($this->keyWord);

		// Rozbijamy slowa kluczowe na tablice.
		$tabWords = explode(' ', $this->keyWord);
		If ( is_array($tabWords) && count($tabWords)>1 )
		{
			foreach ( $tabWords As $index=>$val )
			{
				If ( $val ) { $this->items = array_merge($this->items, $this->_getSingleFromMsn($val)); }
			}
		}
		return true;
	}
	
	
	
 	Function saveToCache()
 	{
 		If ( $this->keyWord == '' ) { $this->keyWord = '_'; }
 		$cacheFileName = $this->cacheDir.BaseName(Str_Replace(' ', '_', $this->keyWord).'.html');
 		@Unlink($cacheFileName);
 		
		$fHandle = @FOpen($cacheFileName, 'w+');
		If ( Is_Resource($fHandle) )
		{
			Foreach ( $this->items As $val )
			{
				$content = $val['clean']."\n";
				$writeRes = @FWrite($fHandle, $content);
				If ( $writeRes === FALSE )
				{
					@Unlink($cacheFileName);
					@fclose($fHandle);
					return false;
				}
			}
		}
			else
		{
			@FClose($fHandle);
			return false;
		}
		@FClose($fHandle);
 	}
 
 	
 
 	Function loadFromCache()
 	{
 		$cacheFileName = $this->cacheDir.BaseName(Str_Replace(' ', '_', $this->keyWord).'.html');
 		
		If ( File_Exists($cacheFileName) && Is_readable($cacheFileName) )
		{
			$createTime = @filectime($cacheFileName);
			If ( $createTime === False ) { return false; }
	
			If ( ($createTime+$this->cacheTime) > time() || $this->cacheTime == 0 )
			{
			// Read cache
				$handle = FOpen($cacheFileName, 'r');
				If ( Is_Resource($handle) )
				{
					While (!feof($handle))
					{
    					$buffer = fgets($handle, 4096);
    					
						$item = array(
								'file' => preg_replace('/ /', '_', $buffer),
								'word' => $buffer
								);
  						If ( $this->textDecoration )
	  					{
	  						If ( StrLen($item['word']) > $this->wordWrap )
	  							{ $item['word'] = wordwrap($item['word'], $this->wordWrap, "<br />", 1); }
  							$item['word'] = Preg_Replace($this->pregKeyWord, '<b>\\0</b>', $item['word']);
  						}
    					If ( $item['word'] && $item['file'] ) { $this->items[] = $item; }
						$item = array();
		   			}
				}
				Return True;
			}
		}
		Return False;
 	}
 
 
 	
	Function filterKey($keyWord)
	{
		$arrayPreg = Array(
			'/[^\-a-zA-Z0-9ąâàâäăăáåãćçčęéèêëüùûúóöôżźžîïíšśłńýĎĄÂÀÄĂÁÅÃĆÇČĘÉÈÊËÜÙÚÛÓÖÔŻŹŽÎÏÍŠŚŁŃÝ]/',
			'/^[^\-a-zA-Z0-9ąâàâäăăáåãćçčęéèêëüùûúóöôżźžîïíšśłńýĎĄÂÀÄĂÁÅÃĆÇČĘÉÈÊËÜÙÚÛÓÖÔŻŹŽÎÏÍŠŚŁŃÝ]/', 
			'/ {1,}/',
			'/ {1,}$/'
		);
 		$arrayReplace = Array(' ', '', ' ', '');
 		return preg_replace($arrayPreg, $arrayReplace, $keyWord);
	}


	
	Function filterHtml($keyWord)
	{
		return str_replace(' ', '_', $keyWord);
	}

}// cKeyWordSuggest
?>