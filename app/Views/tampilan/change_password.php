<?= view('template/header.php') ?>
<?php $validation = \Config\Services::validation(); ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    .settings-page * {
        font-family: 'Poppins', sans-serif !important;
    }
</style>

<div class="settings-page container py-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h2 class="mb-4 text-center">Change Password</h2>

                    <!-- Flash success -->
                    <?php if (session()->get("success")): ?>
                        <div class="alert alert-success text-center">
                            <?= session()->get("success") ?>
                        </div>
                    <?php endif; ?>

                    <!-- Flash error -->
                    <?php if (session()->get("error")): ?>
                        <div class="alert alert-danger text-center">
                            <?= session()->get("error") ?>
                        </div>
                    <?php endif; ?>

                    <!-- Validation errors -->
                    <?php if (!empty($validation->getErrors())): ?>
                        <?php foreach ($validation->getErrors() as $error): ?>
                            <div class="alert alert-danger mb-2">
                                <?= esc($error) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <form action="<?= base_url('user/password/update') ?>" method="post">
                        <?php if ($data != null): ?>
                            <input type="email" name="email" value="<?= esc($data['email']) ?>" hidden>
                        <?php endif; ?>

                        <?php if ($data == null): ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirm" class="form-control" placeholder="Masukkan Ulang Password" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary px-4">Change Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= view('template/footer.php') ?>