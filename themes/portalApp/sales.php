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
        <h3 class="modal-title" id="exampleModalLabel" style="font-family:arial;">Nova Venda</h3>
     
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/venda/new"); ?>" method="post" enctype="multipart/form-data">  
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
            <label for="recipient-name" class="col-form-label">Valor Pago</label>
            <input type="number" class="form-control" name="value_p" id="value_p" style="width:90%;padding:10px;">
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
         
        
 
          <label  style="font-size: 16pt;">
          <span class="label label-inverse"  style="font-size: 12pt;">PREÇO: <hr>
          <input type="text" id="price_val"  name="price_val" value="00,00"
          style="border:none; width:90px; background:transparent;font-size:14pt;color:white;font-weight: bold;" >
       kz </span>
     
        <span class="label label-important"  style="font-size: 12pt;">VALOR A PAGAR: <hr>
          <input type="text" value="00,00" id="price_val_p" 
          style="border:none; width:90px; background:transparent;font-size:14pt;color:white;font-weight: bold;">
        kz</span>
        <span class="label label-success"  style="font-size: 12pt;">TROCO: <hr>
          <input type="text" value="00,00" id="troco" name="troco" 
          style="border:none; width:90px; background:transparent;font-size:14pt;color:white;font-weight: bold;" >
        kz</span>
  
   </label> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="save_sale">Salvar</button>
      </div> 
    
    </form>
    </div>
  </div>
</div>
                        
                        <a class="btn btn-large btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="icon-plus icon-white"></i> Nova Venda</a>
                      <a class="btn btn-large btn"><i class="icon-bookmark icon-white"></i> Nº de Vendas Hoje : <?=$sales_n?></a>
                    </p>
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Vendas Efectuadas</h4>
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
                               
                                <th class="hidden-phone">ID</th>
                                <th class="hidden-phone">Cliente</th>
                                <th class="hidden-phone">Produto</th>
                                <th class="hidden-phone">Preço</th>
                                <th class="hidden-phone">Quantidade</th>
                                <th class="hidden-phone">Data</th>
                                <th class="hidden-phone">Factura</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($sales)): foreach($sales as $sale):?>
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                <td><?=$sale->id?></td>
                                <td class="hidden-phone"><?=$sale->costumer()->name?></td>
                                <td class="hidden-phone"><?=$sale->stock()->product?></td>
                                <td class="center hidden-phone"><?=$sale->stock()->price?> kz</td>
                                <td class="center hidden-phone"><?=$sale->qtd?></td>
                                <td class="hidden-phone"><span class="label label-inverse"><?=$sale->created_at?></span></td>
                                <td class="hidden-phone"><a class="btn btn-default" target="_blank" href="<?=url("venda/factura/{$sale->id}")?>"><i class="icon-print"></i></a></td>
                            </tr>
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