<?php $v->layout("_theme"); ?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <label class="label label-primary"> <h4 class="modal-title"style="font-family:Arial;">Novo Produto no Stock</h4></label>
      
      </div>
      <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
        <form  action="<?=url("/stock/new"); ?>" method="post" enctype="multipart/form-data">
        <?=csrf_input();?>
        <div class="form-group">
                <label for="recipient-name" class="col-form-label">Codigo Produto ou Codigo de Barra</label>
                <input type="text" class="form-control"  name="cod_product" style="width:90%;padding:10px;">
              </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Produto</label>
            <input type="text" class="form-control" name="product" style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Preço Unitário</label>
            <input type="number" class="form-control" name="price" style="width:90%;padding:10px;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Quantidade</label>
            <input type="number" class="form-control" name="qtd" style="width:90%;padding:10px;">
          </div>
         
          <br>
        
      
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="save_sale">Registrar</button>
      </div>  </form>
    </div>
  </div>
