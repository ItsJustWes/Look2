<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpBay Pro API - Example 5 - Display Items from 14 Different Countries</title>
<style type="text/css">
<!--
body { background-color: #1f1f1f; font-family:Verdana, Arial; font-size: 12px;}
#container { margin: auto; width: 740px; margin-top: 25px; margin-bottom: 25px;}
#header { background-image:url(header.png); background-repeat: none; width: 740px; height: 100px; margin: auto;}
#body_top { background-image:url(t.png); background-repeat: none; width: 740px; height: 11px; margin-top: 20px; overflow: hidden;}
#body_center { background-image:url(c.png); background-repeat: repeat-y; width: 740px; overflow: hidden; padding: 10px;}
#p_image { background-image:url(pbp.png); background-repeat: none; width: 165px; height: 214px; float: left; margin:0 auto;}
#body_content {padding-right: 30px; width: 545px; float: right; margin:0 auto;}
p { line-height: 20px; color:#575757;}
h1 { font-family:  "Trebuchet MS", Arial, Helvetica, sans-serif; width: 100%; color: #006699; font-weight: bold; font-size: 22px;  margin: 0; margin-bottom: 10px; letter-spacing: -.4px }
h2 { font-family:  "Trebuchet MS", Arial, Helvetica, sans-serif; width: 100%; color: #006699; font-weight: bold; font-size: 22px;  margin: 0; margin-bottom: 10px; letter-spacing: -.4px }
pre { font-size: 12px;}
li { line-height: 20px;}
#body_footer { background-image:url(b.png); background-repeat: none; width: 740px; height: 12px; margin: auto; overflow: hidden;}
-->
</style>
</head>

<body>
<div id="container">
  <div id="header"></div>
  <div id="body_top"></div>
  <div id="body_center">
    <div id="p_image"></div>
	<div id="body_content">
	
<!-- begin main content -->
<h1>Display Items from 14 Different Countries</h1>
<?
# are important files present?
if (!file_exists(".htaccess")) {echo "<p>Make sure you have copied <strong>.htaccess</strong> to this folder and followed instructions on the index.html page.</p>\r\n";exit;}
if (!file_exists("ebay.php")) {echo "<p>Make sure you have copied <strong>ebay.php</strong> to this folder and set the initial values.</p>\r\n";exit;}
if (!file_exists("auction.php")) {echo "<p>Make sure you have copied <strong>auction.php</strong> to this folder.</p>\r\n";exit;}
if (!file_exists("template.ebay.results.html")) {echo "<p>Make sure you have copied <strong>template.ebay.results.html</strong> to this folder.</p>\r\n";exit;}
?>
<p>In <a href="example4.php">example 4</a>, we learned how to display auction items that only have photos. In this example, we'll learn how to set phpBay to search Ebay sites from other countries. phpBay Pro API supports results from 14 different countries. These include:</p>
<ul>
  <li>United States - siteId=0&amp;language=en-US</li>
  <li>Australia - siteId=15&amp;language=en-AU</li>
  <li>Austria - siteId=16&amp;language=de-AT</li>
  <li>Belgium - siteId=123&amp;language=nl-BE</li>
  <li>Canada - siteId=2&amp;language=en-CA</li>
  <li>France - siteId=71&amp;language=fr-FR</li>
  <li>Germany - siteId=77&amp;language=de-DE</li>
  <li>India - siteId=203&amp;language=en-IN</li>
  <li>Ireland - siteId=205 (no language here??)</li>
  <li>Italy - siteId=101&amp;language=it-IT</li>
  <li>Netherlands - siteId=146&amp;language=nl-NL</li>
  <li>Spain - siteId=186&amp;language=es-ES</li>
  <li>Switzerland - siteId=193&amp;language=de-CH</li>
  <li>United Kingdom - siteId=3&amp;language=en-GB</li>
</ul>
<p>Why is this important? Many developers like yourself live in countries around the world. This allows for a web site developer in Italy whose site is about Italy to list auction items from Italy. Offering your site visitors the opportunity to bid on items in their home country is good common sense. </p>
<p>Notice in the list above, after each country, there is a siteID= value and a language= value. These are the values we need to set in the phpBay code in order to display products from the given country.</p>
<p>To start off, let's set siteID=71 and language=fr-FR<br />
Then let's set the keyword to: mp3 player<br />
  and return 15 results</p>
<p>In the source of this file, where your phpBay code is, this would look like: </p>
<pre>
$ebay->eb_siteId = "71";
$ebay->eb_language = "fr-FR";
</pre>
<p>It's that simple! Just change these values to correspond with the values above for any of the countries listed, and not only are you listing items from that country, but the item text is in the language and that currency.</p>
<p>Keep in mind, that many countries do not have as many results for common items that may be available in the USA. That aside, it's a great way to offer local items to your visitors based upon the country your site is in. </p>
<p>View the source code of this file to see the php code used. Click here to view the next <a href="example6.php">example</a>. </p>
<h2>The Result</h2>
<?
#include ebay.php
require_once("ebay.php");
  
# a little error checking, just in case
if ($site_url == "http://www yourdomain com/") {echo "<p>Open <strong>ebay.php</strong> and set the initial values first.</p>\r\n";exit;}
  
# set the keyword from the example
$keywords = "mp3 player";

# set the Ebay category from the example
$category = ""; 

# create an instance of the ebay class
$ebay = new ebay();

# set the number of listings to display per page
$ebay->eb_frpp = "15";

# set the country code and language code
$ebay->eb_siteId = "71";
$ebay->eb_language = "fr-FR";

# call the main ebay class function
$ebay->listings($keywords, $category);

# display the auction listings
echo $ebay->html;

# That's really all there is to it!  Seven lines of code.
?>
<!-- end main content -->

	</div>
  </div>
  <div id="body_footer"></div>
</div>
</body>
</html>