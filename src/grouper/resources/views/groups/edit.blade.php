@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <!--<div class="container">
            <h1 class="h2">Edit {{ $group->first_name }} {{ $group->last_name }} (ID: {{ $group->id }}) {{ $group->full_name }}</h1>
        </div>-->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4 class="mb-3">Edit Group: {{ $group->name }} (ID: {{ $group->id }})</h4>
                    <form class="needs-validation" method="POST" action="/groups/{{ $group->ID }}" novalidate>
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="groupName">Group Name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="groupName" placeholder="" value="{{ $group->name }}" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="startTime">Start Time <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="startTime" placeholder="" value="{{ $group->start_time }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="endTime">End Time <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="endTime" placeholder="" value="{{ $group->end_time }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location">Location <span class="text-muted">(Reqired)</span></label>
                            <input type="text" class="form-control" id="location" placeholder="Apple" value="{{ $group->location }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid address.
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
