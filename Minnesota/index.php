
<html>	 
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
<title>Minnesota Yellowpages | Minnesota tickets</title> 
<meta name="keywords" content="Minnesota, Minnesota Search, minnesota business search, minnesota business address, Minnesota business, Minnesota yellowpages, Minnesota state yellowpages, Look2 yellowpages, minnesota tickets, minneapolis tickets, vikings tickets, minnesota vikings tickets, minnesota wild tickets, minnesota twins tickets, minnesota sport tickets, metrodome tickets, mn twins tickets, mn vikings tickets, mn wild tickets">

<meta name="description" content="Minnesota Yellowpages and Business Search"> 
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="Content-Language" content="en-us">
<link rel="stylesheet" href="/dub.css" type="text/css"/>

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>

         

  <SCRIPT LANGUAGE="JavaScript">function selecturl(s) 

{

  var gourl = s.options[s.selectedIndex].value;



  if ((gourl != null) && (gourl != "") )

  {

    window.top.location.href = gourl;

  }

}

</SCRIPT>


</head>

<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Minnesota Yellowpages - Business search</h2>
</div>
	
<div id="wrap">
   	<div id="header" align="center"><br>
	<h1><strong>Minnesota</strong></h1>
	</div>
<div id="content">	
  
   
<div align="center">
<p><font face="Verdana" size="2" color="#000000"><b>Search Minnesota</b>:</font></p>

<form style="margin: 0px" action="q.php" method=get> 
<input name="q" type="text" value="" size="31">
<input type=submit value="Search" class="current">
</form>

<br>
</div>




<div id="tablespecial" align="center">

    <table width="800px valign="top" align="center">
  <tr>
    <td width="100%"><b><font face="Verdana" size="2">Search by City</font></b>
	</td>
	</tr>
	</table>
	
   <table width="800px valign="top" align="center">
  <tr>
        <td width="20%" valign="top">
	<a href="city.php?c=Minneapolis">Minneapolis</a><br />
    <a href="city.php?c=Saint Paul">Saint Paul</a>
	      </td>
    <td width="20%" valign="top">
	<a href="city.php?c=Rochester">Rochester</a></font><br />
    <a href="city.php?c=Duluth">Duluth</a>
	      </td>
    <td width="20%" valign="top">
	<a href="city.php?c=Bloomington">Bloomington</a><br />
    <a href="city.php?c=Plymouth">Plymouth</a>
	      </td>
    <td width="20%" valign="top">
	<a href="city.php?c=Brooklyn Park">Brooklyn Park</a><br />
    <a href="city.php?c=Eagan">Eagan</a>
	      </td>
    <td width="20%" valign="top">
	<a href="city.php?c=Coon Rapids">Coon Rapids</a><br />
    <a href="city.php?c=St Cloud">St Cloud</a>
	      </td>
  </tr>
   </table>
