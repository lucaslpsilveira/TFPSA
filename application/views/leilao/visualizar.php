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
			<?php if ($result[0]->tipo == 2) { ?>
 			<p><h4><b>Valor Maximo a pagar:</b><h4></p>
 			<?php } ?>
		</div>
		<div class='col-md-9'>
			<h3>Formato leilão:</h3>
			<p><b>Tipo:</b> <?= ($result[0]->tipo == 1) ? 'Demanda' : 'Oferta' ?></p>
			<p><b>Lance:</b> <?= ($result[0]->tipo_lance == 1) ? 'Aberto' : 'Fechado' ?></p>
		</div>	
		<?php } ?>	
	</div><!-- .row -->
	<hr>
	<?php 
		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);		
	if ($result[0]->tipo_lance == 1 or $result[0]->data_hora_fim < $date['date']) { ?>
		<div class="row">
		<table class='table table-hover'>
			<th>id</th><th>Usuário</th><th>Hora Lance</th><th>Valor</th>
			<?php if($lance != null){ 
					//var_dump($result);
					foreach ($lance as $leilao) {
						echo '<tr><td>'.$leilao->id.'</td>
								  <td>'.$leilao->username.'</td>
								  <td>'.$leilao->data_hora.'</td>
								  <td>'.$leilao->valor.'</td>
							  </tr>';
					}
			}else{echo '<tr><td>Ainda não existem lances</td></tr>';}?>
		</table>
	</div>
	<?php } ?>
</div><!-- .container -->