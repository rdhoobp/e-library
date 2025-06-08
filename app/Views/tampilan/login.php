    <?= view('template/header.php') ?>
    <section class="bg-primary py-3 py-md-5 py-xl-8">
    <div class="container">
        <div class="row gy-4 align-items-center">
        <div class="col-12 col-md-6 col-xl-7">
            <div class="d-flex justify-content-center text-bg-primary">
            <div class="col-12 col-xl-9">
                <img class="img-fluid rounded mb-4" loading="lazy" src="<?= base_url("asset/frontend/images/icon-light.png") ?>" width="250" height="200" alt="Site Logo">
                <hr class="border-primary-subtle mb-4">
                <h2 class="h1 mb-4">Welcome Back!</h2>
                <p class="lead mb-5">Log in to continue to your account.</p>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-5">
            <div class="card border-0 rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="mb-4">
                <h3>Sign in</h3>
                <p>Don't have an account? <a href="<?= base_url('register') ?>">Sign up</a></p>
                </div>
                <form action="<?= base_url('login/submit') ?>" method="POST">
                <div class="row gy-3">
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
                        <label class="form-check-label text-secondary" for="remember_me">
                        Keep me logged in
                        </label>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Log in now</button>
                    </div>
                    </div>
                </div>
                </form>
                <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('forgot-password') ?>">Forgot password?</a>
                </div>
            </div>
            </div>
        </div> <!-- end right column -->
        </div> <!-- end row -->
    </div> <!-- end container -->
    </section>
    <?= view('template/footer.php') ?>
