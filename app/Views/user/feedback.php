<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<div class="container">
    <h2 class="main-title">Bagikan pengalaman Magangmu</h2>

    <?= session()->getFlashdata('message') ?>
    <form action="/feedback/store" method="post" enctype="multipart/form-data" class="sign-up-form form">
        <?= csrf_field() ?>
        <label class="form-label-wrappers">
            <p class="form-label">Nama</p>
            <input class="form-input" type="text" name="nama" value="<?= user()->username; ?>" readonly>
        </label>
        <label class="form-label-wrappers">
            <p class="form-label">Kesan</p>
            <textarea class="form-input" name="kesan" rows="5" cols="40"></textarea>
        </label>
        <label class="form-label-wrappers">
            <p class="form-label">Pesan dan Saran</p>
            <textarea class="form-input" name="pesan" rows="5" cols="40"></textarea>
        </label>
        <button class="form-btn-add primary-default-btn " type="submit">Kirim</button>
    </form>

    <?= \Config\Services::validation()->listErrors() ?>
</div>

<script>
    <?php if (session()->getFlashdata('message')): ?>
        Swal.fire({
            title: '<?= session()->getFlashdata('status') === 'success' ? "Success" : "Error" ?>',
            text: '<?= session()->getFlashdata('message') ?>',
            icon: '<?= session()->getFlashdata('status') === 'success' ? "success" : "error" ?>',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>

<?= $this->endSection(); ?>