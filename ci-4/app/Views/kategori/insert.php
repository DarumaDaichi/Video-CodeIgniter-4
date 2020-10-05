<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php echo session()->getFlashdata('info'); ?>

<div class="col">
    <h1>Insert Data</h1>
</div>

<div class="col-8">
    <form action="<?= base_url() ?>/admin/kategori/insert" method="post">
        <div class="form-group">
            <label for="kategori">Kategori : </label>
            <input type="text" class="form-control" name="kategori" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan : </label>
            <input type="text" class="form-control" name="keterangan" required>
        </div>

        <div class="form-group">
            <input type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>