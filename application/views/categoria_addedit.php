<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Cadastro de Categoria de produtos</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Enter a username">
					<p class="help-block">Informe ao menos 4 carcteres, somente numeros e letras</p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Cadastrar">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->