<?php

namespace App\Http\Controllers;

use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo::all();
        dd($todo);

        return view('todo.index', ['todos' => $todos]);
    }
    public function create()
    {
        $title = '新規作成';
        return view('todo.create', ['title' => $title]);
    }

    public function store(Request $request)
    {
        $inputs = $request->all(); 
    
        $todo = new Todo();
        $todo->fill($inputs); 
        $todo->save();
    
        return redirect()->route('todo.index');
    }
}


