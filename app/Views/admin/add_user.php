<?= view('template/header_backend.php') ?>
<?php $validation = \Config\Services::validation(); ?>
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
<form action="input" method="POST">
    <div class="row gy-3 overflow-hidden">
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                <label for="name">Full Name</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Your Username" required>
                <label for="username">Username</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password" required>
                <label for="password_confirm">Confirm Password</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <select name="role" id="role" class="form-control" required>
                    <option value=""></option>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
                <label for="role">Role User</label>
            </div>
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Register now</button>
            </div>
        </div>
    </div>
</form>
<?= view('template/footer_backend.php') ?>