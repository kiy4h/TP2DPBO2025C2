class Aksesoris extends PetShop {
    protected String jenis;
    protected String bahan;
    protected String warna;

    // constructors
    public Aksesoris() {
        super();
        this.jenis = "";
        this.bahan = "";
        this.warna = "";
    }

    public Aksesoris(int id, String namaProduk, double hargaProduk, int stokProduk, String jenis, String bahan,
            String warna) {
        super(id, namaProduk, hargaProduk, stokProduk);
        this.jenis = jenis;
        this.bahan = bahan;
        this.warna = warna;
    }

    // getters
    public String getJenis() {
        return jenis;
    }

    public String getBahan() {
        return bahan;
    }

    public String getWarna() {
        return warna;
    }

    // setters
    public void setJenis(String jenis) {
        this.jenis = jenis;
    }

    public void setBahan(String bahan) {
        this.bahan = bahan;
    }

    public void setWarna(String warna) {
        this.warna = warna;
    }
}
