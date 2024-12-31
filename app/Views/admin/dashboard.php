<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
            <div class="col-md-6 col-xl-3">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon purple">
                        <i data-feather="users" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Belum Terkonfirmasi</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                <?= $belumTerkonfirmasi; ?>
                            </span>Orang
                        </p>
                    </div>
                </article>
            </div>

            <div class="col-md-6 col-xl-3">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon warning">
                        <i data-feather="user-plus" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Pendaftar bulan ini</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                <?= $pendaftarBulanIni; ?>
                            </span>Orang
                        </p>
                    </div>
                </article>
            </div>

            <div class="col-md-6 col-xl-3">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon success">
                        <i data-feather="user-check" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Diterima bulan ini</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                <?= $diterimaBulanIni; ?>
                            </span>Orang
                        </p>
                    </div>
                </article>
            </div>

            <div class="col-md-6 col-xl-3">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon purple">
                        <i data-feather="user" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Peserta Magang Aktif</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                <?= $pesertaAktif; ?>
                            </span>Orang
                        </p>
                    </div>
                </article>
            </div>

            <div class="col-md-6 col-xl-3">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon primary">
                        <i data-feather="users" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Total Alumni</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                <?= $totalAlumni; ?>
                            </span>Orang
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>
