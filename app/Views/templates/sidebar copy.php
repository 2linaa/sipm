<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Elegant</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <?php if (in_groups('admin')): ?>
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="<?= base_url('/admin/dashboard') ?>"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/admin/index') ?>"><span class="icon user-3" aria-hidden="true"></span>User List</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/admin/daftar') ?>"><span class="icon edit" aria-hidden="true"></span>Pendaftar</a>
                    </li>
                </ul>
            <?php endif; ?>

            <!-- <span class="system-menu__title">system</span> -->
            <ul class="sidebar-body-menu">
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon paper" aria-hidden="true"></span>Laporan
                        <span class="category__btn transparent-btn" title="Open list">
                            <!-- <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span> -->
                        </span>
                    </a>
                    <!-- <ul class="cat-sub-menu">
                            <li>
                                <a href="pages.html">All pages</a>
                            </li>
                            <li>
                                <a href="new-page.html">Add new page</a>
                            </li>
                        </ul> -->
                </li>
                <li>
                    <a href="comments.html">
                        <span class="icon message" aria-hidden="true"></span>
                        Feedback
                    </a>
                </li>

                <li>
                    <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                </li>
            </ul>

        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                    <img src="<?= user()->user_image; ?>" alt="User name">
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title"><?= user()->username; ?></span>
                <span class="sidebar-user__subtitle"><?= user()->name; ?></span>
            </div>
        </a>
    </div>
</aside>