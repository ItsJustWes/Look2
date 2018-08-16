

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
    include 'db.php';


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
        $query .= ",MATCH(telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `name` ASC ";
        $query .= "LIMIT " . 0 . "," . 10;

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);




require_once 'map.php';


$map = new Map();
$map->setAPIKey("ABQIAAAAoIxEzse0hCAeXEJftW8hWhSFApt3XjPqlL08LF_OXhF2XcKZWBQqt7NC1x-9Ugqohtmy4IjxYNyWdg");





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "  <title>Fort Collins Colorado Yellowpages and Business Directory</title>\n";
echo "<meta name=\"keywords\" content=\"Fort Collins yellowpages, Look2 yellowpages, fort collins yellow pages, business pages, directory, business directory, business yellow pages, fort collins business search \">\n"; 
echo "<meta name=\"description\" content=\"Fort Collins Colorado Yellow Pages and Business Directory\">  \n";
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
echo "<div id=\"header\"><h1><strong>Fort Collins</strong><br>Colorado</h1>
</div>\n";
echo "</head></body>\n";




echo "<center>\n";

//  start google ad
echo "
<div align=center><script type='text/javascript'><!--
google_ad_client = 'pub-1757895371029345';
google_ad_width = 728;
google_ad_height = 15;
google_ad_format = '728x15_0ads_al';
//2007-01-20: look2768x15linkunitblack
google_ad_channel = '3142920432';
google_color_border = 'FFFFFF';
google_color_bg = 'FFFFFF';
google_color_link = '000000';
google_color_text = '000000';
google_color_url = '000000';
//--></script>
<script type='text/javascript'
  src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script></div>
";

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
google_color_link = 'FF0000';
google_color_text = '000000';
google_color_url = '000000';
//--></script>
<script type='text/javascript'
  src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script></div>
";



//  end google ad





echo "<table border=\"0\" width=\"700\" align=\"center\" cellspacing=\"0\" cellpadding=\"1\"><tr><td width=\"350\">\n";
echo "<font Size=\"3\"><b>&nbsp;Support your local<br><br> \n";

printf("%s %s <br><br>\n", $row["city"], $row["state"]);

echo "Business</b></font><br><br>  \n";

printf("<b><font face='verdana' size='3'>%s</b><br>  \n", $row["name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["address"]);
printf("<font face='verdana' size='2'>%s, %s %s<br> \n", $row["city"], $row["state"], $row["zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   <br>Fax: %s <br>\n", $row["telephone"], $row["fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["web"], $row["web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["email"], $row["email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["contact"], $row["id"]);

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

echo "<div align=\"center\"><table border=\"0\" width=\"10%\" cellspacing=\"0\" style=\"border: 0 inset #FFFFFF\"><tr>   <td>\n";
$map->showMap();
echo "</td>  </tr></div>\n";
echo "</td>  </tr></table>\n";



printf("</center></td> </tr></table><br><br>\n",  $row["address"],  $row["city"],  $row["state"],  $row["zip"]);


echo "<center>\n";

//  start google ad

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
google_color_link = 'FF0000';
google_color_text = '000000';
google_color_url = '000000';
//--></script>
<script type='text/javascript'
  src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script></div>
";

//  end google ad

echo "</center>\n";

echo "<br>\n";


printf("<center><font face='verdana' size='2'><b>Internet Search for:</b> %s<br>\n", $row["name"]);

printf("<b><a href=\"http://www.google.com/search?sourceid=navclient&ie=UTF-8&rls=GGLJ,GGLJ:2006-11,GGLJ:en&q=%s %s %s\">Google</a> |\n", $row["name"], $row["city"], $row["state"]);
printf("<a href=\"http://search.yahoo.com/search?&ei=UTF-8&p=%s %s %s\">Yahoo!</a> |\n", $row["name"], $row["city"], $row["state"]);
printf("<a href=\"http://www.live.com/?FORM=IE7&q=%s %s %s\">MSN Live</a><br></b>\n", $row["name"], $row["city"], $row["state"]);

printf("<font face='verdana' size='2'>%s<br><font size=\"1\">If you are \"%s\" and would like to update your listing<br>email us at update@wiffed.com.</font>\n", $row["description"], $row["name"]);


echo "</center>\n";




echo "    <table border=\"0\" width=\"600\"  align=\"center\">\n";
echo "      <tr>\n";
echo "        <td>\n";


printf("<font face='verdana' size='2'><b>Categories For \"%s\":</b></font><blockquote><font face='verdana' size='1'> \n",  $row["name"]);





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




printf("%s %s, \n", $row["keywords1"], $row["keywords2"], $row["name"], $row["keywords2"], $row["keywords2"]);









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


