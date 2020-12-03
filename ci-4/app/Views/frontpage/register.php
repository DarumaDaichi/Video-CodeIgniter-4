<link rel="stylesheet" href="<?= base_url('/Bootstrap/css/bootstrap.min.css') ?>">

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
    <h3>Register</h3>
</div>

<div class="col-8">
    <form action="<?= base_url('register/insert') ?>" method="post">
        <div class="form-group">
            <label for="pelanggan">Pelanggan : </label>
            <input id="pelanggan" type="text" class="form-control" name="pelanggan" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat : </label>
            <input id="alamat" type="text" class="form-control" name="alamat" required>
        </div>

        <div class="form-group">
            <label for="telpon">Telpon : </label>
            <input id="telpon" type="number" class="form-control" name="telpon" required>
        </div>

        <div class="form-group">
            <label for="email">Email : </label>
            <input id="email" type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password : </label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="simpan" value="simpan">
        </div>
    </form>
</div>