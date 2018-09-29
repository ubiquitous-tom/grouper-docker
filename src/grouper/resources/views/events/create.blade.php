@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4 class="mb-3">Create New Event</h4>
                    <form class="needs-validation" method="POST" action="/groups" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="eventName">Event Name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="eventName" name="name" placeholder="Group Name" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="startDate">Start Date <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="startDate" name="start_date" placeholder="{{ now() }}"  required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="endDate">End Date <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="endDate" name="end_date" placeholder="{{ date('Y-m-d H:i:s', strtotime('+3 hours')) }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add New Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
