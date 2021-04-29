@extends('layouts.base')

@section('title') {{ $title }} @endsection

@section('content')
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header text-center">
                {{ $title }}
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    {{-- Username Field --}}
                    <div class="row g-3 align-items-center">
                        <div class="col-2">
                            <label for="username" class="col-form-label">Username</label>
                        </div>
                        <div class="col-2">
                            <input type="text" id="username" name="username" required class="form-control">
                        </div>
                    </div>
                    {{-- Email Field --}}
                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-2">
                            <label for="email" class="col-form-label">Email</label>
                        </div>
                        <div class="col-2">
                            <input type="email" id="email" name="email" required class="form-control">
                        </div>
                    </div>
                    {{-- Image Field --}}
                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-auto" style="margin-left: 59px">
                            <label class="input-group-text" for="imageUser">Upload Image</label>
                            <input type="file" class="form-control" required name="imageUser" id="imageUser">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>

        {{-- Table Show --}}
        <table class="table table-striped mt-5">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody id="table-body">

            </tbody>

        </table>
    </div>
@endsection

@section('own_js')
    <script src="js/app.js"></script>

@endsection
