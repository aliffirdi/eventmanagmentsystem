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
</head>
<body class=" bg-dark">
<div class="container-fluid bg-primary text-white">
  <center>
	  <div class="display-1">POPDA IX KAB.SUBANG 2019</div><br>
<div class="row bg-white">
	<div class="col-sm-12">Cabang Olahraga Pencak Silat.</div>
</div>
<div class="row bg-dark text-white">
  <div class="col-sm-5">
  	<br>
  	<div class="col-sm-12 bg-white">
  		<br><h1><font id="peserta_sudut_red" color="red">PESERTA SUDUT MERAH</font></h1><br>
  	</div>
  	<br>
  	<div class="col-sm-12 bg-white">
  		<br><br><h1><font color="red" id="red_score" class="display-1">0</font></h1><br><br>
  	</div>
  </div>
  <div class="col-sm-2">
  	<br>
  		<h1>KELAS</h1>
  		<div class="col-sm-12 bg-white">
  			<br><h1><font color="black" size="50px" id="kelas_tanding">~</font></h1><br>
  		</div>

  		<h1>BABAK</h1>
  		<div class="col-sm-12 bg-white">
  			<br><h1><font color="black" size="50px" id="babak_tanding">~</font></h1><br>
  		</div>
  </div>
  <div class="col-sm-5">
  	<br>
  	<div class="col-sm-12 bg-white">
  		<br><h1><font id="peserta_sudut_blue" color="blue">PESERTA SUDUT BIRU</font></h1><br>
  	</div>
  	<br>
  	<div class="col-sm-12 bg-white">
  		<br><br><h1><font color="blue" id="blue_score" class="display-1">0</font></h1><br><br>
  	</div>
  	<br>
  </div>
  <div class="col-sm-12">
	  <div class="col-sm-4 bg-white">
	  			<br><h1><font color="black" class="display-3"><div id="waktu"><div class="values">READY</div></div></font></h1><br>
	  </div>
	  <br>
  </div>
  <div class="col-sm-12">
	  <div class="col-sm-12">
	  			<table width="100%">
	  				<thead>
	  					<tr>
	  						<th width="20%"><center><h1>Juri 1</h1></center></th>
	  						<th width="20%"><center><h1>Juri 2</h1></center></th>
	  						<th width="20%"><center><h1>Juri 3</h1></center></th>
	  						<th width="20%"><center><h1>Juri 4</h1></center></th>
	  						<th width="20%"><center><h1>Juri 5</h1></center></th>
	  					</tr>
	  				</thead>
	  			</table>
	  </div>
	  <div class="col-sm-12 bg-white">
	  			<table width="100%">
	  				<thead>
	  					<tr>
	  						<th width="20%"><center><h1><font class="display-4" id="red_jr1" color="red">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="red_jr2" color="red">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="red_jr3" color="red">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="red_jr4" color="red">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="red_jr5" color="red">0</font></h1></center></th>
	  					</tr>
	  					<tr>
	  						<th width="20%"><center><h1><font class="display-4" id="blue_jr1" color="blue">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="blue_jr2" color="blue">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="blue_jr3" color="blue">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="blue_jr4" color="blue">0</font></h1></center></th>
	  						<th width="20%"><center><h1><font class="display-4" id="blue_jr5" color="blue">0</font></h1></center></th>
	  					</tr>
	  				</thead>
	  			</table>
	  </div>
  </div>
