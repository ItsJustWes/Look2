

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
$map->setAPIKey("ABQIAAAAoIxEzse0hCAeXEJftW8hWhQGZj6Bq7cj4H2lKGXI13TcEqBskhQuvXzDM8gnwYYfZWO1B4f0i6RE5g");





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "<title>$row[name] $row[city], $row[state] </title> \n";
echo "<meta name=\"keywords\" content=\"$row[name] reno, $telephone[telephone], $row[address], $row[keywords2] reno\"> \n";
echo "<meta name=\"description\" content=\"$row[name] Reno - business search - $row[keywords2]\"> \n";
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
echo "</head><body><center> \n";
echo "<div id=\"wrap\"> \n";

echo "<div id=\"header\"><h1><strong>Reno</strong><br>Nevada Yellowpages</h1>
</div>\n";
echo "<div id=\"content\"> \n";

echo "<center>\n";

echo "<div><h2><font Size=\"3\"><b>\n";

printf(" %s %s %s \n", $row["name"], $row["city"], $row["state"]);

echo "</b></font></h2></div><br>  \n";

echo "<table border=\"0\" width=\"700\" align=\"center\" cellspacing=\"0\" cellpadding=\"1\"><tr><td width=\"350\">\n";

include 'google2.php';



printf("<b><font face='verdana' size='3'>%s</b><br>  \n", $row["name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["address"]);
printf("<font face='verdana' size='2'>%s, %s %s<br> \n", $row["city"], $row["state"], $row["zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   <br>Fax: %s <br>\n", $row["telephone"], $row["fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["web"], $row["web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["email"], $row["email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["contact"], $row["id"]);

echo "</td>\n";
echo "<td>\n";

error_reporting(0);
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



printf("</center></td> </tr></table><br>\n",  $row["address"],  $row["city"],  $row["state"],  $row["zip"]);


echo "<center>\n";

//  start google ad

include 'google3.php';

//  end google ad

echo "</center>\n";

echo "<br>\n";




echo "<center>";
printf("<font face='verdana' size='2'>%s<br><font size=\"1\">If you are \"%s\" and would like to update your listing<br>email us at update@look2yellowpages.com.</font>\n", $row["description"], $row["name"]);


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


