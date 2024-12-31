<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<div class="container">
    <h2 class="main-title">My Profile</h2>
    <div class="col-md-5 col-xl-">
        <article class="white-block">
            <div class="stat-cards-icon primary">
                <img src="<?= base_url('/img/' . user()->user_image); ?>" alt="<?= user()->username; ?>">
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

                <small>
                    <p class="stat-cards-info__title"><a href="<?= base_url('admin'); ?>">&laquo; Back to user lists</a></p>
                </small>

            </ul>

        </article>

    </div>

</div>
<?= $this->endSection(); ?>