<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\App");

/*
 * LOGIN ROUTES
 */
$route->group(null);
$route->get("/", "LoginController:index");
$route->get("/entrar", "LoginController:index");
$route->post("/entrar", "LoginController:login");



/*
 * ADMIN ROUTES
 */
$route->group("/app");
$route->get("/", "AppController:home");
$route->get("/sair", "AppController:logout");

$route->group("/venda");
$route->get("/", "AppController:sales");
$route->post("/new", "AppController:sales");
$route->post("/search_price", "AppController:searchPrice");
$route->get("/factura/{id}", "AppController:salesFactura");


$route->group("/cliente");
$route->get("/", "AppController:Costumers");
$route->get("/newC", "AppController:CostumersCad");
$route->post("/new", "AppController:Costumers");
$route->post("/update", "AppController:Costumers");
$route->post("/delete", "AppController:Costumers");
$route->get("/print", "AppController:CostumersPrint");

$route->group("/stock");
$route->get("/", "AppController:stock");
$route->get("/newC", "AppController:stockCad");
$route->post("/new", "AppController:stock");
$route->post("/update", "AppController:stock");
$route->post("/delete", "AppController:stock");

$route->group("/produto");
$route->get("/", "AppController:product");

$route->group("/divida");
$route->get("/", "AppController:divide");
$route->post("/new", "AppController:divide");
$route->post("/pagar", "AppController:divide");
$route->post("/delete", "AppController:divide");


$route->group("/relatorio");
$route->get("/", "AppController:report");

/*
 * ERROR ROUTES
 */
$route->group("/alerta");
$route->get("/{errcode}", "AppController:error");
/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/alerta/{$route->error()}");
}

ob_end_flush();