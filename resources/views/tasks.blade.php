@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="page-head"><div><p class="eyebrow">THE COMPLETE PICTURE</p><h1>Task List</h1><p>Every task in Orbit, ordered by its scheduled date.</p></div><span class="pill">{{ $tasks->count() }} tasks</span></div>

    <section class="panel accounts" aria-labelledby="all-tasks-heading">
        <div class="section-head"><h2 id="all-tasks-heading">All scheduled work</h2><span class="muted">Earliest date first</span></div>
        <div class="table-wrap" tabindex="0" role="region" aria-label="All tasks table">
            <table>
                <thead><tr><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Scheduled date</th></tr></thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr><th scope="row">{{ $task->title }}</th><td><span class="badge {{ $task->status === 'completed' ? 'positive' : '' }}">{{ ucfirst($task->status) }}</span></td><td><time datetime="{{ $task->task_date->toDateString() }}">{{ $task->task_date->format('M j, Y') }}</time></td></tr>
                    @empty
                        <tr><td colspan="3">No tasks have been added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <p class="table-foot">Showing all {{ $tasks->count() }} tasks · Database records</p>
    </section>
@endsection
