<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$kode_barang  = ["BRG01", "BRG02", "BRG03", "BRG04", "BRG05"];
$nama_barang  = ["Pensil", "Buku Tulis", "Penghapus", "Penggaris", "Bolpoin"];
$harga_barang = [3000, 5000, 2000, 4000, 3500];

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

for ($i = 0; $i < 5; $i++) {
    $beli[$i] = rand(0, 4);
    $jumlah[$i] = rand(1, 5);
}

foreach ($beli as $i => $index) {
    $total[$i] = $harga_barang[$index] * $jumlah[$i];
    $grandtotal += $total[$i];
}

if ($grandtotal < 50000) {
    $diskon = 0.05;
} elseif ($grandtotal <= 100000) {
    $diskon = 0.10;
} else {
    $diskon = 0.15;
}

$diskon_rp = $grandtotal * $diskon;
$akhir = $grandtotal - $diskon_rp;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penjualan</title>

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f3f4f6;
    }

    .navbar {
        background: #2563eb;
        padding: 15px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar a {
        color: white;
        background: #dc2626;
        padding: 8px 15px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
    }

    .navbar a:hover {
        background: #b91c1c;
    }

    .container {
        margin: 30px auto;
        width: 90%;
        max-width: 900px;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table thead {
        background: #2563eb;
        color: white;
    }

    table th, table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }

    h2, h3 {
        margin-top: 10px;
        color: #333;
    }

    .summary {
        margin-top: 20px;
        padding: 20px;
        background: #f1f5f9;
        border-radius: 8px;
    }

    .summary h3, .summary h2 {
        margin: 5px 0;
    }
</style>

</head>
<body>

<div class="navbar">
    <div>-- POLGAN MART --</div>
    <div>
        Login sebagai: <b><?php echo $_SESSION['username']; ?></b>
        &nbsp; | &nbsp;
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <h2>Daftar Pembelian</h2>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
        <?php
        foreach ($beli as $i => $index) {
            echo "<tr>";
            echo "<td>{$kode_barang[$index]}</td>";
            echo "<td>{$nama_barang[$index]}</td>";
            echo "<td>Rp " . number_format($harga_barang[$index]) . "</td>";
            echo "<td>{$jumlah[$i]}</td>";
            echo "<td>Rp " . number_format($total[$i]) . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <div class="summary">
        <h3>Total Belanja : Rp <?php echo number_format($grandtotal); ?></h3>
        <h3>Diskon (<?php echo $diskon*100; ?>%) : Rp <?php echo number_format($diskon_rp); ?></h3>
        <h2>Total Akhir : Rp <?php echo number_format($akhir); ?></h2>
    </div>
</div>

</body>
</html>
