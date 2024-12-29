<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.todo');
    }

    public function edit(Request $request, $id)
    {
        $todo = [
            'id' => 1,
            'title' => 'Do the homework'
        ];

        return view('todo.edit', [
            'data' => $todo
        ]);
    }
}
