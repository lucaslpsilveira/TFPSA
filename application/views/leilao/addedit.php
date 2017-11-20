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
                <h1>Cadastro de Lotes</h1>
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
                                'value'       => isset($query->data_hora_fim) ? $query->data_hora_fim : ''
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