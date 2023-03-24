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

    public function testIndexList_login()
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

    public function testIndexList_logout()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $tasks = $response->original['tasks'];

        $this->assertCount(0, $tasks);
    }

    public function testCreateTask()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
    }

    public function testStoreTask_login()
    {
        $user = factory(User::class)->state('test')->create();
        $response = $this->actingAs($user)->post('/tasks', [
            'title' => 'hogehoge',
            'body' => 'hogeta',
            'user_id' => 1,
        ]);
        $response->assertStatus(302);
    }

    public function testStoreTask_logout()
    {
        $response = $this->post('/tasks', [
            'title' => 'hogehoge',
            'body' => 'hogeta',
            'user_id' => 1,
        ]);
        $response->assertStatus(403);
    }

    public function testShowTask_login()
    {
        $user = factory(User::class)->state('test')->create();
        $this->actingAs($user);
        $task = factory(Task::class)->create([
            'title' => 'hogehoge',
            'body' => 'hogeta',
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('tasks.show', $task->id));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.show');
        $response->assertViewHas('task');
    }

    public function testShowTask_logout()
    {
        $user = factory(User::class)->state('test')->create();
        $task = factory(Task::class)->create([
            'title' => 'hogehoge',
            'body' => 'hogeta',
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('tasks.show', $task->id));

        $response->assertStatus(403);
    }

    public function testEditTask_login()
    {
        $user = factory(User::class)->state('test')->create();
        $this->actingAs($user);
        $task = factory(Task::class)->create([
            'title' => 'hogehoge',
            'body' => 'hogeta',
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('tasks.edit', $task->id));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.edit');
        $response->assertViewHas('task');
    }

    public function testEditTask_logout()
    {
        $user = factory(User::class)->state('test')->create();
        $task = factory(Task::class)->create([
            'title' => 'hogehoge',
            'body' => 'hogeta',
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('tasks.edit', $task->id));

        $response->assertStatus(403);
    }

    public function testUpdateTask_login()
    {
        $user = factory(User::class)->state('test')->create();
        $task = factory(Task::class)->create(['user_id' => $user->id]);
        $data = [
            'title' => 'hogehoge',
            'body' => 'achigeta'
        ];

        $update_url = route('tasks.update', ['task' => $task->id]);
        $response = $this->actingAs($user)->put($update_url, $data);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
                'title' => 'hogehoge',
                'body' => 'achigeta'
        ]);
    }

    public function testUpdateTask_logout()
    {
        $user = factory(User::class)->state('test')->create();
        $task = factory(Task::class)->create(['user_id' => $user->id]);
        $data = [
            'title' => 'hogehoge',
            'body' => 'achigeta'
        ];

        $update_url = route('tasks.update', ['task' => $task->id]);
        $response = $this->put($update_url, $data);
        $response->assertStatus(403);
    }

    public function testDestroyTask_login()
    {
        $user = factory(User::class)->state('test')->create();
        $task = factory(Task::class)->create(['user_id' => $user->id]);
        $this->assertDatabaseHas('tasks', ['id' => $task->id]);

        $delete_url = route('tasks.destroy', ['task' => $task->id]);
        $response = $this->actingAs($user)->delete($delete_url);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $this->assertSoftDeleted($task);
    }

    public function testDestroyTask_logout()
    {
        $user = factory(User::class)->state('test')->create();
        $task = factory(Task::class)->create(['user_id' => $user->id]);
        $this->assertDatabaseHas('tasks', ['id' => $task->id]);

        $delete_url = route('tasks.destroy', ['task' => $task->id]);
        $response = $this->delete($delete_url);
        $response->assertStatus(403);
    }

}
