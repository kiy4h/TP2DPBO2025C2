
class PetShop {
    protected int id;
    protected String namaProduk;
    protected double hargaProduk;
    protected int stokProduk;

    // Constructors
    public PetShop() {
        this.id = 0;
        this.namaProduk = "";
        this.hargaProduk = 0.0;
        this.stokProduk = 0;
    }

    public PetShop(int id, String namaProduk, double hargaProduk, int stokProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.hargaProduk = hargaProduk;
        this.stokProduk = stokProduk;
    }

    // getters
    public int getId() {
        return id;
    }

    public String getNamaProduk() {
        return namaProduk;
    }

    public double getHargaProduk() {
        return hargaProduk;
    }

    public int getStokProduk() {
        return stokProduk;
    }

    // setters
    public void setId(int id) {
        this.id = id;
    }

    public void setNamaProduk(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    public void setHargaProduk(double hargaProduk) {
        this.hargaProduk = hargaProduk;
    }

    public void setStokProduk(int stokProduk) {
        this.stokProduk = stokProduk;
    }
}
