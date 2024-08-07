<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi Pembayaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e0e0e0 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        color: #333;
    }

    .container {
        width: 95%;
        max-width: 1200px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 40px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
        color: #4a4a4a;
        font-size: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
    }

    h1::after {
        content: '';
        display: block;
        width: 100px;
        height: 4px;
        background: linear-gradient(to right, #D73902, #FF6B35);
        margin: 10px auto 0;
        border-radius: 2px;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    th, td {
        padding: 20px;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background: linear-gradient(45deg, #D73902, #FF6B35);
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
        border-top: 3px solid #4a4a4a;
    }

    tbody tr {
        background-color: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    tbody tr:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(215, 57, 2, 0.1);
    }

    td {
        font-size: 1rem;
        color: #4a4a4a;
        border-bottom: 1px solid #e0e0e0;
    }

    td:first-child, th:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    td:last-child, th:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .no-data {
        text-align: center;
        padding: 40px;
        font-size: 1.2rem;
        color: #666;
        font-style: italic;
    }

    .icon {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        table, thead, tbody, th, td, tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            margin-bottom: 15px;
        }

        td {
            border: none;
            position: relative;
            padding-left: 50%;
            text-align: right;
        }

        td:before {
            position: absolute;
            top: 12px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: bold;
            text-align: left;
        }

        td:nth-of-type(1):before { content: "ID Pembayaran"; }
        td:nth-of-type(2):before { content: "ID Pinjaman"; }
        td:nth-of-type(3):before { content: "Jumlah"; }
        td:nth-of-type(4):before { content: "Tanggal Pembayaran"; }
        td:nth-of-type(5):before { content: "Bulan Angsuran"; }
    }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-history icon"></i>Riwayat Transaksi Pembayaran</h1>
        <?php if (!empty($pembayaran)): ?>
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-receipt icon"></i>ID Pembayaran</th>
                        <th><i class="fas fa-file-invoice-dollar icon"></i>ID Pinjaman</th>
                        <th><i class="fas fa-money-bill-wave icon"></i>Jumlah</th>
                        <th><i class="fas fa-calendar-alt icon"></i>Tanggal Pembayaran</th>
                        <th><i class="fas fa-calendar-check icon"></i>Bulan Angsuran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pembayaran as $p): ?>
                        <tr>
                            <td><?= $p->Pembayaran_ID; ?></td>
                            <td><?= $p->Pinjaman_ID; ?></td>
                            <td>Rp <?= number_format($p->Jumlah, 0, ',', '.'); ?></td>
                            <td><?= date('d-m-Y', strtotime($p->Tanggal_Pembayaran)); ?></td>
                            <td><?= $p->Bulan_Angsuran; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data"><i class="fas fa-exclamation-circle icon"></i>Belum ada riwayat pembayaran.</p>
        <?php endif; ?>
    </div>
</body>
</html>