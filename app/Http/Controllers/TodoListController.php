<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class TodoListController extends Controller
{
    public function index(){

        //return response(['lists'=>[]]);

        $lists =TodoList::all();
        
        return response($lists);
    }

    public function show(TodoList $todolist)
    {
        // $list = TodoList::findOrFail($id);
        return response($todolist);
    }

    public function store(Request $request)
    {
    $list = TodoList::create(['name' => $request->name]);
       return $list;
    }
}
