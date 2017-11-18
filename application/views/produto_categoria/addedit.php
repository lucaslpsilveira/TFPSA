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

			<?php
                $label_style = array('class' => 'col-sm-3 col-form-label middle');
            ?>

			<?= form_open() ?>

				<div class="form-group row">
                        <?php 
                            echo form_label('Nome Categoria<span class="required">*</span>','nome',$label_style); 
                            $data = array(
                                'name'        => 'nome',
                                'id'          => 'nome',
                                'class'       => 'form-control',
                                'placeholder' => 'Nome da Categoria',
                                'type'        => 'text',
                                'required'    => 'true',
                                'value'       => isset($query->nome) ? $query->nome : ''
                            );
                        ?>       
                        <div class="col-md-9">
                            <?= form_input($data)?>
                            <p class="help-block">Informe ao menos 4 carcteres</p>
                        </div>                     
                    </div>
				<div class="form-group">
					<?php if($page == 'add'){?>
						<input type="submit" class="btn btn-success" value="Cadastrar">
					<?php }else{ ?>
						<input type="submit" class="btn btn-success" value="Editar">
					<?php }?>
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->