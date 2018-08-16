

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = '$s';
	      $DATABASE_USER   = 'can_wes';
	$DATABASE_PASSWORD = 'gabe0810';


    global $MATCHES_OVERRIDE;

    if ($telephone) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 5;
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }


$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($s, $db);

        $query =  "SELECT List.* ";
        $query .= ",MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `Name` ASC ";
        $query .= "LIMIT " . 0 . "," . 10;

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);




require_once 'map.php';


$map = new Map();
$map->setAPIKey("ABQIAAAAoIxEzse0hCAeXEJftW8hWhRW8sZgDlTrdR7qwsfgjBojFQoHUhSA4yyKGnThpRSXYaDES9xXBVBTFQ");





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
printf("<title>%s  - %s - %s %s</title> \n", $row["Name"], $row["Keywords1"], $row["City"], $row["Province"]);
echo "<meta name=\"keywords\" content=\"$keywords\">\n";
printf("<meta name=\"description\" content=\"%s  - %s - %s %s\">  \n",  $row["Name"], $row["Keywords1"], $row["City"], $row["Province"]);
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
echo "</head> \n";
echo "<body><center> \n";
echo "<div style=\"background-color:#FFFF00; width:100%; height:12px;\"> \n";
echo "<h2 style=\"font-size:12px\">Searchable Business Directory - All Canadian Provinces - Look2Canada.com</h2></div> \n";

echo "<div id=\"wrap\"> \n";
echo "<a href=\"index.php\"><div id=\"header\"><h1><strong>Canada</strong></h1>
</div></a>\n";
echo "<div id=\"content\"> \n";




   







echo "<div align=\"center\">\n";


echo "    <table width=\"770\" cellspacing=\"0\">\n";

echo "        <tr><td width=\"100%\"><font color=\"#000000\" face=\"Verdana\" Size=\"2\"><center><b>&nbsp;Support \n";

printf("%s %s \n", $row["City"], $row["Province"]);

echo "Businesses</b></center></font></td></tr></table></div><br />\n";


    include 'left.php';



echo "<table border=\"0\" width=\"650\" align=\"center\" cellspacing=\"0\" cellpadding=\"5\"><tr><td width=\"300\">\n";





printf("<b><font face='verdana' size='3'>%s</b><br>  \n", $row["Name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["Address"]);
printf("<font face='verdana' size='2'>%s, %s %s<br> \n", $row["City"], $row["Province"], $row["Zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   <br>Fax: %s <br>\n", $row["Telephone"], $row["Fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["Web"], $row["Web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["Email"], $row["Email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["Contact"], $row["Id"]);

echo "</td><td width=\300\">\n";
$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google2.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 

echo "</td>\"\n";



$map->printGoogleJS();
    $map->zoomLevel = 2;             //zoom in as far as we can
    $map->setWidth(650);            //pixels
    $map->setHeight(450);           //pixels
    $map->controlType = 'large';    //show large controls on the side
    $map->showType = true;         //hide the map | sat | hybrid buttons



$address = ("$geo");



$string = ("$address");





$map->addAddress($string);

echo "<div align=\"center\"><table border=\"1\" width=\"10%\" cellspacing=\"0\" style=\"border: 3px inset #FFFF00\"><tr>   <td>\n";
$map->showMap();
echo "</td>  </tr></table></div>\n";



printf("</center></td> </tr></table><br>\n",  $row["address"],  $row["city"],  $row["Province"],  $row["zip"]);

printf("<center><font face='verdana' size='2' color='#000000'><b>Internet Search for:</b> %s<br>\n", $row["Name"]);

printf("<b><a href=\"http://www.google.com/search?sourceid=navclient&ie=UTF-8&rls=GGLJ,GGLJ:2006-11,GGLJ:en&q=%s %s %s\">Google</a> |\n", $row["Name"], $row["City"], $row["Province"]);
printf("<a href=\"http://search.yahoo.com/search?&ei=UTF-8&p=%s %s %s\">Yahoo!</a> |\n", $row["Name"], $row["City"], $row["Province"]);
printf("<a href=\"http://www.live.com/?FORM=IE7&q=%s %s %s\">MSN Live</a><br></b>\n", $row["Name"], $row["City"], $row["Province"]);


echo "<center>\n";

echo "<script type=\"text/javascript\"><!--\n";
echo "google_ad_client = \"pub-1757895371029345\";\n";
echo "google_ad_width = 728;\n";
echo "google_ad_height = 90;\n";
echo "google_ad_format = \"728x90_as\";\n";
echo "google_color_bg = \"ffffff\";\n";
echo "google_color_border = \"ffffff\";\n";
echo "google_color_link = \"800000\";\n";
echo "google_color_url = \"000000\";\n";
echo "google_color_text = \"000000\";\n";
echo "google_ad_type = \"text_image\";\n";
echo "google_ad_channel =\"\";\n";
echo "//--></script>\n";
echo "<script type=\"text/javascript\"\n";
echo "  src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
echo "</script></center>\n";

printf("<font face='verdana' size='2'>%s<br><font size=\"1\">If you are \"%s\" and would like to update your listing - email us at update@look2yellowpages.com.</font>\n", $row["Description"], $row["Name"]);




echo "</font></center></td></tr></table></blockquote></blockquote>\n";




echo "    <table border=\"0\" width=\"100%\"  align=\"center\">\n";
echo "      <tr>\n";
echo "        <td>\n";
printf("<font face='verdana' size='2'><b>Categories For \"%s\":</b></font><blockquote><font face='verdana' size='1'> \n",  $row["Name"]);





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




printf("%s / %s<br>  \n", $row["Keywords1"], $row["Keywords2"], $row["Name"], $row["Keywords2"], $row["Keywords2"]);









            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
                echo "\n";



            } else {
                echo "No more results found.<br>\n";
            }
        }



}
}

    ReturnMatches($telephone, $geo, $s, $matches, $first);



















     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {



echo "No More Results";



        } else {








    }
echo "<center><form name=\"form2\" action=\"javascript:window.print();\" method=\"post\">\n";
echo "<input type=\"submit\" name=\"Submit\" value=\"Print This Page\">\n";
echo "</form>  \n";
echo "</td>\n";
echo "      </tr>\n";
echo "    </table></center>\n";


echo "    <br>\n";











?>

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

<div id="footer">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com
</div>
</center></div></div>
</body></html>
