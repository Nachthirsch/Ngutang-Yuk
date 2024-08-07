
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pinjaman Ekslusif</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        }

        .container {
            width: 95%;
            max-width: 1200px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #2c3e50;
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
            background: linear-gradient(135deg, #D73902, #FF6B35);
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            border-top: 3px solid #2c3e50;
        }

        tbody tr {
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        td {
            font-size: 1rem;
            color: #34495e;
            border-bottom: 1px solid #ecf0f1;
        }

        td:first-child, th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        td:last-child, th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .status {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-block;
        }

        .status-lunas {
            background-color: #D73902;
            color: #fff;
        }

        .status-belum {
            background-color: #FF6B35;
            color: #fff;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            font-size: 1.2rem;
            color: #7f8c8d;
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

            td:nth-of-type(1):before { content: "ID Pinjaman"; }
            td:nth-of-type(2):before { content: "Jumlah"; }
            td:nth-of-type(3):before { content: "Durasi"; }
            td:nth-of-type(4):before { content: "Bunga (%)"; }
            td:nth-of-type(5):before { content: "Status"; }
        }


        .popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        align-items: center;
        justify-content: center;
    }

    .popup-content {
        background: linear-gradient(135deg, #f8f9fa 0%, #e0e0e0 100%);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        padding: 30px;
        width: 90%;
        max-width: 500px;
        position: relative;
        animation: popupIn 0.5s ease-out;
    }

    @keyframes popupIn {
        from {transform: scale(0.8); opacity: 0;}
        to {transform: scale(1); opacity: 1;}
    }

    .close {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 28px;
        font-weight: bold;
        color: #333;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover {
        color: #f44336;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 24px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #34495e;
        font-weight: bold;
    }

    select, input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 2px solid #bdc3c7;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    select:focus, input[type="text"]:focus {
        border-color: #D73902;
        outline: none;
    }

    .pay-button {
        background-color: #D73902; /* Warna hijau */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .pay-button:hover {
        background-color: #FF6B35; /* Warna hijau yang lebih gelap saat hover */
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

    .pay-button:active {
        background-color: #FF6B35;/* Warna saat tombol ditekan */
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        transform: translateY(1px);
    }

    .btn-pay {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #D73902;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-pay:hover {
        background-color: #FF6B35;
    }

    </style>
</head>
<body>
<div class="container">
        <h1><i class="fas fa-chart-line icon"></i>Data Pinjaman Ekslusif</h1>
        <?php if (!empty($pinjaman)): ?>
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-money-bill-wave icon"></i>Jumlah</th>
                        <th><i class="fas fa-calendar-alt icon"></i>Durasi</th>
                        <th><i class="fas fa-money-check icon"></i>Angsuran Bulanan</th>
                        <th><i class="fas fa-info-circle icon"></i>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pinjaman as $p): ?>
                        <tr>
                            <td>Rp <?= number_format($p->Jumlah, 0, ',', '.'); ?></td>
                            <td><?= $p->Durasi; ?> bulan</td>
                            <td>Rp <?= number_format($p->Angsuran_Bulanan, 0, ',', '.'); ?></td>
                            <td>
                                <span class="status <?= ($p->Status == 'Lunas') ? 'status-lunas' : 'status-belum'; ?>">
                                    <?= $p->Status; ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($p->Status != 'Lunas'): ?>
                                    <button class="pay-button" onclick="openPaymentPopup(<?= $p->Pinjaman_ID; ?>, <?= $p->Angsuran_Bulanan; ?>, <?= $p->Durasi; ?>, <?= $p->Bunga_Bulanan; ?>)">
                                        <i class="fas fa-money-bill-wave"></i> Bayar
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data"><i class="fas fa-exclamation-circle icon"></i>Kamu belum ngutan di kami!.</p>
        <?php endif; ?>
    </div>

    <div id="paymentPopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePaymentPopup()">&times;</span>
            <h2>Form Pembayaran Eksklusif</h2>
            <div class="form-container">
                <form id="paymentForm" action="<?= site_url ('Pembayaran_pinjaman/proses_pembayaran'); ?>" method="POST">
                    <input type="hidden" id="pinjaman_id" name="pinjaman_id">
                    <div class="form-group">
                        <label for="duration">Pilih Durasi:</label>
                        <select id="duration" name="duration" required onchange="updateAmount()">
                            <!-- Opsi durasi akan diisi dinamis -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Jumlah Pembayaran:</label>
                        <input type="hidden" id="amount" name="amount">
                        <input type="text" id="amount_display" readonly>
                    </div>
                    <button type="submit" class="btn-pay">Bayar Sekarang</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openPaymentPopup(pinjamanId, angsuranBulanan, durasi, bungaBulanan) {
            document.getElementById('paymentPopup').style.display = 'flex';
            document.getElementById('pinjaman_id').value = pinjamanId;
            const durationSelect = document.getElementById('duration');
            durationSelect.innerHTML = '';
            for (let i = 1; i <= durasi; i++) {
                durationSelect.innerHTML += `<option value="${i}">${i} bulan</option>`;
            }
            durationSelect.dataset.angsuranBulanan = angsuranBulanan;
            durationSelect.dataset.bungaBulanan = bungaBulanan;
            updateAmount();
        }

        function closePaymentPopup() {
            document.getElementById('paymentPopup').style.display = 'none';
        }

        function updateAmount() {
            const duration = parseInt(document.getElementById('duration').value);
            const angsuranBulanan = parseFloat(document.getElementById('duration').dataset.angsuranBulanan);
            let jumlah = angsuranBulanan * duration;

            document.getElementById('amount').value = jumlah.toFixed(2);  // Set as plain number
            document.getElementById('amount_display').value = 'Rp ' + jumlah.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); // Display formatted value
        }


        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('<?= site_url('Pembayaran_pinjaman/proses_pembayaran'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log('Response Status:', response.status);
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Pembayaran berhasil! Terima kasih atas transaksi Anda.');
                    closePaymentPopup();
                } else {
                    alert('Pembayaran gagal! Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan! Silakan coba lagi.');
            });
        });
    </script>
</body>
</html>