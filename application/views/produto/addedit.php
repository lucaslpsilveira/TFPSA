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
				<h1>Cadastro de produtos</h1>
			</div>

			<?php
                $label_style = array('class' => 'col-sm-3 col-form-label middle');
            ?>

			<?= form_open() ?>

				<div class="form-group row">
                    <?php 
                        echo form_label('Descrição Breve<span class="required">*</span>','desc_breve',$label_style); 
                        $data = array(
                            'name'        => 'desc_breve',
                            'id'          => 'desc_breve',
                            'class'       => 'form-control',
                            'placeholder' => 'Descrição do Produto',
                            'type'        => 'text',
                            'required'    => 'true',
                            'value'       => isset($query->descricao_breve) ? $query->descricao_breve : ''
                        );
                    ?>       
                    <div class="col-md-9">
                        <?= form_input($data)?>
                        <p class="help-block">Informe ao menos 4 carcteres</p>
                    </div>                     
                </div>
                <div class="form-group row">
                    <?php 
                        echo form_label('Descrição Completa<span class="required">*</span>','desc_comp',$label_style); 
                        $data = array(
                            'name'        => 'desc_comp',
                            'id'          => 'desc_comp',
                            'class'       => 'form-control',
                            'placeholder' => 'Descrição do Produto',
                            'type'        => 'text',
                            'required'    => 'true',
                            'value'       => isset($query->descricao_completa) ? $query->descricao_completa : ''
                        );
                    ?>       
                    <div class="col-md-9">
                        <?= form_textarea($data) ?>
                    </div>                     
                </div>
             
                <div class="form-group row">
                    <?php
                    echo form_label('Categoria', 'id_categoria', $label_style); 
                        
                    $options = array();

                    foreach ($result_categoria as $rct) {
                        $options[$rct->id] = $rct->nome;
                    }

                    ?>
                    <div class="col-md-9">       
                    	<?= form_dropdown('id_categoria', $options, isset($result->produto_categoria_id) ? $result->produto_categoria_id : ' ','class="form-control"')?>
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