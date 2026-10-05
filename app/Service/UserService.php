<?Php

Namespace App\Service;

use Illuminate\Support\Facades\Http;

class UserService {

    public function  users(){

    $users = Http::get('https://jsonplaceholder.typicode.com/users');

    }


}