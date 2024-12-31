<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<div class="container">

    <h2 class="main-title">Daftar Laporan</h2>
    <div class="row stat-cards">
        <?php
        $i = 1;
        foreach ($buku as $b) :
        ?>
            <div class="col-md-5 col-xl-2">
                <article class="white-block">
                    <div class="stat-cards-icon success">
                        <a href="https://docs.google.com/document/d/1lt3L-4P-S-2MSdT-cYmhuQbG4lGiGHQS2pYqG4TVp5s/edit?usp=sharing">
                            <div class="stat-cards-icon success">
                                <i data-feather="file" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                    <ul class="top-cat-list">
                        <li>
                            <a href="##">
                                <p class="stat-cards-info__num"><?= $b['nama']; ?></p>
                            </a>
                        </li>
                        <!-- <li>
                <a href="##">
                    <div class="top-cat-list__subtitle">
                        <?= $b['laporan']; ?>
                    </div>
                </a>
            </li> -->

                        <small>
                            <p class="stat-cards-info__title"><a href="<?= base_url('admin'); ?>"><?= $b['created_at']; ?></a></p>
                        </small>

                    </ul>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>