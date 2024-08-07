@extends('layouts.app')

@section('title')
    Welcome back
@endsection

@section('content')

    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('auth.check') }}" method="POST">
                            @csrf
                            @error('local')
                            <div  class="alert alert-danger">
                                {{$message }}
                                </div>
                                @enderror

                            <div class="mb-3">
                                <x-form_label for="email">Email</x-form_label>
                                <input name="email" class="form-control" type="email" aria-label="Email input" required>
                                <x-form_error name="email" />
                            </div>
                            <div class="mb-3">
                                <x-form_label for="password">Password</x-form_label>
                                <input name="password" class="form-control" type="password" aria-label="Password input" required>
                                <x-form_error name="password" />
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route("password.update")}}" >Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
