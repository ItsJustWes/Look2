
<?php

$MATCHES_OVERRIDE = -1;    //set to -1 to disable override








function ReturnMatches($q, $city, $name, $matches, $first, $ads)
{

          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'canada_canada';
	      $DATABASE_USER   = 'canada_dub';
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


        $query =  "SELECT Yukon.* ";
        $query .= ",MATCH(Keywords1, Keywords1, Name) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM Yukon ";
        $query .= "WHERE MATCH(Keywords1, Keywords1, Name) AGAINST (' . $q . ' IN BOOLEAN MODE) HAVING Relevance > 0.03  ";

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
echo "<title> $q Yukon | Category Results</title>	\n";
echo "<meta name=\"keywords\" content=\"$q, $q Yukon, $q search, yukon business, yukon canada, yukon, yukon business directory, $q business yukon,  \">\n";
printf("<meta name=\"description\" content=\"$q Yukon - Yukon business results featuring addresses, phone numbers and maps\">  \n",  $row["Name"]);
?>
<link rel="stylesheet" href="dub.css" type="text/css"/>
<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>




</head>

<body>
<center>

<div id="wrap">
   	<div id="header" align="center">
	
	<img src="look2yellowpages1.jpg" align="left" alt="Yukon territory"><br>
	<h1><strong>Yukon Territory</strong></h1>
	</div>
<div id="content">	

<div id="avmenu">
<center>
<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 120;
google_ad_height = 600;
google_ad_format = "120x600_as";
google_ad_type = "text";
//2007-02-27: look2#800000sky
google_ad_channel = "9136936419";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "800000";
google_color_text = "000000";
google_color_url = "000000";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center>
</div>

<div id="extras">  	
<center>
<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 120;
google_ad_height = 600;
google_ad_format = "120x600_as";
google_ad_type = "text";
//2007-02-27: look2#800000sky
google_ad_channel = "9136936419";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "800000";
google_color_text = "000000";
google_color_url = "000000";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</center>
</div>



<table border="0" width="500px">
  <tr>
    <td>
    <p align="center">
      <font face="verdana" size="5"><b>Yukon Territory - business results</b></font></td>
  </tr>
  </table>






	<table width="500px" cellspacing="0" cellpadding="10">
      <tr>
        <td>

 <form style="margin: 0px" action="q.php" method=get>
  <div align="center">
  <table border="0" width="422" cellspacing="0" cellpadding="7" bgcolor="#FFFFD2" style="border-style: outset; border-width: 1px"></div>
  <tr>

<td>
<center> <font face="Verdana" size="2" color="#000000"><b>Business Type or Name</b>:</font><br>
<?PHP
echo "<input size=31 name=q type=text value=\"$q\">\n";
?>
 <INPUT TYPE=submit value="Search">
<br>

<table border="0" width="500px" cellspacing="0">
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
<OPTION>Yukon Territory
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
   </div> </form>
    




    </div>





    </td>
  </tr>
</table>
</div>
<?PHP






echo "<table width=\"500px\"  bgcolor=\"#FFFFD2\" cellspacing=\"0\" style=\"border-top:1px groove #000000; border-bottom-style:groove\"><tr><td width=\"50%\">\n";
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







echo "<table border=\"0\" width=\"500px\" cellspacing=\"0\" cellpadding=\"7\" bgcolor=\"#ffffff\" style=\"border-style: outset; border-width: 0px\"><tr><td>\n";
echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"b.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["Zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br></font> \n", $row["Keywords1"], $row["Keywords1"]);
printf(" <center><font face='verdana' size='1'><a href=\"c.php?q=$q&city=%s\">Narrow To %s Only</a> | \n", $row["City"], $row["City"]);
printf(" <a href=\"n.php?q=%s&city=%s\">View Businesses On This Street</a></font></center>\n", $row["Address"], $row["City"]);



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





echo "</blockquote>\n";

echo " </td>\n";
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
<script type="text/javascript">
var sc_project=2792948; 
var sc_invisible=0; 
var sc_partition=28; 
var sc_security="fd0c484b"; 
</script>

<script type="text/javascript" src="http://www.statcounter.com/counter/counter_xhtml.js"></script><noscript><div class="statcounter"><a class="statcounter" href="http://www.statcounter.com/"><img class="statcounter" src="http://c29.statcounter.com/2792948/0/fd0c484b/0/" alt="blog stats" /></a></div></noscript>
<!-- End of StatCounter Code -->
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://www.look2yukon.com/privacypolicy.html">Privacy Policy 
</div>
</div>
</div>
<center>
</body>
</html>