<hr align="center" width="800px" size="1px" color="#000000">

      <table border="0" width="800" cellspacing="0" cellpadding="2" >
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; Minnesota popular business listings:&nbsp;&nbsp; </font>
      <a style="text-decoration: none" href="categories.php">
      <font color="#800000">All Categories</font></a></b>	  	  </td>
  </tr>
  <tr>
    
    <td width="200" valign="top">
  <a href="Attorneys.htm">Attorneys</a> <br />
  <a href="Nightclubs.htm">Night Clubs</a><br />
  <a href="Hotel.htm">Hotels</a><br />
  <a href="Insurance.htm">Insurance</a><br />
  <a href="Real Estate.htm">Real Estate</a><br />
  <a href="Movers.htm">Movers</a><br />
  <a href="Golf Courses.htm">Golf Courses</a><br />
  <a href="Florists.htm">Florist</a><br />
      </td>
    <td width="200" valign="top">
  <a href="Used Cars.htm">Used Cars</a><br />
  <a href="Acura.htm">Acura Dealers </a><br />
  <a href="Toyota.htm">Toyota Dealers </a><br />
  <a href="BMW.htm">BMW Dealers </a><br />
  <a href="Auto Insurance.htm">Auto Insurance</a><br />
  <a href="Car Rental.htm">Car Rental</a><br />
  <a href="Boat Dealers.htm">Boat Dealers</a><br />
  <a href="Dining and Restaurants.htm">Dining &amp; Restaurants</a><br />
       </td>
    <td width="200" valign="top">
  <a href="Financial Services.htm">Financial Services</a><br />
  <a href="Carpenters.htm">Carpenters</a><br />
  <a href="Dentist.htm">Dentists</a><br />
  <a href="Beauty Salons.htm">Beauty Salons</a><br />
  <a href="Apartment and Home Rental.htm">Apartment & Home Rental</a><br />
  <a href="Moving and Storage.htm">Moving & Storage</a><br />
  <a href="Martial Arts.htm">Martial Arts</a><br>
  <a href="Real Estate.htm">Real Estate</a><br> 
           </td>
  <td width="200" valign="top">
  <a href="Family Planning Services.htm">Family Planning Services</a><br>
  <a href="School Supplies.htm">School Supplies</a><br>
  <a href="Fishing Areas.htm">Fishing Areas</a><br>
  <a href="Furniture Renting and Leasing.htm">Furniture Renting and Leasing</a><br>
  <a href="Health Services.htm">Health Services</a><br>
  <a href="Factory Outlet Stores.htm">Factory Outlet Stores</a><br>
  <a href="Exercise Equipment.htm">Exercise Equipment</a><br>
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
<font face="Verdana" size="3" color="#800000"><b>Minnesota Tickets</b></font>


</center>
   <?php

require_once("ebay.php");
 $keywords = "minnesota tickets";
 # ebay category is optional.  if not used, it will default to search all categories
 $category = ""; 
 # create an instance of the ebay class
 $ebay = new ebay();
 # set the number of listings to display per page
 $ebay->eb_frpp = "50";
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
$XMLFILE = "http://www.weather.gov/data/current_obs/KMSP.rss";
$TEMPLATE = "http://www.look2minnesota.com/weather.html";
$MAXITEMS = "5";
include("rss2html.php");
?>
<br />
<?php
$XMLFILE = "http://www.bignewsnetwork.com/index.php?rss=776a3ac3c6f714a2";
$TEMPLATE = "http://www.look2minnesota.com/otherRSS.html";
$MAXITEMS = "5";
include("rss2html.php");
?>
<br />
 
  <?php
$XMLFILE = "http://www.greatnewsnetwork.org/index.php/rss/feed/314";
$TEMPLATE = "http://www.look2minnesota.com/news.html";
$MAXITEMS = "10";
include("rss2html.php");
?>
</td></tr></table>
<hr align="center" width="800px" size="1px" color="#000000">

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Yellowpage Directories:&nbsp;&nbsp; </font></b>                        <font color="#FF0000">find what your looking for fast!</font></td>
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
  <a href="http://www.look2albuquerque.com">Albuquerque New Mexico </a><br />
  <a href="http://www.look2raleigh.com">Raleigh North Carolina </a><br /></font>
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
  <a href="http://www.look2charlotte.net">Charlotte North Carolina</a><br /> 
  <a href="http://www.look2omaha.com">Omaha Nebraska </a><br />
  <a href="http://www.look2reno.com">Reno Nevada </a><br /> 
  <a href="http://www.look2glendale.com">Glendale Arizona</a><br /></font>
  </td>
  </tr>
</table>
</div>
  
 <!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2612814; 
var sc_invisible=0; 
var sc_partition=25; 
var sc_security="27535255"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c26.statcounter.com/counter.php?sc_project=2612814&java=0&security=27535255&invisible=0" alt="website stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://look2minnesota.com/privacypolicy.html">Privacy Policy</a>
</div>
</div>
</div>
</center>
</body>
</html>