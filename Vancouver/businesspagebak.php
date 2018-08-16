

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   = 'van_van';
    $DATABASE_USER   = 'van_dub';
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
        mysql_select_db($DATABASE_NAME, $db);

        $query =  "SELECT List.* ";
        $query .= ",MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `name` ASC ";
        $query .= "LIMIT " . 0 . "," . 10;

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);




require_once 'map.php';


$map = new Map();
$map->setAPIKey("ABQIAAAAoIxEzse0hCAeXEJftW8hWhRKh03_toDkEWLCrGNccJClGk3lnBSuU42NGxRl4lgZi5HYFSgpl48G3Q");





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "  <title>Vancouver British Columbia Business Search - Results</title>\n";
echo "<meta name=\"keywords\" content=\"Vancouver yellowpages, Look2 yellowpages, Vancouver yellow pages, business pages, directory, business directory, business yellow pages, Vancouver business search \">\n"; 
echo "<meta name=\"description\" content=\"Vancouver British Columbia Business Search\">  \n";
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
echo "</head><body><center> \n";
echo "<div id=\"wrap\"> \n";

echo "<div id=\"header\"><h1><strong>Vancouver</strong><br>B.C. Business Search</h1>
</div>\n";
echo "<div id=\"content\"> \n";




echo "<center>\n";

//  start google ad
echo "
<div align=center><script type='text/javascript'><!--
google_ad_client = 'pub-1757895371029345';
google_ad_width = 728;
google_ad_height = 15;
google_ad_format = '728x15_0ads_al';
//2007-02-27: look2#800000linkban
google_ad_channel = '3142920432';
google_color_border = 'FFFFFF';
google_color_bg = 'FFFFFF';
google_color_link = '800000';
google_color_text = '000000';
google_color_url = '000000';
//--></script>
<script type='text/javascript'
  src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script></div>
";




//  end google ad





echo "<table border=\"0\" width=\"700\" align=\"center\" cellspacing=\"0\" cellpadding=\"1\"><tr><td width=\"350\">\n";
echo "<font Size=\"3\" color=\"#800000\"><b>&nbsp;Support your local<br><br> \n";

printf("%s %s <br><br>\n", $row["City"], $row["Province"]);

echo "Business</b></font><br><br>  \n";

printf("<b><font face='verdana' size='3'>%s</b><br>  \n", $row["Name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["Address"]);
printf("<font face='verdana' size='2'>%s, %s %s<br> \n", $row["City"], $row["Province"], $row["Zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   <br>Fax: %s <br>\n", $row["Telephone"], $row["Fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["Web"], $row["Web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["Email"], $row["Email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["Contact"], $row["Id"]);

echo "</td>\n";
echo "<td>\n";

$map->printGoogleJS();
    $map->zoomLevel = 2;             //zoom in as far as we can
    $map->setWidth(350);            //pixels
    $map->setHeight(350);           //pixels
    $map->controlType = 'large';    //show large controls on the side
    $map->showType = true;         //hide the map | sat | hybrid buttons



$address = ("$geo");



$string = ("$address");





$map->addAddress($string);

echo "<div align=\"center\"><table border=\"0\" width=\"10%\" cellspacing=\"0\" style=\"border: 0 inset #ffffff\"><tr>   <td>\n";
$map->showMap();
echo "</td>  </tr></div>\n";
echo "</td>  </tr></table>\n";



printf("</center></td> </tr></table><br><br>\n",  $row["Address"],  $row["City"],  $row["Province"],  $row["Zip"]);

echo "
<div align=center><script type='text/javascript'><!--
google_ad_client = 'pub-1757895371029345';
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = '728x90_as';
google_ad_type = 'text';
google_ad_channel = '';
google_color_border = 'ffffff';
google_color_bg = 'FFFFFF';
google_color_link = '800000';
google_color_text = '000000';
google_color_url = '000000';
//--></script>
<script type='text/javascript'
  src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script></div>
";

echo "<br>\n";


printf("<center><font face='verdana' size='2'><b>Internet Search for:</b> %s<br>\n", $row["Name"]);

printf("<b><a href=\"http://www.google.com/search?sourceid=navclient&ie=UTF-8&rls=GGLJ,GGLJ:2006-11,GGLJ:en&q=%s %s %s\">Google</a> |\n", $row["Name"], $row["City"], $row["Province"]);
printf("<a href=\"http://search.yahoo.com/search?&ei=UTF-8&p=%s %s %s\">Yahoo!</a> |\n", $row["Name"], $row["City"], $row["Province"]);
printf("<a href=\"http://www.live.com/?FORM=IE7&q=%s %s %s\">MSN Live</a><br></b>\n", $row["Name"], $row["City"], $row["Province"]);

printf("<font size=\"1\">If you are \"%s\" and would like to update your listing<br>email us at update@look2yellowpages.com.</font>\n", $row["Name"]);


echo "</center>\n";




echo "    <table border=\"0\" width=\"600\"  align=\"center\">\n";
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




printf("%s %s, \n", $row["Keywords1"], $row["Keywords2"], $row["Name"], $row["Keywords2"], $row["Keywords2"]);









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







    include 'bottom.php';








?>


