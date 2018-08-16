<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ebay Example</title>
</head>

<body>

<h1>Ebay example code</h1>
<?
  require_once("ebay.php");
  # replace $_GET['kw'] below with your own keywords for testing, ie: $keywords = "bose lifestyle";
  $keywords = $_GET['kw'];
  # ebay category is optional.  if not used, it will default to search all categories
  $category = ""; 
  if ($keywords) {
    # create an instance of the ebay class
    $ebay = new ebay();
	# set the SID (if you are not using SID, don't worry about this).  You must create
	# a global variable with the name of $sid and assign your SID value to $sid .
	# If this variable is set in your tracking code, then it
	# will be passed in to phpBay and will be tracked for you.
	if (isset($sid)) {
	  $ebay->eb_sid = $sid;
	}
	# set the minimum bid amount in US dollars for the keywords (helps eradicate low bid items in high bid categories)
	//$ebay->eb_saprclo = "500";
	# set the number of listings to display per page
	$ebay->eb_frpp = "10";
	# create the listings content
	$ebay->listings($keywords, $category);
	#echo the listings
    echo $ebay->html;
  } else {
?>
<form action="example.php" method="get">
<input name="kw" type="text" />
<input type="submit" />
</form>
<? } ?>
</body>
</html>
