@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="row">
                @if (Session::get('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <h4 class="mb-3">Create New Group</h4>
                    <form class="needs-validation" method="POST" action="/groups">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="groupName">Group Name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="groupName" name="name" placeholder="Group Name" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="startTime">Start Time <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="startTime" name="start_time" placeholder="{{ now() }}"  required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="endTime">End Time <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="endTime" name="end_time" placeholder="{{ date('Y-m-d H:i:s', strtotime('+3 hours')) }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location">Location <span class="text-muted">(Reqired)</span></label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="1234 Main St. Los Angeles, CA 90000" required>
                            <div class="invalid-feedback">
                                Please enter a valid address.
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add New Group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
