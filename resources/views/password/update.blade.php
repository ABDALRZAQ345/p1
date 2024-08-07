@extends('layouts.app')

@section('title')
    Password reset
@endsection

@section('content')

    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Password reset </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route("password.check")}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-form_label for="email">Entre your email </x-form_label>
                                <input name="email" class="form-control" type="email" aria-label="Email input" required>
                                <x-form_error name="email" />
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Change password</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
