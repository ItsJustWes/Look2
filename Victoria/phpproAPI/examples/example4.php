<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpBay Pro API - Example 4 - Display Items with Photos Only</title>
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
<h1>Display Items with Photos Only</h1>
<?
# are important files present?
if (!file_exists(".htaccess")) {echo "<p>Make sure you have copied <strong>.htaccess</strong> to this folder and followed instructions on the index.html page.</p>\r\n";exit;}
if (!file_exists("ebay.php")) {echo "<p>Make sure you have copied <strong>ebay.php</strong> to this folder and set the initial values.</p>\r\n";exit;}
if (!file_exists("auction.php")) {echo "<p>Make sure you have copied <strong>auction.php</strong> to this folder.</p>\r\n";exit;}
if (!file_exists("template.ebay.results.html")) {echo "<p>Make sure you have copied <strong>template.ebay.results.html</strong> to this folder.</p>\r\n";exit;}
?>
<p>In <a href="example3.php">example 3</a>, we further refined the search results to list only items that had at least a current bid price of $200. In this example, we're going to scale back and remove the fine tuning in example 2 and 3 to learn how to display items that have photos only. </p>
<p>Why is this important? Photos help sell the product. Many sellers over look how valuable a photo can be. Some sellers don't really care and some just don't know how to add a photo or have a camera. Whatever their reason, it's best to try and display results that have photos, so we'll weed out those that do not. </p>
<p>So, let's add a line of code to the example so that we return 15 items from the <strong>Wheels</strong> category with the keyword of <strong>bmw</strong>, where there are at least <strong>2 bids</strong> on any item and list items with <strong>photos only</strong>. To achieve this, we'll add the following line of code:</p>
<pre>$ebay-&gt;eb_fcl = &quot;4&quot;;</pre>
<p>Normally this value is &quot;3&quot; which means to list all items with or without photos. By setting it to &quot;3&quot; we can list only items that have a photo. </p>
<p>View the source code of this file to see the php code used. Click here for the next <a href="example5.php">example</a>.</p>
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

# list only items that have a photo
$ebay->eb_fcl = "4";

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