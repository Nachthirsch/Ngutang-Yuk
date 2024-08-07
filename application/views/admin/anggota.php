<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
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
                <li><a href="<?= site_url('admin/anggota') ?>" class="active"><i class="fas fa-users"></i> Anggota</a></li>
                <li><a href="<?= site_url('admin/pinjaman') ?>"><i class="fas fa-money-bill-wave"></i> Pinjaman</a></li>
                <li><a href="<?= site_url('admin/pembayaran')?>"><i class="fas fa-credit-card"></i> Pembayaran</a></li>
                <li><a href="<?= site_url('admin/simpanan') ?>"><i class="fas fa-piggy-bank"></i> Simpanan</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <div class="dashboard-header">
                <h1>Daftar Anggota</h1>
            </div>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Cari anggota...">
            <button id="searchButton"><i class="fas fa-search"></i></button>
         </div> 
         

<!-- view admin/anggota -->
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Loan Limit</th>
                <th>Saving Limit</th>
                <th>Current Loan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($anggota)): ?>
                <?php foreach($anggota as $a): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($a->Anggota_ID); ?></td>
                        <td><?php echo htmlspecialchars($a->Nama); ?></td>
                        <td><?php echo htmlspecialchars($a->Alamat); ?></td>
                        <td><?php echo htmlspecialchars($a->Telepon); ?></td>
                        <td><?php echo htmlspecialchars($a->Email); ?></td>
                        <td><?php echo htmlspecialchars($a->loan_limit); ?></td>
                        <td><?php echo htmlspecialchars($a->saving_limit); ?></td>
                        <td><?php echo htmlspecialchars($a->current_loan); ?></td>
                        <td>
                            <button class="btn-action btn-primary edit-anggota" data-id="<?php echo $a->Anggota_ID; ?>"><i class="fas fa-edit"></i></button>
                            <!-- Ubah link hapus menjadi button -->
                            <button class="btn-action btn-danger delete-anggota" data-id="<?php echo $a->Anggota_ID; ?>"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10">Tidak ada data anggota.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editAnggotaModal" tabindex="-1" role="dialog" aria-labelledby="editAnggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAnggotaModalLabel">Edit Anggota</h5>
            </div>
            <div class="modal-body">
                <form id="editAnggotaForm">
                    <input type="hidden" id="anggotaId" name="anggotaId">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="Nama" aria-label="Nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="Alamat" aria-label="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="Telepon" aria-label="Telepon">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="Email" aria-label="Email">
                    </div>
                    <div class="form-group">
                        <label for="loan_limit">Loan Limit</label>
                        <input type="number" class="form-control" id="loan_limit" name="loan_limit" aria-label="Loan Limit">
                    </div>
                    <div class="form-group">
                        <label for="saving_limit">Saving Limit</label>
                        <input type="number" class="form-control" id="saving_limit" name="saving_limit" aria-label="Saving Limit">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="btn btn-primary" id="saveAnggota">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('.edit-anggota').on('click', function() {
        var anggotaId = $(this).data('id');
        
        // Fetch anggota data
        $.ajax({
            url: '<?= site_url('admin/get_anggota_by_user_id/') ?>' + anggotaId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response); // Tambahkan ini untuk memeriksa response
                $('#anggotaId').val(response.Anggota_ID);
                $('#nama').val(response.Nama);
                $('#alamat').val(response.Alamat);
                $('#telepon').val(response.Telepon);
                $('#email').val(response.Email);
                $('#loan_limit').val(response.loan_limit);
                $('#saving_limit').val(response.saving_limit);
                
                $('#editAnggotaModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengambil data anggota');
            }
        });
    }); 

    $('#saveAnggota').on('click', function() {
        var formData = $('#editAnggotaForm').serialize();
        
        $.ajax({
            url: '<?= site_url('admin/update_anggota') ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log(response); // Tambahkan ini untuk memeriksa response
                if (response.status === 'success') {
                    alert('Data anggota berhasil diperbarui');
                    $('#editAnggotaModal').modal('hide');
                    location.reload();
                } else {
                    alert('Gagal memperbarui data anggota: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat memperbarui data anggota');
            }
        });
    });
});

// JavaScript untuk menangani penghapusan
$('.delete-anggota').on('click', function() {
    var anggotaId = $(this).data('id');
    if (confirm('Are you sure you want to delete this member?')) {
        $.ajax({
            url: '<?= site_url('admin/delete_anggota') ?>',
            type: 'POST',
            data: { id: anggotaId },
            dataType: 'json',
            success: function(response) {
                console.log('Success response:', response);
                if (response.success) {
                    alert(response.message);
                    $('button[data-id="' + anggotaId + '"]').closest('tr').remove();
                } else {
                    alert('Error: ' + (response.message || 'Unknown error'));
                }
            },
            error: function(xhr, status, error) {
                console.error('Error response:', xhr.responseText);
                console.error('Status:', status);
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus anggota: ' + error);
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

</script>
</body>
</html>
