<?php

require_once ('Aksesoris.php');

class Baju extends Aksesoris {
    private $untuk;
    private $size;
    private $merk;

    // default constructor
    public function __construct($id = 0, $nama_produk = "", $harga_produk = 0.0, $stok_produk = 0, $jenis = "", $bahan = "", $warna = "", $untuk = "", $size = "", $merk = "", $foto_produk = "") {
        parent::__construct($id, $nama_produk, $harga_produk, $stok_produk, $jenis, $bahan, $warna, $foto_produk);
        $this->untuk = $untuk;
        $this->size  = $size;
        $this->merk  = $merk;
    }

    // getters
    public function getUntuk() {
        return $this->untuk;
    }

    public function getSize() {
        return $this->size;
    }

    public function getMerk() {
        return $this->merk;
    }

    // setters
    public function setUntuk($untuk) {
        $this->untuk = $untuk;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setMerk($merk) {
        $this->merk = $merk;
    }
}
