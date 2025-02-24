@extends('layouts.app')

@section('title')
   New Password
@endsection

@section('content')

    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Password reset</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.store',$user) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-form_label for="password">Password</x-form_label>
                                <input name="password" class="form-control" type="password" aria-label="Password input" required>
                                <x-form_error name="password" />
                            </div>
                            <div class="mb-3">
                                <x-form_label for="password_confirmation">Confirm Password</x-form_label>
                                <input name="password_confirmation" class="form-control" type="password" aria-label="Password input" required>
                                <x-form_error name="password" />
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
