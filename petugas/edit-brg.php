<p></p>
<?php
$id = $_GET['ProdukID'];

$sql = $koneksi->query("SELECT * FROM produk WHERE ProdukID = '$id'");
$data = $sql->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];
    $target = "../foto/";
    $time = date('dmYHis');
    $type = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $targetfile = $target . $time . '.' . $type;
    $filename = $time . '.' . $type;

    if ($_FILES['foto']['name'] !=='') {
        move_uploaded_file($_FILES['foto']['tmp_name'], $targetfile);
        $fotlam = $data['Foto'];
        unlink("../foto/".$fotlam);
        $sql = $koneksi->query("UPDATE produk SET NamaProduk='$name', Harga='$harga', Stok='$stok', Foto='$filename' WHERE ProdukID = '$id'");
        echo "<script>alert('Berhasil Mengubah Data Barang'); window.location.href='?page=stok';</script>";
        
    } else {
        $sql = $koneksi->query("UPDATE produk SET NamaProduk='$name', Harga='$harga', Stok='$stok' WHERE ProdukID = '$id'");
        echo "<script>alert('Berhasil Mengubah Data Barang'); window.location.href='?page=stok';</script>";
    }
}
?>

<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Edit Barang</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <div class="mb-3 mt-3">
                            <label for="nama" class="form-label">Nama Produk: <span style="color: red;"> *</span></label>
                            <input type="text" class="form-control" id="NamaProduk"  value="<?php echo $data['NamaProduk']; ?>" placeholder="Enter Name" name="NamaProduk">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga: <span style="color: red;"> *</span></label>
                            <input type="number" min="1" class="form-control" id="harga" value="<?php echo $data['Harga']; ?>" placeholder="Enter Harga" name="Harga">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok: <span style="color: red;"> *</span></label>
                            <input type="number" min="1" class="form-control" id="stok" value="<?php echo $data['Stok']; ?>" placeholder="Enter Stok" name="Stok">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto: <span style="color: red;"> *</span></label>
                            <p><?php echo "<img src='../foto/".$data['Foto']."' width='70' height='70'></img>"; ?>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <p style="color: red;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
                        </div>
                        <button type="submit" name="submit" class="btn btn-md btn-primary">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>