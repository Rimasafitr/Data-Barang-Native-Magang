<?php
    include 'koneksi.php'; //memanggil file koneksi agar dapat mengakses data yang ada di db

    if(isset($_POST ['aksi'])) {
        if($_POST['aksi']=="add") {

            $nama_barang = $_POST['nama_barang'];
            $kategori_barang = $_POST['kategori_barang'];
            $harga_barang = $_POST['harga_barang'];
            $stok = $_POST['stok'];
            $tanggal_masuk = $_POST['tanggal_masuk'];
            $foto = $_FILES['foto']['name'];

            $dir = "img/"; //tempat akhir menyimpan file
            $tmpFile = $_FILES['foto']['tmp_name']; //tempat awal penyimpanan sementara

            move_uploaded_file($tmpFile, $dir.$foto); //pindah ke folder tujuan

            $query = "INSERT INTO barang VALUES(null,'$nama_barang', '$kategori_barang', '$harga_barang', '$stok', '$tanggal_masuk', '$foto')";
            $sql = mysqli_query($conn, $query); //perintah untuk menjalankan query terhadap db yang terhubung
            if ($sql) {
                header("location: index.php"); //mengembalikan ke hal.index
            }

            echo $nama_barang." | ".$kategori_barang." | ".$harga_barang." | ".$stok." | ".$tanggal_masuk." | ".$foto;
        } elseif ($_POST['aksi'] == "edit") {
            $id_barang = $_POST['id_barang'];
            $nama_barang = $_POST['nama_barang'];
            $kategori_barang = $_POST['kategori_barang'];
            $harga_barang = $_POST['harga_barang'];
            $stok = $_POST['stok'];
            $tanggal_masuk = $_POST['tanggal_masuk'];

            $queryShow = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
            $sqlShow = mysqli_query($conn, $queryShow); //perintah untuk menjalankan query terhadap db yang terhubung
            $result = mysqli_fetch_assoc($sqlShow); //mengambil data array di query tsb

            if($_FILES['foto']['name'] == ""){
                $foto =  $result['foto'];
            } else {
                $foto = $_FILES['foto']['name'];
                unlink("img/".$result['foto']); //menghapus foto lama
                move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$_FILES['foto']['name']);
            }
            $query = "UPDATE barang SET id_barang='$id_barang', nama_barang='$nama_barang', kategori_barang='$kategori_barang', harga_barang='$harga_barang', stok='$stok', tanggal_masuk='$tanggal_masuk', foto='$foto' WHERE id_barang='$id_barang';";
            $sql = mysqli_query($conn, $query);
            header("location: index.php"); //mengembalikan ke halaman index
        }
    }
    if (isset($_GET['hapus'])) {
        $id_barang = $_GET['hapus'];

        $queryShow = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
        $sqlShow = mysqli_query($conn, $queryShow); //perintah untuk menjalankan query terhadap db yang terhubung
        $result = mysqli_fetch_assoc($sqlShow); //mengambil data array di query tsb

        unlink("img/".$result['foto']); //hapus foto

        $query = "DELETE FROM barang WHERE id_barang = '$id_barang'"; //delete berdasarkan id
        $sql = mysqli_query($conn, $query); //perintah untuk menjalankan query terhadap db yang terhubung
        if ($sql) {
            header("location: index.php"); //mengembalikan ke halaman index
        }
    }
?>
