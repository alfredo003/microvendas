<?php $v->layout("_theme"); ?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <label class="label label-inverse"> <h4 class="modal-title" style="font-family:Arial;">Novo Cliente</h4></label>
       
      </div>
    
       <div class="ajax_response"><?=flash();?></div>
      <div class="modal-body">
      <form  action="<?=url("/cliente/new"); ?>" method="post" enctype="multipart/form-data">  
        <?=csrf_input();?>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome</label>
            <input type="text" class="form-control" name="name" style="width:90%;padding:10px;">
          </div>

          <div class="form-group">
            <label for="recipient-mou" class="col-form-label">Nº Telefone</label>
            <input type="text" class="form-control" name="tel" style="width:90%;padding:10px;">
          </div>

          <div class="form-group">
            <label for="recipient-mor" class="col-form-label">Morada</label>
            <input type="text" class="form-control" name="address" style="width:90%;padding:10px;">
          </div>

          <div class="form-group">
            <label for="recipient-gender" class="col-form-label">Genero</label>
            <select class="form-control" name="gender" style="width:95%;padding:10px;height:50px;">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            </select>
          </div>
          
          <br> 
         
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="save_sale">Salvar</button>
      </div>   </form>
    </div>
  </div>
