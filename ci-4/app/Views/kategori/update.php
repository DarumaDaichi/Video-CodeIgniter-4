<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php echo session()->getFlashdata('info'); ?>

<div class="col">
    <h1>Update Data</h1>
</div>

<div class="col-8">
    <form action="<?= base_url() ?>/admin/kategori/update" method="post">
        <div class="form-group">
            <label for="kategori">Kategori : </label>
            <input type="text" class="form-control" name="kategori" value="<?= $kategori['kategori'] ?>" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan : </label>
            <input type="text" class="form-control" name="keterangan" value="<?= $kategori['keterangan'] ?>" required>
        </div>
        <input type="hidden" name="idkategori" value="<?= $kategori['idkategori'] ?>">
        <input type="submit" name="simpan" value="simpan">
    </form>
</div>

<?= $this->endSection() ?>