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
                        
                        <a class="btn btn-large btn-primary" href="<?=url('/cliente/newC');?>"><i class="icon-plus icon-white"></i> Novo Cliente</a>
                      <a class="btn btn-large btn"><i class="icon-bookmark icon-white"></i> Nº de Clientes : <?=$costumers_n?></a>
                    </p>
                    <div class="ajax_response"><?=flash(); ?></div>
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Clientes</h4>
                            <span class="tools">
                                <a href="<?=url("cliente/print")?>" target="_bank" class="icon-print"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th>ID</th>
                                <th class="hidden-phone">Nome</th>
                                <th class="hidden-phone">Telefone</th>
                                <th class="hidden-phone">Morada</th>
                                <th class="hidden-phone">Data</th>
                                <th class="hidden-phone">Config</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($costumers)):foreach($costumers as $costumer):?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                <td><?=$costumer->id?></td>
                                <td class="hidden-phone"><?=$costumer->name?></td>
                                <td class="hidden-phone"><?=$costumer->tel?></td>
                                <td class="center hidden-phone"><?=$costumer->address?></td>
                                <td class="center hidden-phone"><?=$costumer->created_at?></td>
                                <td class="hidden-phone">
                                    <p >
                                       
                                  
                                    <button class="btn btn-info"  data-toggle="modal" data-target="#viewModal_<?=$costumer->id?>"> <i class="icon-external-link"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#removeModal_<?=$costumer->id?>"> <i class="icon-remove"></i></button>
                                       
                                    </p>
                                </td>
                            </tr>


                            <div class="modal fade" id="viewModal_<?=$costumer->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Editar Produto</h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/cliente/update"); ?>" method="post" enctype="multipart/form-data">  
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?=$costumer->id?>">
    <div class="form-group">
            <label  class="col-form-label">Nome</label>
            <input type="text" class="form-control" name="name" value="<?=$costumer->name?>" style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label class="col-form-label">Nº Telefone</label>
            <input type="text" class="form-control" name="tel" value="<?=$costumer->tel?>" style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label  class="col-form-label">Morada</label>
            <input type="text" class="form-control" name="address" value="<?=$costumer->address?>" style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label class="col-form-label">Genero</label>
            <select class="form-control" name="gender" style="width:95%;padding:10px;height:50px;">
            <option value="<?=$costumer->gender?>"><?=$costumer->gender?></option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
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


<div class="modal fade" id="removeModal_<?=$costumer->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;"><i class="icon-warning-sign"></i> Alerta</h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url('cliente/delete')?>" method="post" enctype="multipart/form-data">  
        Cliente : <?=$costumer->name?>
        <hr>
        Eliminar o Cliente do sistema.
       <hr>
       <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?=$costumer->id?>">
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
