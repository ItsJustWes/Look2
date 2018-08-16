<?php

function ReturnMatches($c, $s, $keywords, $matches, $first)
{

    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   = 'wwwlook_related';
    $DATABASE_USER   = 'wwwlook_dub';
    $DATABASE_PASSWORD = 'gabe0810';


    global $MATCHES_OVERRIDE;

    if ($keywords) {
        if (!$first) {
            $first = 1;
        }
        if (!$matches) {
            //default
            $matches = 10;
        }



	$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);

        $keywordsuery =  "SELECT related.* ";
        $keywordsuery .= ",MATCH(Keywords) AGAINST (' . $keywords . ')  ";
        $keywordsuery .= "FROM related ";
        $keywordsuery .= "WHERE MATCH(Keywords) AGAINST (' . $keywords . ') ";
        $keywordsuery .= "LIMIT " . $first . "," . $matches;

        $result = mysql_query($keywordsuery, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);
            
	mysql_close($db);




echo "<font face=\"verdana\" size=\"1\" color=\"#800000\"><b>Related Topics in \"$c\"</b> \n";

 $no_results = 0;
        if ($row) {
            do {
                

printf(" <a href=\"c.php?q=%s\n", $row["Keywords"], $row["Keywords"]);
echo "&c=$c&s=$s\"> \n";
printf(" %s</a> |\n", $row["Keywords"], $row["Keywords"]);

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

    ReturnMatches($c, $s, $keywords, $matches, $first);



?>