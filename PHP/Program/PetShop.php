<?php

class PetShop {
    protected $id;
    protected $nama_produk;
    protected $harga_produk;
    protected $stok_produk;
    protected $foto_produk;

    // default constructor
    public function __construct($id = 0, $nama_produk = "", $harga_produk = 0.0, $stok_produk = 0, $foto_produk = "") {
        $this->id           = $id;
        $this->nama_produk  = $nama_produk;
        $this->harga_produk = $harga_produk;
        $this->stok_produk  = $stok_produk;
        $this->foto_produk  = $foto_produk;
    }

    // getters
    public function getId() {
        return $this->id;
    }

    public function getNamaProduk() {
        return $this->nama_produk;
    }

    public function getHargaProduk() {
        return $this->harga_produk;
    }

    public function getStokProduk() {
        return $this->stok_produk;
    }

    public function getFotoProduk() {
        return $this->foto_produk;
    }

    // setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNamaProduk($nama_produk) {
        $this->nama_produk = $nama_produk;
    }

    public function setHargaProduk($harga_produk) {
        $this->harga_produk = $harga_produk;
    }

    public function setStokProduk($stok_produk) {
        $this->stok_produk = $stok_produk;
    }

    public function setFotoProduk($foto_produk) {
        $this->foto_produk = $foto_produk;
    }
}
