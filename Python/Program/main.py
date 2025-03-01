from Baju import Baju


def int_len(n):
    """calculate the length of an integer."""
    return len(str(n))


def print_sep(col_lens):
    """print the separator line for the table."""
    print("+", end="")
    for length in col_lens:
        print("-" * (length + 2) + "+", end="")
    print()


def print_table(data):
    """print the table with dynamic column widths."""
    col_lens = [2, 11, 5, 4, 5, 5, 5, 5, 4, 4]  # initial minimum widths
    # calculate max length for each column
    for baju in data:
        col_lens[0] = max(col_lens[0], int_len(baju.get_id()))
        col_lens[1] = max(col_lens[1], len(baju.get_nama_produk()))
        col_lens[2] = max(col_lens[2], int_len(int(baju.get_harga_produk())))
        col_lens[3] = max(col_lens[3], int_len(baju.get_stok_produk()))
        col_lens[4] = max(col_lens[4], len(baju.get_jenis()))
        col_lens[5] = max(col_lens[5], len(baju.get_bahan()))
        col_lens[6] = max(col_lens[6], len(baju.get_warna()))
        col_lens[7] = max(col_lens[7], len(baju.get_untuk()))
        col_lens[8] = max(col_lens[8], len(baju.get_size()))
        col_lens[9] = max(col_lens[9], len(baju.get_merk()))

    # Print table header
    print_sep(col_lens)
    print(f"| {'ID':<{col_lens[0]}} | {'Nama Produk':<{col_lens[1]}} | {'Harga':<{col_lens[2]}} | {'Stok':<{col_lens[3]}} | {'Jenis':<{col_lens[4]}} | {'Bahan':<{col_lens[5]}} | {'Warna':<{col_lens[6]}} | {'Untuk':<{col_lens[7]}} | {'Size':<{col_lens[8]}} | {'Merk':<{col_lens[9]}} |")
    print_sep(col_lens)

    # Print table rows
    for baju in data:
        print(f"| {baju.get_id():<{col_lens[0]}} | {baju.get_nama_produk():<{col_lens[1]}} | {baju.get_harga_produk():<{col_lens[2]}} | {baju.get_stok_produk(): <{col_lens[3]}} | {baju.get_jenis(): <{col_lens[4]}} | {baju.get_bahan(): <{col_lens[5]}} | {baju.get_warna(): <{col_lens[6]}} | {baju.get_untuk(): <{col_lens[7]}} | {baju.get_size(): <{col_lens[8]}} | {baju.get_merk(): <{col_lens[9]}} |")
    print_sep(col_lens)


def is_exist(data, id):
    """check if an id already exists in the data."""
    for baju in data:
        if baju.get_id() == id:
            return 1
    return 0

# data
data = [
    Baju(1, "Baju Anjing", 150000, 10, "Pakaian",
         "Katun", "Merah", "Anjing", "M", "PetLovers"),
    Baju(2, "Baju Kucing", 120000, 15, "Pakaian",
         "Polyester", "Biru", "Kucing", "S", "CatWorld"),
    Baju(3, "Baju Burung", 80000, 20, "Pakaian",
         "Sutra", "Hijau", "Burung", "L", "Birdy"),
    Baju(4, "Baju Kelinci", 100000, 12, "Pakaian",
         "Wol", "Putih", "Kelinci", "M", "Bunny"),
    Baju(5, "Baju Hamster", 50000, 25, "Pakaian",
         "Katun", "Coklat", "Hamster", "S", "Hammy")
]

# print data awal
print("Data Awal:")
print_table(data)

# input data baru
n = int(input())
for i in range(n):
    inp = input().split()
    id = int(inp[0])
    if is_exist(data, id):
        print(f"Gagal menambahkan: ID {id} sudah ada.")
        continue  # skip aja

    # unpack input
    nama_produk, harga_produk, stok_produk, jenis, bahan, warna, untuk, size, merk = inp[1:]
    harga_produk = int(harga_produk)
    stok_produk = int(stok_produk)

    # create new Baju object
    new_baju = Baju(id, nama_produk, harga_produk, stok_produk,
                    jenis, bahan, warna, untuk, size, merk)
    data.append(new_baju)
    print("Data berhasil ditambahkan.")

# print updated data
print("\nData setelah penambahan:")
print_table(data)
