<article class="task-card">
    <div class="task-card-top"><span class="task-id">TASK {{ sprintf('%02d', $task->id) }}</span><span class="badge {{ $task->status === 'completed' ? 'positive' : '' }}">{{ ucfirst($task->status) }}</span></div>
    <h3>{{ $task->title }}</h3>
    <p>Orbit store task</p>
    <div class="task-card-bottom"><span>Scheduled</span><time datetime="{{ $task->task_date->toDateString() }}">{{ $task->task_date->format('M j, Y') }}</time></div>
</article>
