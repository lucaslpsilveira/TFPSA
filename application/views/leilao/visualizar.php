<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<?php if($logar != 'logado') {?>
		<div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <h3><?= $logar ?></h3>
            </div>
        </div>
        <?php } ?>

	<div class='row'>
		<h1>Leilão </h1>
	</div>
	<hr>
	<div class='row'>
		<?php if($result != null){ ?>
			<div class='col-md-3'>
			<h3>Dados:</h3>
			<p><b>Usuário:</b> <?=$result[0]->usuario?></p> 
			<p><b>Produtos:</b></p>
					<ul>                        
        <?php  foreach ($result as $row) {?>
						<li><?=$row->descricao_breve?></li>
		<?php } ?>
					</ul>
			<p><h4><b>Valor:</b><h4></p>
		</div>
		<div class='col-md-9'>
			<h3>Formato leilão:</h3>
			<p><b>Tipo:</b> <?= ($result[0]->tipo == 1) ? 'Demanda' : 'Oferta' ?></p>
			<p><b>Lance:</b> <?= ($result[0]->tipo == 1) ? 'Aberto' : 'Fechado' ?></p>
		</div>	
		<?php } ?>	
	</div><!-- .row -->
	<hr>
</div><!-- .container -->