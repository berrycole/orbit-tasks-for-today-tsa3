<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $today = today();

        foreach ([
            ['Review inventory counts', 'pending', 0],
            ['Prepare morning sales summary', 'in progress', 0],
            ['Confirm supplier delivery', 'pending', 0],
            ['Update product descriptions', 'completed', 1],
            ['Check low-stock alerts', 'pending', 1],
            ['Organize receipt records', 'pending', 2],
            ['Plan weekend promotion', 'pending', 2],
            ['Review weekly targets', 'pending', -1],
        ] as [$title, $status, $dayOffset]) {
            Task::query()->updateOrCreate(
                ['title' => $title],
                ['status' => $status, 'task_date' => $today->copy()->addDays($dayOffset)],
            );
        }
    }
}
