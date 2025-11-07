<?php
session_start();

// Redirect ke login jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard POLGAN MART</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            text-align: center;
            margin: 50px;
            user-select: none;
        }
        h1 {
            color: #2a68ff;
            margin-bottom: 25px;
            font-weight: 700;
        }
        .welcome {
            font-size: 18px;
            margin-bottom: 40px;
            font-weight: 600;
        }
        form button {
            background-color: #dc3545;
            border: none;
            padding: 12px 28px;
            font-size: 16px;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 2px 8px rgba(220,53,69,0.4);
            user-select: none;
        }
        form button:hover {
            background-color: #b42b2f;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 30px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #2a68ff;
            color: white;
        }
        td {
            color: #333;
        }
    </style>
</head>
<body>

    <h1>-- POLGAN MART --</h1>

    <div class="welcome">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>!
    </div>

    <?php
    // === Array Barang ===
    $kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
    $nama_barang = ["Pensil", "Pulpen", "Buku Tulis", "Penghapus", "Penggaris"];
    $harga_barang = [2000, 3000, 5000, 1500, 2500];

    // === Commit 6: Logika Penjualan Random ===
    $beli = [];       // Menyimpan barang yang dibeli
    $jumlah = [];     // Menyimpan jumlah tiap barang
    $total = [];      // (Akan digunakan di commit 7)
    $grandtotal = 0;  // (Akan digunakan di commit 7)

    // Random 3 transaksi pembelian
    for ($i = 0; $i < 3; $i++) {
        $index = rand(0, count($kode_barang) - 1); // pilih barang acak
        $beli[] = $nama_barang[$index];
        $jumlah[] = rand(1, 5); // jumlah pembelian antara 1–5
    }
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah Beli</th>
        </tr>
        <?php for ($i = 0; $i < count($beli); $i++): ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $beli[$i]; ?></td>
                <td><?= $jumlah[$i]; ?></td>
            </tr>
        <?php endfor; ?>
    </table>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>

</body>
</html>
