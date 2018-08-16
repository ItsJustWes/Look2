
<?php
$MATCHES_OVERRIDE = -1;    //set to -1 to disable override
function ReturnMatches($q, $c, $name, $matches, $first, $ads)
{
          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'newb_newb';
	      $DATABASE_USER   = 'newb_dub';
	      $DATABASE_PASSWORD = 'gabe0810';

    global $MATCHES_OVERRIDE;
    if ($q) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 20;
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
        $query =  "SELECT Newbrunswick.* ";
        $query .= ",MATCH(Keywords1, Keywords1) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM Newbrunswick ";
        $query .= "WHERE MATCH(City) AGAINST (' . $c . ' IN BOOLEAN MODE) HAVING Relevance > 0.95  ";
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
printf("<title>%s - %s | New Brunswick Business</title> \n", $row["Keywords1"], $row["City"]);
echo "<meta name=\"keywords\" content=\"$q $c, $c New Brunswick, $c Nouveau-Brunswick, $q search $c, nb business, new brunswick business, nb canada \" >\n";
printf("<meta name=\"description\" content=\"%s - %s New Brunswick\">  \n", $row["Keywords1"], $row["City"]);
?>
<link rel="stylesheet" href="/dub.css" type="text/css"/>
<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>


</head>

<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">New Brunswick Business | Nouveau-Brunswick Canada | Nouveau-Brunswick Business</h2>
</div>
	
<div id="wrap">
   	<div id="header" align="center"><br>
	<h1><strong>New Brunswick</strong></h1>
	</div>
<div id="content">	

<div align="center">

<?PHP
echo "      <font face=\"verdana\" size=\"4\"><b>$c - New Brunswick Business</b></font></td>\n";

    
?>
</div>
 

<div align="center">
	
 <form style=action="cq.php" method=get>
   
  <?php
echo "       <center><b><font face=\"Verdana\" color=\"#000000\" size=\"2\">Search $c - Nouveau-Brunswick Business</font> </b></center>\n";

echo " <center>     <form style=action=\"cq.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input size=40 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search\"></center></form>\n";

?>



   <SCRIPT LANGUAGE="JavaScript">function selecturl(s)
{
  var gourl = s.options[s.selectedIndex].value;
  if ((gourl != null) && (gourl != "") )
  {
    window.top.location.href = gourl;
  }
}
</SCRIPT>
<center><form>
<SELECT NAME="Destination" SIZE="1" ONCHANGE="selecturl(Destination)" style="margin-right:30px;">
<OPTION>Directory
<OPTION VALUE="citycategories.php">Top Categories
<?PHP
echo "<OPTION VALUE=\"cq.php?c=$c&q=Accountants\">Accountants\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Advertising\">Advertising\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Antiques\">Antiques\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Apartment\">Apartments\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Arts and Crafts\">Arts &amp; Crafts\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Attorneys\">Attorneys\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Autos\">Auto Dealers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Auto Repair\">Auto Repair\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Banks\">Banks\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Beauty Salons\">Beauty Salons \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Bed and Breakfasts\">Bed &amp; Breakfasts\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Bookstores\">Bookstores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Cabin Cottage and Chalet Rental\">Cabins\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Campgrounds\">Campgrounds\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Carpet and Rug Cleaners\">Carpet Cleaners\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Child Care\">Child Care\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Chiropractors\">Chiropractors\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Churches\">Churches\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Clothing\">Clothing Stores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Cleaners\">Cleaners\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Coffee and Tea\">Coffee &amp; Tea\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Computer\">Computers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Building and Home Construction\">Construction\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Contractors\">Contractors\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Dentists\">Dentists\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Physicians\">Doctors\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Dry Cleaners\">Dry Cleaners\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Electric\">Electrical Supply\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Equipment Rental\">Equipment Rentals \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Farm\">Farm &amp; Equipment \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Flowers\">Florists\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Furniture\">Furniture Stores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Lawn and Garden\">Garden and Supply\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Gifts and Collectibles\">Gifts &amp; Collectibles\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Grocery\">Grocery\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Organizations\">Groups &amp; Organizations\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Hardware\">Hardware Stores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Heating and Air Conditioning\">Heating and Air\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Hospitals\">Hospitals\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Hotels and Motels\">Hotels &amp; Motels\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Insurance\">Insurance\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Internet \">Internet \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Jewelers\">Jewelers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Locksmiths\">Locksmiths\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Moving\">Movers and Haulers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Theatres\">Movie Theaters\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Music\">Music\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Newspapers\">Newspapers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Optometrists\">Optometrists\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Parks and Recreation\">Parks and Recreation\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Pediatricians\">Pediatrician\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Pet Supplies\">Pets and Supplies\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Photography\">Photography\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Pizza\">Pizza \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Plumbing\">Plumbers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Printing\">Printers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Quilting\">Quilting and Sewing\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Radio Stations\">Radio Stations\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Real Estate\">Real Estate\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Relocation\">Relocation\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Restaurants\">Restaurants\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Schools\">Schools\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Sporting Goods\">Sporting Goods\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Storage\">Storage\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Tanning\">Tanning\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Travel Agencies\">Travel Agencies\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Vacation\">Vacation Destinations\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Veterinarians\">Veterinarians\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Video and DVD\">Video Stores\n";
?>
</SELECT>
          

<?PHP
echo "<b><a href=\"citycategories.php?c=$c\">All Business Categories</a></b>\n";
?>
 </FORM>
</div>
<div align="center">    

<?php
echo "<div align=\"center\"> \n";
echo " <font face='Verdana' color='#800000' size='3'> &nbsp;&nbsp;<b>$q</b></font> \n";
echo "</div> \n";
echo "<div align=\"center\"> \n";
	echo "<b>\n";
	if ($first == 0) {
		echo "";
	} else {
		echo "<a href=\"?q=" . $q . "&matches=" . $matches ."&c=" . $c . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Prev</font></a>  | ";
	}

	
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a href=\"?q=" . $q . "&matches=" . $matches . "&c=" . $c ."&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Next</a></font>&nbsp;&nbsp;\n";
	}
echo "</b></div></div>\n";

  
echo "<div style=\"float:right;\"> \n";

    include 'google.php';
	
echo "</div> \n";	
	












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
			
echo "<div align=\"left\" valign=\"top\" margin-left=\"15px\" style=\"text-align:left; color:#666666;\"> \n";


echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"b.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["Zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br>\n", $row["Keywords1"], $row["Keywords1"]);
printf(" <a href=\"n.php?q=%s&city=%s\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Businesses On This Street</a></font>\n", $row["Address"], $row["City"]);


echo "<br /><br /> \n";


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
    ReturnMatches($q, $c, $name, $matches, $first, $ads);
     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }
        if ($no_results == 1) {

echo "No More Results";
        } else {
    }




echo " 	</div> 	\n";

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
var sc_project=2593970; 
var sc_invisible=0; 
var sc_partition=25; 
var sc_security="d22e1433"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c26.statcounter.com/counter.php?sc_project=2593970&java=0&security=d22e1433&invisible=0" alt="blog counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->  
 
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://look2newbrunswick.com/privacypolicy.html">Privacy Policy</a>
</div>
</div>
</div>
</center>
</body>
</html>