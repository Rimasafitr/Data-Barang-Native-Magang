<?php
  include 'koneksi.php'; //memanggil file koneksi agar dapat mengakses data yang ada di db

  $query = "SELECT * FROM barang"; //untuk menampilkan data di tb barang
  $sql = mysqli_query($conn, $query); //perintah untuk menjalankan query terhadap db yang terhubung
  $no = 0; //agar nomornya berurutan tidak seperti id
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>CRUD Data Barang</title>
  </head>
  <body>
    <div class="container-fluid">
      <figure class="text-center mt-5">
        <blockquote class="blockquote">
          <p>Selamat Datang di CRUD Data Barang Sederhana</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          Magang Mandiri Polhas | <cite title="Source Title">Digitaliz</cite>
        </figcaption>
      </figure>
      <a href="tambah.php" type="button" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Data</a>
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col"><center>No</center></th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Kategori Barang</th>
              <th scope="col">Harga Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Tanggal Masuk</th>
              <th scope="col">Foto</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
              <td><center>
                <?php echo ++$no; ?>
              </center></td>
              <td>
                <?php echo $result['nama_barang']; ?>
              </td>
              <td>
                <?php echo $result['kategori_barang']; ?>
              </td>
              <td>
                <?php echo $result['harga_barang']; ?>
              </td>
              <td>
                <?php echo $result['stok']; ?>
              </td>
              <td>
                <?php echo $result['tanggal_masuk']; ?>
              </td>
              <td>
                <img src="img/<?php echo $result['foto']; ?>" alt="" style="width: 150px;">
              </td>
              <td>
                <a href="tambah.php?ubah=<?php echo $result['id_barang']; ?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i> Edit</a>
                <a href="proses.php?hapus=<?php echo $result['id_barang']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"></script>

  </body>
</html>