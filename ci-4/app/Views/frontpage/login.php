<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="<?= base_url('/Bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-5 mx-auto">
                <div class="col">
                    <?php
                    if (!empty($info)) {
                        echo '<div class = "alert alert-danger" role="alert">';
                        echo $info;
                        echo '</div>';
                    }
                    ?>
                </div>
                <span>
                    <h1>LOGIN</h1>
                </span>
                <hr>

                <form action="<?= base_url('/login') ?>" method="post">
                    <div class="form-group">
                        <label for="Kategori">Email : </label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="Keterangan">Password : </label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="login" value="LOGIN">
                        <a href="<?= base_url('register')?>" class="btn btn-danger" >Register</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>