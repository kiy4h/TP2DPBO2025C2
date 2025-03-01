
class Baju extends Aksesoris {
    private String untuk;
    private String size;
    private String merk;

    // constructors
    public Baju() {
        super();
        this.untuk = "";
        this.size = "";
        this.merk = "";
    }

    public Baju(int id, String namaProduk, double hargaProduk, int stokProduk, String jenis, String bahan, String warna,
            String untuk, String size, String merk) {
        super(id, namaProduk, hargaProduk, stokProduk, jenis, bahan, warna);
        this.untuk = untuk;
        this.size = size;
        this.merk = merk;
    }

    // getters
    public String getUntuk() {
        return untuk;
    }

    public String getSize() {
        return size;
    }

    public String getMerk() {
        return merk;
    }

    // setters
    public void setUntuk(String untuk) {
        this.untuk = untuk;
    }

    public void setSize(String size) {
        this.size = size;
    }

    public void setMerk(String merk) {
        this.merk = merk;
    }
}