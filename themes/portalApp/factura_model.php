<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Factura Nº <?=$sale->id?></title>
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
                <h3>Factura Comercial</h3>
 </div> 
 
    <div id="ficha">
    
    <div style="padding:24px;">
            <div id="foto" style="width:120px;padding-bottom:30px;" >
            </div>

            <div id="lateral">
        
         
        </div>
    </div><br>

    <div id="ficha">
    
    <div style="padding:24px; ">
           
            <div id="cabecalho1" style="line-height: 1.8em;">  
            <span style="font-size: 10pt;"><b>Cliente:</b> <?=$sale->costumer()->name?> | <b>Morada:</b> <?=$sale->costumer()->address?></span><br>
           
         <hr>
         <span style="font-size: 10pt;"><i>PRODUTO : <?=$sale->stock()->product?></i></span><br>
         <span> Preço: <b style="color:red;"><?=$sale->stock()->price?> kz</b> | Quantidade: <b style="color:red;"><?=$sale->qtd?></b>
         |   Troco: <b style="color:red;"><?=$sale->troco?> kz</b>
        </span>
<hr>
         </div>
         
        </div>
    </div>
    </div>
<div id="footer">

<span>Data: <?=date('d-m-Y')?></span>
</div>

</body>
</html>