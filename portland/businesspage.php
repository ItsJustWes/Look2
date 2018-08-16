

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










echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "<title>$row[name]  $row[city], $row[state]</title> \n";
echo "<meta name=\"keywords\" content=\" $row[city] $row[name],$telephone[telephone], $row[address], $row[name] $row[city] , $row[keywords2], $row[name] $row[state] \"> \n";
echo "<meta name=\"description\" content=\"$row[name] , $row[city] $row[state] $row[keywords2]\"> \n";
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
echo "</head><body><center> \n";
echo "<div id=\"wrap\"> \n";

echo "<div id=\"header\"><h1><strong><!-- google_ad_section_start --> $row[city] </strong>$row[state] <br><!-- google_ad_section_end -->Business</h1>
</div>\n";
echo "<div id=\"content\"> \n";




echo "<center>\n";

echo "<div><font Size=\"3\"><b>&nbsp;Support your local \n";

printf(" %s %s \n", $row["city"], $row["state"]);

echo "Business</b></font></div><br>  \n";
include 'google5.php';
echo "<br><table border=\"0\" width=\"700\" align=\"center\" cellspacing=\"0\" cellpadding=\"1\"><tr> \n";
echo "<td width=\"350\" align=\"center\"> \n";

//  start google ad

  include 'google4.php';
  
//  end google ad

echo "</td> \n";

echo "<td width=\"350\" align=\"center\"> \n";

printf("<b><font face='verdana' size='3'>%s<br><br>  \n", $row["name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["address"]);
printf("<font face='verdana' size='2'>%s, %s %s<br> \n", $row["city"], $row["state"], $row["zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   </b><br>Fax: %s <br>\n", $row["telephone"], $row["fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["web"], $row["web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["email"], $row["email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["contact"], $row["id"]);

echo "</td></tr></table>\n";
 


echo "    <table border=\"0\" width=\"600\"  align=\"center\">\n";
echo "      <tr>\n";
echo "        <td>\n";


printf("<font face='verdana' size='2'><b>Services offered by \"%s, %s %s\":</b></font><blockquote><font face='verdana' size='1'> \n",  $row["name"], $row["city"], $row["state"]);





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




printf("%s %s %s \n", $row["keywords1"], $row["city"], $row["keywords2"]);









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













    include 'bottom.php';








?>


