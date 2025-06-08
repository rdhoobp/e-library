    <?= view('template/header.php') ?>
    <section class="bg-primary py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
        <div class="col-12 col-md-6 col-xl-7">
            <div class="d-flex justify-content-center text-bg-primary">
            <div class="col-12 col-xl-9">
                <img class="img-fluid rounded mb-4" loading="lazy" src="<?= base_url("asset/frontend/images/icon-light.png") ?>" width="250" height="200" alt="BootstrapBrain Logo">
                <hr class="border-primary-subtle mb-4">
                <h2 class="h1 mb-4">Daftar Sekarang!</h2>
                <p class="lead mb-5">Buat akun baru untuk mulai menggunakan layanan kami.</p>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-5">
            <div class="card border-0 rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                    <h3>Register</h3>
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
                        <label class="form-check-label text-secondary" for="terms">
                        I agree to the <a href="#">terms and conditions</a>
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
                </div>
            </div>
            </div>
        </div> <!-- end right column -->
        </div> <!-- end row -->
    </div> <!-- end container -->
    </section>
    <?= view('template/footer.php') ?>
