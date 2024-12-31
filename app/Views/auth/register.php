<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/landing/assets/images/1.png" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= base_url('css/style.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.min.css.map') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <style>
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-row .form-label-wrapper {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-label-wrapper:last-child {
            margin-right: 0;
        }
    </style>
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title"><?= lang('Auth.register') ?></h1>

            <form action="<?= url_to('register') ?>" method="post" class="sign-up-form form">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>
                <label class="form-label-wrapper">
                    <p class="form-label">Kode Pendaftaran</p>
                    <input class="form-input" type="text" name="kode_pendaftaran" placeholder="Enter your register code">
                </label>
                <div class="form-row">
                    <label class="form-label-wrapper">
                        <p class="form-label">Nama</p>
                        <input class="form-input <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" type="text" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </label>
                    <label class="form-label-wrapper">
                        <p class="form-label">Email</p>
                        <input class="form-input<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </label>
                </div>
                <div class="form-row">
                    <label class="form-label-wrapper">
                        <p class="form-label">Password</p>
                        <input class="form-input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" type="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </label>
                    <label class="form-label-wrapper">
                        <p class="form-label">Ulangi Password</p>
                        <input class="form-input <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" name="pass_confirm" type="password" placeholder="Enter your password" required>
                    </label>
                </div>
                <label class="form-checkbox-wrapper">
                    <span class="form-checkbox-label">Remember me next time</span>
                </label>
                <button class="form-btn primary-default-btn transparent-btn" type="submit"><?= lang('Auth.register') ?></button>
                
                <p class="form-label"><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
            </form>
        </article>
    </main>
    <!-- Chart library -->
    <script src="<?= base_url(); ?>/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="<?= base_url(); ?>/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="<?= base_url(); ?>/js/script.js"></script>
</body>

</html>
