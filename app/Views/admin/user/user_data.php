<?= view('template/header_backend.php') ?>
<!-- Content wrapper -->

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> User Data</h4>
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
                                            <img src="<?= base_url('asset/img/avatar/' . $user['img']) ?>" alt="Avatar" class="rounded-circle" />
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
                                            <a class="dropdown-item" href="<?= base_url('user/user_delete/' . $user['id_user']) ?>" onclick="return confirm('Delete this user?')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
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

    <?= view('template/footer_backend.php') ?>