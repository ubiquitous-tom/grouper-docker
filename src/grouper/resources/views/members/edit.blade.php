@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!--<div class="container">
            <h1 class="h2">Edit {{ $member->first_name }} {{ $member->last_name }} (ID: {{ $member->id }}) {{ $member->full_name }}</h1>
        </div>-->
            <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
        <div class="container">
            <div class="row">
                @if (Session::get('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <h4 class="mb-3">Edit Member: {{ $member->first_name }} {{ $member->last_name }} (ID: {{ $member->id }})</h4>
                    <form class="needs-validation" method="POST" action="/members/{{ $member->id }}" novalidate>
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="{{ $member->first_name }}" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="middleName">Middle name</label>
                                <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="" value="{{ $member->middle_name }}">
                                <div class="invalid-feedback">
                                    Valid middle name is optional.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name <span class="text-muted">(Reqired)</span></label>
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="{{ $member->last_name }}" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>

                        <!--<div class="mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" placeholder="Username" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your username is required.
                                </div>
                            </div>
                        </div>-->

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Reqired)</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ $member->email }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phoneNumber">Tel # <span class="text-muted">(Reqired)</span></label>
                            <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="805-555-5555" value="{{ $member->phone_number }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid phone number.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="company">Company Name <span class="text-muted">(Reqired)</span></label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Apple" value="{{ $member->company }}" required>
                            <div class="invalid-feedback">
                                Please enter a valid company name.
                            </div>
                        </div>

                        <!--<div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>-->

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                Member Status
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="status-active" name="status" value="1" {{ $member->status === 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status-active">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="status-inactive" name="status" value="0" {{ $member->status === 0 ? 'checked' : '' }}>
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
