<?php
error_reporting(E_ALL);  // turn on all errors, warnings and notices for easier debugging

$query = 'ipod';  // A query

$SafeQuery = urlencode($query); 

$endpoint = 'http://open.api.ebay.com/shopping';  // URL to call
$responseEncoding = 'XML';   // Format of the response 

// Construct the FindItems call 
$apicall = "$endpoint?callname=FindItems&version=517&siteid=0&appid=WesleyAr-3fd8-4c89-9c33-b13f42fd40f9&QueryKeywords=$SafeQuery&responseencoding=$responseEncoding";


// Load the call and capture the document returned by the Shopping API
$resp = simplexml_load_file($apicall);

// Check to see if the response was loaded, else print an error
if ($resp) {
	$results = '';
    
    // If the response was loaded, parse it and build links  
    foreach($resp->Item as $item) {
        $link  = $item->ViewItemURLForNaturalSearch;
        $title = $item->Title;
  
		// For each result node, build a link and append it to $results
		$results .= "<a href=\"$link\">$title</a><br/>";
	}
}
// If there was no response, print an error
else {
	$results = "Oops! Must not have gotten the response!";
}
?>