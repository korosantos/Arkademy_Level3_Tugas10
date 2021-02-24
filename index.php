<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>PRODUK</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  	<div class="jumbotron bg-primary text-white">
  		<h1 class="text-center">Data produk</h1>
  	</div>

  	<div class="container">
  		<div class="shadow p-3 mb-5 bg-white rounded">
  						<h3 class="text-info text-center">Produk</h3>
  	<form action="" method="post">
  							<div class="form-group col-sm-6">
  								<input name="cari_nama" type="text" class="form-control" placeholder="masukan nama barang">	
  							</div>

  							<div class="form-group col-sm-6">
  								<button type="submit" name="cari" class="btn btn-info"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
							</svg> Lihat</button>
  							</div>

  							<?php 
  								include_once('config.php');

  								if (isset($_POST['cari'])) {
  									$cari_nama = $_POST['cari_nama'];
  									$sql_produk = mysqli_query($con, "select * from produk where nama_produk like '%".$cari_nama."%'");
  								}
  								else{
  									$sql_produk = mysqli_query($con, "select * from produk");



  								}
  							 ?>
  						
  						<div class="form-group col-sm-12 text-right">
  								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
 								 <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  								<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
						</svg> Tambah data</button>
  							</div>
  						<table class="table table-hover">
  							<thead>
  								<tr>
  									<th>No</th>
  									<th>Nama Produk</th>
  									<th>Keterangan</th>
  									<th>Harga</th>
  									<th>Jumlah</th>
  									<th>Opsi</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php 
  								$nomor = 1;
  									while ($data = mysqli_fetch_array($sql_produk)) {
  										?>
  									
  								 
  								<tr>

  									<td> <?= $nomor++; ?> </td>
  									<td> <?= $data['nama_produk']; ?> </td>
  									<td> <?= $data['keterangan']; ?> </td>
  									<td> <?= $data['harga']; ?> </td>
  									<td> <?= $data['jumlah']; ?> </td>
  									<td><button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit<?php echo $data['id']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
								    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
								    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
								    </svg></button>
  										<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapus<?= $data['id']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  										<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
									</svg></button>

									  	<!-- Modal Edit Data -->
<div class="modal fade" id="edit<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        	<div class="form-group">
        		<input type="text" placeholder="Masukan nama produk" name="ed_namaProduk" class="form-control" 	value="<?= $data['nama_produk']; ?>">
        	</div>

        	<div class="form-group">
        		<input type="text" placeholder="Keterangan" name="ed_keterangan" class="form-control" value="<?= $data['keterangan']; ?>">
        	</div>

        	<div class="form-group">
        		<input type="number" placeholder="Masukan harga" name="ed_harga" class="form-control" value="<?= $data['harga']; ?>">
        	</div>

        	<div class="form-group">
        		<input type="number" placeholder="Masukan jumlah" name="ed_jumlah" class="form-control" value="<?= $data['jumlah']; ?>">
        	</div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit_produk" class="btn btn-success">Simpan Perubahan</button>
        <?php 

        	if (isset($_POST['edit_produk'])) {
        		$id = $data['id'];
        		$nama_produk = $_POST['ed_namaProduk'];
        		$keterangan = $_POST['ed_keterangan'];
        		$harga = $_POST['ed_harga'];
        		$jumlah = $_POST['ed_jumlah'];

        		$sql_edit = mysqli_query($con, "update produk set nama_produk='$nama_produk', keterangan='$keterangan',harga='$harga',jumlah='$jumlah' where id='$id'");
        		if ($sql_edit) {
        			header("location:index.php");
        		}
        	}

         ?>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus Data -->
<div class="modal fade" id="hapus<?= $data['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Ingin Menghapus Data Barang <b> <?= $data['nama_produk']; ?> </b> ? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="hapus_produk" class="btn btn-danger">Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>

<?php 
	if (isset($_POST['hapus_produk'])) {
		$id = $data['id'];
		$sql_hapus = mysqli_query($con, "delete from produk where id='$id'");
		if ($sql_hapus) {
		?> 
			<script>alert('Data Berhasil Dihapus');</script>
		 <?php
	}
	}

 ?>

</td>
 </tr>
<?php } ?>
</tbody>
</table>
  	</form>					
  		</div>
  	</div>

  	<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        	<div class="form-group">
        		<input type="text" placeholder="Masukan nama produk" name="in_namaProduk" class="form-control">
        	</div>

        	<div class="form-group">
        		<input type="text" placeholder="Masukan Keterangan" name="in_keterangan" class="form-control">
        	</div>

        	<div class="form-group">
        		<input type="number" placeholder="Masukan harga" name="in_harga" class="form-control">
        	</div>

        	<div class="form-group">
        		<input type="number" placeholder="Masukan jumlah" name="in_jumlah" class="form-control">
        	</div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="tambah_produk" class="btn btn-success">Simpan</button>
        <?php 

        	if (isset($_POST['tambah_produk'])) {

        		$nama_produk = $_POST['in_namaProduk'];
        		$keterangan = $_POST['in_keterangan'];
        		$harga = $_POST['in_harga'];
        		$jumlah = $_POST['in_jumlah'];

        		$sql_tambah = mysqli_query($con, "insert into produk set nama_produk='$nama_produk', keterangan='$keterangan',harga='$harga',jumlah='$jumlah'");
        		if ($sql_tambah) {
        			header("location:index.php");
        		}
        	}

         ?>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>