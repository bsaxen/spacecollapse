<?php

//include("lib.php");

//=========================================================================
function getSpcoData($url)
//=========================================================================
{
  $ix_label   = 1;
  $ix_value   = 2;

  $options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET'
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $streams = json_decode($result);

  $n = 0;
  foreach ($streams as $stream)
  {
      $n++;
      $mres[$n][$ix_label] = $stream->label;
      $mres[$n][$ix_value] = $stream->value;
  }
  $mres[0][1] = $n;
  //$mres[0][2] = 5;
  return $mres;
}

$spco_url = "http://spacecollapse.simuino.com/astenas_nytomta_nixie2_0.json";

//$place = $_GET['place'];
//$mode = $_GET['mode'];

$mres = getSpcoData($spco_url);
//print_r($mres);
//echo($mres);
echo json_encode($mres);
?>
