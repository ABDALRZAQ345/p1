@extends('layouts.app')

@section('title')
    Registration
@endsection

@section('content')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">

                        <form enctype="multipart/form-data" action="{{ route('auth.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <x-form_label for="name">Name</x-form_label>
                                <input  name="name" class="form-control" type="text" aria-label="Name input" required>
                                <x-form_error name="name" />
                            </div>
                            <div class="mb-3">
                                <x-form_label for="email">Email</x-form_label>
                                <input name="email" class="form-control" type="email" aria-label="Email input" required >
                                <x-form_error name="email" />
                            </div>
                            <div class="mb-3">
                                <x-form_label for="password">Password</x-form_label>
                                <input name="password" class="form-control" type="password" aria-label="Password input" required>
                                <x-form_error name="password" />
                            </div>
                            <div class="mb-3">
                                <x-form_label for="password_confirmation">Confirm Password</x-form_label>
                                <input name="password_confirmation" class="form-control" type="password" aria-label="Confirm Password input" required >
                                <x-form_error name="password_confirmation" />
                            </div>
                            <div class="mb-3">
                                <x-form_label for="logo">Profile picture</x-form_label>
                                <input name="logo" class="form-control" type="file" aria-label="File input">

                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