</div>
</center>
</div>
<div id="ticket"></div>
</body>
    <script>
    var conn = new WebSocket('ws://<?php echo $_SERVER['HTTP_HOST']; ?>:8282');
    var client = {
        user_id: 1,
        recipient_id: null,
        nama: null,
        key: null,
        session: null
    };

    conn.onopen = function(e) {
        conn.send(JSON.stringify(client));
        console.log('Successfully connected as user '+ client.user_id);
    };
    conn.onmessage = function(e) {
        var data = JSON.parse(e.data);
        var idpertandingan = data.idpertandingan;
        $('#ticket').html(idpertandingan);
if (data.id) {
	if (data.nilai_merah) {
		if (data.nama == "juri1") {$('#red_jr1').html(parseInt(data.nilai_merah));} else {var jur_red1 =parseInt(0);}
		if (data.nama == "juri2") {$('#red_jr2').html(parseInt(data.nilai_merah));} else {var jur_red2 =parseInt(0);}
		if (data.nama == "juri3") {$('#red_jr3').html(parseInt(data.nilai_merah));} else {var jur_red3 =parseInt(0);}
		if (data.nama == "juri4") {$('#red_jr4').html(parseInt(data.nilai_merah));} else {var jur_red4 =parseInt(0);}
		if (data.nama == "juri5") {$('#red_jr5').html(parseInt(data.nilai_merah));} else {var jur_red5 =parseInt(0);}
	}
	if (data.nilai_biru) {
		if (data.nama == "juri1") {$('#blue_jr1').html(parseInt(data.nilai_biru));} else {var jur_blue1 =parseInt(0);}
		if (data.nama == "juri2") {$('#blue_jr2').html(parseInt(data.nilai_biru));} else {var jur_blue2 =parseInt(0);}
		if (data.nama == "juri3") {$('#blue_jr3').html(parseInt(data.nilai_biru));} else {var jur_blue3 =parseInt(0);}
		if (data.nama == "juri4") {$('#blue_jr4').html(parseInt(data.nilai_biru));} else {var jur_blue4 =parseInt(0);}
		if (data.nama == "juri5") {$('#blue_jr5').html(parseInt(data.nilai_biru));} else {var jur_blue5 =parseInt(0);}
	}
			var jur_red1 = parseInt($('#red_jr1').text());
			var jur_red2 = parseInt($('#red_jr2').text());
			var jur_red3 = parseInt($('#red_jr3').text());
			var jur_red4 = parseInt($('#red_jr4').text());
			var jur_red5 = parseInt($('#red_jr5').text());
		var score_red = jur_red1+jur_red2+jur_red3+jur_red4+jur_red5;
		console.log(score_red);

			var jur_blue1 = parseInt($('#blue_jr1').text());
			var jur_blue2 = parseInt($('#blue_jr2').text());
			var jur_blue3 = parseInt($('#blue_jr3').text());
			var jur_blue4 = parseInt($('#blue_jr4').text());
			var jur_blue5 = parseInt($('#blue_jr5').text());
		var score_blue = jur_blue1+jur_blue2+jur_blue3+jur_blue4+jur_blue5;
		console.log(score_blue);

		$('#red_score').html(score_red);
		$('#blue_score').html(score_blue);

}

        var waktu = null;
        if (data.babak) {
        	//menentukan waktu
        	if (data.nama == "Scoreboard_control" && data.key == "aliffirdi_r4has1a" && data.waktu) {
					//bagian timer
					console.log('Data waktu = '+ waktu +0);
					var waktu = data.waktu;
					var timer = new easytimer.Timer();
function startTimer() {
	timer.start({countdown: true, startValues: {seconds: waktu}});
	$('#waktu .values').html(timer.getTimeValues().toString());
	timer.addEventListener('secondsUpdated', function (e) {
   	$('#waktu .values').html(timer.getTimeValues().toString());
	});
}

function stopTimer() {
	timer.stop();
	timer.addEventListener('stopped', function (e) {
    $('#waktu .values').html(timer.getTimeValues().toString());
	});
}
						if (data.now == "play") {
							startTimer();
						} else if (data.now == "reset") {
							stopTimer();
					    }
					    	
							timer.addEventListener('targetAchieved', function (e) {
							    $('#waktu .values').html('WAKTU HABIS');
							    // const audio = new Audio('<?php echo base_url("vendor/gong.mp3"); ?>');
							    // audio.play();
							    client.session = "wkt_habis";
							    client.nama = "server_wkt";
							    client.recipient_id = null;
							    client.babak = $('#babak_tanding').text();
							    client.button = "show";
							    client.key = "aliffirdi_r4has1a";
							    conn.send(JSON.stringify(client));
							       var nilai_merah = parseInt($('#red_score').text());
							       var nilai_biru = parseInt($('#blue_score').text());
							       var idpertandingan = parseInt($('#ticket').text());
							       	console.log("Id pertandingan : "+idpertandingan);
							       $.ajax({
							           type: "POST",
							           url: "<?php echo base_url("user/updatenilai"); ?>",
							           //data:'id='+ data.id+'&nilai_merah='+ nilai_merah+'&nilai_biru='+ nilai_biru,
							           data:'id='+idpertandingan+'&nilai_merah='+nilai_merah+'&nilai_biru='+nilai_biru,
							           success: function (msg) {
							           },
							       });
							});
        	}

var nama_red = data.nama_peserta_red;
var nama_blue = data.nama_peserta_blue;
var kelas_tanding = data.kelas;
var babak_tanding = data.babak;

$('#red_score').html(score_red);
$('#blue_score').html(score_blue);

$('#peserta_sudut_red').html(nama_red);
$('#peserta_sudut_blue').html(nama_blue);

$('#kelas_tanding').html(kelas_tanding);
$('#babak_tanding').html(babak_tanding);
    if (data.now == "reset") {
		$('#red_jr1').html(0);
		$('#red_jr2').html(0);
		$('#red_jr3').html(0);
		$('#red_jr4').html(0);
		$('#red_jr5').html(0);
		$('#blue_jr1').html(0);
		$('#blue_jr2').html(0);
		$('#blue_jr3').html(0);
		$('#blue_jr4').html(0);
		$('#blue_jr5').html(0);
    	var score_red = 0;
		var score_blue = 0;
		var nama_red = "PESERTA SUDUT MERAH";
		var nama_blue = "PESERTA SUDUT BIRU";
		var kelas_tanding = "~";
		var babak_tanding = "~";
		$('#red_score').html(score_red);
		$('#blue_score').html(score_blue);

		$('#peserta_sudut_red').html(nama_red);
		$('#peserta_sudut_blue').html(nama_blue);

		$('#kelas_tanding').html(kelas_tanding);
		$('#babak_tanding').html(babak_tanding);
		$('#waktu .values').html("READY");
    }
        }
    };
</script>
</html>