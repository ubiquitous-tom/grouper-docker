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
                    <h4 class="mb-3">Edit Event: {{ $event->name }} (ID: {{ $event->id }})</h4>
                    <form class="needs-validation" method="POST" action="/events/{{ $event->id }}" novalidate>
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="eventName">Event Name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="eventName" name="name" placeholder="" value="{{ $event->name }}" required>
                                <div class="invalid-feedback">
                                    Valid name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="startDate">Start Date <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="startDate" name="start_date" placeholder="" value="{{ $event->start_date }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="endDate">End Date <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="endDate" name="end_date" placeholder="" value="{{ $event->end_date }}" required>
                                <div class="invalid-feedback">
                                    Please enter a valid time format.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                Event Status
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="status-active" name="status" value="1" {{ $event->status === 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status-active">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="status-inactive" name="status" value="0" {{ $event->status === 0 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status-inactive">Inactive</label>
                                </div>
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
