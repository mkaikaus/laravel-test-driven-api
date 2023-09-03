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
        $response = $this->getJson(route('todo-list.index'));
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

    public function test_store_new_todo_list()
    {
        //preparation
        $list = TodoList::factory()->make();
        //action
        $response = $this->postJson(route('todo-list.store'), ['name' => $list->name])
        ->assertCreated()
        ->json();

        //assertion
        $this-> assertEquals($list->name, $response['name']);
        // dd($response['name']);
        $this-> assertDatabaseHas('todo_lists', ['name' => $list->name]);
        
    }

    public function test_while_storing_todo_list_name_field_is_required()
    {
        $this->withExceptionHandling();
        $response = $this->postJson(route('todo-list.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }
}
