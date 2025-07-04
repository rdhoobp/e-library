<?= view('template/header.php') ?>

<section id="billboard">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<button class="prev slick-arrow">
					<i class="icon icon-arrow-left"></i>
				</button>

				<div class="main-slider pattern-overlay">
					<?php foreach ($book as $book): ?>
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title"><?= $book['title'] ?></h2>
								<div class="btn-wrap">
									<a href="<?= base_url('book/detail/' . $book['book_id']) ?>" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="<?= base_url("asset/img/book_cover/" . $book['cover']) ?>" alt="banner" class="banner-image">
						</div><!--slider-item-->
					<?php endforeach; ?>
				</div><!--slider-->

				<button class="next slick-arrow">
					<i class="icon icon-arrow-right"></i>
				</button>

			</div>
		</div>
	</div>
</section>

<section id="popular-books" class="bookshelf py-5 my-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="section-header align-center">
					<div class="title">
						<span>Some quality items</span>
					</div>
					<h2 class="section-title">Popular Books</h2>
				</div>

				<div class="tab-content">
					<div id="all-genre" data-tab-content class="active">
						<div class="row">
							<?php foreach ($book_genres as $item): ?>
								<div class="col-md-3 mb-4">
									<div class="product-item">
										<figure class="product-style">
											<img src="<?= base_url('asset/img/book_cover/' . $item['cover']) ?>" alt="<?= esc($item['title']) ?>" class="product-item">
											<a href="<?= base_url('book/detail/' . $item['book_id']) ?>">
												<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Read</button>
											</a>
										</figure>
										<figcaption>
											<h3><?= esc($item['title']) ?></h3>
											<span><?= esc($item['author']) ?></span>
										</figcaption>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

			</div><!--inner-tabs-->

		</div>
	</div>
</section>

<section id="best-selling" class="leaf-pattern-overlay">
	<div class="corner-pattern-overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<figure class="products-thumb">
							<img src="<?= base_url('asset/img/book_cover/' . $best_selling['cover']) ?>" alt="<?= esc($best_selling['title']) ?>" class="single-image">
						</figure>
					</div>

					<div class="col-md-6">
						<div class="product-entry">
							<h2 class="section-title divider">Number 1 Book</h2>
							<div class="products-content">
								<div class="author-name">By <?= esc($best_selling['author']) ?></div>
								<h3 class="item-title"><?= esc($best_selling['title']) ?></h3>
								<p><?= esc(substr($best_selling['deskripsi'], 0, 100)) ?>...</p>
								<div class="item-price">Viewed <?= $best_selling['hit_counter'] ?> times</div>
								<div class="btn-wrap">
									<a href="<?= base_url('book/detail/' . $best_selling['book_id']) ?>" class="btn btn-outline-accent btn-accent-arrow">Read it now <i class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- / row -->
			</div>
		</div>
	</div>
</section>

<section id="featured-books" class="py-5 my-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="section-header align-center">
					<div class="title">
						<span>Some quality items</span>
					</div>
					<h2 class="section-title">Featured Books</h2>
				</div>

				<div class="product-list" data-aos="fade-up">
					<div class="row">

						<?php foreach ($book_in_general as $book) : ?>
							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="<?= base_url('asset/img/book_cover/' . $book['cover']) ?>" alt="<?= esc($book['title']) ?>" class="product-item">
										<button type="button" class="add-to-cart">Add to Cart</button>
									</figure>
									<figcaption>
										<h3><?= esc($book['title']) ?></h3>
										<span><?= esc($book['author']) ?></span>
									</figcaption>
								</div>
							</div>
						<?php endforeach; ?>


					</div><!--ft-books-slider-->
				</div><!--grid-->


			</div><!--inner-content-->
		</div>
	</div>
</section>
<?php foreach ($quotes as $quote): ?>
	<?php if ($quote['active'] == 1): ?>
		<section id="quotation" class="align-center pb-5 mb-5">
			<div class="inner-content">
				<h2 class="section-title divider">Quote of the day</h2>
				<blockquote data-aos="fade-up">
					<q><?= esc($quote['quote']) ?></q>
					<div class="author-name"><?= esc($quote['author']) ?></div>
				</blockquote>
			</div>
		</section>
	<?php endif; ?>
<?php endforeach; ?>
<section id="special-offer" class="bookshelf pb-5 mb-5">

	<div class="section-header align-center">
		<div class="title">
			<span>Grab your opportunity</span>
		</div>
		<h2 class="section-title">Books with offer</h2>
	</div>

	<div class="container">
		<div class="row">
			<div class="inner-content">
				<div class="product-list" data-aos="fade-up">
					<div class="grid product-grid">
						<div class="product-item">
							<figure class="product-style">
								<img src="images/product-item5.jpg" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
									Cart</button>
							</figure>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<span>Armor Ramsey</span>
								<div class="item-price">
									<span class="prev-price">$ 50.00</span>$ 40.00
								</div>
						</div>
						</figcaption>

						<div class="product-item">
							<figure class="product-style">
								<img src="images/product-item6.jpg" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
									Cart</button>
							</figure>
							<figcaption>
								<h3>Great travel at desert</h3>
								<span>Sanchit Howdy</span>
								<div class="item-price">
									<span class="prev-price">$ 30.00</span>$ 38.00
								</div>
						</div>
						</figcaption>

						<div class="product-item">
							<figure class="product-style">
								<img src="images/product-item7.jpg" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
									Cart</button>
							</figure>
							<figcaption>
								<h3>The lady beauty Scarlett</h3>
								<span>Arthur Doyle</span>
								<div class="item-price">
									<span class="prev-price">$ 35.00</span>$ 45.00
								</div>
						</div>
						</figcaption>

						<div class="product-item">
							<figure class="product-style">
								<img src="images/product-item8.jpg" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
									Cart</button>
							</figure>
							<figcaption>
								<h3>Once upon a time</h3>
								<span>Klien Marry</span>
								<div class="item-price">
									<span class="prev-price">$ 25.00</span>$ 35.00
								</div>
						</div>
						</figcaption>

						<div class="product-item">
							<figure class="product-style">
								<img src="images/product-item2.jpg" alt="Books" class="product-item">
								<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
									Cart</button>
							</figure>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<span>Armor Ramsey</span>
								<div class="item-price">$ 40.00</div>
							</figcaption>
						</div>
					</div><!--grid-->
				</div>
			</div><!--inner-content-->
		</div>
	</div>
</section>

<section id="subscribe">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-md-8">
				<div class="row">

					<div class="col-md-6">

						<div class="title-element">
							<h2 class="section-title divider">Thanks For Choosing Us!</h2>
						</div>

					</div>
					<div class="col-md-6">

						<div class="subscribe-content" data-aos="fade-up">
							<p>So much pleasure by coming to us while reading an e-book, we always provide everyone who's love reading!</p>
							<form id="form">
								<input type="text" name="email" placeholder="Enter your email addresss here">
								<button class="btn-subscribe">
									<span>send</span>
									<i class="icon icon-send"></i>
								</button>
							</form>
						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
</section>

<?= view('template/footer.php') ?>