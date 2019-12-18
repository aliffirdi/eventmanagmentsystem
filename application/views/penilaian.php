<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//die(var_dump($user_id));
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ScoreBoard | PencakSilat</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("vendor/twitter/bootstrap/dist/css/bootstrap.min.css"); ?>">
<script src="<?php echo base_url("vendor/components/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("vendor/popper.js"); ?>"></script>
<script src="<?php echo base_url("vendor/twitter/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("vendor/easytimer/dist/easytimer.js"); ?>"></script>
<script src="<?php echo base_url("vendor/adminlte3/"); ?>dist/js/adminlte.min.js"></script>
</head>
<body class=" bg-dark">
<div class="container-fluid bg-primary text-white">

</center>
<div class="row bg-dark">
  <div class="col-sm-4">
<table width="100%" >
  <tbody>
    <tr>
      <td><button id="2_mr" class="btn btn-block btn-warning text-white"><h1>2</h1></button></td>
      <td><button id="3_mr" class="btn btn-block btn-warning text-white"><h1>3</h1></button></td>
      <td><button id="4_mr" class="btn btn-block btn-warning text-white"><h1>4</h1></button></td>
    </tr>
    <tr>
      <td><button id="-1_mr" class="btn btn-block btn-warning text-white"><h1>-1</h1></button></td>
      <td><button id="-2_mr" class="btn btn-block btn-warning text-white"><h1>-2</h1></button></td>
      <td><button id="-5_mr" class="btn btn-block btn-warning text-white"><h1>-5</h1></button></td>
    </tr>
    <tr>
      <td colspan ="3"><button id="-10_mr" class="btn btn-block btn-warning text-white"><h1>-10</h1></button></td>
    </tr>
  </tbody>
</table><br>
</div>
  <div class="col-sm-2">
      <button id="score_merah" class="btn btn-block btn-danger text-white"><h1>0</h1></button>
  </div>
  <div class="col-sm-2">
      <button id="score_biru" class="btn btn-block btn-primary text-white"><h1>0</h1></button>
  </div>
  <div class="col-sm-4">
<table width="100%" >
  <tbody>
    <tr>
      <td><button id="2_br" class="btn btn-block btn-warning text-white"><h1>2</h1></button></td>
      <td><button id="3_br" class="btn btn-block btn-warning text-white"><h1>3</h1></button></td>
      <td><button id="4_br" class="btn btn-block btn-warning text-white"><h1>4</h1></button></td>
    </tr>
    <tr>
      <td><button id="-1_br" class="btn btn-block btn-warning text-white"><h1>-1</h1></button></td>
      <td><button id="-2_br" class="btn btn-block btn-warning text-white"><h1>-2</h1></button></td>
      <td><button id="-5_br" class="btn btn-block btn-warning text-white"><h1>-5</h1></button></td>
    </tr>
    <tr>
      <td colspan ="3"><button id="-10_br" class="btn btn-block btn-warning text-white"><h1>-10</h1></button></td>
    </tr>
  </tbody>
</table><br>
  </div>
</div>
<div class="row bg-dark">
  <div class="col-sm-12">
    <a href="<?php echo base_url(); ?>" class="btn btn-block btn-success text-white">Back To Home</a>
  </div>
</div>
</body>

    <script>
    var conn = new WebSocket('ws://<?php echo $_SERVER['HTTP_HOST']; ?>:8282');
    var client = {
        user_id: <?php echo $juri_id+9; ?>,
        recipient_id: 1,
        nama: "juri<?php echo $juri_id; ?>",
        id: 1,
        nilai_merah: 0,
        nilai_biru: 0
    };

    conn.onopen = function(e) {
        console.log('Successfully connected as user '+ client.user_id);
    };
    conn.onmessage = function(e) {
        var data = JSON.parse(e.data);

        if (data.babak == "3" && data.button == "show") {
          window.location.href = '<?php echo base_url("user/penilaian/".$user_id."/".$juri_id); ?>'
          
        }
    };

$(document).ready(function () {
  var count_biru = 0;
  var count_merah = 0;

  //biru
  $('#2_br').click(function () {
    count_biru += 2;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });
  $('#3_br').click(function () {
    count_biru += 3;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });
  $('#4_br').click(function () {
    count_biru += 4;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });
  $('#-1_br').click(function () {
    count_biru += -1;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });
  $('#-2_br').click(function () {
    count_biru += -2;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });
  $('#-5_br').click(function () {
    count_biru += -5;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });
  $('#-10_br').click(function () {
    count_biru += -10;
$('#score_biru').html("<h1>"+count_biru+"</h1>");
console.log("score biru : "+$('#score_biru').text());
client.nilai_biru = $('#score_biru').text();
conn.send(JSON.stringify(client));
  });  

  //merah
  $('#2_mr').click(function () {
    count_merah += 2;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
  $('#3_mr').click(function () {
    count_merah += 3;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
  $('#4_mr').click(function () {
    count_merah += 4;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
  $('#-1_mr').click(function () {
    count_merah += -1;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
  $('#-2_mr').click(function () {
    count_merah += -2;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
  $('#-5_mr').click(function () {
    count_merah += -5;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
  $('#-10_mr').click(function () {
    count_merah += -10;
$('#score_merah').html("<h1>"+count_merah+"</h1>");
console.log("score merah : "+$('#score_merah').text());
client.nilai_merah = $('#score_merah').text();
conn.send(JSON.stringify(client));
  });
});


    $('#broacast').click(function() {
        conn.send(JSON.stringify(client));
    });
    </script>
</html>