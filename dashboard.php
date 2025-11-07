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
            width: 75%;
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
        .grandtotal {
            margin-top: 25px;
            font-size: 20px;
            font-weight: 700;
            color: #2a68ff;
        }
    </style>
</head>
<body>

    <h1>-- POLGAN MART --</h1>

    <div class="welcome">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>!
    </div>

    <?php
    // === Data Barang ===
    $kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
    $nama_barang = ["Pensil", "Pulpen", "Buku Tulis", "Penghapus", "Penggaris"];
    $harga_barang = [2000, 3000, 5000, 1500, 2500];

    // === Commit 6 + 7: Penjualan Random + Hitung Total ===
    $beli = [];
    $jumlah = [];
    $total = [];
    $grandtotal = 0;

    // Random 3 transaksi pembelian
    for ($i = 0; $i < 3; $i++) {
        $index = rand(0, count($kode_barang) - 1);
        $beli[] = $index;
        $jumlah[] = rand(1, 5);
    }
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Satuan (Rp)</th>
            <th>Jumlah Beli</th>
            <th>Total Harga (Rp)</th>
        </tr>
        <?php
        $no = 1;
        foreach ($beli as $key => $index) {
            $subtotal = $harga_barang[$index] * $jumlah[$key];
            $total[] = $subtotal;
            $grandtotal += $subtotal;
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $kode_barang[$index]; ?></td>
                <td><?= $nama_barang[$index]; ?></td>
                <td><?= number_format($harga_barang[$index], 0, ',', '.'); ?></td>
                <td><?= $jumlah[$key]; ?></td>
                <td><?= number_format($subtotal, 0, ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </table>

    <div class="grandtotal">
        Grand Total: Rp <?= number_format($grandtotal, 0, ',', '.'); ?>
    </div>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>

</body>
</html>
