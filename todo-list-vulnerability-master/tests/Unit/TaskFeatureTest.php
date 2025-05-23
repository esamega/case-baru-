<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_task_list()
    {
        Task::create(['name' => 'Sample Task', 'priority' => 'Low']);
        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response->assertSee('Sample Task');
    }

    public function test_user_can_create_task()
    {
        $response = $this->post('/tasks', [
            'name' => 'New Task',
            'priority' => 'Medium',
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', ['name' => 'New Task']);
    }

    public function test_user_can_delete_task()
    {
        $task = Task::create(['name' => 'Task to Delete', 'priority' => 'Low']);
        $response = $this->delete("/tasks/{$task->id}");
        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
