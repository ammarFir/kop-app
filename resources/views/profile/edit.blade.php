@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Profile</h3>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                        <hr>
                        @include('profile.partials.update-password-form')
                        <hr>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
