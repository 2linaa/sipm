<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPM</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/landing/assets/images/1.png" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <?= $this->include('templates/sidebar'); ?>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <?= $this->include('templates/nav'); ?>

            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <?= $this->renderSection('main-wrapper'); ?>
            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2024 © Lina D Yanti - <a href="elegant-dashboard.com" target="_blank"
                                rel="noopener noreferrer">😎</a></p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="##">About</a></li>
                        <li><a href="##">Support</a></li>
                        <li><a href="##">Puchase</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
    <!-- Chart library -->
    <script src="<?= base_url(); ?>/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="<?= base_url(); ?>/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="<?= base_url(); ?>/js/script.js"></script>
</body>

</html>