<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpBay Pro API - Example 3 - Refine by Bid Amount</title>
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
<h1>Refine by Bid Amount</h1>
<?
# are important files present?
if (!file_exists(".htaccess")) {echo "<p>Make sure you have copied <strong>.htaccess</strong> to this folder and followed instructions on the index.html page.</p>\r\n";exit;}
if (!file_exists("ebay.php")) {echo "<p>Make sure you have copied <strong>ebay.php</strong> to this folder and set the initial values.</p>\r\n";exit;}
if (!file_exists("auction.php")) {echo "<p>Make sure you have copied <strong>auction.php</strong> to this folder.</p>\r\n";exit;}
if (!file_exists("template.ebay.results.html")) {echo "<p>Make sure you have copied <strong>template.ebay.results.html</strong> to this folder.</p>\r\n";exit;}
?>
<p>In <a href="example2.php">example 2</a>, we refined the search results to list only items that had 2 or more bids. In this example, we'll further refine the list by eliminating lower priced items.</p>
<p>Why is this important? Some times auctioneers list items that are not necessarily what they say they are, in the wrong category, or it's a new item recently listed with little or no activity. Remember, our goal is create an emotional desire in the buyer (your web site visitor) that he/she must buy this item now. </p>
<p>So, let's add a line of code to the example so that we return items from the <strong>Wheels</strong> category with the keyword of <strong>bmw</strong>, where there are at least <strong>2 bids</strong> on any item and the current price is at least $<strong>200</strong> US. To achieve this, we'll add the following line of code:</p>
<pre>$ebay-&gt;eb_saprclo = &quot;200&quot;;</pre>
<p>Notice now, that the items returned all have active bids and are currently priced at least $200 or more. This can help create instant interest from the items you list on your site and help eliminate low paying or non-active items. </p>
<p>View the source code of this file to see the php code used. Click here for the next <a href="example4.php">example</a>.</p>
<h2>The Result</h2>
<?
#include ebay.php
require_once("ebay.php");
  
# a little error checking, just in case
if ($site_url == "http://www yourdomain com/") {echo "<p>Open <strong>ebay.php</strong> and set the initial values first.</p>\r\n";exit;}
  
# set the keyword from the example
$keywords = "bmw";

# set the Ebay category from the example
$category = "43953"; 

# create an instance of the ebay class
$ebay = new ebay();

# set the number of listings to display per page
$ebay->eb_frpp = "15";

# set the number of bids an item must have
$ebay->eb_sabdlo = "2";
# set this value to 1, when using eb_sabdlo or eb_sadbhi
$ebay->eb_fbd = "1";

# set the minimum price the item must have
$ebay->eb_saprclo = "200";

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