<?= view('template/header_backend.php') ?>
<?php $validation = \Config\Services::validation(); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Add User</h4>

        <!-- Flash Success Alert -->
        <?php if (session()->get("success")): ?>
            <div class="alert alert-success text-center"><?= session()->get("success") ?></div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if (!empty($validation->getErrors())): ?>
            <?php foreach ($validation->getErrors() as $error): ?>
                <div class="alert alert-danger"><?= esc($error) ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Form Card -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New User</h5>
                <small class="text-muted">Fill out the form completely</small>
            </div>
            <div class="card-body">
                <form action="<?= base_url('user/input') ?>" method="POST">
                    <div class="row gy-3">

                        <!-- Full Name -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required value="<?= old('name') ?>">
                                <label for="name">Full Name</label>
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Your Username" required value="<?= old('username') ?>">
                                <label for="username">Username</label>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required value="<?= old('email') ?>">
                                <label for="email">Email Address</label>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password" required>
                                <label for="password_confirm">Confirm Password</label>
                            </div>
                        </div>

                        <!-- Role Selection -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" name="role" id="role" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="0" <?= old('role') === '0' ? 'selected' : '' ?>>User</option>
                                    <option value="1" <?= old('role') === '1' ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <label for="role">User Role</label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Register Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('template/footer_backend.php') ?>