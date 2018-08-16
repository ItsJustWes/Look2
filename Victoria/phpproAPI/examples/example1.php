<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpBay Pro API - Example 1 - List Items by Category</title>
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
<h1>List Items by Category</h1>
<?
# are important files present?
if (!file_exists(".htaccess")) {echo "<p>Make sure you have copied <strong>.htaccess</strong> to this folder and followed instructions on the index.html page.</p>\r\n";exit;}
if (!file_exists("ebay.php")) {echo "<p>Make sure you have copied <strong>ebay.php</strong> to this folder and set the initial values.</p>\r\n";exit;}
if (!file_exists("auction.php")) {echo "<p>Make sure you have copied <strong>auction.php</strong> to this folder.</p>\r\n";exit;}
if (!file_exists("template.ebay.results.html")) {echo "<p>Make sure you have copied <strong>template.ebay.results.html</strong> to this folder.</p>\r\n";exit;}
?>
<p>To get started, you may have a specific set of Ebay categories you would like to list products from. To do this, we need the Ebay category. The easiest way to get the real number for an Ebay category is to visit the url. In this example, we'll use a category from Ebay Motors:</p>
<p>http://motors.listings.ebay.com/Wheels-Tires-Parts_Wheels_W0QQfrom<br />ZR4<strong>QQsacatZ</strong>43953<strong>QQ</strong>socmdZListingItemList<br />(<strong>note:</strong>  this url is wrapped onto a second line)</p>
<p>Click <a href="http://motors.listings.ebay.com/Wheels-Tires-Parts_Wheels_W0QQfromZR4QQsacatZ43953QQsocmdZListingItemList" target="_blank">here</a> to launch the URL in a new browser. Note the part of the URL above in bold. The category number is located between <strong>QQsacatZ</strong> and <strong>QQ</strong>. In this example, the category number is: <strong>43953</strong></p>
<p>From this category, we want to list   wheels, but there are over 15,000 wheels for sale, so we need to narrow it down. You could narrow it by brand, or by vehicle or a number of other ways. For this example, let's narrow it down to a specific vehicle - the Chevrolet Corvette. We'll use the keyword: <strong>bmw</strong></p>
<p>Finally, we want to list <strong>15</strong> items to return.</p>
<p>To understand how to put these values together, to list the Ebay auction items below, view the source code of this file.  Seven lines is all it takes to get items into your site file. Click here for the next <a href="example2.php">example</a>.</p>
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