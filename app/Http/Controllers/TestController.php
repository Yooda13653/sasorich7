<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\DB;
use App\User;
use App\Http\Requests;


class TestController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }
    
    public function show($id)
    {
        $categories = Category::find($id);

        return view('categories.show', [
            'categories' => $categories,
        ]);
    }
}
