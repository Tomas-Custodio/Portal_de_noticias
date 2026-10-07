<?Php

Namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserService {

    public function  users(){

        $users = Http::get('https://jsonplaceholder.typicode.com/users');
        return $users->json();

    }

    public function remov(int $id){

        $user = Http::Delete("https://jsonplaceholder.typicode.com/users/$id");
        return $user->successful();


    
    }


}