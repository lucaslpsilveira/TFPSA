<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <?php 
            $flag = true;
            if (isset($result->data_hora_inicio)){ 
                if($result->data_hora_inicio != null || $result->user_id != $_SESSION['user_id'] ){
                    $flag = false;
                }
            }

            if($flag){
        ?>
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
                <div class='row'>
                    <div class='col-md-6'><h1>Cadastro de Leilões</h1></div>
                    <div class='col-md-6'>
                        <a href="<?php echo base_url().'index.php/leilao/publicar/'.$idleilao; ?>" class="btn btn-success" style='float:right; margin-top: 20px;'>Publicar</a>
                    </div>
                </div>
            </div>

            <?php
                $label_style = array('class' => 'col-sm-3 col-form-label middle');
            ?>

            <?= form_open() ?>

                <div class="form-group row">
                        <?php 
                            echo form_label('Data e Hora Fim<span class="required">*</span>','data_fim',$label_style); 
                            $data = array(
                                'name'        => 'data_fim',
                                'id'          => 'data_fim',
                                'class'       => 'form-control',
                                'placeholder' => '2017-11-17 23:59:59',
                                'type'        => 'text',
                                'required'    => 'true',
                                'value'       => isset($result->data_hora_fim) ? $result->data_hora_fim : ''
                            );
                        ?>       
                        <div class="col-md-9">
                            <?= form_input($data)?>
                            <p class="help-block">Formato: 2017-11-17 23:59:59</p>
                        </div>                     
                    </div>

                <div class="form-group row">
                    <?php
                    echo form_label('Tipo de Leilão:', 'tipo', $label_style); 
                        
                    $options = array('1' => 'Demanda',
                                     '2' => 'Oferta');

                    ?>
                    <div class="col-md-9">       
                        <?= form_dropdown('tipo', $options, isset($result->tipo) ? $result->tipo : ' ','class="form-control"')?>
                    </div>                     
                </div> 

                <div class="form-group row">
                    <?php
                    echo form_label('Tipo de Lance:', 'tipo_lance', $label_style); 
                        
                    $options = array('1' => 'Aberto',
                                     '2' => 'Fechado');

                    ?>
                    <div class="col-md-9">       
                        <?= form_dropdown('tipo_lance', $options, isset($result->tipo_lance) ? $result->tipo_lance : ' ','class="form-control"')?>
                    </div>                     
                </div> 

                <div class="form-group row">
                        <?php 
                            echo form_label('Valor<span class="required">*</span>','valor',$label_style); 
                            $data = array(
                                'name'        => 'valor',
                                'id'          => 'valor',
                                'class'       => 'form-control',
                                'placeholder' => '99.99',
                                'type'        => 'text',
                                'required'    => 'true',
                                'value'       => isset($result->valor_minimo) ? $result->valor_minimo : ''
                            );
                        ?>       
                        <div class="col-md-9">
                            <?= form_input($data)?>
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

        <?php if($page == 'edit'){?>
                <h3>Lotes do Leilão:</h3>
                <div class="row">
                    <table class='table table-hover'>
                        <th>id</th><th>Nome</th><th>Ações</th>
                        <?php if($leilao_lote != null){ 
                                //var_dump($result);
                                foreach ($leilao_lote as $lei) {
                                    echo '<tr><td>'.$lei->id.'</td>
                                              <td>'.$lei->nome.'</td>                                
                                              <td><a href="'.base_url().'index.php/lote/rmlote/'.$lei->id.'/'.$idleilao.'" class="btn btn-xs btn-danger">Remover do leilao</a></td>
                                          </tr>';
                                }
                        }else{echo '<tr><td>Ainda não possui lotes</td></tr>';}?>
                    </table>
                </div>

                <h3>Adicionar Lote ao leilão:</h3>
                <div class="row">
                    <table class='table table-hover'>
                        <th>id</th><th>Nome</th><th>Ações</th>
                        <?php if($lote != null){ 
                                //var_dump($result);
                                foreach ($lote as $lei) {
                                    echo '<tr><td>'.$lei->id.'</td>
                                              <td>'.$lei->nome.'</td>                                
                                              <td><a href="'.base_url().'index.php/lote/addlote/'.$lei->id.'/'.$idleilao.'" class="btn btn-xs btn-success">Adicionar ao leilao</a></td>
                                          </tr>';
                                }
                        }else{echo '<tr><td>Não existem lotes disponiveis</td></tr>';}?>
                    </table>
                </div>
            <?php }?>

        <?php }else{ ?>
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    <h3>Este leilão ja foi publicado e não pode mais ser editado, ou não é um leilão vinculado ao seu usuario.</h3>
                </div>
            </div>
        <?php }?>
    </div><!-- .row -->
</div><!-- .container -->