<?= view('template/header.php') ?>
<?php $validation = \Config\Services::validation(); ?>

<section class="background-login py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 col-xl-7">
                <div class="d-flex justify-content-center text">
                    <div class="col-12 col-xl-9">
                        <img class="img-fluid custom-logo rounded mb-4" loading="lazy" src="<?= base_url("asset/img/logos/icon-light.png") ?>" alt="Logo">
                        <hr class="border-light mb-4">
                        <h2 class="text-light-custom h1 mb-4">Daftar Sekarang!</h2>
                        <p class="lead text-light-custom mb-5">Buat akun baru untuk mulai menggunakan layanan kami.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-5">
                <div class="card border-0 rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
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

                            <div class="col-12">
                                <div class="mb-1">
                                    <h1>Register</h1>
                                    <p>Already have an account? <a href="<?= base_url('login') ?>">Sign in</a></p>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('register/submit') ?>" method="POST">
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="terms" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="text-decoration-underline">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" type="submit">Register now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end right column -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>

<?= view('template/footer.php') ?>