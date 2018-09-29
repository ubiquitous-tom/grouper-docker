@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    <h2>Events</h2>
    <!-- <a href="/add" class="btn btn-primary">
        Add
        <span data-feather="plus-circle"></span>
    </a> -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->status === 1 ? 'Active' : 'Inactive' }}</td>
                    <td><a href="/events/{{ $event->id }}/edit">Edit <span data-feather="edit-2"></span></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
