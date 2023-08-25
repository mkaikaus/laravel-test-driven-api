<?php

namespace Tests\Feature;

use App\Models\TodoList;
use App\Http\Requests\TodoListRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;
    public function test_fetch_todo_list()
    {
        //preparation
        TodoList::create(['name' => 'my list']);
        //action
        $response = $this->getJson(route('todo-list.store'));
        //dd($response);

        //assertion
        $this->assertEquals(1, count($response->json()));
    }
}
