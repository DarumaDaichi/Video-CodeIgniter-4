<?= $this->extend('template/admin')?>

<?= $this->section('content')?>

<h1> <?php echo $judul; ?> </h1>

<table border="1px">

    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th>Hapus</th>
        <th>Ubah</th>
    </tr>
    <?php $no=1 ?>
    <?php foreach($kategori as $key => $value) :?>
    <tr>
        <td><?= $no++?></td>
        <td><?= $value['kategori'] ?></td>
        <td><?= $value['keterangan']?></td>
        <td><a href="<?= base_url()?>/admin/kategori/delete/<?= $value['idkategori']?>">Hapus</a></td>
        <td><a href="<?= base_url()?>/admin/kategori/find/<?= $value['idkategori']?>">Ubah</a></td>
    </tr>

    <?php endforeach;?>

</table>

<?= $this->endSection()?>