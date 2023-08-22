<?php

namespace Tests\Feature;

use App\Http\Requests\TodoListRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{

    public function test_store_todo_list()
    {
        $this->withoutExceptionHandling();
        //preparation
        
        //action
        $response = $this->getJson(route('todo-list.store'));

        //dd($response);

        //assertion
        $this->assertEquals(1, count($response->json()));
    }
}
