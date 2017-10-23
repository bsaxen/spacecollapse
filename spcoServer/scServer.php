<?php
//=============================================
// Butterfly - Space Collapse Server
//
// Date: 2017-10-22
// Author: Benny Saxen
//
//=============================================
$sc_host      = "simuino.com";
$sc_server_id = "Butterfly Server 1.0";
$date = date_create();
$sc_timestamp = date_format($date, 'Y-m-d H:i:s');
//=============================================
$ok = 1;

if (isset($_GET['label'])) {
    $label = $_GET['label'];
} else {
    $ok = 0;
}

if (isset($_GET['value'])) {
    $value = $_GET['value'];
} else {
    $ok = 0;
}

if (isset($_GET['unit'])) {
    $unit = $_GET['unit'];
} else {
    $ok = 0;
}

if (isset($_GET['datetime'])) {
    $datetime = $_GET['datetime'];
} else {
    $datetime = "-";
}

if (isset($_GET['period'])) {
    $period = $_GET['period'];
} else {
    $period = "-";
}

if (isset($_GET['position'])) {
    $position = $_GET['position'];
} else {
    $position = "-";
}

if (isset($_GET['creator'])) {
    $creator = $_GET['creator'];
} else {
    $creator = "-";
}

if (isset($_GET['description'])) {
    $description = $_GET['description'];
} else {
    $description = "-";
}
//===========================================
if($ok == 1)
{
  $spco_page = $label.'.html';
  $spcoFile = fopen($spco_page, "w");
  fwrite($spcoFile, "<html>");
  fwrite($spcoFile, "LABEL       ".$label);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "VALUE       ".$value);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "UNIT        ".$unit);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "DATETIME    ".$datetime);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "PERIOD      ".$period);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "POSITION    ".$position);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "CREATOR     ".$creator);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "DESCRIPTION ".$description);
  fwrite($spcoFile, "<br>");
  //fwrite($spcoFile, "# SpaceCollapse Server Information<br>");
  fwrite($spcoFile, "SC_SERVER_ID ".$sc_server_id);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "SC_HOST      ".$sc_host);
  fwrite($spcoFile, "<br>");
  fwrite($spcoFile, "SC_TIMESTAMP ".$sc_timestamp);
  fwrite($spcoFile, "</html>");
  fclose($spcoFile);
  echo("spco 0");
}
else
{
 echo("spco 1");
}

?>
