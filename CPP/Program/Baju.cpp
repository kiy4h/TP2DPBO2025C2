#include "Aksesoris.cpp"

class Baju : public Aksesoris {
private:
    string untuk;
    string size;
    string merk;

public:
    // constructors
    Baju() : Aksesoris(), untuk(""), size(""), merk("") {} // default constructor
    Baju(int id, string nama_produk, double harga_produk, int stok_produk, string jenis, string bahan, string warna, string untuk, string size, string merk)
        : Aksesoris(id, nama_produk, harga_produk, stok_produk, jenis, bahan, warna), untuk(untuk), size(size), merk(merk) {}

    // getters
    string getUntuk() { return untuk; }
    string getSize() { return size; }
    string getMerk() { return merk; }

    // setters
    void setUntuk(string untuk) { this->untuk = untuk; }
    void setSize(string size) { this->size = size; }
    void setMerk(string merk) { this->merk = merk; }
};