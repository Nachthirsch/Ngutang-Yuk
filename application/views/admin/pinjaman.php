<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pinjaman</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
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
        margin-bottom: 15px;
    }
    .dashboard-header h1 {
        font-size: 18px;
        color: #333;
    }
    .table-container {
        background: #fff;
        border-radius: 6px;
        padding: 10px;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
        font-size: 11px;
    }
    .table th, .table td {
        padding: 6px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        white-space: nowrap;
    }
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #333;
    }
    .btn-action {
        padding: 3px 6px;
        border-radius: 2px;
        font-size: 10px;
        margin-right: 2px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    .btn-primary {
        background-color: #4e54c8;
        color: #fff;
        border: none;
    }
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 5px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    #editAnggotaModal .modal-content {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  }

  #editAnggotaModal .modal-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    padding: 20px;
  }

  #editAnggotaModal .modal-title {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: bold;
  }

  #editAnggotaModal .close {
    color: white;
    opacity: 1;
  }

  #editAnggotaModal .modal-body {
    padding: 30px;
  }

  #editAnggotaModal .form-group label {
    font-weight: 600;
    color: #4a4a4a;
  }

  #editAnggotaModal .form-control {
    border: 2px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    transition: all 0.3s ease;
  }

  #editAnggotaModal .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
  }

  #editAnggotaModal .modal-footer {
    border-top: none;
    padding: 20px 30px;
  }

  #editAnggotaModal .btn {
    border-radius: 25px;
    padding: 10px 25px;
    font-weight: 600;
    text-transform: uppercase;
    transition: all 0.3s ease;
  }

  #editAnggotaModal .btn-secondary {
    background-color: #6c757d;
    border: none;
  }

  #editAnggotaModal .btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
  }

  #editAnggotaModal .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }
  .modal-content {
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.modal-header {
  background-color: #6c5ce7;
  color: white;
  padding: 20px;
  position: relative;
  border-bottom: none;
}

.modal-title {
  font-size: 24px;
  font-weight: bold;
}

.close {
  position: absolute;
  top: 20px;
  right: 20px;
  color: white;
  opacity: 1;
  font-size: 28px;
  font-weight: 300;
  transition: opacity 0.2s ease;
}

.close:hover {
  opacity: 0.7;
}

.modal-body {
  padding: 30px;
  background-color: #f0f3f9;
}

.form-group label {
  font-weight: 600;
  color: #4a4a4a;
  margin-bottom: 8px;
}

.form-control {
  border-radius: 8px;
  border: 1px solid #d1d1d1;
  padding: 12px;
  transition: border-color 0.2s ease;
}

.form-control:focus {
  border-color: #6c5ce7;
  box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.2);
}

.modal-footer {
  background-color: #f0f3f9;
  border-top: none;
  padding: 20px 30px;
  justify-content: space-between;
}

.btn {
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: 600;
  transition: all 0.2s ease;
}

.btn-secondary {
  background-color: #95a5a6;
  border: none;
}

.btn-primary {
  background-color: #6c5ce7;
  border: none;
}

.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

.search-container {
        margin-bottom: 20px;
        display: flex;
    }
    #searchInput {
        flex-grow: 1;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-right: none;
    }
    #searchButton {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
        cursor: pointer;
    }
    #searchButton:hover {
        background-color: #0056b3;
    }
    
