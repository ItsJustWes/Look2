<?
$extra = "News";


$key = str_replace(" ","+",$q);
$key = addslashes(htmlspecialchars($key));

if($NEWS_ARTICLE) {
	include $NEWS_ARTICLE;
	echo "<br><br>";
}

require_once("rss_fetch.inc");

$count = 0;
if($NEWS_NUMBER==0)
	$limit = 5;
else
	$limit = $NEWS_NUMBER;
	
if($NEWS_SOURCE==1)
	$rss = "http://news.google.com/news?hl=en&ned=us&q=$key&ie=UTF-8&output=rss";
else
	$rss = "http://news.search.yahoo.com/news/rss?ei=UTF-8&p=$key&c=&eo=UTF-8";

$rss2 = fetch_rss($rss);
foreach ($rss2->items as $item) {
	
	if($count>=$limit)
		break;
		
	$link = $item['link'];
	$title = $item['title'];
	$date = $item['pubdate'];
	$description = str_replace("<B>","",$item['description']);
	$description = str_replace("&lt;B&gt;","",$description);
	$description = str_replace("</B>","",$description);
	$description = str_replace("&lt;/B&gt;","",$description);
	$description = str_replace("<b>","",$description);
	$description = str_replace("&lt;b&gt;","",$description);
	$description = str_replace("</b>","",$description);
	$description = str_replace("&lt;/b&gt;","",$description);
	$description = str_replace("<br><br>","<br>",$description);
	
	if(($count==0) && ($NEWS_SOURCE==1))
		$description = substr($description,4);
	
	$length = strlen($title);
	$i=0;
	
	while($i<$length) {
		$char = $title[$i];
		if(!ctype_alnum($char) && !ctype_punct($char) && !ctype_space($char) && !ctype_xdigit($char) && !ctype_cntrl($char))
			$title = str_replace($char,"",$title);
		$i++;
	}
	
	$length = strlen($description);
	$i=0;
	
	while($i<$length) {
		$char = $description[$i];
		if(!ctype_alnum($char) && !ctype_punct($char) && !ctype_space($char) && !ctype_xdigit($char) && !ctype_cntrl($char))
			$description = str_replace($char,"",$description);
		$i++;
	}
	
	if($NEWS_SOURCE==1)
		echo "$description";
	else
		echo "<strong><a href=\"$link\" target=_blank style=\"color:#800000;\">$title</a></strong><br />$description | <br><font size='1'><i>$date</i></font>.<br><br>";
	
	$count++;
}

if($NEWS_SOURCE==1)
	echo "";
else
	echo "";

?>