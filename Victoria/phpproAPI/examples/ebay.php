<?
#########################################################################
#                                                                       #
#                   phpBay Pro Wordpress Plugin 2.0                     #
#                             Wired Studios                             #
#                         www.wiredstudios.com                          #
#                                                                       #
#########################################################################
# COPYRIGHT NOTICE                                                      #
# Copyright 2006-2007 Wired Studios, Inc.  All Rights Reserved.         #
#                                                                       #
# This script may be only used and modified in accordance to the        #
# license agreement attached (eula.txt) except where expressly          #
# noted within commented areas of the code body. This copyright notice  #
# and the comments above and below must remain intact at all times.     #
# By using this code you agree to indemnify Wired Studios, Inc, its     #
# corporate agents and affiliates from any liability that might arise   #
# from its use.                                                         #
#                                                                       #
# Selling the code for this program without prior written consent is    #
# expressly forbidden and in violation of Domestic and International    #
# copyright laws.                                                       #
#########################################################################
#                                                                       #
#                                History                                #
#  1.1 - Fixed code with exclude param (was - when should be +-)        #
#  1.2 - Created Wordpress Plugin for Pro Version                       #
#  1.3 - Minor tweaks including adjustments for mod_rewrite images      #
#  2.0 - Added support for 14 Countries                                 #
#        Results returned in country language/currency                  #
#        xhtml 1.0 transitional compliant                               #
#        Removed a few un-needed previous options related to countries  #
#        Added SID tracking                                             #
#        Added Support for CURL if file() fails                         #
#        Added min/max bid support                                      #
#                                                                       #
#########################################################################

  # complete url to your site, including a trailing forward slash
  $site_url = "http://www yourdomain com/";
  
  # if you are using Mediaplex for eBay, uncomment this line and comment the CJ line below
  //$aff_type = "afmp";
  
  # if you are using Commission Junction for eBay, uncomment this line and comment the CJ line above
  $aff_type = "afcj";
  
  # enter your ebay id from either Mediaplex or Commission Junction
  $ebay_pid = "12345678";
  
  # set to 1 to encode the ebay urls (obsfuscate).  To test and make sure your ebay ID is correct, set to 0
  #unless testing, you should leave this value to the default of 1
  $encode = 1;
  
  # use mod_rewrite for images (set to 1 to mask ebay image urls)
  $mod_rewrite = 1;

#########################################################################
#                        No further editing required                    #
#########################################################################


# eBay Class
class ebay{

  var $title = "";
  var $link_url = "";
  var $image = "";
  var $image_url = "";
  var $image_find = "http://thumbs.ebaystatic.com/pict/";
  var $image_replace = "images/e/";
  var $price = "";
  var $bids = "";
  var $end_date = "";
  var $bin_price = "";
  var $bid_now_url = "";
  var $buy_now_url = "";
  var $watch_url = "";
  var $html = "";
  var $encode = "";
  var $mod_rewrite = 0;
  var $site_url = "";
  var $buy_now_text = "";
  var $bid_now_text = "";
  var $watch_text = "";
  var $redirect_url = "auction.php?eb=";
  
