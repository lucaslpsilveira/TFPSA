<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class='row'>
		<div class='col-md-6'>
			<h1>Produtos Categoria</h1>
		</div>
		<div class='col-md-6'>
				<a href="<?php echo base_url(); ?>index.php/produto_categoria/add" class="btn btn-success" style='float:right; margin-top: 20px;'>Adicionar</a>
		</div>
	<div class="row">
		<table class='table table-hover'>
			<th>id</th><th>nome</th><th>Ações</th>
			<?php if($result != null){ 
					foreach ($result as $cat) {
						echo '<tr><td>'.$cat->id.'</td><td>'.$cat->nome.'<td><a href="'.base_url().'index.php/produto_categoria/edit/'.$cat->id.'" class="btn btn-xs btn-info">Editar</a> <a href="'.base_url().'index.php/produto_categoria/delete/'.$cat->id.'" class="btn btn-xs btn-danger">Deletar</a></td></tr>';
					}
			}else{echo '<tr><td>Ainda não existem Categorias</td></tr>';}?>
		</table>
	</div><!-- .row -->
</div><!-- .container -->