@extends('layouts.app')

@section('title', 'About')

@section('content')
    <p class="eyebrow">ABOUT THIS WORKSPACE</p>
    <h1>A focused day in the Orbit universe.</h1>
    <p class="intro">Orbit Tasks for Today is a small task management system for store work. It shows today's priorities at a glance and keeps the complete schedule one click away.</p>

    <div class="about-grid">
        <img class="about-photo" src="{{ asset('assets/laptop.jpg') }}" alt="Laptop on a work desk" width="1000" height="800">
        <article class="panel"><span class="tag">BUILT WITH LARAVEL</span><h2>Simple plans.<br>Clearer focus.</h2><p>Tasks and the sample profile are stored in a database and loaded through Eloquent models. The Today view filters by date, while the Task List shows every record in date order.</p><p>This is the Laravel version of the IT0049 Tasks for Today activity, styled with Orbit Devices' charcoal and violet design.</p><a class="button" href="{{ route('tasks') }}">Explore all tasks ↗</a></article>
    </div>

    <div class="note"><strong>Developer</strong><p>Created by Nicole Fernandez for IT0049 Web System Technologies, Technical Summative Assessment 3.</p></div>
@endsection
