<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=$head;?>
  <link rel="shortcut icon" href="<?=theme("img/micro_icon.png")?>" type="image/x-icon">
<link href="<?=theme('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet" />

<link href="<?=theme("assets/style.css")?>" rel="stylesheet">
<link href="<?=theme("assets/style_login.css")?>" rel="stylesheet">
</head>
<body> 

    <div class="container">
      
    
        <form id="form" class="form" action="<?=url("/entrar"); ?>" method="post" enctype="multipart/form-data">
        
      
        <div class="header">
            <h2><img src="<?=theme("img/logo.png")?>" style="width: 250px;"/></h2>
          </div>
          
          <?=csrf_input();?>


      <div class="form-control">
          <label>Codigo Acesso</label>
          <input type="number" name="codaccess" id="codAccess" placeholder="--------">
          <i class=" icon icon-home"></i>
          <i class="glyphicon glyphicon-exclamation-sign"></i>
            <small>Erro ao preencher</small>
      </div>
      <div class="form-control">
        <label>Palavra-passe</label>
        <input type="password" name="password" id="password" placeholder="">
        <i class="icon icon-check"></i>
        <i class="glyphicon glyphicon-exclamation-sign"></i>
          <small>Erro ao preencher</small>
    </div>
<button type="submit">INICIAR CONTA <i class="icon-signin"></i></button>

<div class="ajax_response"><?=flash(); ?></div>
        </form>
    </div>
    
   <script src="<?=theme('assets/scripts.js')?>"></script>
</body>
</html>