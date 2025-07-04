<?= view('template/header.php') ?>
<?php $validation = \Config\Services::validation(); ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    .settings-page * {
        font-family: 'Poppins', sans-serif !important;
    }
</style>

<div class="settings-page container py-5 mb-5">
    <form action="<?= base_url('user/settings/update') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-2">
                    <div class="card-body text-center">
                        <?php if ($data['img'] == NULL) { ?>
                            <img src="<?= base_url('asset/img/avatar/default.jpg') ?>" alt="User Avatar" class="rounded-circle mb-3 mt-2" width="100" height="100">
                        <?php } else { ?>
                            <img src="<?= base_url('asset/img/avatar/' . $data['img']) ?>" alt="User Avatar" class="rounded-circle mb-3 mt-2" width="100" height="100">
                        <?php } ?>
                        <h2 class="mb-0"><?= $data['name'] ?></h2>
                        <small class="text-muted">Member since <?= date('Y', strtotime($data['created_at'] ?? '2024-01-01')) ?></small>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="<?php base_url('/user/settings/' . $data['id_user']) ?>" class="list-group-item list-group-item-action active border-bottom">
                            <i class="fa-regular fa-user ms-4 me-2"></i> Basic Information
                        </a>
                        <a href="<?= base_url('forgot-password') ?>" class="list-group-item list-group-item-action border-bottom">
                            <i class="fa-solid fa-gear ms-4 me-2"></i> Change Password
                        </a>
                        <a href="#" class="list-group-item list-group-item-action text-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            <i class="fa-solid fa-trash ms-4 me-2"></i> Hapus Akun
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body">
                        <h2 class="mb-4">Basic Information</h2>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <?php if (session()->get("success")): ?>
                                        <div class="col-12">
                                            <div class="alert alert-success text-center mb-3">
                                                <?= session()->get("success") ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($validation->getErrors())): ?>
                                        <div class="col-12">
                                            <?php foreach ($validation->getErrors() as $error): ?>
                                                <div class="alert alert-danger mb-2">
                                                    <?= esc($error) ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (session()->get("error")): ?>
                                        <div class="col-12">
                                            <div class="alert alert-danger mb-2">
                                                <?= session()->get("error") ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="<?= $data['id_user'] ?>" style="display:none;">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?= $data['username'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Full Name</label>
                                    <input type="text" id="nama" name="name" class="form-control" value="<?= $data['name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <input type="hidden" name="old_profile" value="<?= $data['img'] ?>">
                                    <img id="preview-image"
                                        src="<?= base_url('asset/img/avatar/' . ($data['img'] ?? 'default.jpg')) ?>"
                                        class="img-fluid border border-4 mb-2"
                                        width="170" height="170" alt="Profile Picture">
                                    <div>
                                        <label for="profile">
                                            <span class="btn btn-primary btn-sm"><i class="fa fa-upload"></i></span>
                                        </label>
                                        <input type="file" name="profile" id="profile" style="display:none;" accept="image/*">
                                    </div>

                                    <small>Use 128px x 128px image in JPG</small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-primary px-4 rounded-3">
                            Update
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('/user/delete') ?>" method="post">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white" id="deleteModalLabel" style="font-family: 'Poppins', sans-serif;">Konfirmasi Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Masukkan password Anda untuk menghapus akun ini secara permanen. Proses ini tidak bisa dibatalkan.</p>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Anda</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Akun</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Live Preview -->
<script>
    document.getElementById('profile').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>

<?= view('template/footer.php') ?>