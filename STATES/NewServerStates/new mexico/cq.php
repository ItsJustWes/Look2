
<?php
$MATCHES_OVERRIDE = -1;    //set to -1 to disable override
function ReturnMatches($q, $c, $name, $matches, $first, $ads)
{
          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'newmex_newmex';
	      $DATABASE_USER   = 'newmex_dub';
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
        $query =  "SELECT List.* ";
        $query .= ",MATCH(Keywords2, Keywords1) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM List ";
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
printf("<title>%s - %s, New Mexico | Business Search</title> \n", $row["Keywords1"], $row["City"]);
echo "<meta name=\"keywords\" content=\"$q $c, $c New Mexico, $q search $c\" >\n";
printf("<meta name=\"description\" content=\"%s - %s, New Mexico\">  \n", $row["Keywords1"], $row["City"]);
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
    <h2 style="font-size:12px">New Mexico Yellowpages - Business Search - Results</h2>
</div>
	
<div id="wrap">
   	<div id="header" align="center"><br>
	<h1><strong>New Mexico</strong></h1>
	</div>
<div id="content">	

<table border="0" width="100%" height="30">
  <tr>
    <td align="center">
    
<?PHP
echo "      <font face=\"verdana\" size=\"4\"><b>$c, New Mexico Yellowpages</b></font></td>\n";

    
?>
  </td>
  </tr>
  </table>



	<table width="100%" cellspacing="0" cellpadding="10">
      <tr>
        <td>

 <form style="margin: 0px" action="cq.php" method=get>
  <div align="center">
  <table border="0" width="422" cellspacing="0" cellpadding="7" bgcolor="#000000" style="border-style: outset; border-width: 1px"></div>
  </td></tr>
  <tr>
<td>

  <?php
echo "       <center><b><font face=\"Verdana\" color=\"#800000\" size=\"2\">Search $c, New Mexico Yellowpages</font> </b></center>\n";

echo " <center>     <form style=\"margin: 0px\" action=\"cq.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search\"></center></form>\n";

?>


<table border="0" width="100%" cellspacing="0">
  </td><tr>
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
<OPTION>Directory
<OPTION VALUE="citycategories.php">All Categories
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
           </FORM></center>
</td>
    <td>
<font face="Verdana" size="2" color="#800000"><b>
<?PHP
echo "<a href=\"citycategories.php?c=$c\">All Business Categories</a></b></font>\n";
?>
</td>
  </tr></table>
</td></tr> </div> </form>




    </tr>
    </table>





    </div>





    </td>
  </tr>
</table>

<?php

echo "<table width=\"100%\"> \n";            
echo " <td width=\"70%\"><font face='Verdana' color='#800000' size='3'> &nbsp;&nbsp;<b>$q</b> \n";
echo "</td><td width=\"30%\"><p align=\"center\">\n";
	echo "<b>\n";
	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches ."&c=" . $c . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches . "&c=" . $c ."&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Next</a></font>&nbsp;&nbsp;</p>\n";
	}

	
echo "</td></tr></table>\n";
  
	
	
	


echo "<br><br>\n";

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
			
			
			



	 
echo "<table width=\"50%\" valign=\"top\" align=\"center\"><tr> \n";
	 
echo "<td valign=\"top\" align=\"left\"> \n";

echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"b.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["State"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["State"], $row["Zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br>\n", $row["Keywords1"], $row["Keywords2"]);
printf(" <a href=\"n.php?q=%s&city=%s\">View Businesses On This Street</a></font></center>\n", $row["Address"], $row["City"]);

   
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
	

echo " </td></tr></table><br>\n";	

    
?>







<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2303187; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="0ad9e07b"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2303187&amp;java=0&amp;security=0ad9e07b&amp;invisible=1" alt="web stats analysis" border="0"></a> </noscript>
<!-- End of StatCounter Code -->  
 
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://www.look2newmexico.com/privacypolicy.html">Privacy Policy 
</div>
</div>
</div>
</center>
</body>
</html>