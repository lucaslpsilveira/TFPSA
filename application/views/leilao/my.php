<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class='row'>
		<?php if($logar != 'logado') {?>
		<div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <h3><?= $logar ?></h3>
            </div>
        </div>
        <?php } ?>

		<div class='col-md-6'>
			<h1>Meus Leilões</h1>
		</div>
		<div class='col-md-6'>
				<a href="<?php echo base_url(); ?>index.php/leilao/add" class="btn btn-success" style='float:right; margin-top: 20px;'>Adicionar</a>
		</div>
<div class="row"></div>	

	<div class="row">
		<h3> Em andamento </h3>
		<table class='table table-hover'>
			<th>id</th><th>Fim</th><th>Ações</th>
			<?php if($result != null){ 
					//var_dump($result);
					foreach ($result as $leilao) {
						echo '<tr><td>'.$leilao->id.'</td>
								  <td>'.$leilao->data_hora_fim.'</td>
								  <td><a href="'.base_url().'index.php/leilao/detalhes/'.$leilao->id.'" class="btn btn-xs btn-success">Visualizar</a></td>
							  </tr>';
					}
			}else{echo '<tr><td>Ainda não existem leiloes</td></tr>';}?>
		</table>
	</div><!-- .row -->
	<div class="row">
		<h3> Não Publicados </h3>
		<table class='table table-hover'>
			<th>id</th><th>Fim</th><th>Ações</th>
			<?php if($result2 != null){ 
					//var_dump($result);
					foreach ($result2 as $leilao) {
						echo '<tr><td>'.$leilao->id.'</td>
								  <td>'.$leilao->data_hora_fim.'</td>
								  <td><a href="'.base_url().'index.php/leilao/edit/'.$leilao->id.'" class="btn btn-xs btn-info">Editar</a> <a href="'.base_url().'index.php/leilao/delete/'.$leilao->id.'" class="btn btn-xs btn-danger">Deletar</a></td>
							  </tr>';
					}
			}else{echo '<tr><td>Ainda não existem leiloes</td></tr>';}?>
		</table>
	</div><!-- .row -->
	<div class="row">
		<h3> Finalizados </h3>
		<table class='table table-hover'>
			<th>id</th><th>Fim</th><th>Ações</th>
			<?php if($result3 != null){ 
					//var_dump($result);
					foreach ($result3 as $leilao) {
						echo '<tr><td>'.$leilao->id.'</td>
								  <td>'.$leilao->data_hora_fim.'</td>
								  <td><a href="'.base_url().'index.php/leilao/detalhes/'.$leilao->id.'" class="btn btn-xs btn-success">Visualizar</a></td>
							  </tr>';
					}
			}else{echo '<tr><td>Ainda não existem leiloes</td></tr>';}?>
		</table>
	</div><!-- .row -->
</div><!-- .container -->