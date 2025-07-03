@extends('backend.layouts.app')

@section('title', 'Coming Soon')

@section('content')
    <div class="container-fluid text-center">
        <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-md-8">
                <img alt="Coming Soon" class="img-fluid" src="{{ asset('images/frontend-designer.png') }}" style="max-height: 300px;">
                <h1 class="display-4 text-gray-800">Coming Soon</h1>
                <p class="lead text-gray-600">Fitur ini sedang dalam pengembangan. Silakan kembali lagi nanti!</p>
            </div>
        </div>
    </div>
@endsection
