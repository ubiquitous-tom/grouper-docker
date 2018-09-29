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

    <h2>Members</h2>
    <!-- <a href="/add" class="btn btn-primary">
        Add
        <span data-feather="plus-circle"></span>
    </a> -->
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Tel #</th>
          <th>Company</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
        <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->first_name }}</td>
            <td>{{ $member->middle_name }}</td>
            <td>{{ $member->last_name }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->phone_number }}</td>
            <td>{{ $member->company }}</td>
            <td>{{ $member->status === 1 ? 'Active' : 'Inactive' }}</td>
            <td><a href="/members/{{ $member->id }}/edit">Edit <span data-feather="edit-2"></span></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
