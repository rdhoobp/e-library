<footer id="footer">
	<div class="container">
		<div class="row">

			<div class="col-md-4">

				<div class="footer-item">
					<div class="company-brand">
						<img src="<?= base_url("asset/img/logos/icon-dark.png") ?>" alt="logo" class="footer-logo">
						<p>E-Lib merupakan tempat untuk membaca buku secara virtual yang masih dalam masa pengembangan, segala percobaan akan kami lakukan untuk mengembangkan E-Lib</p>
					</div>
				</div>

			</div>

			<div class="col-md-4"></div>

			<div class="col-md-2">

				<div class="footer-menu">
					<?php if (session()->get('id')): ?>
						<h5>My Account</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="<?= base_url('user/edit/' . session()->get('id')) ?>">Edit Profile</a>
							</li>
							<li class="menu-item">
								<a href="<?= base_url('logout') ?>">Logout</a>
							</li>
						</ul>
					<?php else: ?>
						<h5>Account</h5>
						<ul class="menu-list">
							<li class="menu-item">
								<a href="<?= base_url('login') ?>">Sign In</a>
							</li>
						</ul>
					<?php endif; ?>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Help</h5>
					<ul class="menu-list">
						<!-- <li class="menu-item">
							<a href="#">Report a problem</a>
						</li>
						<li class="menu-item">
							<a href="#">Suggesting edits</a>
						</li> -->
						<li class="menu-item">
							<a href="https://www.instagram.com/radityaabib/">Contact us</a>
						</li>
					</ul>
				</div>

			</div>

		</div>
		<!-- / row -->

	</div>
</footer>

<div id="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="copyright">
					<div class="row">

						<div class="col-md-6">
							<p>&copy; <?php echo date("Y"); ?> All rights reserved. Website Made by <a
									href="https://discord.gg/mVTunrMR" target="_blank">E-Lib & Co.</a></p>
						</div>

						<!-- <div class="col-md-6">
							<div class="social-links align-right">
								<ul>
									<li>
										<a href="#"><i class="icon icon-twitter"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-youtube-play"></i></a>
									</li>
								</ul>
							</div>
						</div> -->

					</div>
				</div><!--grid-->

			</div><!--footer-bottom-content-->
		</div>
	</div>
</div>

<script src="<?= base_url("asset/frontend/js/jquery-1.11.0.min.js") ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
	crossorigin="anonymous"></script>
<script src="<?= base_url("asset/frontend/js/plugins.js") ?>"></script>
<script src="<?= base_url("asset/frontend/js/script.js") ?>"></script>
<script src="<?= base_url("asset/frontend/font-awesome/js/all.js") ?>"></script>
<script src="<?= base_url("asset/frontend/font-awesome/js/all.min.js") ?>"></script>

</body>

</html>