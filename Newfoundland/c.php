
<?php

$MATCHES_OVERRIDE = -1;    //set to -1 to disable override








function ReturnMatches($q, $city, $name, $matches, $first, $ads)
{

          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'new_new';
	      $DATABASE_USER   = 'new_dub';
	      $DATABASE_PASSWORD = 'gabe0810';


    global $MATCHES_OVERRIDE;

    if ($q) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 30;
        if (!$ads) {
            $ads = 0;
        }
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }



$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);


        $query =  "SELECT Newfoundland.* ";
        $query .= ",MATCH(Keywords1, Keywords1, Name) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM Newfoundland ";
        $query .= "WHERE MATCH(City) AGAINST (' . \"$city\" . ' IN BOOLEAN MODE) HAVING Relevance > 0.03  ";

  $query .= "ORDER BY Relevance DESC ";
  $query .= "LIMIT " . $first . "," . $matches;








$result = mysql_query($query, $db)

            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "<html>	\n";
echo "<head>	\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "<title>$q | Newfoundland Business | $q Businesses</title>	\n";
echo "<meta name=\"keywords\" content=\"$q Newfoundland, $q business, $q labrador, $q Newfoundland business, $q labrador business, business search \">\n";
printf("<meta name=\"description\" content=\"$q - Newfoundland Business - All $q Businesses\">  \n",  $row["name"]);
?>
<link rel="stylesheet" href="/dub.css" type="text/css"/>
<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>

<style fprolloverstyle>A:hover {color: #ff0000}
</style>


</head>
<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Newfoundland Business | Search</h2>
</div>
	
<div id="wrap">
   	<div id="header" align="center"><br>
	<h1><strong>Newfoundland</strong></h1>
	</div>
<div id="content">	

<table border="0" width="100%">
  <tr>
    <td>
    <p align="left">
      <font face="verdana" size="5"><b>Newfoundland Business Search</b></font></td>
  </tr>
  </table>

<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-style: groove; border-width: 1px" bordercolor="#000000">


<tr><td valign="top">

	<table width="100%" cellspacing="0" cellpadding="10">
      <tr>
        <td bgcolor="#FFFFFF">

 <form style="margin: 0px" action="q.php" method=get>
  <div align="center">
  <table border="0" width="422" cellspacing="0" cellpadding="7" bgcolor="#FFFFD2" style="border-style: outset; border-width: 1px"><tr>

<td>
<center> <font face="Verdana" size="2" color="#000000"><b>Business Type or Name</b>:</font><br>
<?PHP
echo "<input size=31 name=q type=text value=\"$q\">\n";
?>
 <INPUT TYPE=submit value="Search">
<br>

<table border="0" width="100%" cellspacing="0">
  <tr>
    <td>
  <SCRIPT LANGUAGE="JavaScript">function selecturl(s)
{
  var gourl = s.options[s.selectedIndex].value;
  if ((gourl != null) && (gourl != "") )
  {
    window.top.location.href = gourl;
  }
}
</SCRIPT>
<center><form style="margin: 0px">
<SELECT NAME="Destination" SIZE="1" ONCHANGE="selecturl(Destination)">
<OPTION>Newfoundland Directory
<OPTION VALUE="categories.php">All Categories
<OPTION VALUE="Accountants.htm">Accountants
<OPTION VALUE="Advertising.htm">Advertising
<OPTION VALUE="Antiques.htm">Antiques
<OPTION VALUE="Apartment.htm">Apartments
<OPTION VALUE="Arts and Crafts.htm">Arts &amp; Crafts
<OPTION VALUE="Attorneys.htm">Attorneys
<OPTION VALUE="Autos.htm">Auto Dealers
<OPTION VALUE="Auto Repair.htm">Auto Repair
<OPTION VALUE="Banks.htm">Banks
<OPTION VALUE="Beauty Salons.htm">Beauty Salons
<OPTION VALUE="Bed and Breakfasts.htm">Bed &amp; Breakfasts
<OPTION VALUE="Bookstores.htm">Bookstores
<OPTION VALUE="Cabin Cottage and Chalet Rental.htm">Cabins
<OPTION VALUE="Campgrounds.htm">Campgrounds
<OPTION VALUE="Carpet and Rug Cleaners.htm">Carpet Cleaners
<OPTION VALUE="Child Care.htm">Child Care
<OPTION VALUE="Chiropractors.htm">Chiropractors
<OPTION VALUE="Churches.htm">Churches
<OPTION VALUE="Clothing.htm">Clothing Stores
<OPTION VALUE="Cleaners.htm">Cleaners
<OPTION VALUE="Coffee and Tea.htm">Coffee &amp; Tea
<OPTION VALUE="Computer.htm">Computers
<OPTION VALUE="Building and Home Construction.htm">Construction
<OPTION VALUE="Contractors.htm">Contractors
<OPTION VALUE="Dentists.htm">Dentists
<OPTION VALUE="Physicians.htm">Doctors
<OPTION VALUE="Dry Cleaners.htm">Dry Cleaners
<OPTION VALUE="Electric.htm">Electrical Supply
<OPTION VALUE="Equipment Rental.htm">Equipment Rentals
<OPTION VALUE="Farm.htm">Farm &amp; Equipment
<OPTION VALUE="Flowers.htm">Florists
<OPTION VALUE="Furniture.htm">Furniture Stores
<OPTION VALUE="Lawn and Garden.htm">Garden and Supply
<OPTION VALUE="Gifts and Collectibles.htm">Gifts &amp; Collectibles
<OPTION VALUE="Grocery.htm">Grocery
<OPTION VALUE="Organizations.htm">Groups &amp; Organizations
<OPTION VALUE="Hardware.htm">Hardware Stores
<OPTION VALUE="Heating and Air Conditioning.htm">Heating and Air
<OPTION VALUE="Hospitals.htm">Hospitals
<OPTION VALUE="Hotels and Motels.htm">Hotels &amp; Motels
<OPTION VALUE="Insurance.htm">Insurance
<OPTION VALUE="Internet .htm">Internet
<OPTION VALUE="Jewelers.htm">Jewelers
<OPTION VALUE="Locksmiths.htm">Locksmiths
<OPTION VALUE="Moving.htm">Movers and Haulers
<OPTION VALUE="Theatres.htm">Movie Theaters
<OPTION VALUE="Music.htm">Music
<OPTION VALUE="Newspapers.htm">Newspapers
<OPTION VALUE="Optometrists.htm">Optometrists
<OPTION VALUE="Parks and Recreation.htm">Parks and Recreation
<OPTION VALUE="Pediatricians.htm">Pediatrician
<OPTION VALUE="Pet Supplies.htm">Pets and Supplies
<OPTION VALUE="Photography.htm">Photography
<OPTION VALUE="Pizza.htm">Pizza
<OPTION VALUE="Plumbing.htm">Plumbers
<OPTION VALUE="Printing.htm">Printers
<OPTION VALUE="Quilting.htm">Quilting and Sewing
<OPTION VALUE="Radio Stations.htm">Radio Stations
<OPTION VALUE="Real Estate.htm">Real Estate
<OPTION VALUE="Relocation.htm">Relocation
<OPTION VALUE="Restaurants.htm">Restaurants
<OPTION VALUE="Schools.htm">Schools
<OPTION VALUE="Sporting Goods.htm">Sporting Goods
<OPTION VALUE="Storage.htm">Storage
<OPTION VALUE="Tanning.htm">Tanning
<OPTION VALUE="Travel Agencies.htm">Travel Agencies
<OPTION VALUE="Vacation.htm">Vacation Destinations
<OPTION VALUE="Veterinarians.htm">Veterinarians
<OPTION VALUE="Video and DVD.htm">Video Stores
</SELECT>
           </FORM></center>
</td>
    <td>
<font face="Verdana" size="2" color="#800000"><a href="categories.php">All Business Categories</a></font>
&nbsp;</td>
  </tr></table>
</td></tr> </div> </form>
    </tr>
    </table>





    </div>





    </td>
  </tr>
</table>
</div>
<?PHP






echo "<table width=\"100%\"  bgcolor=\"#FFFFD2\" cellspacing=\"0\" style=\"border-top:1px groove #C0C0C0; border-bottom-style:groove\"><tr><td width=\"70%\">\n";
echo " <font face='Verdana' color='#000000' size='2'> &nbsp;&nbsp;<b>$q</b>\n";

echo " 	 <font color=\"#000000\" face=\"Verdana\" size=\"2\">Listings " . ($first+1) . "  to " . ($first+30) . "	\n";
echo "      </td>\n";



?>


<?PHP
echo "<td width=\"30%\"><p align=\"right\"><b>\n";

	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"text-decoration: none\" href=\"q.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"q.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Next</a></font>&nbsp;&nbsp;\n";
	}
