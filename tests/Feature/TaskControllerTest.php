<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexList()
    {
        $user = factory(User::class)->state('test')->create();
        factory(Task::class, 5)->state('test')->create();
        $response = $this->actingAs($user)->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertViewHas('tasks');
        $tasks = $response->original['tasks'];

        $this->assertCount(5, $tasks);
    }
}
