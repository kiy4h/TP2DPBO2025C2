import java.util.ArrayList;
import java.util.Scanner;

public class Main {

    // calculate the length of an integer
    public static int intLen(int n) {
        int len = 0;
        while (n != 0) {
            n /= 10;
            len++;
        }
        return len;
    }

    // print the separator line
    public static void printSep(int[] maxLens) {
        System.out.print("+");
        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < maxLens[i] + 2; j++) {
                System.out.print("-");
            }
            System.out.print("+");
        }
        System.out.println();
    }

    // function to print the table
    public static void printTable(ArrayList<Baju> baju) {
        // calculate max length for each column
        int[] maxLens = { 2, 11, 5, 4, 5, 5, 5, 5, 4, 4 };
        for (Baju d : baju) {
            maxLens[0] = Math.max(maxLens[0], intLen(d.getId()));
            maxLens[1] = Math.max(maxLens[1], d.getNamaProduk().length());
            maxLens[2] = Math.max(maxLens[2], intLen((int) d.getHargaProduk()));
            maxLens[3] = Math.max(maxLens[3], intLen(d.getStokProduk()));
            maxLens[4] = Math.max(maxLens[4], d.getJenis().length());
            maxLens[5] = Math.max(maxLens[5], d.getBahan().length());
            maxLens[6] = Math.max(maxLens[6], d.getWarna().length());
            maxLens[7] = Math.max(maxLens[7], d.getUntuk().length());
            maxLens[8] = Math.max(maxLens[8], d.getSize().length());
            maxLens[9] = Math.max(maxLens[9], d.getMerk().length());
        }

        // table header
        printSep(maxLens);
        System.out.printf(
                "| %-" + maxLens[0] + "s | %-" + maxLens[1] + "s | %-" + maxLens[2] + "s | %-" + maxLens[3] + "s | %-"
                        + maxLens[4] + "s | %-" + maxLens[5] + "s | %-" + maxLens[6] + "s | %-" + maxLens[7] + "s | %-"
                        + maxLens[8] + "s | %-" + maxLens[9] + "s |\n",
                "ID", "Nama Produk", "Harga", "Stok", "Jenis", "Bahan", "Warna", "Untuk", "Size", "Merk");
        printSep(maxLens);

        // table rows
        for (Baju b : baju) {
            System.out.printf(
                    "| %-" + maxLens[0] + "d | %-" + maxLens[1] + "s | %-" + maxLens[2] + "d | %-" + maxLens[3]
                            + "d | %-" + maxLens[4] + "s | %-" + maxLens[5] + "s | %-" + maxLens[6] + "s | %-"
                            + maxLens[7] + "s | %-" + maxLens[8] + "s | %-" + maxLens[9] + "s |\n",
                    b.getId(), b.getNamaProduk(), (int) b.getHargaProduk(), b.getStokProduk(),
                    b.getJenis(), b.getBahan(), b.getWarna(), b.getUntuk(), b.getSize(), b.getMerk());
        }
        printSep(maxLens);
    }

    // function to check if id already exists
    public static boolean isExist(ArrayList<Baju> baju, int id) {
        for (Baju d : baju) {
            if (d.getId() == id) {
                return true;
            }
        }
        return false;
    }

    public static void main(String[] args) {
        ArrayList<Baju> data = new ArrayList<>();
        data.add(new Baju(1, "Baju Anjing", 150000, 10, "Pakaian", "Katun", "Merah", "Anjing", "M", "PetLovers"));
        data.add(new Baju(2, "Baju Kucing", 120000, 15, "Pakaian", "Polyester", "Biru", "Kucing", "S", "CatWorld"));
        data.add(new Baju(3, "Baju Burung", 80000, 20, "Pakaian", "Sutra", "Hijau", "Burung", "L", "Birdy"));
        data.add(new Baju(4, "Baju Kelinci", 100000, 12, "Pakaian", "Wol", "Putih", "Kelinci", "M", "Bunny"));
        data.add(new Baju(5, "Baju Hamster", 50000, 25, "Pakaian", "Katun", "Coklat", "Hamster", "S", "Hammy"));

        // print data awal
        printTable(data);

        // input data baru
        Scanner sc = new Scanner(System.in);
        int n = sc.nextInt();
        for (int i = 0; i < n; i++) {
            int id = sc.nextInt();
            String nama = sc.next();
            double harga = sc.nextDouble();
            int stok = sc.nextInt();
            String jenis = sc.next();
            String bahan = sc.next();
            String warna = sc.next();
            String untuk = sc.next();
            String size = sc.next();
            String merk = sc.next();

            // check if id already exists
            if (isExist(data, id)) {
                System.out.println("Gagal menambahkan: ID " + id + " sudah ada.");
            } else {
                data.add(new Baju(id, nama, harga, stok, jenis, bahan, warna, untuk, size, merk));
                System.out.println("Data berhasil ditambahkan.");
            }
        }

        // print updated data
        System.out.println("\nData setelah penambahan:");
        printTable(data);

        sc.close();
    }
}