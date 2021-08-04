<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Edit transaksi</title>
  </head>
  <body>
    
    <div class="container" style="margin-top: 80px;">
      
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT TRANSAKSI
            </div>
            <div class="card-body">
              
             <form action="<?php echo base_url('index.php/transaksi/update/') ?> " method="POST">

              <input type="hidden" name="id" value="<?php echo $transaksi->id ?>">
<!-- 
              <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="<?php echo $transaksi->nim ?>" class="form-control">
              </div> -->

              <div class="form-group">
                <label>NAMA LENGKAP</label>
                <input type="text" name="nama_lengkap" value="<?php echo $transaksi->nama_lengkap ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>KODE</label>
                <input type="text" name="kode" value="<?php echo $transaksi->kode ?>" class="form-control">
              </div>
            <div class="form-group">
                <label>NOMINAL</label>
                <input type="text" name="nominal" value="<?php echo $transaksi->nominal ?>" class="form-control">
              </div>
            <div class="form-group">
                <label>GET</label>
                <input type="text" name="bayar" value="<?php echo $transaksi->bayar ?>" class="form-control">
            </div>
              <div class="form-group">
                <label>TANGGAL</label>
                <input type="date" name="tanggal" value="<?php echo $transaksi->tanggal ?>" class="form-control">
                <!-- <input id="txtDate" type="text" class="form-control" name="tanggal"> -->
              </div>

<!--               <div class="form-group">
                <label>ALAMAT</label>
                <textarea class="form-control" name="alamat" rows="4"><?php echo $transaksi->alamat ?></textarea>
              </div> -->
              
              <button type="submit" class="btn btn-primary">UPDATE</button>
              <button type="button" id="kembali">Cancel</button>
              
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#kembali').click(function() {
            kembali();
        });

        function kembali(){
            window.location = "<?php echo base_url("transaksi"); ?>";
        }

    </script>
  </body>
</html>