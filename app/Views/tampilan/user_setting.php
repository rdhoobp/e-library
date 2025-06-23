<?= view('template/header.php') ?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    .settings-page * {
        font-family: 'Poppins', sans-serif !important;
    }
</style>

<div class="settings-page container py-5 mb-5">
    <form action="<?= base_url('user/settings/update') ?>" method="post">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-2">
                    <div class="card-body text-center">
                        <img src="<?= base_url('asset/img/avatar/' . $data['img']) ?>" alt="User Avatar" class="rounded-circle mb-3 mt-2" width="100" height="100">
                        <h2 class="mb-0"><?= $data['name'] ?></h2>
                        <small class="text-muted">Member since <?= date('Y', strtotime($data['created_at'] ?? '2024-01-01')) ?></small>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active border-bottom">
                            <i class="fa-regular fa-user ms-4 me-2"></i> Basic Information
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-bottom">
                            <i class="fa-solid fa-gear ms-4 me-2"></i> Security
                        </a>
                        <a href="#" class="list-group-item list-group-item-action text-danger">
                            <i class="fa-solid fa-trash ms-4 me-2"></i> Delete Account
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
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?= esc($data['username']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Full Name</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= esc($data['name']) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <img src="<?= base_url('asset/img/avatar/' . $data['img']) ?>" class="img-fluid border border-4 mb-2" width="170" height="170" alt="Profile Picture">
                                    <div>
                                        <span class="btn btn-primary btn-sm"><i class="fa fa-upload"></i></span>
                                    </div>
                                    <small>Use 128px x 128px image in JPG</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h2 class="mb-4">Account Details</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?= esc($data['email']) ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="anything" class="form-label">Anything</label>
                                <input type="text" id="anything" name="anything" class="form-control" value="<?= esc($data['email']) ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" value="NGASAL MEK">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-sm btn-outline-primary px-4 rounded-3">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= view('template/footer.php') ?>