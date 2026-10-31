@extends('layouts.app')

@section('title', 'Today')

@section('content')
    <div class="page-head">
        <div>
            <p class="eyebrow">YOUR DAILY ORBIT</p>
            <h1>Tasks for today.</h1>
            <p>Stay close to what needs your attention right now.</p>
        </div>
        <span class="pill">{{ $today->format('F j, Y') }}</span>
    </div>

    <section class="hero task-hero" aria-label="Today's overview">
        <div class="hero-copy">
            <span class="tag">ORBIT / DAILY FOCUS</span>
            <h2>Make room for<br>what matters.</h2>
            <p>One focused view of today's store work. Every task below comes from the Orbit database.</p>
            <a class="button" href="{{ route('tasks') }}">View all tasks <span>↗</span></a>
        </div>
        <img src="{{ asset('assets/headphones.jpg') }}" alt="Over-ear headphones" width="1000" height="800">
        <span class="photo-label">TODAY / {{ $tasks->count() }} TASKS</span>
    </section>

    <div class="stats task-stats">
        <article><span>Today's tasks</span><strong>{{ $tasks->count() }}</strong><p>Scheduled for {{ $today->format('M j') }}</p></article>
        <article><span>Still to do</span><strong>{{ $tasks->where('status', 'pending')->count() }}</strong><p>Ready when you are</p></article>
        <article><span>In progress</span><strong>{{ $tasks->where('status', 'in progress')->count() }}</strong><p>Keep the momentum going</p></article>
    </div>

    <section aria-labelledby="today-heading">
        <div class="section-head"><div><p class="eyebrow">THE DAY AHEAD</p><h2 id="today-heading">On your list</h2></div><a class="text-link" href="{{ route('tasks') }}">Complete task list ↗</a></div>
        <div class="task-grid">
            @forelse ($tasks as $task)
                @include('task-card', ['task' => $task])
            @empty
                <div class="empty-state"><h3>No tasks scheduled today.</h3><p>Visit the full Task List to see work planned for other dates.</p></div>
            @endforelse
        </div>
    </section>
@endsection
