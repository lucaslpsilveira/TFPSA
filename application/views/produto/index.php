<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class='row'>
		<div class='col-md-6'>
			<h1>Produtos</h1>
		</div>
		<div class='col-md-6'>
				<a href="<?php echo base_url(); ?>index.php/produto/add" class="btn btn-success" style='float:right; margin-top: 20px;'>Adicionar</a>
		</div>
	<div class="row">
		<table class='table table-hover'>
			<th>id</th><th>Descrição</th><th>Categoria</th><th>Ações</th>
			<?php if($result != null){ 
					//var_dump($result);
					foreach ($result as $prod) {
						echo '<tr><td>'.$prod->idproduto.'</td>
								  <td>'.$prod->descricao_breve.'</td>
								  <td>'.$prod->categoria.'</td>
								  <td><a href="'.base_url().'index.php/produto/edit/'.$prod->idproduto.'" class="btn btn-xs btn-info">Editar</a> <a href="'.base_url().'index.php/produto/delete/'.$prod->idproduto.'" class="btn btn-xs btn-danger">Deletar</a></td>
							  </tr>';
					}
			}else{echo '<tr><td>Ainda não existem Produtos</td></tr>';}?>
		</table>
	</div><!-- .row -->
</div><!-- .container -->