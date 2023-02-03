<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Relatorio de Venda - (<?=date('d-m-Y')?>)</title>
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
      border:1px solid #000;

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
      padding:25px;

  }
  
 table td{
     width:70px;
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
                <h3>Relatório de Venda </h3>
 </div>
 
    <div id="ficha">
    
    <div style="padding:24px;">
        PRODUTOS: <?=$products_n?>  | CLIENTES : <?=$costumers_n?>  |  VENDAS:  <?=$sales?> | DIVIDAS : <?=$divides?>
<hr>





<b>Total Dividas:______</b>  |
<b>Total no Caixa:______</b>  |
<b>Total Lucro:______</b>
<br>
<hr>
</div>
</div>
    </div>
    <br> 
    <table border="1">
                            <thead>
                            <tr>
                               
                           
                                <th>Codigo Produto</th>
                                <th>Produto</th>
                                <th class="hidden-phone">Preço</th>
                                <th class="hidden-phone">Quantidade</th>
                                <th class="hidden-phone">Nº Vendas</th>
                                <th class="hidden-phone">Estado</th>
                                <th class="hidden-phone">Data Cad</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php if(!empty($products)): foreach($products as $product):?>
                            <tr class="odd gradeX">

                             
                                <td><?=$product->cod_product?></td>
                                <td class="hidden-phone"><?=$product->product?></td>
                                <td class="hidden-phone"><?=$product->price?></td>
                                <td class="center hidden-phone"><?=$product->qtd?></td>
                                <td class="hidden-phone"><?=$product->n_vendas?></td>
                                <td class="hidden-phone"><?=$product->status?></td>
                                <td class="hidden-phone"><?=$product->created_at?></td>
                            </tr>
                            <?php endforeach;endif;?>
                            </tbody>
                        </table>

    
<hr>
<div id="footer">

<span>Data:<?=date('d-m-Y')?></span>
</div>

</body>
</html>