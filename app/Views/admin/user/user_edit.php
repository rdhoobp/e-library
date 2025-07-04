<?= view('template/header_backend.php') ?>
<?php $validation = \Config\Services::validation(); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">User /</span> Edit User
        </h4>

        <?php if (!isset($user)): ?>
            <div class="alert alert-danger">User data not found.</div>
        <?php else: ?>

            <?php if (session()->get("success")): ?>
                <div class="alert alert-success text-center"><?= session()->get("success") ?></div>
            <?php endif; ?>

            <?php if (!empty($validation->getErrors())): ?>
                <?php foreach ($validation->getErrors() as $error): ?>
                    <div class="alert alert-danger"><?= esc($error) ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form action="<?= base_url('/user/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_user" value="<?= esc($user['id_user']) ?>">

                <div class="card mb-4">
                    <h5 class="card-header">Edit User Profile</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="<?= base_url('asset/img/avatar/' . ($user['img'] ?? 'default.jpg')) ?>"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input
                                        type="file"
                                        id="upload"
                                        name="profile"
                                        class="account-file-input"
                                        hidden
                                        accept="image/png, image/jpeg, image/jpg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="resetImage">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0">Allowed JPG or PNG. Max size 2MB</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-0" />

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?= old('name', esc($user['name'])) ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    value="<?= old('username', esc($user['username'])) ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?= old('email', esc($user['email'])) ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="0" <?= old('role', $user['role']) == 0 ? 'selected' : '' ?>>User</option>
                                    <option value="1" <?= old('role', $user['role']) == 1 ? 'selected' : '' ?>>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <a href="<?= base_url('user/index') ?>" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script>
        const uploadInput = document.getElementById('upload');
        const previewImage = document.getElementById('uploadedAvatar');
        const resetBtn = document.getElementById('resetImage');

        uploadInput.addEventListener('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });

        resetBtn.addEventListener('click', function() {
            previewImage.src = '<?= base_url('asset/img/avatar/' . ($user['img'] ?? 'default.jpg')) ?>';
            uploadInput.value = '';
        });
    </script>

</div>

<?= view('template/footer_backend.php') ?>