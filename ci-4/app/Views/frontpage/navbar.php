<style>

    .intro nav {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 8vh;
        background-color: #5e3333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .intro nav .logo {
        margin-right: 30vw;
        font-family: amsterdam signature;
        font-size: 48px;
        text-decoration: none;
        color: white;
        letter-spacing: 3px;
    }

    .nav-links {
        display: flex;
        justify-content: space-around;
        width: 25%;
    }

    .nav-links li {
        list-style: none;
    }

    .nav-links a {
        color: white;
        text-decoration: none;
        letter-spacing: 1.5px;
        font-weight: bold;
        font-size: 14px;
    }

    .nav-links a:hover {
        color: white;
    }

    .kotak {
        display: none;
        cursor: pointer;
    }

    .kotak .line1 , .line2 , .line3 {
        width: 25px;
        height: 2px;
        background-color: white;
        margin: 5px;
        transition: all 0.3s ease;
    }

    .cart{
        margin-left: 5vw;
    }

    @media only screen and (max-width : 768px) {

        .body{
            overflow: hidden;
        }


        .nav-links {
            position: absolute;
            overflow: hidden;
            right: 0px;
            height: 92vh;
            top: 8vh;
            background-color: #5e3333;
            flex-direction:column;
            align-items: center;
            width: 100%;
            transform: translateX(100%);
            transition: transform 0.5s ease-in;
            z-index: 999;
        }

        .nav-links li {
            opacity: 0;
        }

        .kotak {
            display: block;
        }

        .cart{
            margin-right: 8vw;
        }

    }

    .nav-active {
        transform: translateX(0%);
    }

    @keyframes navLinkFade {
        from {
            opacity: 0;
            transform: translateX(50px);
        }

        to {
            opacity: 1;
            transform: translateX(0px);
        }
    }

    .toggle .line1 {
        transform: translate(6px);
    }

    .toggle .line2 {
        opacity: 100%;
    }

    .toggle .line3 {
        transform: translate(-6px);
    }
</style>
<link rel="stylesheet" href="<?= base_url('/Bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('/fontawesome-free/css/all.min.css') ?>">
<section class="intro">
    <nav class="navbar-atas sticky-top">
        <a href="<?= base_url() ?>" class="navbar-brand logo">
            Kopi Senang
        </a>

        <ul class="nav-links mt-3">
            <li><a href="<?= base_url() ?>" class="nav-link">Home</a></li>
            <li><a href="<?= base_url('front/menu') ?>" class="nav-link">Menu</a></li>
            <li>
                <?php
                if (!empty(session()->get('pelanggan'))) {?>
                    <a href="<?= base_url('login/logout')?>" class="nav-link">Logout</a>
                <?php } else {?>
                    <a href="<?= base_url('login')?>" class="nav-link">Login</a>
                <?php };?>
            </li>
        </ul>

        <div class="cart">
                <a href="<?= base_url('front/menu/cart') ?>"><i class="fas fa-cart-plus fa-lg" style="color: white;"></i></a>
        </div>

        <div class="kotak">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</section>

<script src="<?= base_url('/js/app.js'); ?>"></script>