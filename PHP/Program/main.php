<?php

    require_once ('Baju.php');

    // initial data (hardcoded)
    $data = [
        new Baju(1, "Baju Anjing", 150000, 10, "Pakaian", "Katun", "Merah", "Anjing", "M", "PetLovers", "uploads/catconfused.jpg"),
        new Baju(2, "Baju Kucing", 120000, 15, "Pakaian", "Polyester", "Biru", "Kucing", "S", "PetLovers", "uploads/catconfused.jpg"),
        new Baju(3, "Baju Burung", 80000, 20, "Pakaian", "Sutra", "Hijau", "Burung", "L", "PetLovers", "uploads/catconfused.jpg"),
        new Baju(4, "Baju Kelinci", 100000, 12, "Pakaian", "Wol", "Putih", "Kelinci", "M", "PetLovers", "uploads/catconfused.jpg"),
        new Baju(5, "Baju Hamster", 50000, 25, "Pakaian", "Katun", "Coklat", "Hamster", "S", "PetLovers", "uploads/catconfused.jpg"),
    ];

    // function to check if id already exists
    function isIdExists($data, $id) {
        foreach ($data as $item) {
            if ($item->getId() == $id) {
                return true;
            }
        }
        return false;
    }

    // handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id           = intval($_POST['id']);
        $nama_produk  = $_POST['nama_produk'];
        $harga_produk = floatval($_POST['harga_produk']);
        $stok_produk  = intval($_POST['stok_produk']);
        $jenis        = $_POST['jenis'];
        $bahan        = $_POST['bahan'];
        $warna        = $_POST['warna'];
        $untuk        = $_POST['untuk'];
        $size         = $_POST['size'];
        $merk         = $_POST['merk'];

        // handle file upload
        if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] == 0) {
            $target_dir    = "uploads/";
            $target_file   = $target_dir . basename($_FILES["foto_produk"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
            if ($check !== false) {
                // Allow certain file formats
                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                    if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                        $foto_produk = $target_file;
                    } else {
                        echo "<script>alert('gagal upload foto produk: terjadi kesalahan saat mengupload file.');</script>";
                        $foto_produk = '';
                    }
                } else {
                    echo "<script>alert('gagal upload foto produk:  hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.');</script>";
                    $foto_produk = '';
                }
            } else {
                echo "<script>alert('gagal upload foto produk: file bukan gambar.');</script>";
                $foto_produk = '';
            }
        } else {
            $foto_produk = '';
        }

        // if id already exists, show alert that id is already used.
        if (isIdExists($data, $id)) {
            echo "<script>alert('ID sudah ada! Silakan gunakan ID lain.');</script>";
        } else {
            // buat objek baru dan tambahkan ke array data
            $newBaju = new Baju($id, $nama_produk, $harga_produk, $stok_produk, $jenis, $bahan, $warna, $untuk, $size, $merk, $foto_produk);
            $data[]  = $newBaju;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPBO TP2: PetShop apalah</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data Produk PetShop</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>stok</th>
            <th>jenis</th>
            <th>bahan</th>
            <th>warna</th>
            <th>untuk</th>
            <th>size</th>
            <th>merk</th>
            <th>foto produk</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $baju): ?>
            <tr>
                <td><?php echo $baju->getId() ?></td>
                <td><?php echo $baju->getNamaProduk() ?></td>
                <td><?php echo number_format($baju->getHargaProduk(), 2) ?></td>
                <td><?php echo $baju->getStokProduk() ?></td>
                <td><?php echo $baju->getJenis() ?></td>
                <td><?php echo $baju->getBahan() ?></td>
                <td><?php echo $baju->getWarna() ?></td>
                <td><?php echo $baju->getUntuk() ?></td>
                <td><?php echo $baju->getSize() ?></td>
                <td><?php echo $baju->getMerk() ?></td>
                <td>
                    <?php if ($baju->getFotoProduk()): ?>
                        <img src="<?php echo $baju->getFotoProduk() ?>" alt="Foto Produk" style="width:100px;">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <h2>Tambah Data Baru</h2>
    <form method="POST" action="" enctype="multipart/form-data">
    ID: <input type="number" name="id" required><br>
    nama produk: <input type="text" name="nama_produk" required><br>
    harga: <input type="number" step="0.01" name="harga_produk" required><br>
    stok: <input type="number" name="stok_produk" required><br>
    jenis: <input type="text" name="jenis" required><br>
    bahan: <input type="text" name="bahan" required><br>
    warna: <input type="text" name="warna" required><br>
    untuk: <input type="text" name="untuk" required><br>
    size: <input type="text" name="size" required><br>
    merk: <input type="text" name="merk" required><br>
    foto produk: <input type="file" name="foto_produk" required><br>
    <input type="submit" value="Tambah Data">
</form>
</body>
</html>