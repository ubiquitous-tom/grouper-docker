@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        @if (Session::get('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

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

    <h2>Groups</h2>
    <!-- <a href="/add" class="btn btn-primary">
        Add
        <span data-feather="plus-circle"></span>
    </a> -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Group Name</th>
                <th>Location</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->location }}</td>
                    <td>{{ $group->start_time }}</td>
                    <td>{{ $group->end_time }}</td>
                    <td>{{ $group->status === 1 ? 'Active' : 'Inactive' }}</td>
                    <td><a href="/groups/{{ $group->id }}/edit">Edit <span data-feather="edit-2"></span></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
