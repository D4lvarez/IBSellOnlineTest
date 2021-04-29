@extends('layouts.base')

@section('title') {{ $title }} @endsection

@section('content')
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header text-center">
                {{ $title }}
            </div>
            <div class="card-body">
                @livewire('register-form')
            </div>
        </div>


    </div>

    {{-- Table Show --}}
    <div class="container">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            @livewire('table-row')
        </table>
    </div>
@endsection

@section('own_js')
    {{-- <script src="js/app.js"></script> --}}

@endsection
