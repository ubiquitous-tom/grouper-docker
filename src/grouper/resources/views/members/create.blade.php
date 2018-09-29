@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4 class="mb-3">Add New Member</h4>
                    <form class="needs-validation" method="POST" action="/members" novalidate>
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="firstName" placeholder="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="middleName">Middle name</label>
                                <input type="text" class="form-control" id="middleName" placeholder="">
                                <div class="invalid-feedback">
                                    Valid middle name is optional.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="lastName" placeholder="" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Reqired)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phoneNumber">Tel # <span class="text-muted">(Reqired)</span></label>
                            <input type="text" class="form-control" id="phoneNumber" placeholder="805-555-5555" required>
                            <div class="invalid-feedback">
                                Please enter a valid phone number.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="company">Company Name <span class="text-muted">(Reqired)</span></label>
                            <input type="text" class="form-control" id="company" placeholder="Apple" required>
                            <div class="invalid-feedback">
                                Please enter a valid company name.
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add New Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
