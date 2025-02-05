<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

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
        $todo->user_id = Auth::id(); // ログインしている攻撃者のユーザID：2を代入
        $todo->fill($inputs);
        // $todo->content = '犯行予告など悪意のある投稿';
        // $todo->user_id = '1'; user_idが被害者のユーザID：1に上書きされる
        $todo->save();
    
        return redirect()->route('todo.index');
    } 

}


