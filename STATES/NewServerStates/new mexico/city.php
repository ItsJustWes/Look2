
<?php
$MATCHES_OVERRIDE = -1;    //set to -1 to disable override
function ReturnMatches($q, $c, $name, $matches, $first, $ads)
{

          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'newmex_newmex';
	      $DATABASE_USER   = 'newmex_dub';
	$DATABASE_PASSWORD = 'gabe0810';

    global $MATCHES_OVERRIDE;
    if ($c) {
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
echo " 	<html>	\n";
echo " 	<head>	\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">	\n";
echo "<title>$c, $DATABASE_NAME | Business Search | Yellowpages</title>\n";
?>
<meta name="keywords" content="New Mexico, New Mexico State, business search, business address, New Mexico business, New Mexico yellowpages, New Mexico City search, Look2 yellowpages">
<meta name="description" content="New Mexico Yellowpages and Business Search - City Results">
<link rel="stylesheet" href="/dub.css" type="text/css"/>
<style fprolloverstyle>A:hover {color: #ff0000}
</style>
</head>
<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">New Mexico Yellowpages - Business Search - City Results</h2>
</div>
	
<div id="wrap">
   	<div id="header" align="center"><br>
	<h1><strong>New Mexico</strong></h1>
	</div>
<div id="content">	


<?PHP
echo " <table width=\"100%\" bgcolor=\"ffffff\" cellspacing=\"0\">\n";
echo "     <tr>\n";
echo "       <td width=\"100%\" height=\"30px\"><b><font face=\"Verdana\" size=\"5\">&nbsp;$c, New Mexico Yellowpages \n";



echo "        </font></b></td></tr></table>\n";
?>

<table border="0" width="100%">
  <tr>

    <td>
    <p align="center">

  <?php
echo "       <b><font face=\"Verdana\" color=\"#800000\" size=\"2\">Search $c, New Mexico Businesses</font> </b>\n";

echo " <center>     <form style=\"margin: 0px\" action=\"cq.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search $c YP\"></center></form>\n";

?>



    </td>
  </tr>
  </table>
  
  
<?PHP

echo "  <table width=\"100%\" cellspacing=\"0\" border=\"0\"><tr><td width=\"50%\" valign=\"top\">\n";



echo "         </font></b></td><td valign=\"top\" width=\"50%\">\n";




echo "       </td></tr></table><br>\n";

echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\" style=\"border-top:1px groove #000000; border-bottom-style:groove\">\n";
echo "  <tr>\n";
echo "<td width=\"100%\" valign=\"top\" bordercolor=\"#58582C\" colspan=\"5\" bgcolor=\"#FFFFD2\">\n";
echo "<b><font face=\"Verdana\" size=\"2\">&nbsp; $c, New Mexico Quick Category \n";
echo "  Listings:&nbsp;&nbsp; </font>\n";
echo "  <font face=\"Verdana\" color=\"#000000\" size=\"2\">\n";
echo "  <a href=\"citycategories.php?c=$c\" style=\"text-decoration: none\">\n";
echo "  <font color=\"#800000\">All Categories</font></a></font></b></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; style=; border-width:0; \"border-left-style: double; border-bottom-style: double\" >\n";
echo "<font face=\"Verdana\" size=\"2\">\n";
echo "<a style=\"text-decoration: none;\" href=\"cq.php?c=$c&q=Accountants\">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Accountants </strong> </font> \n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000000\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Advertising\">  \n";
echo "<font color=\"#000000\">Advertising </font> \n";
echo "</a></font><font color=\"#000000\"><br></font></strong><font color=\"black\"> \n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Antiques\">  \n";
echo "<font color=\"#000000\">Antiques </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Apartment\"> \n";
echo "<font color=\"#000000\">Apartments </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Arts and Crafts\"> \n";
echo "<font color=\"#000000\">Arts &amp; Crafts </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Attorneys\">\n";
echo "<font color=\"#000000\">Attorneys </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Autos\">\n";
echo "<font color=\"#000000\">Auto Dealers </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Auto Repair\">\n";
echo "<font color=\"#000000\">Auto Repair </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Banks\">\n";
echo "<font color=\"#000000\">Bank &amp; Financial </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Beauty Salons \">\n";
echo "<font color=\"#000000\">Beauty Salons </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Bed and Breakfasts\">\n";
echo "<font color=\"#000000\">Bed &amp; Breakfasts </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Bookstores\">\n";
echo "<font color=\"#000000\">Bookstores </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Cabins Cottages and Chalet Rentals\">\n";
echo "<font color=\"#000000\">Cabin Rentals\n";
echo "</font>\n";
echo "</a><font color=\"#000000\"><br></font></strong><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Campgrounds\"> \n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Campgrounds </strong> </font>\n";
echo "</a></font></font>\n";
echo "</font>\n";
echo "</td>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font face=\"Verdana\" size=\"2\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Carpet and Rug Cleaners\">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Carpet and Rug </strong> </font>\n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000000\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Child Care\">\n";
echo "<font color=\"#000000\">Child Care </font>  \n";
echo "</a></font><font color=\"#000000\"><br></font></strong><font color=\"black\"> \n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Chiropractors\">  \n";
echo "<font color=\"#000000\">Chiropractors </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Churches\"> \n";
echo "<font color=\"#000000\">Churches </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Clothing\"> \n";
echo "<font color=\"#000000\">Clothing Stores </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Cleaners\"> \n";
echo "<font color=\"#000000\">Cleaners </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Coffee and Tea\"> \n";
echo "<font color=\"#000000\">Coffee &amp; Tea </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Computer\"> \n";
echo "<font color=\"#000000\">Computers </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Construction\"> \n";
echo "<font color=\"#000000\">Construction </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Contractors\"> \n";
echo "<font color=\"#000000\">Contractors </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Dentists\"> \n";
echo "<font color=\"#000000\">Dentists </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Physicians\">\n";
echo "<font color=\"#000000\">Doctors </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Dry Cleaners\">\n";
echo "<font color=\"#000000\">Dry Cleaners\n";
echo "</font>\n";
echo "</a><font color=\"#000000\"><br></font></strong><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Electric\">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Electrical Supply </strong> </font></a></font></font>\n";
echo "</td>\n";
 echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font face=\"Verdana\" size=\"2\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Equipment Rental\">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Equipment Rentals </strong> </font> \n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000000\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Farm\">\n";
echo "<font color=\"#000000\">Farm &amp; Equipment </font> \n";
echo "</a></font><font color=\"#000000\"><br></font></strong><font color=\"black\">\n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Flowers\">\n";
echo "<font color=\"#000000\">Florists </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Furniture\">\n";
echo "<font color=\"#000000\">Furniture Stores </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Garden\">\n";
echo "<font color=\"#000000\">Garden and Supply </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Gifts\">\n";
echo "<font color=\"#000000\">Gifts &amp; Collectibles </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Grocery\">\n";
echo "<font color=\"#000000\">Grocery Stores </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Organizations\">\n";
echo "<font color=\"#000000\">Groups &amp; Organizations </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Hardware\">\n";
echo "<font color=\"#000000\">Hardware Stores </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Heating and Air Conditioning\">\n";
echo "<font color=\"#000000\">Heating and Air </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Hospitals\">\n";
echo "<font color=\"#000000\">Hospitals </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Hotels and Motels\">\n";
echo "<font color=\"#000000\">Hotels &amp; Motels </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Insurance\">\n";
echo "<font color=\"#000000\">Insurance Agents </font>\n";
echo "</a><font color=\"#000000\"><br></font></strong><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Internet \">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Internet Businesses </strong> </font>\n";
echo "</a></font></font>\n";
echo "</td>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font face=\"Verdana\" size=\"2\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Jewelers\">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">Jewelers </strong> </font> \n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000000\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Locksmiths\">\n";
echo "<font color=\"#000000\">Locksmiths </font>  \n";
echo "</a></font><font color=\"#000000\"><br></font></strong><font color=\"black\">  \n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Moving\">  \n";
echo "<font color=\"#000000\">Movers &amp; Haulers </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Theatres\">  \n";
echo "<font color=\"#000000\">Movie Theaters </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Music\">  \n";
echo "<font color=\"#000000\">Music </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Newspapers\">  \n";
echo "<font color=\"#000000\">Newspapers </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Optometrists\">  \n";
echo "<font color=\"#000000\">Optometrists </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Parks and Recreation\">  \n";
echo "<font color=\"#000000\">Parks &amp; Recreation </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Pediatricians\">  \n";
echo "<font color=\"#000000\">Pediatricians </font>  \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Pet Supplies\">  \n";
echo "<font color=\"#000000\">Pets &amp; Supplies </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Photography\">\n";
echo "<font color=\"#000000\">Photography </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Pizza\">\n";
echo "<font color=\"#000000\">Pizza Shops </font> \n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Plumbing\">\n";
echo "<font color=\"#000000\">Plumbers\n";
echo "</font>\n";
echo "</a></strong><font color=\"#000000\"><strong style=\"font-weight: 400\"><br>&nbsp;</strong></font></font></font></td>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font color=\"black\" face=\"Verdana\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Printing\">\n";
echo "<font color=\"#000000\"><strong style=\"font-weight: 400\">\n";
echo "<font size=\"2\">Printers </font> </strong></font>\n";
echo "</a></font><font size=\"2\"><strong style=\"font-weight: 400\">\n";
echo "<font color=\"#000000\" face=\"Verdana\"><br>\n";
echo "</font></strong></font><font face=\"Verdana\"><font size=\"2\">\n";
echo "<strong style=\"font-weight: 400\"><font color=\"black\">\n";
echo "<a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Quilting\">\n";
echo "<font color=\"#000000\">Quilting &amp; Sewing</font></a></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Quilting\"><font color=\"#000000\">\n";
echo "</font>\n";
echo "</a><font color=\"#000000\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Radio Stations\">\n";
echo "<font color=\"#000000\">Radio Stations </font>\n";
echo "</a></font><font color=\"#000000\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Real Estate\">\n";
echo "<font color=\"#000000\">Real Estate </font>\n";
echo "</a><font color=\"#000000\"><br></font>\n";
echo "<a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Restaurants\">\n";
echo "<font color=\"#000000\">Restaurants </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Schools\">\n";
echo "<font color=\"#000000\">Schools </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Sporting Goods\">\n";
echo "<font color=\"#000000\">Sporting Goods </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Storage\">\n";
echo "<font color=\"#000000\">Storage </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Tanning\">\n";
echo "<font color=\"#000000\">Tanning </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Travel Agencies\">\n";
echo "<font color=\"#000000\">Travel Agencies </font>\n";
echo "</a><font color=\"#000000\"><br></font>\n";
echo "<a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Veterinarians\">\n";
echo "<font color=\"#000000\">Veterinarians </font>\n";
echo "</a><font color=\"#000000\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Video and DVD\">\n";
echo "<font color=\"#000000\">Video Stores</font></a></font></strong></font><font color=\"#000000\"><strong style=\"font-weight: 400\"><font size=\"2\">\n";
echo "<br>&nbsp;</font></strong></font></font></td></tr></table> \n";


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

?>
<hr align="center" width="800px" size="1px" color="#000000">
<center>
<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text";
//2007-02-27: look2#800000banner
google_ad_channel = "7041940911";
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
</div></div>
</center>
</body></html>

