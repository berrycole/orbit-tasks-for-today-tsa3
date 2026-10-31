<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeded_workspace_has_eight_tasks_across_four_dates_and_one_user(): void
    {
        $this->seed();

        $this->assertDatabaseCount('tasks', 8);
        $this->assertDatabaseCount('users', 1);
        $this->assertSame(4, Task::query()->distinct()->count('task_date'));
        $this->assertSame(3, Task::query()->whereDate('task_date', today())->count());

        $this->get('/')->assertOk()
            ->assertSee('Review inventory counts')
            ->assertSee('Prepare morning sales summary')
            ->assertSee('Confirm supplier delivery')
            ->assertDontSee('Update product descriptions')
            ->assertDontSee('Review weekly targets');

        $this->get('/tasks')->assertOk()->assertSeeInOrder([
            'Review weekly targets',
            'Review inventory counts',
            'Update product descriptions',
            'Organize receipt records',
        ]);
        $this->get('/profile')->assertOk()->assertSee('Berry Cole')->assertSee('berry.cole@example.com');
        $this->get('/about')->assertOk()->assertSee('Nicole Fernandez');
    }

    public function test_today_filter_uses_task_date_and_every_page_has_navigation(): void
    {
        Task::factory()->create(['title' => '<script>Today task</script>', 'task_date' => today()]);
        Task::factory()->create(['title' => 'Tomorrow task', 'task_date' => today()->addDay()]);

        $this->get('/')->assertOk()
            ->assertSee('&lt;script&gt;Today task&lt;/script&gt;', false)
            ->assertDontSee('<script>Today task</script>', false)
            ->assertDontSee('Tomorrow task');

        foreach (['/', '/tasks', '/profile', '/about'] as $path) {
            $response = $this->get($path)->assertOk();
            foreach (['home', 'tasks', 'profile', 'about'] as $route) {
                $response->assertSee(route($route));
            }
        }

        $this->get('/tasks')->assertSee('Tomorrow task');
        $this->get('/profile')->assertSee('No profile yet.');
    }

    public function test_seeders_are_repeatable_and_usernames_remain_unique(): void
    {
        $this->seed();
        $this->seed();

        $this->assertDatabaseCount('tasks', 8);
        $this->assertDatabaseCount('users', 1);

        User::factory()->create(['username' => 'another.user']);
        $this->expectException(QueryException::class);
        User::factory()->create(['username' => 'another.user']);
    }
}
