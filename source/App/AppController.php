<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Costumer;
use Source\Models\Stock;
use Source\Models\Sale;
use Source\Models\Divide;
use Source\Models\Box;
use Source\Models\Auth;
use Source\Support\Message;
use Source\Models\User;

/**
 * Web Controller
 * @package Source\App
 */
class AppController extends Controller
{
        /** @var User */
        private $user;
 
    /**
     * Web constructor.
     */
    public function __construct()
    {
        if (!$this->user = Auth::user()) {
            redirect("/entrar");
        }
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

                                                                                                                                                                                                                             
    }

    /**
     * SITE HOME
     */
    public function home(): void
    {
       

        $head = $this->seo->render(
            CONF_SITE_NAME . " - ( Bem-Vindo {$this->user->username})" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head,  
            "active" =>"home",
            "user" =>$this->user,
        ]);
    }

    public function searchPrice(array $data): void
    {

        $id=$_POST['id'];
        $qtd=$_POST['qtd'];
        if($id == 0){
            echo "00,00";
        }else{
             $n = (new Stock())->find("id =:id","id={$id}")->fetch();
        echo $n->price;
        }
       

        }

    public function sales(?array $data): void
    {
          
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, Porfavor use o formulário")->render();
                echo json_encode($json);
                return;
            }
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Preencha todos os campos para registrar vendas !")->render();
                echo json_encode($json);
                return;
            }

            $sale = (new Sale());
            $sale->costumer = $data["costumer"];
            $sale->product = $data["product"];
            $sale->price = $data["price_val"] ;
            $sale->qtd = $data["qtd"];
            $sale->troco =$data["troco"];
            $sale->valorP =$data["value_p"];
            $sale->date_at=date("Y-m-d");
            $sale->id_user = $this->user->id;

            $valor=$sale->price*$sale->qtd;
            if($valor>$sale->valorP){
                $json['message'] = $this->message->error("Verifique o valor a ser pago")->render();
                 echo json_encode($json);
                 return;
            }
            if($sale->save()){

                $stock = (new Stock())->findById($sale->product);
                
                if($stock->qtd==0){
                   $stock->status ="Esgotado";
                   $stock->save();
                }else{
                    $stock->qtd-=$sale->qtd;
                    $stock->n_vendas+=1;
                    $stock->save();
                }
                
           $json['message'] = $this->message->success("Venda registrada com sucesso")->render();
            $json['redirect'] = url("/venda");
             echo json_encode($json);
             return;
        }else{
            $json['message'] = $this->message->error("Erro ao enviar as informaçoes.")->render();
            echo json_encode($json);
            return;
            }
        }
       


       $date = date("Y-m-d");
           $products = (new Stock())->find("status =:s","s=Activo");
           $costumers = (new Costumer())->find("status =:s","s=Activo");
           $sales = (new Sale())->find("date_at =:d","d={$date}");
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Nova Venda" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("sales", [
            "head" => $head,  
            "active" =>"home",
            "products" =>$products->fetch(true),
            "costumers"=>$costumers->fetch(true),
            "sales"=>$sales->order("created_at DESC")->fetch(true),
            "sales_n"=>$sales->count(),
            "user" =>$this->user,
        ]);
    }


    public function salesFactura(array $data): void
    {
       $id=$data['id'];
       $sale = (new Sale())->findById($id);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - ( Bem-Vindo {$this->user->username})" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("factura", [
            "head" => $head,  
            "active" =>"home",
            "sale"=>$sale,
            "user" =>$this->user,
        ]);
    }
    public function stockCad(?array $data): void
    {
        $products = (new Stock())->find("id_user =:id AND status !=:s","id={$this->user->id}&s=deleted");
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Stock" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("stockCad", [
            "head" => $head,  
            "active" =>"home",
            "products" =>$products->fetch(true),
            "products_n" =>$products->count(),
            "user" =>$this->user,
        ]);
    }
    public function stock(?array $data): void
    {
     

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, Porfavor use o formulário")->render();
                echo json_encode($json);
                return;
            }
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Preencha todos os campos para cadastrar o produto !")->render();
                echo json_encode($json);
                return;
            }

            $stock = (new Stock());
            $stock->cod_product = $data["cod_product"];
            $stock->product = $data["product"];
            $stock->price = $data["price"];
            $stock->qtd = $data["qtd"];
            $stock->id_user = $this->user->id;
            $stock->status = "Activo";
            $stock->n_vendas = 0;

            if($stock->save()){

           $json['message'] = $this->message->success("{$stock->product} cadastrado com sucesso.")->render();
            $json['redirect'] = url("/stock");
             echo json_encode($json);
             return;
        }else{
            $json['message'] = $this->message->error("Erro ao enviar as informaçoes.")->render();
            echo json_encode($json);
            return;
            }

          
        }
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
         
            $stock = (new Stock())->findById($data['id']);
            $stock->cod_product = $data["cod_product"];
            $stock->product = $data["product"];
            $stock->price = $data["price"];
            if($data["qtd"] ==0 || $data["qtd"]<0){
                $json['message'] = $this->message->error("Verifique a quantidade de produto.")->render();
                echo json_encode($json);
                 return;
            }
            $stock->qtd = $data["qtd"];
            $stock->status = $data["status"];
     if($stock->save()){

                $json['message'] = $this->message->success("{$stock->product} actualizado com sucesso.")->render();
                 $json['redirect'] = url("/stock");
                  echo json_encode($json);
                  return;
             }else{
                 $json['message'] = $this->message->error("Erro ao enviar as informaçoes.")->render();
                 echo json_encode($json);
                 return;
                 }

        }

        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $stock = (new Stock())->findById($data["id"]);
            $stock->status ='deleted';
            $stock->save();
           
            $json['redirect']= url('/stock'); 
            $this->message->info("O Produto foi eliminado com sucesso")->flash();
            echo json_encode($json);
            return;
        }

        $products = (new Stock())->find("id_user =:id AND status !=:s","id={$this->user->id}&s=deleted");
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Stock" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("stock", [
            "head" => $head,  
            "active" =>"home",
            "products" =>$products->fetch(true),
            "products_n" =>$products->count(),
            "user" =>$this->user,
        ]);
    }
    public function CostumersCad(?array $data): void
    {
        $costumers = (new Costumer())->find("status != :s AND  id_user = :id","s=deleted&id={$this->user->id}");
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Nova Venda" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("cad_costumer", [
            "head" => $head,  
            "active" =>"home",
            "costumers" => $costumers->fetch(true),
            "costumers_n" => $costumers->count(),
            "user" =>$this->user,
        ]);
    }
    
    public function Costumers(?array $data): void
    {
       
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, Porfavor use o formulário")->render();
                echo json_encode($json);
                return;
            }
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Preencha todos os campos para cadastrar o cliente !")->render();
                echo json_encode($json);
                return;
            }
   
            


            $costumer = (new Costumer());
            $costumer->name = $data["name"];
            $costumer->gender = $data["gender"];
            $costumer->tel = $data["tel"];
            $costumer->address = $data["address"];
            $costumer->status = "Activo";
            $costumer->id_user = $this->user->id;
           
            if($costumer->save()){

            $json['redirect'] = url("/cliente");
            $json['message'] = $this->message->success("Cliente {$costumer->name} cadastrado com sucesso.")->render();
            echo json_encode($json);
            return;
        }else{
            $json['message'] = $this->message->error("Erro ao enviar as informaçoes.")->render();
            echo json_encode($json);
            return;
            }
    
            }

            if (!empty($data["action"]) && $data["action"] == "update") {
                $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
             
                $costumer = (new Costumer())->findById($data['id']);
                $costumer->name = $data["name"];
                $costumer->gender = $data["gender"];
                $costumer->tel = $data["tel"];
                $costumer->address = $data["address"];
                $costumer->status = "Activo";

                if($costumer->save()){

                    $json['redirect'] = url("/cliente");
                    $json['message'] = $this->message->success("Cliente {$costumer->name} actualizado com sucesso.")->render();
                    echo json_encode($json);
                    return;
                }else{
                    $json['message'] = $this->message->error("Erro ao enviar as informaçoes.")->render();
                    echo json_encode($json);
                    return;
                    }
            }

            if (!empty($data["action"]) && $data["action"] == "delete") {
                $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
                $costumer = (new Costumer())->findById($data["id"]);
                $costumer->status ='deleted';
                $costumer->save();
               
                $json['redirect']= url('/cliente'); 
                $this->message->info("Cliente foi eliminado com sucesso")->flash();
                echo json_encode($json);
                return;
            }

         $costumers = (new Costumer())->find("status != :s AND  id_user = :id","s=deleted&id={$this->user->id}");
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Nova Venda" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("costumer", [
            "head" => $head,  
            "active" =>"home",
            "costumers" => $costumers->fetch(true),
            "costumers_n" => $costumers->count(),
            "user" =>$this->user,
        ]);
    }

    
    public function CostumersPrint(): void
    {
       
        $costumers = (new Costumer())->find("status != :s AND  id_user = :id","s=deleted&id={$this->user->id}");
        $head = $this->seo->render(
            CONF_SITE_NAME . "- Lista de Clientes" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("costumer_print", [
            "head" => $head,  
            "active" =>"home",
            "costumers" => $costumers->fetch(true),
            "costumers_n" => $costumers->count(),
            "user" =>$this->user,
        ]);
    }


    public function product(): void
    {
       
        $products = (new Stock())->find("status =:s","s=Activo");
        $products_v = (new Stock())->find("n_vendas !=:s","s=0");
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Nova Venda" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("product", [
            "head" => $head,  
            "products"=>$products->fetch(true),
            "products_n"=>$products->count(),
            "products_v"=>$products_v->count(),
            "active" =>"home",
            "user" =>$this->user,
        ]);
    }
    public function divide(?array $data): void
    {
       
           
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, Porfavor use o formulário")->render();
                echo json_encode($json);
                return;
            }
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Preencha todos os campos para registrar vendas !")->render();
                echo json_encode($json);
                return;
            }

            $divide = (new Divide());
            $divide->costumer = $data["costumer"];
            $divide->product = $data["product"];
            $divide->qtd = $data["qtd"] ;
            $divide->data_limit=$data["data_limit"];
            $divide->id_user = $this->user->id;

            if($divide->save()){ 

                $stock = (new Stock())->findById($divide->product);
                 if($stock->qtd==0 || $stock->qtd<1){
                   $stock->status ="Esgotado";
                   $stock->save();
                }else{
                    $stock->qtd-=$divide->qtd;
                    $stock->save();
                }
                
                
           $json['message'] = $this->message->success("Divida registrada com sucesso")->render();
            $json['redirect'] = url("/divida");
             echo json_encode($json);
             return;
        }else{
            $json['message'] = $this->message->error("Erro ao enviar as informaçoes.")->render();
            echo json_encode($json);
            return;
            }
        }


        if (!empty($data["action"]) && $data["action"] == "payment") {

            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);


                $divide = (new Divide())->findById($data["id"]);
                 $divide->status = 1;
                $divide->save();

                $sale = (new Sale());
                $sale->costumer = $divide->costumer;
                $sale->product =$divide->product;
                $sale->price = $divide->stock()->price;
                $sale->qtd = $divide->qtd;
                $sale->troco =0;
                $sale->valorP =0;
                $sale->date_at=date("Y-m-d");
                $sale->id_user = $this->user->id;
                $sale->save();

               
                $stock = (new Stock())->findById($divide->product);
                 $stock->n_vendas+=1;
                    $stock->save();
            
                

                $json['redirect']= url('/divida'); 
                $this->message->success("Divida Paga com sucesso")->flash();
                echo json_encode($json);
                return;
            }

        if (!empty($data["action"]) && $data["action"] == "delete") {

            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
                $divide = (new Divide())->findById($data["id"]);
                $divide->destroy();

                $stock = (new Stock())->findById($divide->product);
                
                if($stock->qtd==0){
                   $stock->status ="Activo";
                   $stock->qtd=$stock->qtd+$divide->qtd;
                   $stock->save();
                }else{
                    $stock->qtd=$stock->qtd+$divide->qtd;
                    $stock->save();
                }
                
                $json['redirect']= url('/divida'); 
                $this->message->info("Divida Anulada com sucesso")->flash();
                echo json_encode($json);
                return;
            }

        


        $products = (new Stock())->find("status =:s","s=Activo");
        $costumers = (new Costumer())->find("status =:s","s=Activo");
        $divides = (new Divide())->find();
     $head = $this->seo->render(
         CONF_SITE_NAME . " - Nova Venda" ,
         CONF_SITE_DESC,
         url(),
         theme("/assets/images/share.jpg")
     );

     echo $this->view->render("divide", [
         "head" => $head,  
         "active" =>"home",
         "products" =>$products->fetch(true),
         "costumers"=>$costumers->fetch(true),
         "divides"=>$divides->order("created_at DESC")->fetch(true),
         "user" =>$this->user,
     ]);
    }

    public function backup(Type $var = null)
    {

         
    }

    public function report(): void
    {
       
        $sales = (new Sale())->find();
        $products = (new Stock())->find("status !=:s AND status !=:d","s=Esgotado&d=deleted");
       
        $divides = (new Divide())->find();
        $box = (new Box())->find();
        $costumers = (new Costumer())->find("status != :s AND  id_user = :id","s=deleted&id={$this->user->id}");
        $head = $this->seo->render(
            CONF_SITE_NAME . "- Lista de Clientes" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("report", [
            "head" => $head,  
            "active" =>"home",
            "costumers_n" => $costumers->count(),
            "divides"=>$divides->count(),
            "products_n"=>$products->count(),
            "products"=>$products->fetch(true),
            "sales"=>$sales->count(),
            "box"=>$box->fetch(),
            "user" =>$this->user,
        ]);
    }

  /**
     * APP LOGOUT
     */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->username . ". Volte Sempre !")->flash();

        Auth::logout();

        $update = (new User())->findById($this->user->id);
        $update->status = "Desativo";
        $update->save();
        redirect("/entrar");
    }


    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "alerta";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "alerta";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Conteúdo indispinível";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido.";
                $error->linkTitle = "Continue navegando";
                $error->link = url_back();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}