<?php

$ok = 1;

if (isset($_GET['label'])) {
    $label = $_GET['label'];
} else {
    $ok = 0;
    $label = "No_label";
}

if (isset($_GET['value'])) {
    $value = $_GET['value'];
} else {
    $ok = 0;
    $value = "No_value";
}

if (isset($_GET['unit'])) {
    $unit = $_GET['unit'];
} else {
    $ok = 0;
    $unit = "No_unit";
}

if($ok == 1)
{
  $spco_page = 'spcoPages/'.$label.'.html';
  $spcoFile = fopen($spco_page, "w");
  fwrite($spcoFile, "<html><h1>$label</h1>");
  fwrite($spcoFile, $value);
  fwrite($spcoFile, "&nbsp");
  fwrite($spcoFile, $unit);
  fwrite($spcoFile, "<br></html>");
  fclose($spcoFile);
}

?>
