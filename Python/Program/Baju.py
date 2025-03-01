from Aksesoris import Aksesoris


class Baju(Aksesoris):
    def __init__(self, id=0, nama_produk="", harga_produk=0.0, stok_produk=0, jenis="", bahan="", warna="", untuk="", size="", merk=""):
        super().__init__(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna)
        self.untuk = untuk
        self.size = size
        self.merk = merk

    # getters
    def get_untuk(self):
        return self.untuk

    def get_size(self):
        return self.size

    def get_merk(self):
        return self.merk

    # setters
    def set_untuk(self, untuk):
        self.untuk = untuk

    def set_size(self, size):
        self.size = size

    def set_merk(self, merk):
        self.merk = merk
