<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpBay Pro API - Example 7 - Display Items by Postal Code</title>
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
<h1>Display Items by Postal Code</h1>
<?
# are important files present?
if (!file_exists(".htaccess")) {echo "<p>Make sure you have copied <strong>.htaccess</strong> to this folder and followed instructions on the index.html page.</p>\r\n";exit;}
if (!file_exists("ebay.php")) {echo "<p>Make sure you have copied <strong>ebay.php</strong> to this folder and set the initial values.</p>\r\n";exit;}
if (!file_exists("auction.php")) {echo "<p>Make sure you have copied <strong>auction.php</strong> to this folder.</p>\r\n";exit;}
if (!file_exists("template.ebay.results.html")) {echo "<p>Make sure you have copied <strong>template.ebay.results.html</strong> to this folder.</p>\r\n";exit;}
?>
<p>In <a href="example6.php">example 6 </a>, we learned how to display auction items from a specific Ebay Seller. In this example, we'll see how to localize item listings by displaying items from or close to a specific postal code. </p>
<p>Why is this important? Let's say you have a site that caters to a specific area in the world. Like Dallas, Texas or Frankfurt, Germany. You can offer your site visitors auction items are available locally. This encourages users to look and place bids, because giving a sense of comfort because the items are local to where they reside. </p>
<p>Do keep in mind, that by using this setting, you can potentially expect less results to appear. This is especially true for areas with a small population. It's also good, when you are hoping to entice local customers. For example, if your site is about a Corvette Club in Dallas, Texas, then listing Corvettes available in the Dallas Texas Area would be quite beneficial. </p>
<p>In the source of this file, where your phpBay code is, this would look like: </p>
<pre>
$ebay->eb_fspt = "1";
$ebay->eb_fpos = "75204";
$ebay->eb_sadis = "100";
</pre>
<p>So what do these settings mean?<br />
  <strong>fspt</strong> - means to search by Postal Code<br />
  <strong>fpos</strong> - the Postal Code search near<br />
  <strong>sadis</strong> - how many miles away from the Postal Code to search</p>
<p>Basically, you are turning on the search by Postal Code, then telling Ebay which Postal Code to use, then specifying up to how many miles away to return results for the search, from the Postal Code. </p>
<p>View the source code of this file to see the php code used. Click here to view the <a href="summary.html">summary</a>. </p>
<h2>The Result</h2>
<?
#include ebay.php
require_once("ebay.php");
  
# a little error checking, just in case
if ($site_url == "http://www yourdomain com/") {echo "<p>Open <strong>ebay.php</strong> and set the initial values first.</p>\r\n";exit;}
  
# set the keyword from the example
$keywords = "corvette";

# set the Ebay category for Corvettes
$category = "6168"; 

# create an instance of the ebay class
$ebay = new ebay();

# set the number of listings to display per page
$ebay->eb_frpp = "15";

# fspt = "1" tells Ebay to activate "By Postal Code"
# fpos = the Postal Code to use
# sadis = number of miles outside of the Postal Code to search
$ebay->eb_fspt = "1";
$ebay->eb_fpos = "75204";
$ebay->eb_sadis = "100";

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