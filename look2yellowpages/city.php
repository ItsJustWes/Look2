
<?php
echo "<html>	\n";
echo "<head>	\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">	\n";
echo " 	 <title>$c $s | Business Listings | City Search</title>	\n"; 
echo "<meta name=\"keywords\" content=\"$c, $c $s, $c yellowpages, $c business, $c $s business, Business listings, $c search, city search, city yellowpages, $c business search \">\n"; 
echo "<meta name=\"description\" content=\"Look2 Yellowpages - $c $s - Business Listings - All \"> \n";
?>
<link href="dub.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Look2 | US Yellowpages | Business Listings | City Search</h2>
</div>
	
<div id="wrap">
<a href="/">
   	<div id="header" align="center"><br>
<?php
echo	"<h1><strong>$c</strong></h1> \n";
?>
	</div></a>
<div id="content">
<table border="0" width="100%">
  <tr>
    
    <td>
    <center>
    
  <?php
echo "       <b><font face=\"Verdana\" color=\"#000000\" size=\"2\">Search $c, $s Yellowpages</font> </b><br>\n";
      
echo " <center>     <form style=\"margin: 0px\" action=\"c.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input name=s type=hidden value=\"$s\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search $c YP\"></center></form>\n";
    
?>  
</td>
  </tr>
  </table>
    <table width="100%" bgcolor="#FFFFD2" cellspacing="0" style="border-top:1px groove #000000; border-bottom:1px groove #000000;">
      <tr>
        <td><b><font face="Verdana" size="2">&nbsp; 


<?php
echo "        <a title=\"$s Yellowpages Home\" href=\"state.php?s=$s\">$s Home</a>\n";
?>
     <font face="Times New Roman" size="2">&#9642;</font>

<?php
echo "        <a title=\"Go To $c, $s Yellowpages Home\" href=\"city.php?s=$s&c=$c\">$c, $s Home</a>\n";
?>
       <font face="Times New Roman" size="2">&#9642;</font>
<?php
echo "         <a title=\"Over 850 Business Categories\" href=\"citycategories.php?c=$c&s=$s\">$c Business Categories</a></font></b>\n";
?>
         

<?PHP


echo "</td></tr></table>	\n"; 
echo "<table width=\"100%\" style=\"border-bottom:1px groove #000000;\">
<tr> <td width=\"80%\" valign=\"top\">\n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
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

$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google3.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
echo "</center>     \n";

echo " 



<table width=\"100%\">
  <tr> <td width=\"33%\" valign=\"top\"> \n";
  
  
  $DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google5.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
	
echo "<center>\n";
$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "cityaddon.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?keywords=" . urlencode('$s') . "&s=$s";
} else {
	$remote_url .= "?keywords=" . urlencode($s) . "&matches=$matches&first=$first";
}
//include
@include $remote_url;

echo "</center>  \n";	
	
	
	
  
echo "  
  </td><td width=\"33%\" valign=\"top\">
<center><b><font face=\"Verdana\" size=\"3\">$c Categories 
  <br /><br /><font face=\"Verdana\" color=\"#800000\" size=\"2\">
  <a href=\"citycategories.php?s=$s&c=$c\" style=\"text-decoration: none\">
   All Categories</a></center></b>
   

<font face=\"Verdana\" size=\"2\">
<a style=\"text-decoration: none;\" href=\"c.php?s=$s&c=$c&q=Accountants\">Accountants</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Advertising\">Advertising</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Antiques\">Antiques</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Apartment Rentals\">Apartments</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Arts and Crafts\">Arts &amp; Crafts</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Attorneys\">Attorneys</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Auto Dealers\">Auto Dealers</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Auto Repair\">Auto Repair</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Banks\">Bank &amp; Financial</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Beauty Salons \">Beauty Salons</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Bed and Breakfasts\">Bed &amp; Breakfasts</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Book Dealers\">Bookstores</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Vacation Rentals\">Cabin Rentals</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Campgrounds\">Campgrounds</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Carpet and Rug Cleaners\">Carpet and Rug</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Childcare\">Child Care</a><br> 
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Chiropractors\">Chiropractors</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Churches\">Churches</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Clothing\">Clothing Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Cleaners\">Cleaners</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Coffee and Tea\">Coffee &amp; Tea</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Computer Repair\">Computers</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Construction Companies\">Construction</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=General Contractors\">Contractors</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Dentists\">Dentists</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Physicians\">Doctors</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Dry Cleaners\">Dry Cleaners</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Electric Equipment and Supplies\">Electrical Supply</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Rental Service - Stores and Yards\">Equipment Rentals</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Farm Equipment\">Farm &amp; Equipment</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Florists and Flowers\">Florists</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Furniture\">Furniture Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Garden Centers\">Garden and Supply</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Gifts\">Gifts &amp; Collectibles</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Grocery Stores\">Grocery Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Organizations\">Groups &amp; Organizations</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Hardware Stores\">Hardware Stores</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Air Conditioning and Heating\">Heating and Air</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Hospitals\">Hospitals</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Hotels and Motels\">Hotels &amp; Motels</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Insurance Agents and Brokers\">Insurance Agents</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Internet Products and Services\">Internet Businesses</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Jewelers and Jewelry\">Jewelers</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Locksmiths - Security Systems\">Locksmiths / Security</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Moving - Hauling\">Movers &amp; Haulers</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Movie Theatres\">Movie Theaters</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Music Instruction\">Music Instruction</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Newspapers and Magazines\">Newspapers & Magazines</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Optometrists\">Optometrists</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Parks and Recreation\">Parks &amp; Recreation</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Pediatricians\">Pediatricians</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Pet Supplies\">Pets &amp; Supplies</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Photography - Photographers\">Photography</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Pizza Restaurants\">Pizza Shops</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Plumbing Contractors\">Plumbers</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Printing Services\">Printers</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Quilting - Alterations and Tailoring\">Quilting &amp; Sewing</a>><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Radio Stations\">Radio Stations</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Real Estate\">Real Estate</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Restaurants\">Restaurants</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Schools\">Schools</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Sporting Goods\">Sporting Goods</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Storage - Self Service\">Storage</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Tanning Salons\">Tanning</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Travel Agencies\">Travel Agencies</a><br>
<a style=\"text-decoration: none;\"  href=\"c.php?s=$s&c=$c&q=Veterinarians\">Veterinarians</a>  \n";

     

echo "<td width='33%' valign='top'>  \n";






echo "  <font size=\"3\" face=\"verdana\"><b>$c News</b></font><br><br>\n";
$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "citynews.php";
    $remote_url .= "?c=" . urlencode($c) . "&s=" . urlencode($s) . "";
	@include $remote_url;
        
        




echo "</td></tr></table> \n";

include 'bottom.php';



echo "<div id=\"footer\">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div> \n";
echo "</div></div></center></body></html>     \n";
    


?>  
