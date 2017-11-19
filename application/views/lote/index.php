<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class='row'>
		<div class='col-md-6'>
			<h1>Lotes</h1>
		</div>
		<div class='col-md-6'>
				<a href="<?php echo base_url(); ?>index.php/lote/add" class="btn btn-success" style='float:right; margin-top: 20px;'>Adicionar</a>
		</div>
	<div class="row">
		<table class='table table-hover'>
			<th>id</th><th>Nome</th><th>Ações</th>
			<?php if($result != null){ 
					//var_dump($result);
					foreach ($result as $lote) {
						echo '<tr><td>'.$lote->id.'</td>
								  <td>'.$lote->nome.'</td>
								  <td><a href="'.base_url().'index.php/lote/edit/'.$lote->id.'" class="btn btn-xs btn-info">Editar</a> <a href="'.base_url().'index.php/lote/delete/'.$lote->id.'" class="btn btn-xs btn-danger">Deletar</a></td>
							  </tr>';
					}
			}else{echo '<tr><td>Ainda não existem Lotes</td></tr>';}?>
		</table>
	</div><!-- .row -->
</div><!-- .container -->