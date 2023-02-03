<?php $v->layout("_theme")?>

<div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                 
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                 
                   </h3>
            
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
          

            <div class="row-fluid">
                <div class="span12">
                    <p>


             <a class="btn btn-large btn"><i class="icon-bookmark icon-white"></i> Nº de Produto : <?=$products_n?></a>
             <a class="btn btn-large btn"><i class="icon-bookmark-empty icon-white"></i> Produto Vendindo :<?=$products_v?></a>
             <a class="btn btn-large btn-primary"><i class="icon-print icon-white"></i> Imprimir</a>
                    </p>
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> LISTA DE PRODUTO</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th>ID</th>
                                <th>Produto</th>
                                <th class="hidden-phone">Preço</th>
                                <th class="hidden-phone">Quantidade</th>
                                <th class="hidden-phone">Nº Vendas</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($products)): foreach($products as $product):?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                <td><?=$product->id?></td>
                                <td class="hidden-phone"><?=$product->product?></td>
                                <td class="hidden-phone"><?=$product->price?></td>
                                <td class="center hidden-phone"><?=$product->qtd?></td>
                                <td class="hidden-phone"><?=$product->n_vendas?></td>
                           
                            </tr>
                            <?php endforeach;endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>
          </div>