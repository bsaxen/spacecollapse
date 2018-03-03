<?php
//=============================================
// File.......: ajax.php
// Date.......: 2018-03-01
// Author.....: Benny Saxen
// Description:
//=============================================

//include("lib.php");

//=========================================================================
function getJsonData($url)
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
//=========================================================================
function getSingleData($url)
//=========================================================================
{

  $options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET'
    )
  );
  $context  = stream_context_create($options);
  $content = file_get_contents($url, false, $context);
  if ($content === false) {
      $content = 'no_data';
  }

  return $content;
}
//=========================================================================
//$spco_url = "http://spacecollapse.simuino.com/astenas_nytomta_nixie2_0.json";
//$mres = getJsonData($spco_url);
//echo json_encode($mres);
$mres = array();
$config_file = 'configuration.txt';
$file = fopen($config_file,"r");
if ($file)
{
  $n = 0;
  while(! feof($file))
  {
    $line = fgets($file);
    if(strlen($line) > 2)
    {
       sscanf($line,"%s %s %f %f",$label,$istream,$vmin,$vmax);
       $n++;
       $spco_url = "http://spacecollapse.simuino.com/".$istream.".single";
       $mres[$n] = getSingleData($spco_url);
       $status = 2;
       if($mres[$n] < $vmin)$status = 1;
       if($mres[$n] > $vmax)$status = 3;
       echo $mres[$n].':'.$status.' ';
    }
  }
  fclose($file);
}
else {
  echo("Error");
}

//$spco_url = "http://spacecollapse.simuino.com/astenas_nytomta_nixie2_0.single";
//$mres[1] = getSingleData($spco_url);
//$spco_url = "http://spacecollapse.simuino.com/kil_kvv32_esp2_0.single";
//$mres[2] = getSingleData($spco_url);
//$spco_url = "http://spacecollapse.simuino.com/astenas_nytomta_D8_1.single";
//$mres[3] = getSingleData($spco_url);
//echo $mres[1].' '.$mres[2].' '.$mres[3];

?>
