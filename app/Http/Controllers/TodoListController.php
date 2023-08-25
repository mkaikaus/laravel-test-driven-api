<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;


class TodoListController extends Controller
{
    public function index(){

        //return response(['lists'=>[]]);

        $lists =TodoList::all();
        
        return response($lists);
    }

    public function show($id)
    {
        $list = TodoList::find($id);
        return response($list);
    }
}
