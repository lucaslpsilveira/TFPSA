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
                            echo form_label('Nome Lote<span class="required">*</span>','nome',$label_style); 
                            $data = array(
                                'name'        => 'nome',
                                'id'          => 'nome',
                                'class'       => 'form-control',
                                'placeholder' => 'Nome do lote',
                                'type'        => 'text',
                                'required'    => 'true',
                                'value'       => isset($query->nome) ? $query->nome : ''
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

            <?php if($page == 'edit'){?>
                <h3>Produtos do Lote:</h3>
                <div class="row">
                    <table class='table table-hover'>
                        <th>id</th><th>Descrição</th><th>Categoria</th><th>Ações</th>
                        <?php if($produtos_lote != null){ 
                                //var_dump($result);
                                foreach ($produtos_lote as $prod) {
                                    echo '<tr><td>'.$prod->idproduto.'</td>
                                              <td>'.$prod->descricao_breve.'</td>
                                              <td>'.$prod->categoria.'</td>
                                              <td><a href="'.base_url().'index.php/produto/rmlote/'.$prod->idproduto.'/'.$idlote.'" class="btn btn-xs btn-danger">Remover do lote</a></td>
                                          </tr>';
                                }
                        }else{echo '<tr><td>Ainda não existem Produtos</td></tr>';}?>
                    </table>
                </div>

                <h3>Adicionar Produto ao Lote:</h3>
                <div class="row">
                    <table class='table table-hover'>
                        <th>id</th><th>Descrição</th><th>Categoria</th><th>Ações</th>
                        <?php if($produtos != null){ 
                                //var_dump($result);
                                foreach ($produtos as $prod) {
                                    echo '<tr><td>'.$prod->idproduto.'</td>
                                              <td>'.$prod->descricao_breve.'</td>
                                              <td>'.$prod->categoria.'</td>
                                              <td><a href="'.base_url().'index.php/produto/addlote/'.$prod->idproduto.'/'.$idlote.'" class="btn btn-xs btn-info">Adicionar ao lote</a></td>
                                          </tr>';
                                }
                        }else{echo '<tr><td>Ainda não existem Produtos</td></tr>';}?>
                    </table>
                </div>
            <?php }?>
        </div>
    </div><!-- .row -->
</div><!-- .container -->