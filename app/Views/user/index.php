<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<div class="container">
    <h2 class="main-title">My Profile</h2>
    <div class="col-md-5 col-xl-">
        <article class="white-block">
            <div class="sidebar-user-img">
                <img src='<?= base_url(); ?>/img/avatar/avatar-illustrated-04.png' alt="<?= user()->username; ?>">
            </div>
            <ul class="top-cat-list">

                <li>
                    <a href="##">
                        <p class="stat-cards-info__num"><?= user()->username; ?></p>
                    </a>
                </li>
                <li>
                    <a href="##">
                        <div class="top-cat-list__subtitle">
                            <?= user()->email; ?>
                        </div>
                    </a>
                </li>

               

            </ul>

        </article>

    </div>

</div>
<?= $this->endSection(); ?>