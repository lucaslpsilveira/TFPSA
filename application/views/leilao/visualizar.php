<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<?php
		$now = new DateTime('America/Sao_Paulo');
		$date = get_object_vars($now);	
	 if($logar != 'logado') {?>
		<div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <h3><?= $logar ?></h3>
            </div>
        </div>
        <?php } ?>

         <?php if (validation_errors()) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            </div>
        <?php endif; ?>

	<div class='row'>
		<h1>Leilão <?=$result[0]->idleilao?></h1>
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
 			<p><h4><b>Valor Maximo a pagar: <?=$result[0]->valor_minimo?></b><h4></p>
 			<?php } ?>
		</div>
		<div class='col-md-3'>
			<h3>Formato leilão:</h3>
			<p><b>Tipo:</b> <?= ($result[0]->tipo == 1) ? 'Demanda' : 'Oferta' ?></p>
			<p><b>Lance:</b> <?= ($result[0]->tipo_lance == 1) ? 'Aberto' : 'Fechado' ?></p>
		</div>	
		<div class='col-md-6'>
		   <?php 
		    	if ($result[0]->data_hora_fim < $date['date']){
		    ?>
		    	<h3>Vencedor:</h3>	
		    	<h2><?= $lance[0]->username ?></h2>
		    <?php }?>
		</div>
		<?php } ?>	
	</div><!-- .row -->
	<hr>
	<?php
        $label_style = array('class' => 'col-sm-2 col-form-label middle');
    ?>
    <?php 
    	if ($result[0]->data_hora_fim > $date['date']){
    ?>
	<div class="row">
		<?= form_open('lance/add/'.$result[0]->idleilao) ?>
                <div class="form-group row">
                        <?php 
                            echo form_label('Valor Lance:<span class="required">*</span>','lance',$label_style); 
                            $data = array(
                                'name'        => 'lance',
                                'id'          => 'lance',
                                'class'       => 'form-control',
                                'placeholder' => '99',
                                'type'        => 'text',
                                'required'    => 'true',
                                'value'       => ''
                            );
                        ?>       
                        <div class="col-md-4">
                            <?= form_input($data)?>                         
                        </div>
                        <div class='col-md-6'>                    
                        	<input type="submit" class="btn btn-success" value="Dar Lance">
                        </div>                     
                    </div>            
                </div>
            </form>
	</div>
	<?php } ?>

	<?php 	
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