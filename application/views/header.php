<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leilão PSA</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<header id="site-header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= base_url() ?>">Leilão PSA</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
							<li><a href="<?= base_url()?>index.php/user/logout">Logout</a></li>
						<?php else : ?>
							<li><a href="<?= base_url()?>index.php/user/register">Register</a></li>
							<li><a href="<?= base_url()?>index.php/user/login">Login</a></li>
						<?php endif; ?>
					</ul>
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<main id="site-content" role="main">
		
	
		
	<div class='row' style='margin: 20px 20px 20px 20px'>
		<div class='col-md-2'>
			<nav class="nav-sidebar">
				<ul class="nav tabs">
					<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
						<?php if ($_SESSION['username'] == 'admin') : ?>
						<li><a href='<?=base_url();?>index.php/produto_categoria'>Categorias</a></li>
						<?php endif?>
						<li><a href='<?=base_url();?>index.php/produto'>Produtos</a></li>
						<li><a href='<?=base_url();?>index.php/lote'>Lotes</a></li>
						<li><a href='<?=base_url();?>index.php/leilao/meus_leiloes'>Meus Leilões</a></li>
					<?php endif; ?>
					<li><a href='<?=base_url();?>index.php/leilao'>Leilões</a></li>
				</ul>
			</nav>
		</div>
		<div class='col-md-10'>
