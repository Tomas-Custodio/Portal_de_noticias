<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\UserService;
class ApiController extends Controller {

 public function index ( UserService $service ){
   
    $users = $service->users();

      $users = collect($users)->map(fn ($user) => (object) $user);

    return view('Api.index',compact('users'));

 }

   public function remov( Userservice $service, int $id){

      $resultado = $service->remov($id);
      dd($resultado);
      return redirect()->route('api.home');
      
   }
    
}