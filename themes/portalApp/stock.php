<?php $v->layout("_theme")?>

  <!-- BEGIN PAGE CONTAINER-->
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


                        
                        <a class="btn btn-large btn-success" href="<?=url('stock/newC')?>"><i class="icon-plus icon-white"></i> Entrada de Produto</a>
                      <a class="btn btn-large btn"><i class="icon-bookmark icon-white"></i> Nº Produtos Stock : <?=$products_n?></a>
                        </p>  <div class="ajax_response"><?=flash();?></div>
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Stock</h4>
                            <span class="tools">
                                <a href="" class="icon-print"></a>
                            </span>
                    </div>
                  
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                               
                                <th class="hidden-phone">ID</th>
                                <th class="hidden-phone">Produto</th>
                                <th class="hidden-phone">Preço</th>
                                <th class="hidden-phone">Quantidade</th>
                                <th class="hidden-phone">Estado</th>
                                <th class="hidden-phone">Data</th>
                                
                                <th class="hidden-phone">Config</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($products)):foreach($products as $product):?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                <td><?=$product->id?></td>
                                <td class="hidden-phone"><?=$product->product?></td>
                                <td class="center hidden-phone"><?=$product->price?></td>
                                <td class="center hidden-phone"><?=$product->qtd?></td>
                                <td class="hidden-phone">
                                    <?php if($product->status=='Activo'):?>
                                    <span class="label label-success"><?=$product->status?></span>
                                    <?php elseif($product->status=='Esgotado'):?>
                                        <span class="label label-important"><?=$product->status?></span>
                                        <?php elseif($product->status=='Bloqueado'):?>
                                        <span class="label label-default"><?=$product->status?></span>
                                        <?php endif;?>
                                </td>
                                <td class="center hidden-phone"><?=$product->created_at?></td>
                                <td class="hidden-phone">
                                    <p>
                                   
                                       
                                        <button class="btn btn-info"  data-toggle="modal" data-target="#viewModal_<?=$product->id?>"> <i class="icon-external-link"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#removeModal_<?=$product->id?>"> <i class="icon-remove"></i></button>
                                       
                                    </p>
                                </td>
                            </tr>

<div class="modal fade" id="viewModal_<?=$product->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Editar Produto</h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/stock/update"); ?>" method="post" enctype="multipart/form-data">  
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?=$product->id?>">
        <div class="form-group">
                <label for="recipient-name" class="col-form-label">Codigo Produto</label>
                <input type="text" class="form-control"  name="cod_product" value="<?=$product->cod_product?>" style="width:90%;padding:10px;">
              </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Produto</label>
            <input type="text" class="form-control" name="product" value="<?=$product->product?>"  style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Preço Unitário</label>
            <input type="number" class="form-control" name="price" value="<?=$product->price?>"  style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade</label>
            <input type="number" class="form-control" name="qtd" value="<?=$product->qtd?>"  style="width:90%;padding:10px;">
          </div>
       
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado</label>
            <select class="form-control" name="status"  style="width:95%;padding:10px;height:50px;">
            <option value="<?=$product->status?>"><?=$product->status?></option>
            <option value="Activo">Activo</option>
            <option value="Bloqueado">Bloqueado</option>
        </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" id="save_sale">Actualizar</button>
      </div> 
    
    </form>
    </div>
  </div>
</div>


<div class="modal fade" id="removeModal_<?=$product->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Eliminar produto no stock  </h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url('stock/delete')?>" method="post" enctype="multipart/form-data">  
        Produto : <?=$product->product?>
        <hr>
        Eliminar o produto do sistemo.
       <hr>
       <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?=$product->id?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" id="save_sale">Eliminar</button>
      </div> 
    
    </form>
    </div>
  </div>
</div>
                            <?php endforeach; endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>
          </div>

            <!-- END PAGE CONTENT-->         
         </div>