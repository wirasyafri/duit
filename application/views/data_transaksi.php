<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title>Data Transaksi</title>
  </head>
  <body>
    
    <div class="container" style="margin-top: 80px;">
      
      <div class="row">
        <div class="col-md-10 offset-md-2">

          <div class="card">
            <div class="card-header">
              DATA TRANSAKSI
            </div>
            <div class="card-body">

              <a href="<?php echo base_url()?>index.php/transaksi/tambah/" class="btn btn-primary mb-3">+ Tambah</a>

            <table class="table table-striped" id="myTable">

              <thead>
                <tr>
                  <th>No</th>
                  <!-- <th scope="col">NIM</th> -->
                  <th scope="col">NAMA</th>
                  <th scope="col">KODE</th>
                  <th scope="col">NOMINAL</th>
                  <th scope="col">GET</th>
                  <th scope="col">TANGGAL</th>
                  <!-- <th scope="col">ALAMAT</th> -->
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $no=1;
                  foreach($transaksi->result() as $trs){?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <!-- <td><?php echo $trs->nim; ?></td> -->
                  <td><?php echo $trs->nama_lengkap; ?></td>
                  <td><?php echo $trs->kode; ?></td>
                  <td><?php echo $trs->nominal; ?></td>
                  <td><?php echo $trs->bayar; ?></td>
                  <td><?php echo date('d/m/Y',strtotime($trs->tanggal)); ?></td>
                  <!-- <td><?php echo $trs->alamat; ?></td> -->
                  <td class="text-center">
                    <a href="<?php echo base_url()?>index.php/transaksi/edit/<?php echo $trs->id; ?>" class="btn btn-sm btn-primary">EDIT</a>                    

                    <a href="<?php echo base_url()?>index.php/transaksi/hapus/<?php echo $trs->id; ?>" class="btn btn-sm btn-danger">HAPUS</a>


                  </td>
                </tr>
             <?php } ?>
              </tbody>
              <tfoot>
            <tr>
                <th colspan="3" style="text-align:right">Total:</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
            </table>  
             

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

    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
                                                                           // console.log(data)
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // // Total over all pages
            // total = api
            //     .column( 2 )
            //     .data()
            //     .reduce( function (a, b) {
            //         return intVal(a) + intVal(b);
            //     }, 0 );
 
            // Total over this page
            tot_nominal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            tot_bayar = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            console.log(tot_nominal)
            // // Update footer
            $( api.column( 3 ).footer() ).html(
                'Rp.'+tot_nominal
            );
            $( api.column( 4 ).footer() ).html(
                'Rp.'+tot_bayar
            );
        }
    } );
        } );

        // var table = $('#myTable').DataTable();
 
        // table.on( 'search.dt', function () {
        //                                         alert("hehe")
        //     // $('#filterInfo').html( 'Currently applied global search: '+table.search() );
        // } );
    </script>
  </body>
</html>