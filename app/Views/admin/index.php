<?= $this->extend('templates/index'); ?>

<?= $this->section('main-wrapper'); ?>
<div class="container">
    <h2 class="main-title">User List</h2>
    <!-- <?php  d($users); ?> -->
    <div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    
                    <th class="mt-3">No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($users as $user) :?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $user->username; ?> </td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->name; ?></td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <i data-feather="more-horizontal" aria-hidden="true"></i>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="<?= base_url('admin/' . $user->userid); ?>">Edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

</div>
<?= $this->endSection(); ?>