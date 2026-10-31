@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="page-head"><div><p class="eyebrow">THE PERSON BEHIND THE PLAN</p><h1>Profile</h1><p>The single user record in this task workspace.</p></div><span class="pill">Orbit member</span></div>

    @if ($user)
        <section class="profile-panel panel" aria-labelledby="profile-name">
            <span class="profile-avatar" aria-hidden="true">{{ mb_substr($user->full_name, 0, 1) }}</span>
            <div><p class="eyebrow">ORBIT / PROFILE</p><h2 id="profile-name">{{ $user->full_name }}</h2><p class="profile-handle">&#64;{{ $user->username }}</p><a class="text-link" href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
        </section>
    @else
        <div class="empty-state"><h2>No profile yet.</h2><p>Run the database seeder to add the sample Orbit user.</p></div>
    @endif
@endsection
