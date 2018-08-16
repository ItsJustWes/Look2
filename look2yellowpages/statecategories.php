
<html>	 
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
<?php
echo" <title>$s Yellowpages | State Categories | Business Search</title> \n";
echo" <meta name=\"keywords\" content=\"$s Yellowpages, business search, $s Categories, state categories, $s business, Business Listings, address lookup, business yellowpages, $s Business Search,\">\n";

echo "<meta name=\"description\" content=\"Look2 Yellowpages - $s - Business Categories\"> \n";
?>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="Content-Language" content="en-us">
 <SCRIPT LANGUAGE="JavaScript">function selecturl(s) 
{
  var gourl = s.options[s.selectedIndex].value;
  if ((gourl != null) && (gourl != "") )
  {
    window.top.location.href = gourl;
  }
}
</SCRIPT>

<link href="dub.css" rel="stylesheet" type="text/css">

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>


</head>

<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Look2 | US Yellowpages | State Categories | Business Search</h2>
</div>
	
<div id="wrap">
<a href="/">
   	<div id="header" align="center"><br>
<?php
echo	"<h1><strong>$s</strong></h1> \n";
?>
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
echo "        <a title=\"Go To $s Yellowpages Home\" href=\"state.php?s=$s\">Home</a>\n";
?>
<font face="Times New Roman" size="2">&#9642;</font>
<?php
echo "      <a title=\"Over 850 Business Categories\" href=\"statecategories.php?s=$s&c=$c\">$s Business Categories</a>\n";
?>
<font face="Times New Roman" size="2">&#9642;</font>        
<?php
echo " <a href=\"citylist.php?s=$s&c=$c\">Complete City List</a></font></b></td></tr></table>\n";

?>
    



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-bottom:1px groove #000000;">
  <tr>

    
  <td width="100%" valign="top">
<?php



$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "cityaddon.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?keywords=" . urlencode('$s') . "&s=$s";
} else {
	$remote_url .= "?keywords=" . urlencode($s) . "&matches=$matches&first=$first";
}
//include
@include $remote_url;
echo "</td></tr></table> \n";
echo "<table width=\"100%\"><tr><td width=\"50%\" valign=\"top\"> \n";



echo" <br /><font size=\"3\" face=\"verdana\" style=\"color:#800000;\" ><b> \n";
echo" Available $s Business Categories\n"; 
?>
</b></font><br>
<font size="2" face="verdana">


