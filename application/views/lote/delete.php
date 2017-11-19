<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if ($query->lote_id != null){ ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<h1>Este produto não pode ser deletado, pois está vinculado a um lote!</h1>
				</div>
			</div>
		<?php }else{ ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Cadastro de Categoria de produtos</h1>
			</div>

			<?php
                $label_style = array('class' => 'col-sm-3 col-form-label middle');
            ?>

			<?= form_open() ?>

				<div class="form-group row">
						<h1>Voce está prestes a deletar um produto!</h1>
                        <?php                   
                            echo form_label('Tem certeza? <span class="required">*</span>','confirma',$label_style); 
                            $options = array('N'  => 'Não','S' => 'Sim');
                        ?>       
                        <div class="col-md-9">
                            <?= form_dropdown('confirma', $options,'N','class="form-control" onchange="mudarCotacao(this)"')?>
                        </div>               
                    </div>
				<div class="form-group">
					<input type="submit" class="btn btn-danger" value="Deletar">
				</div>
			</form>
		</div>
		<?php } ?>
	</div><!-- .row -->
</div><!-- .container -->