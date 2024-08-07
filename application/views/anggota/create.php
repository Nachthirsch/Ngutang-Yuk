<?php if($this->session->flashdata('success')): ?>
<script>
    alert('<?= $this->session->flashdata('success'); ?>');
    window.location.href = '<?= base_url('auth/login'); ?>'; // Asumsi menggunakan CodeIgniter dan base_url sudah diatur
</script>
<?php endif; ?>