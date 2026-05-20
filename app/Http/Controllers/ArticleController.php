<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Override;

//use Illuminate\Http\Request;

class ArticleController extends Controller implements HasMiddleware
{

    #[Override]
    public static function middleware(): array
    {
       return [
       new Middleware('auth', only: ['create']),
       ];
    }

    public function create() 
    {
        return view('article.create');
    }
}
