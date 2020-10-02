<?= $this->extend('template/admin')?>

<?= $this->section('content')?>

<h1>Upload Gambar</h1>

<form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
    Gambar    : <input type="file" name="gambar" required>
    <br>
    <input type="submit" name="simpan" value="simpan">
</form>

<?= $this->endSection()?>