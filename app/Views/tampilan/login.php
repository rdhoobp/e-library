<?= view('template/header.php') ?>

<section class="background-login py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-12 col-md-6 col-xl-7">
                <div class="d-flex justify-content-center text">
                    <div class="col-12 col-xl-9">
                        <img class="img-fluid custom-logo rounded mb-4" loading="lazy" src="<?= base_url("asset/img/logos/icon-light.png") ?>" alt="Logo">
                        <hr class="border-light mb-4">
                        <h2 class="text-light-custom h1 mb-4">Selamat Datang Kembali!</h2>
                        <p class="lead text-light-custom mb-5">Silahkan Log In untuk mengakses akun anda.</p>
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

                            <?php if (!empty(session()->get("error"))): ?>
                                <div class="col-12">
                                    <div class="alert alert-danger text-center mb-3">
                                        <?= session()->get("error") ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-12">
                                <div class="mb-1">
                                    <h1>Sign in</h1>
                                    <p>Don't have an account? <a href="<?= base_url('register') ?>">Sign up</a></p>
                                </div>
                            </div>
                        </div>

                        <form action="<?= base_url('login/submit') ?>" method="POST">
                            <div class="row gy-3 overflow-hidden">
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                                        <label class="form-check-label" for="remember_me">
                                            Keep me logged in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid mb-2">
                                        <button class="btn btn-primary btn-lg" type="submit">Log in now</button>
                                    </div>
                                    <div class="text-end">
                                        <a href="<?= base_url('forgot-password') ?>">Forgot password?</a>
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