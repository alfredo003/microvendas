<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=theme("img/micro_icon.png")?>" type="image/x-icon">
    <title>Lista de Clientes</title>
    <style>
    #top{
        width:450px;
        margin-left:100px;
        text-align: center;
padding: 20px;
    }
    #top h3{
        font-weight: bold;
        text-transform: uppercase;

    }
  #ficha{
      padding:20px;

  }
  #foto{
    margin-bottom: 30px;
      
  }
  #lateral{
      text-transform: uppercase;
      font-size: 9pt;
      width: 200px;
      text-align:right;
      margin-top: -150px;
      margin-left: auto;
  }
  #cabecalho{
      margin-top: 30px;
  }
  
  #footer{
    line-height: 1.8em;
      margin-top: 11px;
      margin-left: auto;
      text-align: center;
      width: 200px;
      font-size:10pt;
  }

  table{
      border:1px solid black;
      padding:50px;
  }
  
 table td{
      padding:10px;
     border-top:none;
     border-left:none;
  }
  
    </style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size:11pt;"> 
 <div id="top">
 <div id="logo">

         <br>
            </div>  
            <img src="tese.png" alt=""> <br>
             <?=$user->empresa?> <br>
           NIF:  <?=$user->nif?> <br>
                <h3>Lista de Clientes</h3>
 </div>
 
    <div id="ficha">
    
    <div style="padding:24px;">
    <table border="1">
                            <thead>
                            <tr style="border-bottom:1px solid black padding:50px;">
                               
                                <th>ID</th>
                                <th class="hidden-phone">Nome</th>
                                <th class="hidden-phone">Telefone</th>
                                <th class="hidden-phone">Morada</th>
                                <th class="hidden-phone">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($costumers)):foreach($costumers as $costumer):?>
                            <tr class="odd gradeX">
                                <td><?=$costumer->id?></td>
                                <td class="hidden-phone"><?=$costumer->name?></td>
                                <td class="hidden-phone"><?=$costumer->tel?></td>
                                <td class="center hidden-phone"><?=$costumer->address?></td>
                                <td class="center hidden-phone"><?=$costumer->created_at?></td>
                               
                            </tr>

                            <?php endforeach; endif;?>
                            </tbody>
                        </table>
    </div>
    <br>

   
<div id="footer">

<span>DATA : <?=date('d-m-Y')?></span>
</div>

</body>
</html>