echo "</td></tr></table></b>&nbsp;&nbsp;\n";





echo "<br>\n";


echo "<blockquote>\n";

    include 'google.php';



      if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {



echo "No More Results";




        } else {


    }



  $no_results = 0;
        if ($row) {
            do {


echo "<table border=\"0\" width=\"90%\" cellspacing=\"0\" cellpadding=\"7\" bgcolor=\"#ffffff\" style=\"border-style: outset; border-width: 1px\"><tr><td>\n";
echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"b.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["Zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br></font> \n", $row["Keywords1"], $row["Keywords1"]);
printf(" <center><font face='verdana' size='1'><a href=\"n.php?q=%s&city=%s\">View Businesses On This Street</a></font></center>\n", $row["Address"], $row["City"]);



echo " </tr></td></table><br>\n";

            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
            } else {
                echo "No more results found.<br>\n";

            }
        }
}
}
    ReturnMatches($q, $city, $name, $matches, $first, $ads);
     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }
        if ($no_results == 1) {

echo "No More Results";
        } else {
    }
echo "    <br><br>\n";

echo "      </td>	\n";
echo "    </tr>	\n";
echo "  </table>	\n";
echo " 	  </td>	\n";
echo " 	  <td  valign=\"top\" width='1%'>	\n";


echo " 	  </td>	\n";
echo " 	</tr>	\n";
echo " 	</table> 	\n";

?>

<hr align="center" width="800px" size="1px" color="#000000">

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Business Directories:</font></b><br /><a href="http://www.look2vancouver.com">Vancouver Business</a>|<a href="http://www.look2victoria.com">Victoria Business</a>|<a href="http://www.look2britishcolumbia.com">BC Business Search</a></td>
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
var sc_project=2595838; 
var sc_invisible=0; 
var sc_partition=25; 
var sc_security="a86b2e68"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c26.statcounter.com/counter.php?sc_project=2595838&java=0&security=a86b2e68&invisible=0" alt="website stats" border="0"></a> </noscript>
<!-- End of StatCounter Code --> 
 
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://look2newfoundland.com/privacypolicy.html">Privacy Policy</a>
</div>
</div>
</div>
</center>
</body>
</html>