<?php
echo" <a href=\"s.php?s=$s&q=Accountants\">Accountants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Adhesives and Sealants\">Adhesives and Sealants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Adoption Agencies\">Adoption Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Adult and Continuing Education\">Adult and Continuing Education</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Adult Entertainment\">Adult Entertainment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Advertising - All\">Advertising - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Advertising Agencies and Counselors\">Advertising Agencies and Counselors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aeronautical Engineers\">Aeronautical Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aerospace Industries\">Aerospace Industries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Agricultural Engineers\">Agricultural Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Air Conditioning and Heating\">Air Conditioning and Heating</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Air Conditioning Contractors and Systems\">Air Conditioning Contractors and Systems</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Air Freight and Package Express Service\">Air Freight and Package Express Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aircraft Charter Rental and Leasing\">Aircraft Charter Rental and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aircraft Equipment and Supplies\">Aircraft Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aircraft Instruction\">Aircraft Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aircraft Servicing and Maintenance\">Aircraft Servicing and Maintenance</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aircraft\">Aircraft</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Airline Ticket Agencies\">Airline Ticket Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Airlines\">Airlines</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Airport Transportation and Parking Services\">Airport Transportation and Parking Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Airports\">Airports</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Alcoholism Information and Treatment Centers\">Alcoholism Information and Treatment Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Allergists\">Allergists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Alterations and Tailoring\">Alterations and Tailoring</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Alternative Medicine\">Alternative Medicine</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ambulance Services\">Ambulance Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=American Restaurants\">American Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Amusement and Water Parks\">Amusement and Water Parks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Animal Hospitals and Clinics\">Animal Hospitals and Clinics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Animal Shelters\">Animal Shelters</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Antiques\">Antiques</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Apartment Rentals and Roommate Agencies\">Apartment Rentals and Roommate Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Apartments - Furnished\">Apartments - Furnished</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Apartments\">Apartments</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Appliances - Household - Major\">Appliances - Household - Major</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Appliances - Household - Service and Repair\">Appliances - Household - Service and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Appliances - Small - Service and Repair\">Appliances - Small - Service and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Appliances - Small\">Appliances - Small</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aquariums\">Aquariums</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Arbitration and Mediation\">Arbitration and Mediation</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Arcades\">Arcades</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Archery\">Archery</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Architects\">Architects</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Architectural Engineers\">Architectural Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Army and Navy Goods\">Army and Navy Goods</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Art Galleries and Dealers\">Art Galleries and Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Art Schools\">Art Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Art Supplies\">Art Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Arthritis Specialists\">Arthritis Specialists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Artists' Materials and Supplies\">Artists' Materials and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Arts and Crafts Shops\">Arts and Crafts Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Arts Organizations and Information\">Arts Organizations and Information</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Asian Markets\">Asian Markets</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Associations Societies and Foundations\">Associations Societies and Foundations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Astrology and Numerology\">Astrology and Numerology</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Athletic Clubs and Organizations\">Athletic Clubs and Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Athletic Wear\">Athletic Wear</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auctioneers\">Auctioneers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auctions\">Auctions</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Audio-Visual Equipment\">Audio-Visual Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Antiques and Classics\">Auto Antiques and Classics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Body Work\">Auto Body Work</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Buyers\">Auto Buyers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Dealers - New Cars\">Auto Dealers - New Cars</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Dealers - Used Cars\">Auto Dealers - Used Cars</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Inspection Services\">Auto Inspection Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Painting and Repair\">Auto Painting and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Parts - Used and Rebuilt\">Auto Parts - Used and Rebuilt</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Parts and Supplies\">Auto Parts and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Racing and Race Tracks\">Auto Racing and Race Tracks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Radio and Stereo Systems\">Auto Radio and Stereo Systems</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Renting and Leasing\">Auto Renting and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Repair and Service\">Auto Repair and Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Restoration\">Auto Restoration</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Security\">Auto Security</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Transmissions\">Auto Transmissions</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Auto Transport\">Auto Transport</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Automobile Auctions\">Automobile Auctions</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Automobile Wrecking\">Automobile Wrecking</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Automotive Engineers\">Automotive Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Aviation Consultants\">Aviation Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Baby Accessories\">Baby Accessories</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bagel Shops\">Bagel Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bail Bonds\">Bail Bonds</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bakers and Bakeries\">Bakers and Bakeries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Balloons and Novelties\">Balloons and Novelties</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Banks - All\">Banks - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Banks - Commercial\">Banks - Commercial</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Banquet Facilities\">Banquet Facilities</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Barbecue Equipment and Supplies\">Barbecue Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Barbecue Restaurants\">Barbecue Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Barbers\">Barbers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bars and Taverns\">Bars and Taverns</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Baseball Clubs and Parks\">Baseball Clubs and Parks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bathroom Planning and Remodeling\">Bathroom Planning and Remodeling</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Beauty Salons Equipment and Supplies\">Beauty Salons Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Beauty Salons\">Beauty Salons</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Beauty Schools\">Beauty Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bed and Breakfast Accommodations and Inns\">Bed and Breakfast Accommodations and Inns</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Beer\">Beer</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Beverages\">Beverages</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bicycle Dealers\">Bicycle Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bicycle Equipment and Supplies\">Bicycle Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bicycle Repair\">Bicycle Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bicycles - Tours and Renting\">Bicycles - Tours and Renting</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Billiards and Pool\">Billiards and Pool</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Biomedical Engineers\">Biomedical Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Blood Banks and Centers\">Blood Banks and Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boat Builders and Yards\">Boat Builders and Yards</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boat Dealers\">Boat Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boat Equipment and Supplies\">Boat Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boat Excursions\">Boat Excursions</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boat Repairing\">Boat Repairing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boats - Charter and Rental\">Boats - Charter and Rental</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Book Binders and Book Printers\">Book Binders and Book Printers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Book Dealers - Used and Rare\">Book Dealers - Used and Rare</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Book Dealers\">Book Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Book Publishers\">Book Publishers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bookkeeping Service\">Bookkeeping Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Botanical Gardens\">Botanical Gardens</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bowling Centers\">Bowling Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boxes - Corrugated and Fiber\">Boxes - Corrugated and Fiber</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boxes - Paper\">Boxes - Paper</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Boxing Clubs and Instruction\">Boxing Clubs and Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Brake Service\">Brake Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Breakfast Restaurants\">Breakfast Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Brew Pubs\">Brew Pubs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Brewers\">Brewers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bridal Shops\">Bridal Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Building Contractors\">Building Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Building Materials and Supplies\">Building Materials and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Building Materials\">Building Materials</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Buildings - Metal\">Buildings - Metal</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Burglar Alarm Systems and Equipment\">Burglar Alarm Systems and Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Bus Lines\">Bus Lines</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Buses - Charter and Rental\">Buses - Charter and Rental</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Business and Trade Organizations\">Business and Trade Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Business and Vocational Schools\">Business and Vocational Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Business Brokers\">Business Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Business Consultants\">Business Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cabinet Makers\">Cabinet Makers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cable Television Companies\">Cable Television Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cable Television Service\">Cable Television Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cafeterias\">Cafeterias</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cajun Restaurants\">Cajun Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Campgrounds and Recreational Vehicle Parks\">Campgrounds and Recreational Vehicle Parks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Campgrounds\">Campgrounds</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Camping Equipment\">Camping Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Camps\">Camps</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Candy and Confectionery\">Candy and Confectionery</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Canoes and Kayaks\">Canoes and Kayaks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Car Financing and Loans\">Car Financing and Loans</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Car Washing and Polishing\">Car Washing and Polishing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cardiologists\">Cardiologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Career Counseling\">Career Counseling</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Carnivals\">Carnivals</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Carpenters\">Carpenters</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Carpet Rug and Linoleum Dealers\">Carpet Rug and Linoleum Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Carpet and Rug Cleaners\">Carpet and Rug Cleaners</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Carpet and Rug Installation and Repair\">Carpet and Rug Installation and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Caskets and Urns\">Caskets and Urns</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Caterers\">Caterers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cellular Mobile and Wireless Telephones\">Cellular Mobile and Wireless Telephones</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cemeteries\">Cemeteries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Chambers of Commerce\">Chambers of Commerce</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Check Cashing Services\">Check Cashing Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cheese and Dairy\">Cheese and Dairy</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Chemical Engineers\">Chemical Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Chemicals - Manufacturers\">Chemicals - Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Childcare Services and Facilities\">Childcare Services and Facilities</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Children's and Infant Wear\">Children's and Infant Wear</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Chimneys - Builders Cleaners and Repairers\">Chimneys - Builders Cleaners and Repairers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Chinese Restaurants\">Chinese Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Chiropractors\">Chiropractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Church Supplies\">Church Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Churches and Religious Organizations\">Churches and Religious Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Churches\">Churches</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cigar Cigarette and Tobacco Dealers\">Cigar Cigarette and Tobacco Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Civil Engineers\">Civil Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cleaners\">Cleaners</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cleaning - Household\">Cleaning - Household</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cleaning - Office\">Cleaning - Office</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Climbing and Hiking Equipment and Supplies\">Climbing and Hiking Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clinics\">Clinics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clocks - Dealers and Repair\">Clocks - Dealers and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clothing - Wholesale and Manufacturers\">Clothing - Wholesale and Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clothing Accessories - Other\">Clothing Accessories - Other</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clothing\">Clothing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clowns\">Clowns</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Clubs\">Clubs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cocktail Lounges\">Cocktail Lounges</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Coffee and Tea\">Coffee and Tea</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Coffee Shops\">Coffee Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Collectibles\">Collectibles</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Collection Agencies\">Collection Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Comedy Clubs\">Comedy Clubs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Comic Books\">Comic Books</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Commercial Printing\">Commercial Printing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer and Equipment Dealers\">Computer and Equipment Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Communications Consultants\">Computer Communications Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Consultants\">Computer Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Furniture\">Computer Furniture</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Graphics\">Computer Graphics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Manufacturers\">Computer Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Networking\">Computer Networking</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Parts and Supplies\">Computer Parts and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Peripherals - Manufacturers\">Computer Peripherals - Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Printers\">Computer Printers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Renting and Leasing\">Computer Renting and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Repair\">Computer Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Software and Services\">Computer Software and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer System Designers\">Computer System Designers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Computer Training\">Computer Training</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Concrete Contractors\">Concrete Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Concrete\">Concrete</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Condominiums\">Condominiums</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Consignment Shops\">Consignment Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Construction Companies\">Construction Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Construction Machinery and Equipment\">Construction Machinery and Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Consulates and Foreign Offices\">Consulates and Foreign Offices</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Consulting Engineers\">Consulting Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Contact Lenses\">Contact Lenses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Contractors - Equipment and Supplies\">Contractors - Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Convenience Stores\">Convenience Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Convention and Meeting Facilities and Services\">Convention and Meeting Facilities and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Conversions\">Conversions</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Copying and Duplicating Services\">Copying and Duplicating Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Copying Machines and Supplies\">Copying Machines and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cosmetics and Perfumes\">Cosmetics and Perfumes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Costumes\">Costumes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Counseling Services\">Counseling Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Courier and Delivery Service\">Courier and Delivery Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Court Reporting Services\">Court Reporting Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Courts\">Courts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Craft Supplies\">Craft Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Credit and Debt Counseling Services\">Credit and Debt Counseling Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Credit Cards and Other Credit Plans\">Credit Cards and Other Credit Plans</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Credit Reporting Agencies\">Credit Reporting Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Credit Unions\">Credit Unions</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cremation\">Cremation</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Crisis Intervention Services\">Crisis Intervention Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Cruises\">Cruises</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dance Companies\">Dance Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dance Instruction\">Dance Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dancing Instruction\">Dancing Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Data Processing Services\">Data Processing Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Delicatessens\">Delicatessens</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dentists\">Dentists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Department Stores\">Department Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dermatologists\">Dermatologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Desktop Publishing\">Desktop Publishing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Developmental Health Services\">Developmental Health Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Diaper Services\">Diaper Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Direct Mail Advertising\">Direct Mail Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Directory and Guide Advertising\">Directory and Guide Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Disc Jockeys\">Disc Jockeys</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Discount Stores\">Discount Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Diving\">Diving</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Doughnuts\">Doughnuts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Driving Instruction\">Driving Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Drug Abuse Addiction Information and Treatment\">Drug Abuse Addiction Information and Treatment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Drug Stores and Pharmacies\">Drug Stores and Pharmacies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Drug Stores\">Drug Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dry Cleaners and Laundries\">Dry Cleaners and Laundries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Dry Wall Contractors\">Dry Wall Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Educational Consultants\">Educational Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Electric Companies\">Electric Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Electric Equipment and Supplies\">Electric Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Electrical Contractors\">Electrical Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Electrical Engineers\">Electrical Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Electricians\">Electricians</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Electronic Equipment and Supplies\">Electronic Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Elementary and Middle Schools\">Elementary and Middle Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Elevator Repair\">Elevator Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Embassies\">Embassies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Embroidery\">Embroidery</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Employment Agencies and Opportunities\">Employment Agencies and Opportunities</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Employment Contractors  Temporary Help\">Employment Contractors  Temporary Help</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Endocrinologists\">Endocrinologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Energy Conservation Engineers\">Energy Conservation Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Engineers - All\">Engineers - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Entertainers - All\">Entertainers - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Entertainment Bureaus\">Entertainment Bureaus</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Environmental and Ecological Conservation\">Environmental and Ecological Conservation</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Environmental and Ecological Products and Services\">Environmental and Ecological Products and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Environmental Engineers\">Environmental Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Escort Services\">Escort Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Escrow Services\">Escrow Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Estate Planning - Administration\">Estate Planning - Administration</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=European Restaurants\">European Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Event Planners\">Event Planners</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Excavating Contractors\">Excavating Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Executive Search Consultants\">Executive Search Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Exercise and Physical Fitness Programs\">Exercise and Physical Fitness Programs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Exercise Equipment\">Exercise Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Exporters\">Exporters</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Extreme Sports - Parachuting Bungee Jumping\">Extreme Sports - Parachuting Bungee Jumping</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fabric Shops\">Fabric Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fabrics - Wholesale\">Fabrics - Wholesale</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Factory Outlet Stores\">Factory Outlet Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fairs and Festivals\">Fairs and Festivals</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Family Planning Services\">Family Planning Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Farm Equipment\">Farm Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Farmers Markets\">Farmers Markets</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fast Food Restaurants\">Fast Food Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fax Machines and Service\">Fax Machines and Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fence Contractors\">Fence Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fencing\">Fencing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ferries and Water Taxis\">Ferries and Water Taxis</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fertility Clinics\">Fertility Clinics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Filing Equipment\">Filing Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Financial Advisory Services\">Financial Advisory Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Financial Planning Consultants\">Financial Planning Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Financing\">Financing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fire Alarm Systems and Equipment\">Fire Alarm Systems and Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fire Departments\">Fire Departments</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fireplaces\">Fireplaces</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fishing Areas\">Fishing Areas</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fishing Guides Charters and Parties\">Fishing Guides Charters and Parties</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fishing Tackle Dealers\">Fishing Tackle Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Flea Markets\">Flea Markets</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Floor Laying Refinishing and Resurfacing\">Floor Laying Refinishing and Resurfacing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Florists\">Florists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Flowers Plants and Gifts\">Flowers Plants and Gifts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Flowers - Wholesale\">Flowers - Wholesale</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Food Brokers\">Food Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Food Delivery Services\">Food Delivery Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Food Processors and Manufacturers\">Food Processors and Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Foods - Carry Out\">Foods - Carry Out</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Football Clubs and Instruction\">Football Clubs and Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Formal Wear\">Formal Wear</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fraternal Organizations\">Fraternal Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Freight Forwarding\">Freight Forwarding</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=French Restaurants\">French Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Fruits and Vegetables\">Fruits and Vegetables</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Funeral Directors and Homes\">Funeral Directors and Homes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture - Cleaning Refinishing and Repair\">Furniture - Cleaning Refinishing and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture - Office\">Furniture - Office</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture - Outdoor\">Furniture - Outdoor</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture - Used\">Furniture - Used</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture Dealers\">Furniture Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture Manufacturers\">Furniture Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture Renting and Leasing\">Furniture Renting and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Furniture Upholstery\">Furniture Upholstery</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gambling and Casinos\">Gambling and Casinos</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Garages and Carports\">Garages and Carports</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Garden Centers\">Garden Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gas - Propane\">Gas - Propane</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gas Companies\">Gas Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gastroenterologists\">Gastroenterologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=General Contractors\">General Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=General Practice\">General Practice</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Geological Engineers\">Geological Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Geriatric Care\">Geriatric Care</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gift Baskets and Parcels\">Gift Baskets and Parcels</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gifts - All\">Gifts - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Giftwares - Wholesale\">Giftwares - Wholesale</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Glass - Auto Plate and Window\">Glass - Auto Plate and Window</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Golf Courses - Miniature\">Golf Courses - Miniature</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Golf Courses - Private\">Golf Courses - Private</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Golf Courses - Public\">Golf Courses - Public</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Golf Equipment and Supplies\">Golf Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Golf Instruction\">Golf Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Golf Practice Ranges\">Golf Practice Ranges</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gourmet Shops\">Gourmet Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Government Offices and County Clerks\">Government Offices and County Clerks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Grain Elevators\">Grain Elevators</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Graphic Designers\">Graphic Designers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Greek Restaurants\">Greek Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Greenhouses\">Greenhouses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Greeting Cards\">Greeting Cards</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Grocers and Supermarkets\">Grocers and Supermarkets</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Guest Houses\">Guest Houses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Guns and Gunsmiths\">Guns and Gunsmiths</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gutters and Downspouts\">Gutters and Downspouts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gymnastics\">Gymnastics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Gynecologists and Obstetricians\">Gynecologists and Obstetricians</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hair Removal Replacement and Products\">Hair Removal Replacement and Products</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Halls and Auditoriums\">Halls and Auditoriums</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Handbags\">Handbags</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hardware Stores\">Hardware Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hats and Caps\">Hats and Caps</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Health and Diet Foods\">Health and Diet Foods</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Health Clubs and Gyms\">Health Clubs and Gyms</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Health Services\">Health Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hearing Aids\">Hearing Aids</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Heating and Ventilating Contractors\">Heating and Ventilating Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Herbs and Spices\">Herbs and Spices</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=High Schools\">High Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Historical Places\">Historical Places</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hobby and Model Construction\">Hobby and Model Construction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hockey Clubs and Instruction\">Hockey Clubs and Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Home and Building Inspection Services\">Home and Building Inspection Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Home Brewing\">Home Brewing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Home Builders\">Home Builders</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Home Health Services\">Home Health Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Home Improvement Centers\">Home Improvement Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Horse and Carriage Rides and Rentals\">Horse and Carriage Rides and Rentals</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Horse Dealers Boarding and Rental\">Horse Dealers Boarding and Rental</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Horse Equipment Supplies Service and Training\">Horse Equipment Supplies Service and Training</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hosiery and Socks\">Hosiery and Socks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hospices\">Hospices</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hospital Supplies\">Hospital Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hospitals\">Hospitals</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hostels\">Hostels</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hot Air Balloons\">Hot Air Balloons</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hot Tubs and Spas\">Hot Tubs and Spas</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hotels and Motels\">Hotels and Motels</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Housewares\">Housewares</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Housing Authorities and Agencies\">Housing Authorities and Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Human Factors Engineers\">Human Factors Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Human Relations Counselors\">Human Relations Counselors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Human Services Organizations\">Human Services Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Hydraulic Engineers\">Hydraulic Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ice Cream and Frozen Dessert Shops\">Ice Cream and Frozen Dessert Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ice Cream and Frozen Desserts\">Ice Cream and Frozen Desserts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ice Hockey\">Ice Hockey</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Importers\">Importers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Indian Restaurants\">Indian Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Industrial Technical and Trade Schools\">Industrial Technical and Trade Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Industrial and Commercial Machinery\">Industrial and Commercial Machinery</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Industrial Engineers\">Industrial Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insulation Materials\">Insulation Materials</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Agents and Brokers\">Insurance - Agents and Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - All\">Insurance - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Automotive\">Insurance - Automotive</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Consultants and Advisors\">Insurance - Consultants and Advisors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Home\">Insurance - Home</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Inspection Services\">Insurance - Inspection Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Life\">Insurance - Life</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Medical\">Insurance - Medical</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Insurance - Property and Casualty\">Insurance - Property and Casualty</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Interior Decorators Designers and Consultants\">Interior Decorators Designers and Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internet and Online Services\">Internet and Online Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internet Advertising\">Internet Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internet Marketing Services\">Internet Marketing Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internet Products and Services\">Internet Products and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internet Service Providers (ISPs)\">Internet Service Providers (ISPs)</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internet Services - Electronic Commerce\">Internet Services - Electronic Commerce</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Internists\">Internists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Investigators\">Investigators</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Investment Advisory Service\">Investment Advisory Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Investment Securities\">Investment Securities</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Invitations and Announcements\">Invitations and Announcements</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Irish Restaurants\">Irish Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Italian Restaurants\">Italian Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Janitorial Services\">Janitorial Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Japanese Restaurants\">Japanese Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Jewelers\">Jewelers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Jewelry Repair\">Jewelry Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Job Training Services\">Job Training Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Juices\">Juices</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Junior Colleges and Technical Institutes\">Junior Colleges and Technical Institutes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Kennels and Pet Boarding\">Kennels and Pet Boarding</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Korean Restaurants\">Korean Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Kosher Restaurants\">Kosher Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Kosher\">Kosher</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Labor Organizations\">Labor Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Laboratories - Medical\">Laboratories - Medical</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Laboratories - Research and Development\">Laboratories - Research and Development</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Laboratories - Testing\">Laboratories - Testing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Landscape Contractors\">Landscape Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Landscaping Equipment and Supplies\">Landscaping Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Language Schools\">Language Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawn and Grounds Maintenance\">Lawn and Grounds Maintenance</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawn Mowers\">Lawn Mowers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Adoption Divorce and Family Law\">Lawyers - Adoption Divorce and Family Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - All\">Lawyers - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Appeal\">Lawyers - Appeal</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Bankruptcy Law\">Lawyers - Bankruptcy Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Business Corporation and Partnership Law\">Lawyers - Business Corporation and Partnership Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Civil Law\">Lawyers - Civil Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Commercial and Banking Law\">Lawyers - Commercial and Banking Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Contract and Construction Law\">Lawyers - Contract and Construction Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Criminal Law\">Lawyers - Criminal Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Discrimination and Civil Rights Law\">Lawyers - Discrimination and Civil Rights Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Domestic Relations and Family Law\">Lawyers - Domestic Relations and Family Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - DUI and Traffic Law\">Lawyers - DUI and Traffic Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Elder Law\">Lawyers - Elder Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Employment and Labor Law\">Lawyers - Employment and Labor Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Environmental and Natural Resources Law\">Lawyers - Environmental and Natural Resources Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Immigration Naturalization and Customs\">Lawyers - Immigration Naturalization and Customs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Insurance Law and Coverage\">Lawyers - Insurance Law and Coverage</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Malpractice Law and Negligence\">Lawyers - Malpractice Law and Negligence</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Patent Trademark and Copyright\">Lawyers - Patent Trademark and Copyright</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Personal Injury Property Damage and Wrongful Death\">Lawyers - Personal Injury Property Damage and Wrongful Death</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Real Estate\">Lawyers - Real Estate</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Social Security and Government Law\">Lawyers - Social Security and Government Law</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Trial Lawyers\">Lawyers - Trial Lawyers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Wills Estates Trusts and Probate\">Lawyers - Wills Estates Trusts and Probate</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Lawyers - Workers Compensation\">Lawyers - Workers Compensation</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Legal Counsel and Services\">Legal Counsel and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Legal Services\">Legal Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Libraries\">Libraries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Machine Shops\">Machine Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Magazine Publishers\">Magazine Publishers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Magicians\">Magicians</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mail Order and Catalog Shopping\">Mail Order and Catalog Shopping</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mailing and Shipping Services\">Mailing and Shipping Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Management Consultants\">Management Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Management Engineers\">Management Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Manicures and Pedicures\">Manicures and Pedicures</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Manufacturers Engineers\">Manufacturers Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Marinas\">Marinas</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Marine Engineers\">Marine Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Marine Equipment and Supplies\">Marine Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Market Research and Analysis\">Market Research and Analysis</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Marketing Consultants\">Marketing Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Marriage and Family Counselors\">Marriage and Family Counselors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Martial Arts\">Martial Arts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Masonry Contractors\">Masonry Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mass Transit\">Mass Transit</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Massage Therapists\">Massage Therapists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Massage Therapy\">Massage Therapy</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Maternity Apparel\">Maternity Apparel</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mattresses\">Mattresses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Maxillofacial\">Maxillofacial</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Meat\">Meat</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mechanical Contractors\">Mechanical Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mechanical Engineers\">Mechanical Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Medical Equipment and Supplies\">Medical Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Medical Insurance\">Medical Insurance</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Medical Waste Management\">Medical Waste Management</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Men's Clothing\">Men's Clothing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mental Health Services\">Mental Health Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Metal Fabricators\">Metal Fabricators</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Metal\">Metal</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mexican Restaurants\">Mexican Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Middle Eastern Restaurants\">Middle Eastern Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Midwives\">Midwives</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Military\">Military</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mobile Home Dealers\">Mobile Home Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mobile Homes - Dealers\">Mobile Homes - Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mobile Homes - Parks and Communities\">Mobile Homes - Parks and Communities</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Modeling Agencies\">Modeling Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Money Orders\">Money Orders</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Monuments and Markers\">Monuments and Markers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mortgage Bankers and Correspondents\">Mortgage Bankers and Correspondents</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mortgage Brokers\">Mortgage Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mortgages\">Mortgages</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mosques\">Mosques</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Motion Pictures Producers Studios and Video Production\">Motion Pictures Producers Studios and Video Production</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Motorcycle and Motor Scooter Dealers\">Motorcycle and Motor Scooter Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Motorcycles and Motor Scooters - Repair and Service\">Motorcycles and Motor Scooters - Repair and Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Motorcycles and Motor Scooters - Supplies\">Motorcycles and Motor Scooters - Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Movers\">Movers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Moving Supplies and Equipment - Renting\">Moving Supplies and Equipment - Renting</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mufflers and Exhaust Systems\">Mufflers and Exhaust Systems</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Museums\">Museums</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Music Instruction\">Music Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Musical Instruments\">Musical Instruments</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Musicians Bands and Orchestras\">Musicians Bands and Orchestras</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Mutual Funds\">Mutual Funds</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nail Salons\">Nail Salons</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=National Guard\">National Guard</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Natural and Organic Foods\">Natural and Organic Foods</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Neurologists\">Neurologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Newspaper Advertising\">Newspaper Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Newspaper Publishers\">Newspaper Publishers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Night Clubs\">Night Clubs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Non-profit Organizations\">Non-profit Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Notaries\">Notaries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nurse Practitioners\">Nurse Practitioners</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nurseries Plants and Trees\">Nurseries Plants and Trees</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nursery Schools Preschools and Kindergartens\">Nursery Schools Preschools and Kindergartens</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nurses\">Nurses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nursing and Life Care Homes\">Nursing and Life Care Homes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Nutritionists\">Nutritionists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Office Furniture and Equipment\">Office Furniture and Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Office Supplies\">Office Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Oil and Gas Exploration and Development\">Oil and Gas Exploration and Development</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Oil and Lubrication\">Oil and Lubrication</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Oils - Fuel\">Oils - Fuel</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Oncologists\">Oncologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Opera Companies\">Opera Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ophthalmologists\">Ophthalmologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Optical Engineers\">Optical Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Optical Goods\">Optical Goods</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Optometrists\">Optometrists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Orthopedic Shoes and Appliances\">Orthopedic Shoes and Appliances</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Orthopedics\">Orthopedics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Osteopathy\">Osteopathy</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Otolaryngology\">Otolaryngology</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Outdoor and Billboard Advertising\">Outdoor and Billboard Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Package Designing and Development\">Package Designing and Development</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pagers and Beepers\">Pagers and Beepers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Paint Supplies\">Paint Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Painting Contractors\">Painting Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Parking Lots Stations and Garages\">Parking Lots Stations and Garages</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Parks\">Parks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Party Planning Services\">Party Planning Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Party Supplies\">Party Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Patio Builders\">Patio Builders</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Paving Contractors\">Paving Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pawn Brokers\">Pawn Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pediatricians\">Pediatricians</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Periodicals Publishers\">Periodicals Publishers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pest Control\">Pest Control</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pet Cemeteries\">Pet Cemeteries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pet Shops\">Pet Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pet Sitting Services\">Pet Sitting Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pet Supplies and Accessories\">Pet Supplies and Accessories</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pet Training\">Pet Training</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pet Washing and Grooming\">Pet Washing and Grooming</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pharmaceutical Manufacturers\">Pharmaceutical Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pharmaceuticals\">Pharmaceuticals</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Philanthropy\">Philanthropy</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Photo Labs\">Photo Labs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Photographers\">Photographers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Photographic Equipment - Repairing\">Photographic Equipment - Repairing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Photographic Equipment and Supplies\">Photographic Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Physical Therapists\">Physical Therapists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Physician and Surgeon Information and Referral Service\">Physician and Surgeon Information and Referral Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Physicians and Surgeons\">Physicians and Surgeons</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Picture Frames - Dealers\">Picture Frames - Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Picture Frames\">Picture Frames</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pizza\">Pizza</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Plastic Surgeons\">Plastic Surgeons</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Plastics and Plastic Products - Manufacturers\">Plastics and Plastic Products - Manufacturers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Plumbers\">Plumbers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Plumbing Contractors\">Plumbing Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Podiatrists\">Podiatrists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Police Departments\">Police Departments</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Political Organizations\">Political Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pollution Assessment and Remediation\">Pollution Assessment and Remediation</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Post Offices\">Post Offices</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Pottery\">Pottery</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Poultry\">Poultry</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Printing Services\">Printing Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Private Schools\">Private Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Produce\">Produce</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Production and Specialties Advertising\">Production and Specialties Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Professional Engineers\">Professional Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Promotional Products Advertising\">Promotional Products Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Psychiatrists\">Psychiatrists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Psychics\">Psychics</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Psychologists\">Psychologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Public Libraries\">Public Libraries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Public Relations Counselors\">Public Relations Counselors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Public Schools\">Public Schools</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Publishers - All\">Publishers - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Publishers - Books\">Publishers - Books</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Race Tracks\">Race Tracks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Radio and Audio Advertising\">Radio and Audio Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Radio Communication Equipment and Systems\">Radio Communication Equipment and Systems</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Radio Stations and Broadcasting Companies\">Radio Stations and Broadcasting Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Radiologists\">Radiologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Railroads\">Railroads</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate - All\">Real Estate - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate - Commercial and Investment\">Real Estate - Commercial and Investment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Agents\">Real Estate Agents</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Appraisers\">Real Estate Appraisers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Buyers and Brokers\">Real Estate Buyers and Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Consultants\">Real Estate Consultants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Developers\">Real Estate Developers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Inspection Services\">Real Estate Inspection Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Lawyers\">Real Estate Lawyers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Loans\">Real Estate Loans</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Real Estate Management\">Real Estate Management</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recording Services - Sound and Video\">Recording Services - Sound and Video</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recording Studios\">Recording Studios</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Records Tapes and Compact Discs\">Records Tapes and Compact Discs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recreation Centers\">Recreation Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recreational Trips and Tours\">Recreational Trips and Tours</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recreational Vehicle Dealers\">Recreational Vehicle Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recreational Vehicle Renting and Leasing\">Recreational Vehicle Renting and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recreational Vehicles\">Recreational Vehicles</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recruitment\">Recruitment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Recycling Services\">Recycling Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Refrigeration Equipment\">Refrigeration Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Rehabilitation Services\">Rehabilitation Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Relocation Service\">Relocation Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Remodeling and Repairing Contractors\">Remodeling and Repairing Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Rental Agencies - Property\">Rental Agencies - Property</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Rental Service - Stores and Yards\">Rental Service - Stores and Yards</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Resale Shops\">Resale Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Resorts and Vacation Rentals\">Resorts and Vacation Rentals</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Restaurant Equipment and Supplies\">Restaurant Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Restaurants - All\">Restaurants - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Resume Services\">Resume Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Retirement Communities and Homes\">Retirement Communities and Homes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Retirement Planning Consultants and Services\">Retirement Planning Consultants and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Riding Academies\">Riding Academies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Road Side Services\">Road Side Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Roof Cleaning and Maintenance\">Roof Cleaning and Maintenance</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Roofing Contractors\">Roofing Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Roofing Equipment and Supplies\">Roofing Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Rubbish and Garbage Removal\">Rubbish and Garbage Removal</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=RV Parks and Campgrounds\">RV Parks and Campgrounds</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=School Supplies\">School Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Schools - All\">Schools - All</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Scrap Metals and Iron\">Scrap Metals and Iron</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Screen Printing\">Screen Printing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Seafood Restaurants\">Seafood Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Seafood\">Seafood</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Security Guard and Patrol Service\">Security Guard and Patrol Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Security Systems\">Security Systems</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Senior Services\">Senior Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Service Stations\">Service Stations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sheet Metal Work Contractors\">Sheet Metal Work Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sheet Music\">Sheet Music</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sheriffs\">Sheriffs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Shoe Repairing\">Shoe Repairing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Shoes and Boots\">Shoes and Boots</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Shopping Centers and Malls\">Shopping Centers and Malls</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Siding Contractors\">Siding Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sightseeing Tours\">Sightseeing Tours</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Signs\">Signs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Skateboarding and Rollerblading\">Skateboarding and Rollerblading</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Skating Equipment\">Skating Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Skating Rinks\">Skating Rinks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ski and Snowboard Dealers\">Ski and Snowboard Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ski Resorts\">Ski Resorts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Skin Care\">Skin Care</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Snowmobiles\">Snowmobiles</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Soccer\">Soccer</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Social Service and Welfare Organizations\">Social Service and Welfare Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Social Workers\">Social Workers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Soft Drinks\">Soft Drinks</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Spanish Restaurants\">Spanish Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Spas and Saunas\">Spas and Saunas</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Special Academic Education\">Special Academic Education</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sporting Goods\">Sporting Goods</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sports Bars\">Sports Bars</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sports Cards and Memorabilia\">Sports Cards and Memorabilia</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sports Medicine\">Sports Medicine</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sprinklers - Garden and Lawn\">Sprinklers - Garden and Lawn</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Sprinklers\">Sprinklers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Stables\">Stables</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Stadiums Arenas and Athletic Fields\">Stadiums Arenas and Athletic Fields</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Stationers\">Stationers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Steak Houses\">Steak Houses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Steel - Distributors and Warehouses\">Steel - Distributors and Warehouses</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Stereos\">Stereos</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Stock and Bond Brokers\">Stock and Bond Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Storage - Household and Commercial\">Storage - Household and Commercial</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Storage - Self Service\">Storage - Self Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Stress Management\">Stress Management</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Structural Engineers\">Structural Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Surveyors - Land\">Surveyors - Land</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Swimming Pool Contractors Dealers and Designers\">Swimming Pool Contractors Dealers and Designers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Swimming Pool Equipment and Supplies\">Swimming Pool Equipment and Supplies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Swimwear\">Swimwear</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Synagogues\">Synagogues</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Systems and Integration Engineers\">Systems and Integration Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Take Out\">Take Out</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Talent Agencies\">Talent Agencies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tanning Salons\">Tanning Salons</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tattooing and Body Piercing\">Tattooing and Body Piercing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tax Returns Consultants and Representatives\">Tax Returns Consultants and Representatives</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Taxicabs and Transportation Services\">Taxicabs and Transportation Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Telecommunications Services\">Telecommunications Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Telemarketing\">Telemarketing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Telephone Communications Services\">Telephone Communications Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Telephone Equipment - Service and Repair\">Telephone Equipment - Service and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Telephone Equipment and Systems Dealers\">Telephone Equipment and Systems Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Telephone Service\">Telephone Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Television and Radio - Service and Repair\">Television and Radio - Service and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Television Advertising\">Television Advertising</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Television Dealers\">Television Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Television Stations and Broadcasting Cooperatives\">Television Stations and Broadcasting Cooperatives</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tennis Courts\">Tennis Courts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tennis Equipment\">Tennis Equipment</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tennis Instruction\">Tennis Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Thai Restaurants\">Thai Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Theatres - Live\">Theatres - Live</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Theatres - Movie\">Theatres - Movie</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Thrift Shops\">Thrift Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Ticket Sales\">Ticket Sales</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tile and Ceramic Contractors\">Tile and Ceramic Contractors</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tile and Ceramic Dealers\">Tile and Ceramic Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tire Dealers\">Tire Dealers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Title Companies\">Title Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tool and Die Makers\">Tool and Die Makers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tourist Attractions and Information\">Tourist Attractions and Information</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tours - Operators and Promoters\">Tours - Operators and Promoters</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Towing\">Towing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Toys\">Toys</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Traffic and Transportation Engineers\">Traffic and Transportation Engineers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trailer Renting and Leasing\">Trailer Renting and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trailers - Camping and Travel\">Trailers - Camping and Travel</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Travel Agencies and Bureaus\">Travel Agencies and Bureaus</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tree Service\">Tree Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Truck Dealers - New\">Truck Dealers - New</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Truck Dealers - Used\">Truck Dealers - Used</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Truck Parts\">Truck Parts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Truck Renting and Leasing\">Truck Renting and Leasing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Truck Repairing and Service\">Truck Repairing and Service</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trucking - Dump\">Trucking - Dump</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trucking - Hauling\">Trucking - Hauling</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trucking - Motor Freight\">Trucking - Motor Freight</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trucking Brokers\">Trucking Brokers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Trucking Companies\">Trucking Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=T-Shirts\">T-Shirts</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Tutoring\">Tutoring</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Uniforms\">Uniforms</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Universities and Colleges\">Universities and Colleges</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Urologists\">Urologists</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Used and Vintage Clothes\">Used and Vintage Clothes</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Variety Stores\">Variety Stores</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Vegetarian Restaurants\">Vegetarian Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Vending Machines\">Vending Machines</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Veteran and Military Organizations\">Veteran and Military Organizations</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Veterinarians\">Veterinarians</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Video Games\">Video Games</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Video Production and Taping Services\">Video Production and Taping Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Video Tapes and Discs\">Video Tapes and Discs</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Vietnamese Restaurants\">Vietnamese Restaurants</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wallpaper\">Wallpaper</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Warehouses - Merchandise and Self Storage\">Warehouses - Merchandise and Self Storage</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Watches - Dealers and Repair\">Watches - Dealers and Repair</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Water - Bottled and Bulk\">Water - Bottled and Bulk</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Water and Sewage Companies\">Water and Sewage Companies</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Water Skiing\">Water Skiing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Water Sports Instruction\">Water Sports Instruction</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Web Site Design Services\">Web Site Design Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wedding Chapels\">Wedding Chapels</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wedding Supplies and Services\">Wedding Supplies and Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Weight Control Services\">Weight Control Services</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Welding\">Welding</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Western Apparel\">Western Apparel</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wigs and Hair Pieces\">Wigs and Hair Pieces</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wildlife Centers\">Wildlife Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Window Glass Coating and Tinting\">Window Glass Coating and Tinting</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Window Treatments - Draperies and Curtains\">Window Treatments - Draperies and Curtains</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Windows\">Windows</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wineries\">Wineries</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wines\">Wines</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Wireless Communications\">Wireless Communications</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Women's Clothing\">Women's Clothing</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Yoga\">Yoga</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Yogurt Shops\">Yogurt Shops</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Youth Organizations and Centers\">Youth Organizations and Centers</a><br>\n"; 
echo" <a href=\"s.php?s=$s&q=Zoos\">Zoos</a><br>\n"; 
$GLOBALS['adl_count_params']=true;
@include_once $GLOBALS['HTTP_SERVER_VARS']['DOCUMENT_ROOT'].'/twatch_include/logger.php';
?>
</font></td>
<td width="50%" valign="top">

<?php
$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google5.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 


?>

</td></tr></table><br>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2303224; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="a349c1c3"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2303224&amp;java=0&amp;security=a349c1c3&amp;invisible=1" alt="free stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

<div id="footer">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div>

   </div></div> 
     </center>    	
  </body></html>