
<html>	 
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
<title>Las Vegas | Nevada Yellowpages | Business Search</title> 
<meta name="keywords" content="Las Vegas, Las Vegas Nevada, business search, business address, Las Vegas business, Las Vegas yellowpages, nevada yellowpages, Look2 yellowpages">


<meta name="description" content="Look2 Las Vegas Yellowpages and Business Search"> 

<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="Content-Language" content="en-us">
<link rel="stylesheet" href="/dub.css" type="text/css"/>
</head>
<body><center>
<div id="wrap">
<div id="header"><h1><strong>Las Vegas</strong><br>Nevada Yellowpages</h1>
</div>
<div id="content">

<div align="center">
<p><font face="Verdana" size="2" color="#800000"><b>Las Vegas Business Search</b>:</font></p>

<form style="margin: 0px" action="search.php" method=get> 
<input name="q" type="text" value="" size="31">
<INPUT TYPE=submit value="Search" class="current">
</form>

<br>
</div>




<div id="tablespecial" align="center">
      <table border="0" width="800" cellspacing="0" cellpadding="2" >
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; Las Vegas | Business Search:&nbsp;&nbsp; </font>
      <a style="text-decoration: none" href="cat.php">
      <font color="#800000">All Categories</font></a></b>
	  	  </td>
  </tr>
  <tr>
    
    <td width="200" valign="top">
  <a href="Wedding Chapels.htm">Wedding Chapels</a> <br />
  <a href="Nightclubs.htm">Night Clubs</a><br />
  <a href="Employment.htm">Employment</a><br />
  <a href="Hotel.htm">Hotels</a><br />
  <a href="Insurance.htm">Insurance</a><br />
  <a href="Real Estate.htm">Real Estate</a><br />
  <a href="Movers.htm">Movers</a><br />
  <a href="Hospital.htm">Hospitals</a><br />
  <a href="Golf Courses.htm">Golf Courses</a><br />
  <a href="Florists.htm">Florist</a><br />
  <a href="Computer Repair.htm">Computer Repair</a>     </td>
    <td width="200" valign="top">
  <a href="Used Cars.htm">Used Cars</a><br />
  <a href="Honda.htm">Honda Dealers </a><br />
  <a href="Acura.htm">Acura Dealers </a><br />
  <a href="Toyota.htm">Toyota Dealers </a><br />
  <a href="BMW.htm">BMW Dealers </a><br />
  <a href="Auto Insurance.htm">Auto Insurance</a><br />
  <a href="Car Rental.htm">Car Rental</a><br />
  <a href="Towing.htm">Towing</a><br />
  <a href="Auto Parts Retail.htm">Auto Parts</a><br />
  <a href="Dining and Restaurants.htm">Dining &amp; Restaurants</a><br />
  <a href="Restaurants Chinese.htm">Chinese Restaurants</a><br />      </td>
    <td width="200" valign="top">
  <a href="Financial Services.htm">Financial Services</a><br />
  <a href="Drug Stores and Pharmacies.htm">Drug Stores & Pharmacies</a><br />
  <a href="Dentist.htm">Dentists</a><br />
  <a href="Beauty Salons.htm">Beauty Salons</a><br />
  <a href="Massage.htm">Massage</a><br />
  <a href="Apartment and Home Rental.htm">Apartment & Home Rental</a><br />
  <a href="Moving and Storage.htm">Moving & Storage</a><br />
  <a href="Stadiums Arenas and Athletic Fields.htm">Stadiums Arenas and Athletic Fields</a><br>
  <a href="search.php?q=Real Estate - All">Real Estate</a><br>          </td>
  <td width="200" valign="top">
  <a href="Family Planning Services.htm">Family Planning Services</a><br>
  <a href="School Supplies.htm">School Supplies</a><br>
  <a href="Fraternal Organizations.htm">Fraternal Organizations</a><br>
  <a href="Furniture Renting and Leasing.htm">Furniture Renting and Leasing</a><br>
  <a href="Health Services.htm">Health Services</a><br>
  <a href="Internet Service Providers (ISPs).htm">Internet Service Providers (ISPs)</a><br>
  <a href="Junior Colleges and Technical Institutes.htm">Junior Colleges and Technical Institutes</a><br>
  <a href="Party Supplies.htm">Party Supplies</a><br>
           </td>
      </tr>
