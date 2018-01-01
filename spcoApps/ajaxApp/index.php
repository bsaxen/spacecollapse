<!doctype html>

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
        width: 450px;
        margin: 2em auto;
        text-align: left;
    }
    </style>
</head>
<body>
  <input id="benny" type="text" name="saxen" />
  hello
<script type="text/javascript">
window.onload = function(){

    $.ajax({
        url:		'ajax.php',
        dataType:	'json',
        success:	initDash,
        type:		'GET',
        data:		{
            place: '<?php echo("$place")?>',
            mode: '<?php echo("$mode")?>'
        }
    });


    function initDash(result) {
        //console.log(result['0']['1']);
        //console.log(result['0']['2']);
        var rr = result['0']['1']; // Number of items
        //var cc = result['0']['2']; // Number of parameters in each item
        var count;
        for(count=1; count <= rr; count++)
        {
            var div = document.createElement('div');
            document.body.appendChild(div);
            var value = result[count][2];
            var mt = value.toString();
            var temp1 = "g";
            var did = temp1.concat(count);
            div.id = did;
            div.style.float = 'left';
            //div.style.backgroundColor = 'red';
            div.style.width  = '200px';
            div.style.height = '160px';
            //div.style.position = 'relative';
            //div.style.display = 'inline-block';
            console.log(value);
            var title = "";
        }
        console.log("initiated");
    }


    var tid = setInterval(getData, 3000);
    function getData() {
        console.log("Getting  data");
        $.ajax({
            url:		'ajax.php',
            dataType:	'json',
            success:	setData,
            type:		'GET',
            data:		{
                place: '<?php echo("$place")?>',
                mode: '<?php echo("$mode")?>'
            }
        });
    }

    function setData(result)
    {
        console.log("data!");

        //console.log(result);

        console.log(result['1']['1']);
        console.log(result['1']['2']);

        var input = document.getElementById("benny");
        var value = result[1][2];
        var mt = value.toString();
        input.value = mt;
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
