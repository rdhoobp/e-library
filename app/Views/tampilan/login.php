<!DOCTYPE html>
<html lang="en">
<head>
	<title>BookSaw - Free Book Store HTML CSS Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/normalize.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("asset/icomoon/icomoon.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("asset/css/vendor.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("asset/style.css") ?>">
</head>
<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
	<div id="header-wrap">
		<header id="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<div class="main-logo">
							<a href="index.html"><img src="<?= base_url("asset/images/main-logo.png") ?>" alt="logo"></a>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div><!--header-wrap-->
<?= view('template/footer.php') ?>