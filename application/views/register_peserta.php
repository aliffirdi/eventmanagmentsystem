<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//var_dump($this->input->post('nama_kontingen_blue'));
if (isset($_POST['nama_kontingen_blue'])) {
  $jmlh = $this->input->post('jumlah_babak')+1;
  for ($i=1; $i < $jmlh; $i++) { 
  $rand = rand(1,9).rand(1,9).rand(1,9)."007";
  $data = array(
                'id' => $rand,
                'kelas_tanding' => $this->input->post('kelas'),
                'kontingen_biru' => $this->input->post('nama_kontingen_blue'),
                'kontingen_merah' => $this->input->post('nama_kontingen_red'),
                'nama_biru' => $this->input->post('nama_peserta_blue'),
                'nama_merah' => $this->input->post('nama_peserta_red'),
                'babak' => $i,
                'waktu' => $this->input->post('waktu')
        );

        $this->db->insert('pertandingan', $data);
    # code...
  }
        $this->session->set_flashdata('success', 'Sukses Menambah Data');
        redirect(base_url(''));
}
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
</center>
<form action="" method="post" accept-charset="utf-8">
<div class="row bg-dark">
  <div class="col-sm-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kontingen">Nama Kontingen Sudut Biru</label>
                    <input type="text" class="form-control" name="nama_kontingen_blue" placeholder="Masukan Nama Kontingen">
                  </div>
                  <div class="form-group">
                    <label for="nama_peserta">Nama Peserta Sudut Biru</label>
                    <input type="text" class="form-control" name="nama_peserta_blue" placeholder="Masukan Nama Peserta">
                  </div>
                </div>
</div>
  <div class="col-sm-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kontingen">Nama Kontingen Sudut Merah</label>
                    <input type="text" class="form-control" name="nama_kontingen_red" placeholder="Masukan Nama Kontingen">
                  </div>
                  <div class="form-group">
                    <label for="nama_peserta">Nama Peserta Sudut Merah</label>
                    <input type="text" class="form-control" name="nama_peserta_red" placeholder="Masukan Nama Peserta">
                  </div>
  </div>
  </div>
</div>
<div class="row bg-dark">
  <div class="col-sm-12">
                  <div class="form-group">
                    <label for="nama_kontingen">Kelas Tanding</label>
                    <input type="text" class="form-control" name="kelas" placeholder="Masukan Nama Kontingen">
                  </div>
                  <div class="form-group">
                    <label for="waktu">Waktu Bermain</label>
                    <input type="text" class="form-control" name="waktu" placeholder="Masukan dalam satuan detik">
                  </div>
                  <div class="form-group">
                    <label for="jumlah_babak">Jumlah Babak Permainan</label>
                    <input type="text" class="form-control" name="jumlah_babak" placeholder="Masukan hanya angka">
                  </div>
    <button type="submit" class="btn btn-block btn-success">Simpan Data Peserta</button>
</form>
    <a href="<?php echo base_url(); ?>" class="btn btn-block btn-warning text-white">Back To Home</a>
  </div>
</div>
</body>
</html>