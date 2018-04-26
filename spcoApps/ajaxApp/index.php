<!doctype html>
<?php
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
       sscanf($line,"%s %s",$label,$ioant_stream);
       $n++;
       $istream[$n] = $ioant_stream;
       $ilabel[$n] = $label;
    }
  }
  fclose($file);
}
else {
  echo("Error");
}
?>
<html>
<head>
    <title>SpaceCollapseAjaxApp</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    body {
        text-align: center;
    }
    a {
      color: red;
    }
    body {
        text-align: center;
        background-image: url(bg.jpg);
        background-repeat: repeat;
        color: green;
    }

    p {
        display: block;
        width: 950px;
        margin: 2em auto;
        text-align: left;
    }
    </style>
</head>
<body>
  
  <iframe
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/saxen">
    allow="microphone"
  </iframe>
  
  <?php
  echo("<p><table>");
  for ($ii = 1; $ii <= $n;$ii++)
  {
    echo("<tr><td>$ilabel[$ii]</td>");
    echo("<td><input id=\"f$ii\" type=\"text\" name=\"fn$ii\" size=8 /></td>");
    echo("</tr>");
  }
  echo("</p></table>");
  ?>

<script type="text/javascript">
window.onload = function(){

    var tid = setInterval(getData, 3000);
    function getData() {
        console.log("Getting  data");
        $.ajax({
            url:		'ajax.php',
            /*dataType:	'json',*/
            dataType:	'text',
            success:	setData,
            type:		'GET',
            data:		{
                place: '1<?php echo("$place")?>',
                mode: '2<?php echo("$mode")?>'
            }
        });
    }

    function setData(result)
    {
        console.log("data!");

        console.log(result);

        var resArray = result.split(" ");

        //console.log(result['1']['1']);
        //console.log(result['1']['2']);
        <?php
        for ($ii = 1; $ii <= $n;$ii++)
        {
          echo("
          var resPair = resArray[$ii-1].split(\":\");

          var input$ii = document.getElementById(\"f$ii\");
          var value$ii = resPair[0];
          var mt$ii = value$ii.toString();
          input$ii.value = mt$ii;

          var s_value$ii = resPair[1];
          var s_mt$ii = s_value$ii.toString();
          if (s_mt$ii == 1)
            input$ii.style.background = \"blue\";
          if (s_mt$ii == 2)
            input$ii.style.background = \"green\";
          if (s_mt$ii == 3)
            input$ii.style.background = \"red\";
          ");
        }
        ?>

        //alert(result['1']['2']);
        /*
        var rr = result['0']['1']; // Number of items
        console.log(rr);
        //var cc = result['0']['2']; // Number of parameters in each item
        var count;
        for(count=1; count <= rr; count++)
        {
            console.log(count);
            //console.log(result[count]['3']);
            //var intvalue = Math.round(result[count]['2']);
            var x = result[count]['2'];
            console.log(x);
            g[count].refresh(x);
        }*/

    }
}
</script>
</body>
</html>
