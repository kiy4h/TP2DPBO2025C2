#include <iomanip>
#include <iostream>
#include <vector>

#include "Baju.cpp"

using namespace std;

int intLen(int n) {
    int len = 0;
    while (n) {
        n /= 10;
        len++;
    }
    return len;
}

void printSep(int colWidth[]) {
    cout << "+";
    for (int i = 0; i < 10; i++) {
        for (int j = 0; j < colWidth[i] + 2; j++) {
            cout << "-";
        }
        cout << "+";
    }
    cout << endl;
}

bool isExist(vector<Baju> &baju, int id) {
    for (auto &d : baju) {
        if (d.getId() == id) {
            return true;
        }
    }
    return false;
}

void printTable(vector<Baju> &baju) {
    // calculate max length for each column
    int colWidth[10] = {2, 11, 5, 4, 5, 5, 5, 5, 4, 4};
    for (auto &d : baju) {
        colWidth[0] = max(colWidth[0], intLen(d.getId()));
        colWidth[1] = max(colWidth[1], (int)d.getNamaProduk().length());
        colWidth[2] = max(colWidth[2], intLen(d.getHargaProduk()));
        colWidth[3] = max(colWidth[3], intLen(d.getStokProduk()));
        colWidth[4] = max(colWidth[4], (int)d.getJenis().length());
        colWidth[5] = max(colWidth[5], (int)d.getBahan().length());
        colWidth[6] = max(colWidth[6], (int)d.getWarna().length());
        colWidth[7] = max(colWidth[7], (int)d.getUntuk().length());
        colWidth[8] = max(colWidth[8], (int)d.getSize().length());
        colWidth[9] = max(colWidth[9], (int)d.getMerk().length());
    }

    // table header
    printSep(colWidth);
    cout << "| " << left << setw(colWidth[0]) << "ID"
         << " | " << setw(colWidth[1]) << "Nama Produk"
         << " | " << setw(colWidth[2]) << "Harga"
         << " | " << setw(colWidth[3]) << "Stok"
         << " | " << setw(colWidth[4]) << "Jenis"
         << " | " << setw(colWidth[5]) << "Bahan"
         << " | " << setw(colWidth[6]) << "Warna"
         << " | " << setw(colWidth[7]) << "Untuk"
         << " | " << setw(colWidth[8]) << "Size"
         << " | " << setw(colWidth[9]) << "Merk" << " |" << endl;
    printSep(colWidth);

    // table rows
    for (auto &d : baju) {
        cout << "| " << setw(colWidth[0]) << d.getId()
             << " | " << setw(colWidth[1]) << d.getNamaProduk()
             << " | " << setw(colWidth[2]) << d.getHargaProduk()
             << " | " << setw(colWidth[3]) << d.getStokProduk()
             << " | " << setw(colWidth[4]) << d.getJenis()
             << " | " << setw(colWidth[5]) << d.getBahan()
             << " | " << setw(colWidth[6]) << d.getWarna()
             << " | " << setw(colWidth[7]) << d.getUntuk()
             << " | " << setw(colWidth[8]) << d.getSize()
             << " | " << setw(colWidth[9]) << d.getMerk() << " |" << endl;
    }
    printSep(colWidth);
}

int main() {
    vector<Baju> data = {
        Baju(1, "Baju Anjing", 150000, 10, "Pakaian", "Katun", "Merah", "Anjing", "M", "PetLovers"),
        Baju(2, "Baju Kucing", 120000, 15, "Pakaian", "Polyester", "Biru", "Kucing", "S", "CatWorld"),
        Baju(3, "Baju Burung", 80000, 20, "Pakaian", "Sutra", "Hijau", "Burung", "L", "Birdy"),
        Baju(4, "Baju Kelinci", 100000, 12, "Pakaian", "Wol", "Putih", "Kelinci", "M", "Bunny"),
        Baju(5, "Baju Hamster", 50000, 25, "Pakaian", "Katun", "Coklat", "Hamster", "S", "Hammy")};

    printTable(data);

    // input new data
    Baju newBaju;
    int id, stok;
    string nama, jenis, bahan, warna, untuk, size, merk;
    double harga;

    int n; // number of data to input
    cin >> n;
    for (int i = 0; i < n; i++) {
        cin >> id >> nama >> harga >> stok >> jenis >> bahan >> warna >> untuk >> size >> merk;

        // cek apakah id sudah ada
        if (isExist(data, id)) {
            cout << "gagal menambahkan: ID " << id << " sudah ada" << endl;
        } else {
            newBaju.setId(id);
            newBaju.setNamaProduk(nama);
            newBaju.setHargaProduk(harga);
            newBaju.setStokProduk(stok);
            newBaju.setJenis(jenis);
            newBaju.setBahan(bahan);
            newBaju.setWarna(warna);
            newBaju.setUntuk(untuk);
            newBaju.setSize(size);
            newBaju.setMerk(merk);
            data.push_back(newBaju);
        }
    }

    // print updated data
    printTable(data);

    return 0;
}