<?php

namespace Tests;

use App\Models\TodoList;
// use App\Models\Label;
// use App\Models\Task;
// use App\Models\User;
// use App\Models\WebService;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
// use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->withoutExceptionHandling();
    }
}
