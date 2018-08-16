<?php

function ReturnMatches($keywords, $matches, $first, $city)
{

    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   = 'wwwlook_cityaddon';
    $DATABASE_USER   = 'wwwlook_dub';
    $DATABASE_PASSWORD = 'gabe0810';


    global $MATCHES_OVERRIDE;

    if ($keywords) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 25;
        }



	$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);

        $query =  "SELECT City.* ";
        $query .= ",MATCH(State) AGAINST (' . $keywords . 'IN BOOLEAN MODE)  ";
        $query .= "FROM City ";
        $query .= "WHERE MATCH(State) AGAINST (' . \"$keywords\" . 'IN BOOLEAN MODE) ";
        $query .= "LIMIT " . $first . "," . $matches;

        $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);
            
	mysql_close($db);




echo "<font face=\"verdana\" size=\"2\"><b>City Guides Available:</b> \n";

 $no_results = 0;
        if ($row) {
            do {
                

printf(" <a href=\"city.php?c=%s&s=%s\">%s</a> | \n", $row["City"], $row["Province"], $row["City"]);


            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
                echo "<br>\n";
            } else {
                echo "<br>\n";
            }
        }
   
                 
}
 } 

echo "</font>\n";

    ReturnMatches($keywords, $matches, $first, $city);



?>