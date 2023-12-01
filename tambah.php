<!doctype html>
<?php
  include 'koneksi.php';

    $id_barang = '';
    $nama_barang = '';
    $kategori_barang = '';
    $harga_barang = '';
    $stok = '';
    $tanggal_masuk = '';


  if (isset($_GET['ubah'])) {
    $id_barang = $_GET['ubah'];

    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql); //mengambil data array di query tsb

    $nama_barang = $result['nama_barang'];
    $kategori_barang = $result['kategori_barang'];
    $harga_barang = $result['harga_barang'];
    $stok = $result['stok'];
    $tanggal_masuk = $result['tanggal_masuk'];

  }
?>
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
      <div class="container mt-5">
        <?php
          if (isset($_GET['ubah'])) { //kalau data terjadi perubahan maka judulnya berubah menjadi edit
          ?>
            <h3 class="mb-5">Form Edit Data Barang</h3>                    
          <?php
          } else { //kalau tidak, judulnya menjadi tambah
          ?>
            <h3 class="mb-5">Form Tambah Data Barang</h3>
          <?php
          }
        ?>
        <form method="post" action="proses.php" enctype="multipart/form-data"> <!-- agar data berupa file dapat diakses -->
            <input type="hidden" value="<?php echo $id_barang; ?>" name="id_barang">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                <input required type="text" name="nama_barang" class="form-control" id="nama" placeholder="Masukkan Nama Barang" value="<?php echo $nama_barang;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori Barang</label>
                <div class="col-sm-10">
                <input required type="text" name="kategori_barang" class="form-control" id="kategori" placeholder="Masukkan Kategori Barang" value="<?php echo $kategori_barang;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
                <div class="col-sm-10">
                <input required type="number" name="harga_barang" class="form-control" id="harga" placeholder="Masukkan Harga Barang" value="<?php echo $harga_barang;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok Barang</label>
                <div class="col-sm-10">
                <input required type="number" name="stok" class="form-control" id="stok" placeholder="Masukkan Stok Barang" value="<?php echo $stok;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-10">
                <input required type="date" name="tanggal_masuk" class="form-control" id="tanggal" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Masukkan foto</label>
                <div class="col-sm-10">
                <input <?php if (!isset($_GET['ubah'])){echo"required";}?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <?php
                    if (isset($_GET['ubah'])) { //kalau data terjadi perubahan maka buttonnya berubah menjadi simpan
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-success" style="margin-right: 10px;"><i class="bi bi-check"></i> Simpan</button>
                    <?php
                    } else { //kalau tidak buttonnya menjadi tambah
                    ?>
                        <button type="submit" name="aksi" value="add" class="btn btn-success" style="margin-right: 10px;"><i class="bi bi-check"></i> Tambah</button>
                    <?php
                    }
                    ?>
                    <a href="index.php" type="button" class="btn btn-dark"><i class="bi bi-reply"></i> Batal</a>
                </div>
            </div>
        </form>
      </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"></script>

  </body>
</html>