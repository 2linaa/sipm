<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url(); ?>/landing/assets/images/1.png" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?= base_url('css/style.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.min.css.map') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <h1 class="sign-up__title"><?= lang('Auth.loginTitle') ?></h1>
      <p class="sign-up__subtitle">Sign in to your account to continue</p>

      <form class="sign-up-form form" action="<?= url_to('login') ?>" method="post">
        <?= csrf_field() ?>
        <?= view('Myth\Auth\Views\_message_block') ?>

        <?php if ($config->validFields === ['email']): ?>
          <label class="form-label-wrapper">
            <p class="form-label">Email / Username</p>
            <input class="form-input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="email" placeholder="Enter your email" required
              name="login" placeholder="<?= lang('Auth.email') ?>">
            <div class="invalid-feedback">
              <?= session('errors.login') ?>
            </div>
          </label>
        <?php else: ?>
          <label class="form-label-wrapper">
            <p class="form-label">Email / Username</p>
            <input class="form-input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="email" placeholder="Enter your email" required
              name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
            <div class="invalid-feedback">
              <?= session('errors.login') ?>
            </div>
          </label>
        <?php endif; ?>


        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input class="form-input <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" type="password" placeholder="<?= lang('Auth.password') ?>">
        </label>
        <!-- <a class="link-info forget-link" href="##">Forgot your password?</a> -->
        <?php if ($config->allowRemembering): ?>
          <label class="form-checkbox-wrapper">
            <input class="form-checkbox" name="remember" type="checkbox" <?php if (old('remember')) : ?> checked <?php endif ?>>

            <span class="form-checkbox-label"><?= lang('Auth.rememberMe') ?></span>
          </label>
        <?php endif; ?>

        <button type="submit" class="form-btn primary-default-btn transparent-btn"><?= lang('Auth.loginAction') ?></button>
        <?php if ($config->allowRegistration) : ?>
          <p class="form-label"><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
        <?php endif; ?>
        <?php if ($config->activeResetter): ?>
          <p class="form-label"><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
        <?php endif; ?>
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