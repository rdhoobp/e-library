<?= view('template/header_backend.php') ?>
<!-- Content wrapper -->

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> User Data</h4>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">User Data</h5>
                <a href="<?= base_url('user/add') ?>" class="btn btn-primary">+ Add User</a>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><strong><?= esc($user['name']) ?></strong></td>
                                <td><?= esc($user['username']) ?></td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li
                                            data-bs-toggle="tooltip"
                                            data-popup="tooltip-custom"
                                            data-bs-placement="top"
                                            class="avatar avatar-xs pull-up"
                                            title="<?= esc($user['name']) ?>">
                                            <?php if (!empty($user['img'])): ?>
                                                <img src="<?= base_url('asset/img/avatar/' . $user['img']) ?>" alt="Avatar" class="rounded-circle" />
                                            <?php else: ?>
                                                <img src="<?= base_url("asset/img/avatar/default.jpg") ?>" alt="Avatar" class="rounded-circle" />
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <?php
                                    $badge = 'bg-label-secondary';
                                    $roleText = 'User';
                                    if ($user['role'] == 1) {
                                        $badge = 'bg-label-success';
                                        $roleText = 'Admin';
                                    } elseif ($user['role'] == 2) {
                                        $badge = 'bg-label-warning';
                                        $roleText = 'Staff';
                                    }
                                    ?>
                                    <span class="badge <?= $badge ?> me-1"><?= $roleText ?></span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('user/user_edit/' . $user['id_user']) ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $user['id_user'] ?>">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php foreach ($users as $user): ?>
        <!-- Modal -->
        <div class="modal fade" id="deleteUserModal<?= $user['id_user'] ?>" tabindex="-1" aria-labelledby="deleteUserModalLabel<?= $user['id_user'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="mb-2 text-white modal-title" id="deleteUserModalLabel<?= $user['id_user'] ?>">Delete User Confirmation</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong><?= esc($user['name']) ?></strong> (<?= esc($user['username']) ?>)?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="<?= base_url('user/user_delete/' . $user['id_user']) ?>" class="btn btn-danger">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?= view('template/footer_backend.php') ?>