  # default ebay search variables
  var $eb_rss_url = ""; # this url is built in xml_url()
  var $eb_base = "http://rss.api.ebay.com/ws/rssapi?";
  var $eb_FeedName = "SearchResults";
  var $eb_siteId = "0";
  var $eb_language = "en-US";
  var $eb_output = "RSS20";
  var $eb_catref = "C5";
  var $eb_sacqy = "";
  var $eb_sacur = "0"; # currency to display product lisings
  var $eb_fsop = "1";
  var $eb_fsoo = "1";
  var $eb_from = "R6";
  var $eb_sacqyop = "ge";
  var $eb_saprclo = ""; #min bid price
  var $eb_saprchi = ""; #max bid price
  var $eb_saaff = "afcj"; #affiliate type
  var $eb_ftrt = "1";
  var $eb_fcl = "3";
  var $eb_afcj = ""; # cj affiliate id
  var $eb_afmp = ""; # mediaplex affiliate id
  var $eb_frpp = "25"; # num results to display.
  var $eb_nojspr = "y";
  var $eb_satitle = ""; # keywords
  var $eb_exclude = ""; # words to exclude
  var $eb_salic = ""; # country code to display products from.  default is US.  see help.html
  var $eb_sasl = "";
  var $eb_sascs = ""; # set to 2, to display only 'Buy it Now' items
  var $eb_sacat = "-1";
  var $eb_saslop = "1";
  var $eb_fss = "0";
  var $eb_saatc = "1";
  var $eb_sid = "";
  var $eb_template = "template.ebay.results.html";
  var $eb_separator = " | ";
  var $eb_fbd = "";
  var $eb_sabdlo = "";
  var $eb_sabdhi = "";
  var $eb_fpos = "";
  var $eb_fspt = "";
  var $eb_sadis = "";

function listings($keywords, $category) {
  global $site_url, $ebay_pid, $aff_type, $encode, $mod_rewrite;
  
  # assign variables
  $this->eb_saaff = $aff_type;
  if ($this->eb_saaff == "afcj") {
    $this->eb_afcj = trim($ebay_pid);
  } else {
    $this->eb_afmp = trim($ebay_pid);
  }
  $this->eb_satitle = $keywords;
  $this->eb_sacat = "-1";
  if ($category > "") {$this->eb_sacat = $category;}
  $this->site_url = $site_url;
  $this->mod_rewrite = $mod_rewrite;
  $this->image_replace = $this->site_url . $this->image_replace;
  $this->encode = $encode;
  $this->redirect_url = $this->site_url . $this->redirect_url;
  if ($this->encode == 0) {$this->redirect_url = "";}
  $this->eb_satitle = urlencode($this->eb_satitle);
  
  # some error trapping before we query ebay
  if ($this->eb_saaff == "") {echo "Set the affiliate type variable in ebay.php"; exit;}
  if (($this->eb_afcj == "") && ($this->eb_afmp == "")) {echo "Set the affiliate id variable in ebay.php"; exit;}
  error_reporting(0);
  
  $this->eb_rss_url = $this->xml_url();
  
  # setup the RSS class
  $rss = new rss;
  $rss_html = "";
  $count = 0;
  $rss->get($this->eb_rss_url);
    foreach ($rss->itemInfo as $item) {
	  $count++;
	  # break up html onto lines so we can search it by line below and preg match the urls
	  $item['description'] = $this->makelines($item['description']);
	  
	  # get the item title
	  $this->title = str_replace("&", "&amp;", $item['title']);
	  
	  # get the ebay thumbnail image url
	  preg_match('/(?<=src=")(.*?)(?=")/', $item['description'], $match);
	  $this->image = $match[0];
	  # This preg_match has been inconsistent on some servers for getting the image
	  # so I've added a second attempt to get the thumbnail image if the preg_match fails
	  if ($this->image == "") {
	    $img = strstr($item['description'], 'http://thumbs.');
	    $pos = strpos($img, '.jpg');
	    $pos = $pos + 4;
	    $img = substr($img, 0, $pos);
	    $this->image = $img;
	  }
	  
	  # if mod_rewrite for images is enabled, rewrite the url
	  if ($this->mod_rewrite == "1") {
	    $this->image = str_replace($this->image_find, $this->image_replace, $this->image);
	  }
	  
	  # get the item price
	  preg_match('%(?<=<strong>)(.+?)(?=</strong>)%', $item['description'], $match);
	  $this->price = $match[0];
	  
	  # get the number of bids
	  preg_match('%(?<=</strong>)(.+?)(?=\r\n)%', $item['description'], $match);
	  $this->bids = $match[0];
	  
	  # get the item auction end date
	  preg_match('%(?<=<br />)(\r\n)(.+?)(\r\n)(?=<br />)%', $item['description'], $match);
	  $this->end_date = $match[0];
	  	  
	  # get main link
	  if ($this->encode == 1) {
	    $this->link_url = base64_encode($item['link']);
	  } else {
	    $this->link_url = $item['link'];
		$this->link_url = str_replace("&", "&amp;", $this->link_url);
	  }
	  
	  # put lines into array so we can walk through and base64_encode the a href urls to obfuscate
	  $html = explode("\r\n", $item['description']);
	  
	  for ($i = 0; $i <= count($html); $i ++) {
	    $line = $html[$i];
		$pos = strpos($line, '<a href="');
		
		if ($pos === false) {
		  # do nothing
		} else {
		  # find the urls for the auction item and encode them
		  preg_match('/<a\s+.*?href=[\"\']?([^\"\' >]*)[\"\']?[^>]*>(.*?)<\/a>/i', $line, $match);

		  $pos = strpos($match[1], 'A102');
		    if ($pos) {
			  if ($this->encode == 1) {
			    $this->image_url = base64_encode($match[1]);
			  } else {
			    $this->image_url = str_replace("&", "&amp;", $match[1]);
			  }
			}

		  $pos = strpos($match[1], 'A103');
		    if ($pos) {

		      # Get the link anchor text
		      $htitle = strstr($line, 'A103">');
		      $pos = strpos($htitle, '</a>');
		      $pos = $pos - 6;
		      $this->bid_now_text = substr($htitle, 6, $pos);

			  if ($this->encode == 1) {
			    $this->bid_now_url = base64_encode($match[1]);
			  } else {
			    $this->bid_now_url = str_replace("&", "&amp;", $match[1]);
			  }
			}			  

		  $pos = strpos($match[1], 'A104');
		    if ($pos) {

		      # Get the link anchor text
		      $htitle = strstr($line, 'A104">');
		      $pos = strpos($htitle, '</a>');
		      $pos = $pos - 6;
		      $this->watch_text = substr($htitle, 6, $pos);

			  if ($this->encode == 1) {
			    $this->watch_url = base64_encode($match[1]);
			  } else {
			    $this->watch_url = str_replace("&", "&amp;", $match[1]);
			  }
			}			  

		  $pos = strpos($match[1], 'A105');
		    if ($pos) {

		      # Get the link anchor text
		      $htitle = strstr($line, 'A105">');
		      $pos = strpos($htitle, '</a>');
		      $pos = $pos - 6;
		      $this->buy_now_text = substr($htitle, 6, $pos);

			  if ($this->encode == 1) {
			    $this->buy_now_url = base64_encode($match[1]);
			  } else {
			    $this->buy_now_url = str_replace("&", "&amp;", $match[1]);
			  }
			}			  

		}
	  }
	  
	  # add SID tracking, if the eb_sid variable is set
	  if ($this->eb_sid > "") {
	    $this->link_url .= "&sid=" . $this->eb_sid;
	    $this->image_url .= "&sid=" . $this->eb_sid;
	    $this->bid_now_url .= "&sid=" . $this->eb_sid;
	    $this->watch_url .= "&sid=" . $this->eb_sid;
	    $this->buy_now_url .= "&sid=" . $this->eb_sid;
	  }

	  $this->formatHTML();
	  if (($count+1) > $this->eb_frpp) {break;}
    }

    if ($rss->counter <= 0) {
      $this->html = "No items matching your keywords were found.<br>\r\n";
    }
  }

function makelines($lines) {
  $lines = str_replace("<tr>", "\r\n  <tr>\r\n", $lines);
  $lines = str_replace("<td>", "    <td>\r\n", $lines);
  $lines = str_replace("</a>", "</a>\r\n", $lines);
  $lines = str_replace("</td>", "    </td>\r\n", $lines);
  $lines = str_replace("</tr>", "  </tr>\r\n", $lines);
  $lines = str_replace("</table>", "</table>\r\n", $lines);
  $lines = str_replace("<br />", "\r\n<br />\r\n", $lines);
  return $lines;
}

function formatHTML() {
  $html = file_get_contents($this->site_url . $this->eb_template);

  # if the file_get_contents() function fails, then try curl
  # some shared hosts prevent the use of file() for security reasons
  if ($html == false) {
    $ch = curl_init($this->site_url . $this->eb_template);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $xml = curl_exec($ch);
    curl_close($ch);
	$html = $xml;
  }

  $html = str_replace("%%image_url%%", $this->redirect_url . $this->image_url, $html);
  $html = str_replace("%%image%%", $this->image, $html);
  $html = str_replace("%%alt_title%%", $this->prepText($this->title), $html);
  $html = str_replace("%%link_url%%", $this->redirect_url . $this->link_url, $html);
  $html = str_replace("%%title%%", $this->title, $html);
  $html = str_replace("%%price%%", $this->price, $html);
  $html = str_replace("%%bids%%", $this->bids, $html);
  $html = str_replace("%%date%%", $this->end_date, $html);
  if ($this->bid_now_url > "") {
    $html = str_replace("%%bid_now%%", '<a href="' . $this->redirect_url . $this->bid_now_url . '" rel="nofollow" target="_blank">' . $this->bid_now_text . '</a>' . $this->eb_separator, $html);
  } else {
    $html = str_replace("%%bid_now%%", "", $html);
  }
  if ($this->buy_now_url > "") {
    $html = str_replace("%%buy_now%%", '<a href="' . $this->redirect_url . $this->buy_now_url . '" rel="nofollow" target="_blank">' . $this->buy_now_text . '</a>' . $this->eb_separator, $html);
  } else {
    $html = str_replace("%%buy_now%%", "", $html);
  }
  $html = str_replace("%%watch%%", '<a href="' . $this->redirect_url . $this->watch_url . '" rel="nofollow" target="_blank">' . $this->watch_text . '</a>', $html);
  $this->html .= $html;
}

function prepText($text) {
  $text = str_replace('/',' ',$text);
  $text = str_replace('-',' ',$text);
  $text = str_replace(' & ',' ',$text);
  $text = str_replace('"',' ',$text);
  $text = str_replace(".",' ',$text);
  $text = str_replace("'",' ',$text);
  $text = str_replace(",",' ',$text);
  $text = str_replace(' ','-',$text);
  $text = str_replace('-----','-',$text);
  $text = str_replace('----','-',$text);
  $text = str_replace('---','-',$text);
  $text = str_replace('--','-',$text);
  $text = str_replace(':','',$text);
  $text = str_replace('#','',$text);
  $text = str_replace('(','',$text);
  $text = str_replace('%','',$text);
  $text = str_replace(')','',$text);
  $text = strtolower($text);
  return $text;
}

function xml_url() {
  $url = $this->eb_base;
  $url .= "FeedName=" . $this->eb_FeedName . "&";
  $url .= "siteId=" . $this->eb_siteId . "&";
  $url .= "language=" . $this->eb_language . "&";
  $url .= "output=" . $this->eb_output . "&";
  $url .= "catref=" . $this->eb_catref . "&";
  $url .= "sacqy=" . $this->eb_sacqy . "&";
  $url .= "sacur=" . $this->eb_sacur . "&";
  if ($this->eb_fpos > "") {$url .= "fpos=" . $this->eb_fpos . "&";}
  $url .= "fsop=" . $this->eb_fsop . "&";
  $url .= "fsoo=" . $this->eb_fsoo . "&";
  $url .= "from=" . $this->eb_from . "&";
  
  if ($this->eb_fbd > "") {$url .= "fbd=" . $this->eb_fbd . "&";}
  if ($this->eb_sasl > "") {$url .= "sasl=" . $this->eb_sasl . "&";}
  
  $url .= "saobfmts=exsif&";
  $url .= "sacqyop=" . $this->eb_sacqyop . "&";
  $url .= "saslc=0&";
  $url .= "floc=1&";
  $url .= "sabfmts=0&";

  $url .= "saprclo=" . $this->eb_saprclo . "&";
  $url .= "saprchi=" . $this->eb_saprchi . "&";
  
  $url .= "saaff=" . $this->eb_saaff . "&";
  
  if (($this->eb_sabdlo > "") || ($this->eb_sabdhi > "")) {$url .= "sabdlo=" . $this->eb_sabdlo . "&";}

  $url .= "ftrv=1&";
  
  if ($this->eb_fspt > "") {$url .= "fspt=" . $this->eb_fspt . "&";}

  if (($this->eb_sabdlo > "") || ($this->eb_sabdhi > "")) {
    $url .= "sabdhi=" . $this->eb_sabdhi . "&";
  }

  $url .= "ftrt=" . $this->eb_ftrt . "&";
  $url .= "fcl=" . $this->eb_fcl . "&";
  
  if ($this->eb_saaff == "afcj") {
    $url .= "afcj=" . $this->eb_afcj . "&";
  } else {
    $url .= "afmp=" . $this->eb_afmp . "&";
  }
  
  $url .= "nojspr=" . $this->eb_nojspr . "&";
  $url .= "frpp=" . $this->eb_frpp . "&";
  $url .= "satitle=" . $this->eb_satitle;
  
  if ($this->eb_exclude > "") {
    $url .= "+-" . str_replace(" ", "+-", $this->eb_exclude) . "&";
  } else {
    $url .=  "&";
  }
  
  if ($this->eb_salic > "") {
    $url .= "salic=" . $this->eb_salic . "&";
  }
  
  if ($this->eb_sascs > "") {
    $url .= "sascs=" . $this->eb_sascs . "&";
  }

  $url .= "sacat=" . $this->eb_sacat . "&";
  $url .= "saslop=" . $this->eb_saslop . "&";
  $url .= "afmp=" . $this->eb_afmp . "&";
  $url .= "fss=" . $this->eb_fss;
  
  if ($this->eb_sadis > "") {$url .= "&sadis=" . $this->eb_sadis;}

  return $url;
}

} # end eBay class

