<!DOCTYPE html>
<html lang="id">
<head>
  <title>Laporan Harian</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <br/>
      <div class="small text-muted">Home » Report</div>
      <hr>
      <div class="col-md-6">
      <h4>Input Laporan Harian</h4>
      <form method="POST" action="Report/submit_report">
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="nama" class="form-control" id="nama" placeholder="Masukkan nama anda . . ." name="nama" required>
        </div>
        <div class="form-group">
          <label for="sales">Jumlah Penjualan:</label>
          <input type="number" class="form-control" id="sales" placeholder="Jumlah penjualan . . ." name="sales" required>
        </div>
        <div class="form-group form-check">
          
        </div>
        <button type="submit" class="btn btn-primary">Input</button>
      </form>
    </div>
</div>
 
</body>
</html>