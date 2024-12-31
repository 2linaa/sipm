<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<div class="container">

    <h2 class="main-title">Feedback</h2>
    <div class="row stat-cards">
        <?php
        $i = 1;
        foreach ($feedback as $b) :
        ?>
            <div class="col-md-5 col-xl-2">
                <article class="white-block">
                    <div class="sidebar-user-img">
                        <img src='<?= base_url(); ?>/img/avatar/avatar-illustrated-04.png' alt="<?= user()->username; ?>">
                    </div>
                    <ul class="top-cat-list">
                        <li>
                            <a href="##">
                                <p class="stat-cards-info__num"><?= $b['nama']; ?></p>
                            </a>
                        </li>                        
                        <li>                            
                            <small>
                            <p class="stat-cards-info__title"><a href="<?= base_url('admin'); ?>"><?= $b['kesan']; ?></a></p>
                        </small>
                        </li>   
                        <li>                            
                            <small>
                            <p class="stat-cards-info__title"><a href="<?= base_url('admin'); ?>"><?= $b['pesan']; ?></a></p>
                        </small>
                        </li>   
                        <li>
                            <a href="##">
                            <div class="top-cat-list__subtitle">
                                <?= $b['created_at']; ?>
                            </div>
                            </a>
                        </li>
                       

                    </ul>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>