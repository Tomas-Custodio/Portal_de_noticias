<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller {

 public function index(){

    $pedido = Http::get("https://jsonplaceholder.typicode.com/posts");
    $posts = $pedido->json();
    $posts[0]['title'] = "usuna";

    return $posts;

 }
    
}
