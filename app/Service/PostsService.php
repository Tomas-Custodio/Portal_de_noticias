<?php

namespace App\Services;

use Illuminate\Support\facades\Http;
class PostsService {

    public function posts (){

        $posts = Http::get('https://jsonplaceholder.typicode.com/posts');

    }
}