</table>
</div>

<hr align="center" width="800px" size="1px" color="#000000">

<table border="0" width="800" cellspacing="0" cellpadding="0">
  <tr>
 <td width="400px" valign="top" colspan="5">
 <center>
<font face="Verdana" size="2" color="#800000"><b>Las Vegas Tickets</b></font>


</center>
   <?php

require_once("ebay.php");
 $keywords = "Las Vegas";
 # ebay category is optional.  if not used, it will default to search all categories
 $category = "16122"; 
 # create an instance of the ebay class
 $ebay = new ebay();
 # set the number of listings to display per page
 $ebay->eb_frpp = "25";
 #minimum dollar amount
 $ebay->eb_saprclo = "5";
 #minimum bids
 $ebay->eb_sabdlo = "1";
 $ebay->eb_fbd = "0";
 #order ending soonest
 $ebay->eb_fsop = "1";
$ebay->eb_fsoo = "1";
 # create the listings content
 $ebay->listings($keywords, $category);
 #display the listings
 echo $ebay->html;

?>			   
</td>

    <td width="400px" valign="top" colspan="5">

<?php
$XMLFILE = "http://www.weather.gov/data/current_obs/KLAS.rss";
$TEMPLATE = "http://www.look2lasvegas.com/weather.html";
$MAXITEMS = "5";
include("rss2html.php");
?>
<br>
<?php
$XMLFILE = "http://www.lasvegasnow.com/Global/category.asp?C=13530&clienttype=rss";
$TEMPLATE = "http://www.look2lasvegas.com/otherRSS.html";
$MAXITEMS = "5";
include("rss2html.php");
?>

 <br>
  <?php
$XMLFILE = "http://www.lasvegasnow.com/Global/category.asp?C=5546&nav=1VGI&clienttype=rss";
$TEMPLATE = "http://www.look2lasvegas.com/news.html";
$MAXITEMS = "10";
include("rss2html.php");
?>
</td></tr></table>
<hr align="center" width="800px" size="1px" color="#000000">

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Yellowpage Directories:&nbsp;&nbsp; </font></b>                        <font color="#FF0000">find that business address fast!</font></td>
  </tr>
  <tr>
    
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2fortcollins.com">Fort Collins Colorado</a> <br />
  <a href="http://www.look2indianapolis.com">Indianapolis Indiana</a><br />
  <a href="http://www.look2portland.com">Portland Oregon</a><br />
  <a href="http://www.look2spokane.com">Spokane Washington</a><br />
  <a href="http://www.look2lasvegas.com">Las Vegas Nevada</a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2mesa.com">Mesa Arizona</a><br />
  <a href="http://www.look2chandler.com">Chandler Arizona</a><br />
  <a href="http://www.look2tucson.com">Tucson Arizona</a><br />
  <a href="http://www.look2albuquerque.com">Albuquerque NM </a><br />
  <a href="http://www.look2raleigh.com">Raleigh NC </a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2henderson.com">Henderson Nevada</a><br />
  <a href="http://www.look2oregon.com">Oregon</a><br />
  <a href="http://www.look2newmexico.com">New Mexico</a><br />
  <a href="http://www.look2utah.com">Utah</a><br />
  <a href="http://www.look2washington.com">Washington State</a><br /></font>
        </td>
  <td width="200" valign="top"><font size="1">
  <a href="http://www.look2phoenix.com">Phoenix Arizona</a><br />
  <a href="http://www.look2charlotte.net">Charlotte NC</a><br /> 
  <a href="http://www.look2omaha.com">Omaha Nebraska </a><br />
  <a href="http://www.look2reno.com">Reno Nevada </a><br /> 
  <a href="http://www.look2glendale.com">Glendale Arizona</a><br /></font>
  </td>
  </tr>
</table>
</div>
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2303074; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="ec43e7aa"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2303074&amp;java=0&amp;security=ec43e7aa&amp;invisible=1" alt="site stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->  
 
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://look2lasvegas.com/privacypolicy.html">Privacy Policy</a>
</div>
</div>
</div></center>
</body>
</html>