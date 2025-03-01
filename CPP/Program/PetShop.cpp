#include <string>

using namespace std;

class PetShop {
protected:
    int id;
    string nama_produk;
    double harga_produk;
    int stok_produk;

public:
    // constructors
    PetShop() : id(0), nama_produk(""), harga_produk(0.0), stok_produk(0) {} // default constructor
    PetShop(int id, string nama_produk, double harga_produk, int stok_produk)
        : id(id), nama_produk(nama_produk), harga_produk(harga_produk), stok_produk(stok_produk) {}

    // getters
    int getId() { return id; }
    string getNamaProduk() { return nama_produk; }
    double getHargaProduk() { return harga_produk; }
    int getStokProduk() { return stok_produk; }

    // setters
    void setId(int id) { this->id = id; }
    void setNamaProduk(string nama_produk) { this->nama_produk = nama_produk; }
    void setHargaProduk(double harga_produk) { this->harga_produk = harga_produk; }
    void setStokProduk(int stok_produk) { this->stok_produk = stok_produk; }
};