# XML RSS Class
class rss {
  var $counter = 0;
  var $type = 0;
  var $tag = "";
  var $itemInfo = array();
  var $channelInfo = array();

function opening_element($xmlParser, $name, $attribute) {
  $this->tag = $name;
  if($name == "CHANNEL"){
    $this->type = 1;
  } else if($name == "ITEM") {
    $this->type = 2;
  }
}

function closing_element($xmlParser, $name){
  $this->tag = "";
  if($name == "ITEM") {
    $this->type = 0;
    $this->counter++;
  } else if($name == "CHANNEL") {
    $this->type = 0;
  }
}

function c_data($xmlParser, $data){
  if($this->tag == "TITLE" || $this->tag == "DESCRIPTION" || $this->tag == "LINK") {
    if($this->type == 1) {
      $this->channelInfo[strtolower($this->tag)] = $data;
    } else if($this->type == 2) {
      $this->itemInfo[$this->counter][strtolower($this->tag)] .= $data;
    }
  }
}

function get($xml_file) {
  $xmlParser = xml_parser_create();
  xml_set_object ($xmlParser, $this);
  xml_parser_set_option($xmlParser, XML_OPTION_CASE_FOLDING, TRUE);
  xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, TRUE);
  xml_set_element_handler($xmlParser, "opening_element", "closing_element");
  xml_set_character_data_handler($xmlParser, "c_data");

  $fp = file($xml_file);

  # if the file() function fails, then try curl
  # some shared hosts prevent the use of file() for security reasons
  if ($fp == false) {
    $ch = curl_init($xml_file);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $xml = curl_exec($ch);
    curl_close($ch);
    $fp = explode("\n", $xml);
  }

  foreach($fp as $line){
    if(!xml_parse($xmlParser, $line)) {
      die("Could not parse file.");
    }
  }
}

} # end RSS XML class

?>
