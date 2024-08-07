<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background-color: #f0f3f6;
        font-size: 12px;
    }
    .container-fluid {
        display: flex;
    }
    .sidebar {
        width: 180px;
        height: 100vh;
        background: linear-gradient(45deg, #4e54c8, #8f94fb);
        padding: 10px;
        color: #fff;
        position: fixed;
    }
    .sidebar h3 {
        font-size: 16px;
        margin-bottom: 15px;
        text-align: center;
    }
    .sidebar ul {
        list-style: none;
    }
    .sidebar li {
        margin-bottom: 8px;
    }
    .sidebar a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 6px;
        border-radius: 3px;
        transition: background 0.3s ease;
        font-size: 11px;
    }
    .sidebar a:hover, .sidebar a.active {
        background-color: rgba(255, 255, 255, 0.2);
    }
    .sidebar i {
        margin-right: 6px;
        font-size: 12px;
    }
    .main-content {
        margin-left: 180px;
        flex: 1;
        padding: 15px;
        background-color: #f0f3f6;
        min-height: 100vh;
    }
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .dashboard-header h1 {
        font-size: 22px;
        color: #333;
    }
    .stat-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }
    .stat-card {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }
    .stat-card h4 {
        font-size: 13px;
        color: #888;
        margin-bottom: 8px;
    }
    .stat-card p {
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }
    .chart-container {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    .chart-header h2 {
        font-size: 16px;
        color: #333;
    }
    .chart-header select {
        font-size: 11px;
        padding: 4px;
    }
    .chart {
        height: 250px;
        /* Add your chart styling here */
    }
    .transaction-container {
    background: #fff;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.transaction-header {
    margin-bottom: 15px;
}

.transaction-header h2 {
    font-size: 16px;
    color: #333;
}

.transaction-table {
    width: 100%;
    border-collapse: collapse;
}

.transaction-table th,
.transaction-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.transaction-table th {
    background-color: #f5f5f5;
    font-weight: 600;
    color: #333;
}

.transaction-table tr:last-child td {
    border-bottom: none;
}

.transaction-table tr:hover {
    background-color: #f9f9f9;
}
</style>
</head>
<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h3>NGUTANGYUK</h3>
            <ul>
                <li><a href="<?= site_url('admin/dashboard') ?>" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="<?= site_url('admin/anggota') ?>"><i class="fas fa-users"></i> Anggota</a></li>
                <li><a href="<?= site_url('admin/pinjaman') ?>"><i class="fas fa-money-bill-wave"></i> Pinjaman</a></li>
                <li><a href="<?= site_url('admin/pembayaran') ?>"><i class="fas fa-credit-card"></i> Pembayaran</a></li>
                <li><a href="<?= site_url('admin/simpanan') ?>"><i class="fas fa-piggy-bank"></i> Simpanan</a></li>
            </ul>
        </nav>

        <!-- Main content -->
        <main class="main-content">
            <div class="dashboard-header">
                <h1>Dashboard</h1>
                <div class="user-info">
                    <!-- Add user info or profile picture here -->
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="stat-cards">
                <div class="stat-card">
                    <h4>Total Anggota</h4>
                    <p><?php echo isset($total_anggota) ? number_format($total_anggota) : 'N/A'; ?></p>
                </div>
                <div class="stat-card">
                    <h4>Total Pinjaman</h4>
                    <p>Rp. <?php echo isset($total_pinjaman) ? number_format($total_pinjaman, 0, ',', '.') : 'N/A'; ?></p>
                </div>
                <div class="stat-card">
                    <h4>Total Pembayaran</h4>
                    <p>Rp. <?php echo isset($total_pembayaran) ? number_format($total_pembayaran, 0, ',', '.') : 'N/A'; ?></p>
                </div>
                <div class="stat-card">
                    <h4>Total Simpanan</h4>
                    <p>Rp. <?php echo isset($total_simpanan) ? number_format($total_simpanan, 0, ',', '.') : 'N/A'; ?></p>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="transaction-container">
    <div class="transaction-header">
        <h2>Transaksi Terbaru</h2>
    </div>
    <table class="transaction-table">
    <thead>
        <tr>
            <th>Nama Anggota</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($recent_transactions)): ?>
            <?php foreach ($recent_transactions as $transaction): ?>
            <tr>
                <td><?php echo htmlspecialchars($transaction->Nama); ?></td>
                <td><?php echo htmlspecialchars($transaction->Jenis); ?></td>
                <td>Rp <?php echo number_format($transaction->Jumlah, 0, ',', '.'); ?></td>
                <td><?php echo date('d M Y', strtotime($transaction->Tanggal)); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Tidak ada transaksi terbaru.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>