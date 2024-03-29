@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in Developer Mode!') }}
                    </div>
                </div>
                <div id="app" class="mt-4">
                    <passport-clients :class="'my-3'"></passport-clients>
                    <passport-authorized-clients :class="'my-3'"></passport-authorized-clients>
                    <passport-personal-access-clients :class="'my-3'"></passport-personal-access-clients>
                </div>
            </div>
        </div>
    </div>
@endsection
