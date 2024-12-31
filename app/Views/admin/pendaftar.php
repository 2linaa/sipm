<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<main class="main users chart-page" id="skip-target">
    <div class="container">
        <h2 class="main-title">Pendaftar Magang</h2>
        <!-- <div class="row stat-cards ">
            <div class="col-md-6 col-xl-3 ">
                <article class="stat-cards-item">
                    <div class="stat-cards-icon purple">
                        <i data-feather="users" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">Belum Terkonfirmasi</p>
                        <p class="stat-cards-info__progress">
                            <span class="stat-cards-info__profit success">
                                10
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
                                29
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
                                29
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
                                29
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
                                29
                            </span>Orang
                        </p>
                    </div>
                </article>
            </div>
        </div> -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <div class="chart">
              <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
            </div> -->
                <div class="users-table table-wrapper">
                    <table class="posts-table">
                        <thead>
                            <tr class="users-table-info">
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Instansi</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Persyaratan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($getinternship as $intern) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $intern['nama']; ?></td>
                                    <td><?= $intern['no_telepon']; ?></td>
                                    <td><?= $intern['email']; ?></td>
                                    <td><?= $intern['instansi']; ?></td>
                                    <td><?= $intern['mulai']; ?></td>
                                    <td><?= $intern['selesai']; ?></td>
                                    <td>
                                        <a href="<?= base_url('uploads/surat/' . $intern['surat']); ?>" target="_blank">Lihat Surat</a>
                                        <a href="<?= base_url('uploads/surat/' . $intern['rekomendasi']); ?>" target="_blank">Lihat Surat</a>
                                    </td>

                                    <td>
                                        <?php
                                        if ($intern['status_penerimaan'] == 'diterima') {
                                            echo '<span class="badge badge-success">Diterima</span>';
                                        } elseif ($intern['status_penerimaan'] == 'ditolak') {
                                            echo '<span class="badge badge-pending">Ditolak</span>';
                                        } else {
                                            echo '<span class="badge badge-active">Belum Diterima</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($intern['status_penerimaan'] == 'belum diterima' || $intern['status_penerimaan'] == null) { ?>
                                            <!-- Tombol Terima -->
                                            <a href="<?= base_url('admin/confirm/' . $intern['id'] . '/accept'); ?>"
                                                class="btn btn-success btn-sm"
                                                onclick="return confirm('Konfirmasi penerimaan magang ini?');">
                                                Terima
                                            </a>
                                            <!-- Tombol Tolak -->
                                            <a href="<?= base_url('admin/confirm/' . $intern['id'] . '/reject'); ?>"
                                                class="btn btn-pending btn-sm"
                                                onclick="return confirm('Tolak pendaftaran magang ini?');">
                                                Tolak
                                            </a>
                                        <?php } elseif ($intern['status_penerimaan'] == 'diterima') { ?>
                                            <span class="badge badge-success">Diterima</span>
                                        <?php } elseif ($intern['status_penerimaan'] == 'ditolak') { ?>
                                            <span class="badge badge-pending">Ditolak</span>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>