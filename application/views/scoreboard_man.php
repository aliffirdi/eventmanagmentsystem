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
  <center>
	  <div class="display-1">Scoreboard System Validation</div><br>
<div class="row bg-secondary">
	<div class="col-sm-12"><h2>Under development, for testing purpose only.</h2></div>
</div>
</center><?php $query = $this->db->query("SELECT * FROM pertandingan WHERE id='$user_id'"); foreach ($query->result() as $row) { ?>
<div class="row bg-dark">
  <div class="col-sm-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kontingen">Nama Kontingen Sudut Biru</label>
                    <input type="text" class="form-control" value="<?php echo strtoupper($row->kontingen_biru); ?>" id="nama_kontingen_blue" placeholder="Masukan Nama Kontingen">
                  </div>
                  <div class="form-group">
                    <label for="nama_peserta">Nama Peserta Sudut Biru</label>
                    <input type="text" class="form-control" value="<?php echo strtoupper($row->nama_biru); ?>" id="nama_peserta_blue" placeholder="Masukan Nama Peserta">
                  </div>
                </div>
</div>
  <div class="col-sm-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kontingen">Nama Kontingen Sudut Merah</label>
                    <input type="text" class="form-control" value="<?php echo strtoupper($row->kontingen_merah); ?>" id="nama_kontingen_red" placeholder="Masukan Nama Kontingen">
                  </div>
                  <div class="form-group">
                    <label for="nama_peserta">Nama Peserta Sudut Merah</label>
                    <input type="text" class="form-control" value="<?php echo strtoupper($row->nama_merah); ?>" id="nama_peserta_red" placeholder="Masukan Nama Peserta">
                  </div>
  </div>
  </div>
</div>
<div class="row bg-dark">
  <div class="col-sm-12">
    <button id="broacast" onclick="$('#broacast_start').fadeIn();$('#broacast').hide();" type="submit" class="btn btn-block btn-success">Broadcast To Scoreboard Monitor</button>
    <button id="broacast_start" style="display: none;" onclick="$('#broacast_start').hide();audio.play();" type="submit" class="btn btn-block btn-primary">Start Event</button>
    <button id="rst" style="display: none;" onclick="$('#rst').hide();" type="submit" class="btn btn-block btn-danger">Reset Event</button>
    <a href="<?php echo base_url(); ?>" class="btn btn-block btn-warning text-white">Back To Home</a>
  </div>
</div>
</body>

    <script>
      const audio = new Audio('<?php echo base_url("vendor/gong.mp3"); ?>');
    var conn = new WebSocket('ws://<?php echo $_SERVER['HTTP_HOST']; ?>:8282');
    var rst = {
      waktu: 0,
      key: "aliffirdi_r4has1a",
      babak: "<?php echo strtoupper($row->babak); ?>",
      nama: "Scoreboard_control",
      now: "reset"
    };
    var wkt = {
      waktu: <?php echo strtoupper($row->waktu); ?>,
      now: "play",
      key: "aliffirdi_r4has1a",
      babak: "<?php echo strtoupper($row->babak); ?>",
      nama: "Scoreboard_control"
    };
    var client = {
        user_id: 2,
        recipient_id: null,
        idpertandingan: <?php echo "'".$row->id."'"; ?>,
        nama: "Scoreboard_control",
        nama_kontingen_blue: $('#nama_kontingen_blue').val(),
        nama_peserta_blue: $('#nama_peserta_blue').val(),
        nama_kontingen_red: $('#nama_kontingen_red').val(),
        nama_peserta_red: $('#nama_peserta_red').val(),
        key: "aliffirdi_r4has1a",
        kelas: "<?php echo strtoupper($row->kelas_tanding); ?>",
        babak: "<?php echo strtoupper($row->babak); ?>",
    };

    conn.onopen = function(e) {
        console.log('Successfully connected as user '+ client.user_id);
    };
    conn.onmessage = function(e) {
        var data = JSON.parse(e.data);
        if (data.nama == "server_wkt" && data.button == "show") {
          audio.play();
          $('#rst').fadeIn();
          
        }
    };
    $('#broacast').click(function() {
        conn.send(JSON.stringify(client));
    });
    $('#broacast_start').click(function() {
        conn.send(JSON.stringify(wkt));
    });
    $('#rst').click(function() {
        conn.send(JSON.stringify(rst));
    });
    </script><?php } ?>
</html>