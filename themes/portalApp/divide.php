<?php $v->layout("_theme"); ?>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Registrar Divida</h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/divida/new"); ?>" method="post" enctype="multipart/form-data">  
        <?=csrf_input();?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-control" name="costumer" style="width:95%;padding:10px;height:50px;">
            <option value="0">--Anonimo--</option>
            <?php if(!empty($costumers)):foreach($costumers as $costumer):?>
            <option value="<?=$costumer->id?>"><?=$costumer->name?></option>
            <?php endforeach; endif;?>
            </select>
          </div> 
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade</label>
            <input type="number" class="form-control" name="qtd" id="qtd" style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Produto</label>

            <select class="form-control" name="product" id="product" style="width:95%;padding:10px;height:50px;">
            <option value="0">----</option>
            <?php if(!empty($products)):foreach($products as $product):?>
            <option value="<?=$product->id?>"><?=$product->product?></option>
            <?php endforeach; endif;?>
            </select>
          </div>
         
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Data Limite</label>
            <input type="date" class="form-control" name="data_limit" style="width:90%;padding:10px;">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="save_sale">Salvar</button>
      </div> 
    
    </form>
    </div>
  </div>
</div>
                    


                        <a class="btn btn-large btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="icon-plus icon-white"></i> Nova Divida</a>
                
                    </p>
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget blue">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Dividas Efectuadas</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="ajax_response"><?=flash();?></div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                               
                                <th class="hidden-phone">ID</th>
                                <th class="hidden-phone">Cliente</th>
                                <th class="hidden-phone">Produto</th>
                                <th class="hidden-phone">Preço</th>
                                <th class="hidden-phone">Qantidade</th>
                                <th class="hidden-phone">Data</th>
                                <th class="hidden-phone">Data Limite</th>
                                <th class="hidden-phone">Config</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($divides)): foreach($divides as $divide):?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                <td><?=$divide->id?></td>
                                <td class="hidden-phone"><?=$divide->costumer()->name?></td>
                                <td class="hidden-phone"><?=$divide->stock()->product?></td>
                                <td class="center hidden-phone"><?=$divide->stock()->price?> kz</td>
                                <td class="center hidden-phone"><?=$divide->qtd?> </td>
                                <td class="hidden-phone"><span class="label label-inverse"><?=$divide->created_at?></span></td>
                                <td class="hidden-phone"><span class="label label-inverse"><?=$divide->data_limit?></span></td>
                                <td class="hidden-phone">
                                <?php if($divide->status == 1):?>
                                    <span class="label label-success">Divida Paga</span>
                                <?php else:?>
                                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal_<?=$divide->id?>" data-whatever="@mdo"><i class="icon-refresh icon-white"></i> PAGAR</button>
                               <button class="btn btn-danger" class="btn btn-info" data-toggle="modal" data-target="#removeModal_<?=$divide->id?>"><i class="icon-remove icon-white"></i> Cancelar</button>

                               <?php endif;?>  
                             </td>
                            </tr>

<div class="modal fade" id="exampleModal_<?=$divide->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Pagar Divida de <?=$divide->stock()->product?>  </h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/divida/pagar"); ?>" method="post" enctype="multipart/form-data">  
    
        Devedor:<?=$divide->costumer()->name?>
        <hr>
       Logo que efectuar o pagamento a divida sera registrada como uma venda normal.
       <hr>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Valor(kz)</label>
            <input type="text" class="form-control" style="width:90%;padding:10px;">
          </div>
          <input type="hidden" name="action" value="payment">
          <input type="hidden" name="id" value="<?=$divide->id?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" id="save_sale">Pagar</button>
      </div> 
    
    </form>
    </div>
  </div>
</div>


<div class="modal fade" id="removeModal_<?=$divide->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Cancelar Divida de <?=$divide->stock()->product?>  </h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/divida/delete"); ?>" method="post" enctype="multipart/form-data">  
      
        Devedor:<?=$divide->costumer()->name?>
        <hr>
       Logo que efectuar o cancelamento , a divida sera anulada.
       <hr>
       <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?=$divide->id?>">
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
             
  <script>
  
 var product =  document.querySelector("#product");
 var price =  document.querySelector("#price_val");
 var qtd =  document.querySelector("#qtd");
 var value_p =  document.querySelector("#value_p");
 var troco =  document.querySelector("#troco");
 var price_val_p =  document.querySelector("#price_val_p");
 product.addEventListener('change',()=>{
    $.ajax({
        url: '<?=url('venda/search_price')?>',
        type: 'POST',
        data: {
            qtd:qtd.value,
            id: product.value
        },
        beforeSend: function(params) {
            
        },
        success: function(data) {
          price.value=data;
          
            if(0>(value_p.value-price.value)){ 
               troco.value =000; 
            }else{
                troco.value = (value_p.value-price.value);
            }

          price_val_p.value = (price.value*qtd.value)
        },
        error: function(data) {
         
            console.log("Houve um erro");
        }
      });
 });
 
  </script>