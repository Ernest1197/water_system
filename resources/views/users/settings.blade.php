@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.alert')
    <div class="card">
        <div class="card-header">Settings</div>
        <div class="card-body">
            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            class="form-control"
                            name="name"
                            placeholder="Name"
                            value="{{ $user->name }}"
                        />
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            name="email"
                            placeholder="Email"
                            value="{{ $user->email }}"
                        />
                        </div>
                        <div class="form-group">
                            <label for="meter_number">Meter Number</label>
                            <input
                                type="text"
                                id="meter_number"
                                class="form-control"
                                name="meter_number"
                                placeholder="Meter Number"
                                value="{{ $user->meter_number }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="first_meter_reading">First Meter Reading (in M<sup>3</sup>)</label>
                            <input
                                type="text"
                                id="first_meter_reading"
                                class="form-control"
                                name="first_meter_reading"
                                placeholder="First Meter Reading"
                                value="{{ $user->first_meter_reading }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input
                                type="text"
                                id="phone"
                                class="form-control"
                                name="phone"
                                placeholder="Phone Number"
                                value="{{ $settings->phone ?? '' }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input
                                type="text"
                                id="province"
                                class="form-control"
                                name="province"
                                placeholder="Province"
                                value="{{ $settings->province ?? '' }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="district">District</label>
                            <input
                                type="text"
                                id="district"
                                class="form-control"
                                name="district"
                                placeholder="District"
                                value="{{ $settings->district ?? '' }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="sector">Sector</label>
                            <input
                                type="text"
                                id="sector"
                                class="form-control"
                                name="sector"
                                placeholder="Sector"
                                value="{{ $settings->sector ?? ''}}"
                            />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