</style>
</head>
<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h3>NGUTANGYUK</h3>
            <ul>
                <li><a href="<?= site_url('admin/dashboard') ?>"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="<?= site_url('admin/anggota') ?>"><i class="fas fa-users"></i> Anggota</a></li>
                <li><a href="<?= site_url('admin/pinjaman') ?>" class="active"><i class="fas fa-money-bill-wave"></i> Pinjaman</a></li>
                <li><a href="<?= site_url('admin/pembayaran')?>"><i class="fas fa-credit-card"></i> Pembayaran</a></li>
                <li><a href="<?= site_url('admin/simpanan') ?>"><i class="fas fa-piggy-bank"></i> Simpanan</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <div class="dashboard-header">
                <h1>Daftar Pinjaman</h1>
            </div>

            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Cari data pinjaman...">
                <button id="searchButton"><i class="fas fa-search"></i></button>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pinjaman ID</th>
                            <th>Anggota ID</th>
                            <th>Jumlah</th>
                            <th>Durasi</th>
                            <th>Tanggal Pinjaman</th>
                            <th>Bunga</th>
                            <th>Total Bunga</th>
                            <th>Total Jumlah</th>
                            <th>Angsuran Bulanan</th>
                            <th>Status</th>
                            <th>Bunga Bulanan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pinjaman)): ?>
                            <?php foreach($pinjaman as $p): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($p->Pinjaman_ID); ?></td>
                                    <td><?php echo htmlspecialchars($p->Anggota_ID); ?></td>
                                    <td><?php echo htmlspecialchars($p->Jumlah); ?></td>
                                    <td><?php echo htmlspecialchars($p->Durasi); ?></td>
                                    <td><?php echo htmlspecialchars($p->Tanggal_Pinjaman); ?></td>
                                    <td><?php echo htmlspecialchars($p->Bunga); ?></td>
                                    <td><?php echo htmlspecialchars($p->Total_Bunga); ?></td>
                                    <td><?php echo htmlspecialchars($p->Total_Jumlah); ?></td>
                                    <td><?php echo htmlspecialchars($p->Angsuran_Bulanan); ?></td>
                                    <td><?php echo htmlspecialchars($p->Status); ?></td>
                                    <td><?php echo htmlspecialchars($p->Bunga_Bulanan); ?></td>
                                    <td>
                                        <button class="btn-action btn-primary edit-pinjaman" data-id="<?php echo $p->Pinjaman_ID; ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn-action btn-danger delete-pinjaman" data-id="<?php echo $p->Pinjaman_ID; ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="12">Tidak ada data pinjaman.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editPinjamanModal" tabindex="-1" role="dialog" aria-labelledby="editPinjamanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPinjamanModalLabel">Edit Pinjaman</h5>
                </div>
                <div class="modal-body">
                    <form id="editPinjamanForm">
                        <input type="hidden" id="pinjamanId" name="pinjamanId">
                        <div class="form-group">
                            <label for="anggotaId">Anggota ID</label>
                            <input type="text" class="form-control" id="anggotaId" name="Anggota_ID" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="Jumlah">
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi</label>
                            <input type="number" class="form-control" id="durasi" name="Durasi">
                        </div>
                        <div class="form-group">
                            <label for="tanggalPinjaman">Tanggal Pinjaman</label>
                            <input type="date" class="form-control" id="tanggalPinjaman" name="Tanggal_Pinjaman">
                        </div>
                        <div class="form-group">
                            <label for="bunga">Bunga</label>
                            <input type="number" step="0.01" class="form-control" id="bunga" name="Bunga">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="Status">
                                <option value="Aktif">Aktif</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="btn btn-primary" id="savePinjaman">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.edit-pinjaman').on('click', function() {
            var pinjamanId = $(this).data('id');
            
            $.ajax({
                url: '<?= site_url('admin/get_pinjaman_by_id/') ?>' + pinjamanId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#pinjamanId').val(response.Pinjaman_ID);
                    $('#anggotaId').val(response.Anggota_ID);
                    $('#jumlah').val(response.Jumlah);
                    $('#durasi').val(response.Durasi);
                    $('#tanggalPinjaman').val(response.Tanggal_Pinjaman);
                    $('#bunga').val(response.Bunga);
                    $('#status').val(response.Status);
                    
                    $('#editPinjamanModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat mengambil data pinjaman');
                }
            });
        });

        $('#savePinjaman').on('click', function() {
            var formData = $('#editPinjamanForm').serialize();
            
            $.ajax({
                url: '<?= site_url('admin/update_pinjaman') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        alert('Data pinjaman berhasil diperbarui');
                        $('#editPinjamanModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Gagal memperbarui data pinjaman: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat memperbarui data pinjaman');
                }
            });
        });

        $('.delete-pinjaman').on('click', function() {
            var pinjamanId = $(this).data('id');
            if (confirm('Are you sure you want to delete this loan?')) {
                $.ajax({
                    url: '<?= site_url('admin/delete_pinjaman') ?>',
                    type: 'POST',
                    data: { id: pinjamanId },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success response:', response);
                        if (response.success) {
                            alert(response.message);
                            $('button[data-id="' + pinjamanId + '"]').closest('tr').remove();
                        } else {
                            alert('Error: ' + (response.message || 'Unknown error'));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error response:', xhr.responseText);
                        console.error('Status:', status);
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menghapus pinjaman: ' + error);
                    }
                });
            }
        });

        function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            var found = false;
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // Event listener untuk input pencarian
    $("#searchInput").on("keyup", searchTable);

    // Event listener untuk tombol pencarian
    $("#searchButton").on("click", searchTable);
    });
    </script>
</body>
</html>