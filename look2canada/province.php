
<?php
echo "<html>	\n";
echo "<head>	\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">	\n";
echo "<title>$s Yellowpages</title>\n";
echo "<meta name=\"keywords\" content=\"$s Yellowpages\">	\n";
echo "<meta name=\"description\" content=\"$s Yellowpages\"> 	\n";
?>
<link href="dub.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Searchable Business Directory - All Canadian Provinces - Look2Canada.com</h2>
</div>
	
<div id="wrap">
<a href="index.php">
   	<div id="header" align="center"><br>
	<h1><strong>Canada</strong></h1>
	</div></a>
<div id="content">

<table border="0" width="100%">
  <tr>
    <td>
    <center>
    
  <?php
echo "       <b><font face=\"Verdana\" color=\"#000000\" size=\"2\">Search $s Yellowpages</font> </b><br>\n";
      
echo " <center>     <form style=\"margin: 0px\" action=\"s.php\" method=get> \n";
echo "              <input name=s type=hidden value=\"$s\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search $s YP\"></center></form>\n";
    
?>  
</td>
  </tr>
  </table>
    <table width="100%" bgcolor="#FFFFD2" cellspacing="0" style="border-top:1px groove #000000; border-bottom:1px groove #000000;">
      <tr>
        <td><b><font face="Verdana" size="2">&nbsp; 
<?php
echo "        <a title=\"Go To Yellowpages Home\" href=\"index.php\">Home</a>\n";
?>
<font face="Times New Roman" size="2">&#9642;</font>
<?php

echo "     <a title=\"Over 850 Business Categories\" href=\"provincialcats.php?s=$s&c=$c\">$s Business Categories</a>\n";
?>
<font face="Times New Roman" size="2">&#9642;</font>
<?php
        

echo " <a href=\"citylist.php?s=$s&c=$c\">Complete City List</a></font></b></td></tr></table>\n";


echo "<table width=\"100%\" style=\"border-bottom:1px groove #000000;\">
<tr> <td width=\"80%\" valign=\"top\">\n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "cityaddon.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?keywords=" . urlencode('$s') . "&s=$s";
} else {
	$remote_url .= "?keywords=" . urlencode($s) . "&matches=$matches&first=$first";
}
//include
@include $remote_url;

echo "</td></tr></table>\n";
echo "<center>     \n";
echo " 
<table width=\"100%\">
  <tr>
  <td width=\"100%\" valign=\"top\"> \n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google3.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 

echo "</td></tr></table>\n";
echo "</center>     \n";
echo " 
<table width=\"100%\">
  <tr>
  <td width=\"33%\" valign=\"top\"> \n";
  
$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google5.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url;   
  
echo "</td>
   <td width=\"33%\" valign=\"top\">
<center><b><h2>$s</h2><br><font style=\"color:#800000;\">Base Categories</font> 
  <br><font face=\"Verdana\" color=\"#ffffff\" size=\"1\">
  <a href=\"provincialcats.php?s=$s\" style=\"color:#800000;\">
   All Categories</a></center></b>

<font face=\"Verdana\" size=\"2\">
<a style=\"text-decoration: none;\" href=\"s.php?s=$s&q=Accountants\">Accountants</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Advertising\">Advertising</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Antiques\">Antiques</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Apartment Rentals\">Apartments</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Arts and Crafts\">Arts &amp; Crafts</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Attorneys\">Attorneys</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Auto Dealers\">Auto Dealers</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Auto Repair\">Auto Repair</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Banks\">Bank &amp; Financial</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Beauty Salons \">Beauty Salons</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Bed and Breakfasts\">Bed &amp; Breakfasts</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Book Dealers\">Bookstores</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Vacation Rentals\">Cabin Rentals</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Campgrounds\">Campgrounds</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Carpet and Rug Cleaners\">Carpet and Rug</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Childcare\">Child Care</a><br> 
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Chiropractors\">Chiropractors</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Churches\">Churches</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Clothing\">Clothing Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Cleaners\">Cleaners</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Coffee and Tea\">Coffee &amp; Tea</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Computer Repair\">Computers</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Construction Companies\">Construction</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=General Contractors\">Contractors</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Dentists\">Dentists</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Physicians\">Doctors</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Dry Cleaners\">Dry Cleaners</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Electric Equipment and Supplies\">Electrical Supply</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Rental Service - Stores and Yards\">Equipment Rentals</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Farm Equipment\">Farm &amp; Equipment</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Florists and Flowers\">Florists</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Furniture\">Furniture Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Garden Centers\">Garden and Supply</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Gifts\">Gifts &amp; Collectibles</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Grocery Stores\">Grocery Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Organizations\">Groups &amp; Organizations</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Hardware Stores\">Hardware Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Air Conditioning and Heating\">Heating and Air</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Hospitals\">Hospitals</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Hotels and Motels\">Hotels &amp; Motels</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Insurance Agents and Brokers\">Insurance Agents</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Internet Products and Services\">Internet Businesses</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Jewelers and Jewelry\">Jewelers</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Locksmiths - Security Systems\">Locksmiths / Security</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Moving - Hauling\">Movers &amp; Haulers</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Movie Theatres\">Movie Theaters</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Music Instruction\">Music Instruction</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Newspapers and Magazines\">Newspapers & Magazines</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Optometrists\">Optometrists</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Parks and Recreation\">Parks &amp; Recreation</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Pediatricians\">Pediatricians</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Pet Supplies\">Pets &amp; Supplies</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Photography - Photographers\">Photography</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Pizza Restaurants\">Pizza Shops</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Plumbing Contractors\">Plumbers</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Printing Services\">Printers</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Quilting - Alterations and Tailoring\">Quilting &amp; Sewing</a>><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Radio Stations\">Radio Stations</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Real Estate\">Real Estate</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Restaurants\">Restaurants</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Schools\">Schools</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Sporting Goods\">Sporting Goods</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Storage - Self Service\">Storage</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Tanning Salons\">Tanning</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Travel Agencies\">Travel Agencies</a><br>
<a style=\"text-decoration: none;\"  href=\"s.php?s=$s&q=Veterinarians\">Veterinarians</a>   </td>  \n";



echo "<td width=\"33%\" valign=\"top\">  \n";




echo "  <h2>$s News</h2><br>\n";
$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "statenews.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?s=" . urlencode($s) . "&c=$c";
} else {
	$remote_url .= "?s=" . urlencode($s) . "&c=$c";
}
//include
@include $remote_url;
        
echo "</td></tr></table> \n";        
echo"<div id=\"footer\">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div> \n";
echo "</div></div></center></body></html>     \n";



?>  
