<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class = "alert alert-danger" role="alert">';
        echo session()->getFlashdata('info');
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h3>Insert Data</h3>
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
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>