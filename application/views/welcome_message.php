<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//die(var_dump($user_id));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <style type="text/css">
    #container,code{border:1px solid #D0D0D0}::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a,h1{background-color:transparent;font-weight:400}a{color:#039}h1{color:#444;border-bottom:1px solid #D0D0D0;font-size:19px;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;box-shadow:0 0 8px #D0D0D0}
    </style>
</head>
<body>
    <div id="container">
        <h1>Welcome to Private Chat Server!</h1>
        <div id="body">
            <div id="stts"></div>
            <div id="messages"></div>
            <input type="text" id="text" placeholder="Message ..">
            <input type="text" id="nama" placeholder="nama">
            <input type="text" id="recipient_id" placeholder="Recipient id ..">
            <button id="submit" value="POST">Send</button>
        </div>
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    var conn = new WebSocket('ws://<?php echo $_SERVER['HTTP_HOST']; ?>:8282');
    var client = {
        user_id: <?php echo $user_id; ?>,
        recipient_id: <?php if ($r_id != null) { echo $r_id;} else {echo "null";} ?>,
        nama: null,
        message: null
    };

    if (client.recipient_id != null) {
    	$('#recipient_id').hide();
    }

    conn.onopen = function(e) {
        conn.send(JSON.stringify(client));
        $('#messages').append('<font color="green">Successfully connected as user '+ client.user_id +'</font><br>');
    };

    conn.onmessage = function(e) {
        var data = JSON.parse(e.data);
        if (data.message) {
            if (data.message == "mengetik") {
            	$('#stts').html(data.nama + " mengetik").fadeIn(0).delay(200).fadeOut(0);
            } else {
            	$('#messages').append(data.user_id + ' : ' + data.nama + ' : ' + data.message + '<br>');
            }
        }
    };

    $('#text').keydown(function () {
    	client.message = "mengetik";
    	if ($('#nama').val()) {
            client.nama = $('#nama').val();
        }
        if ($('#recipient_id').val()) {
            client.recipient_id = $('#recipient_id').val();
        }
        conn.send(JSON.stringify(client));
    });

    $('#submit').click(function() {
        client.message = $('#text').val();
        client.nama = $('#nama').val();
        $('#messages').append("<?php echo $user_id; ?> : " + client.message + '<br>');
        if ($('#recipient_id').val()) {
            client.recipient_id = $('#recipient_id').val();
        }
        conn.send(JSON.stringify(client));
    });
    </script>
</body>
</html>