<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpBay Pro API - Example 6 - Display Items from a Specific Seller</title>
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
<h1>Display Items from a Specific Seller</h1>
<?
# are important files present?
if (!file_exists(".htaccess")) {echo "<p>Make sure you have copied <strong>.htaccess</strong> to this folder and followed instructions on the index.html page.</p>\r\n";exit;}
if (!file_exists("ebay.php")) {echo "<p>Make sure you have copied <strong>ebay.php</strong> to this folder and set the initial values.</p>\r\n";exit;}
if (!file_exists("auction.php")) {echo "<p>Make sure you have copied <strong>auction.php</strong> to this folder.</p>\r\n";exit;}
if (!file_exists("template.ebay.results.html")) {echo "<p>Make sure you have copied <strong>template.ebay.results.html</strong> to this folder.</p>\r\n";exit;}
?>
<p>In <a href="example5.php">example 5 </a>, we learned how to display auction items from different countries. This opens a whole new world to many Ebay affiliates who want to focus on items in or made for their country. </p>
<p>In this example, we'll look at how to list items from a specific Ebay seller. Why is this important? Many Ebay Sellers want a simple and easy way to list their auction items on their home page. You may have your own auctions that you would like to list, or know a specific vendor who caters to the types of items you want to list.</p>
<pre>
$ebay->eb_sasl = "EbayUserID";
$ebay->eb_fss = "1";
</pre>
<p>It's that simple! Just two options to set, and you can list items from a specific seller. To list all auctions by that seller, leave the keyword variable blank. </p>
<p>Keep in mind, that this will only return items listed by this particular Seller, so unless they have many items on auction, the results may be small. </p>
<p>View the source code of this file to see the php code used. Click here to view the next <a href="example7.php">example</a>. </p>
<h2>The Result</h2>
<?
#include ebay.php
require_once("ebay.php");
  
# a little error checking, just in case
if ($site_url == "http://www yourdomain com/") {echo "<p>Open <strong>ebay.php</strong> and set the initial values first.</p>\r\n";exit;}
  
# leave $keywords blank to list all items by this seller
$keywords = "";

# set the Ebay category from the example
$category = ""; 

# create an instance of the ebay class
$ebay = new ebay();

# set the number of listings to display per page
$ebay->eb_frpp = "15";

# set the Seller's ID to list by specific Seller
$ebay->eb_sasl = "corvettegarage";
$ebay->eb_fss = "1";

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