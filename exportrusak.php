<?php
require 'function.php';
require 'cek.php';
?>
<html>
<head>
  <title>Data Barang Rusak</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link href='assets/img/uph.png' rel='shortcut icon'>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Barang Rusak</h2>
			<h4>Data Barang Rusak</h4>
				<div class="data-tables datatable-dark">
					
                <table id="mauexport" class="table table bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Stok Rusak</th>
                                            <th>Gambar</th>
                                            <th>Keterangan</th>
                                            <th>Keadaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                         $ambilsemuadatastok = mysqli_query($conn, "SELECT * FROM keluar k, stock s where s.kodebarang4 = k.idbarang");
                                         while($data = mysqli_fetch_array($ambilsemuadatastok)){
                                           $idk=$data['idkeluar'];
                                           $kodebarang=$data['idbarang'];
                                           $namabarangrusak=$data['namabaranglo'];
                                           $stok=$data['qty'];
                                           $gambar=$data['gambar'];
                                           $Keterangan=$data['keterangan'];
                                           $keadaan=$data['keadaanlo'];
                                           $idkb=$data['idstock'];
                                       ?>
                                         <tr class="warning">
                                         <td><?php echo $data['tanggal']; ?></td>
                                         <td><?php echo $data['idbarang']; ?></td>
                                         <td><?php echo $data['namabaranglo']; ?></td>
                                         <td><?php echo $data['qty']; ?></td>
                                         <td><img src="gambar/<?php echo $data['gambar']; ?>" width="250" height="200"></td>
                                         <td><?php echo $data['keadaanlo']; ?></td>
                                         <td><?php echo $data['keterangan']; ?></td>
	                                    </tr>
                                        <?php } ?> 
                                        </tbody>
                                </table>
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>