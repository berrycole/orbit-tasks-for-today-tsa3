<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'tasks' => Task::query()->whereDate('task_date', today())->orderBy('id')->get(),
            'today' => today(),
        ]);
    }

    public function about(): View
    {
        return view('about');
    }
}
