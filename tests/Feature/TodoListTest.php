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

    public function setUp():void
    {
        parent::SetUp();
        $this->list = TodoList::factory()->create(['name' => 'my list']);
    }
    public function test_fetch_all_todo_list()
    {
        //preparation
        // $list = TodoList::factory()->create(['name' => 'my list']); -> To customize one column
        // $list = TodoList::factory()->count(2)->create(['name' => 'my list']); ->To make more than one faker
        //TodoList::factory()->count(2)->create(['name' => 'my list']);
        // TodoList::factory()->create();
    
        //action
        $response = $this->getJson(route('todo-list.store'));
        //dd($response);

        //assertion
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('my list', $response->json()[0]['name']);
    }
    public function test_fetch_single_todo_list()
    {
        //$list = TodoList::factory()->create();
        $response = $this->getJson(route('todo-list.show', $this-> list->id))
                    ->assertOk()
                    ->json();

        $this->assertEquals($response['name'] ,$this-> list->name);
    }
}
