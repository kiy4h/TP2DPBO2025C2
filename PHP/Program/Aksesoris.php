<?php

require_once ('PetShop.php');

class Aksesoris extends PetShop {
    protected $jenis;
    protected $bahan;
    protected $warna;

    // default constructor
    public function __construct($id = 0, $nama_produk = "", $harga_produk = 0.0, $stok_produk = 0, $jenis = "", $bahan = "", $warna = "", $foto_produk = "") {
        parent::__construct($id, $nama_produk, $harga_produk, $stok_produk, $foto_produk);
        $this->jenis = $jenis;
        $this->bahan = $bahan;
        $this->warna = $warna;
    }

    // getters
    public function getJenis() {
        return $this->jenis;
    }

    public function getBahan() {
        return $this->bahan;
    }

    public function getWarna() {
        return $this->warna;
    }

    // setters
    public function setJenis($jenis) {
        $this->jenis = $jenis;
    }

    public function setBahan($bahan) {
        $this->bahan = $bahan;
    }

    public function setWarna($warna) {
        $this->warna = $warna;
    }
}
