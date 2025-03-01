#include "PetShop.cpp"

class Aksesoris : public PetShop {
protected:
    string jenis;
    string bahan;
    string warna;

public:
    // constructors
    Aksesoris() : PetShop(), jenis(""), bahan(""), warna("") {} // default constructor
    Aksesoris(int id, string nama_produk, double harga_produk, int stok_produk, string jenis, string bahan, string warna)
        : PetShop(id, nama_produk, harga_produk, stok_produk), jenis(jenis), bahan(bahan), warna(warna) {}

    // getters
    string getJenis() { return jenis; }
    string getBahan() { return bahan; }
    string getWarna() { return warna; }

    // setters
    void setJenis(string jenis) { this->jenis = jenis; }
    void setBahan(string bahan) { this->bahan = bahan; }
    void setWarna(string warna) { this->warna = warna; }
};